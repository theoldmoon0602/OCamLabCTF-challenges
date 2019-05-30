<?php

class User
{
    public $username;
    public $is_admin;
    public $remember;

    public function __construct()
    {
    }

    public static function register($username, $password)
    {
        try {
            $pdo = connect_db();
            $stmt = $pdo->prepare('insert into users(username, password_hash) values (:username, :password_hash)');
            $stmt->execute([
                ':username' => $username,
                ':password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function login($username, $password)
    {
        try {
            $pdo = connect_db();
            $stmt = $pdo->prepare('select password_hash, is_admin from users where username = :username');
            $stmt->execute([
                ':username' => $username,
            ]);
            $rows = $stmt->fetchAll();
            if (count($rows) != 1 || !password_verify($password, $rows[0]['password_hash'])) {
                return null;
            } else {
                $user = new User();
                $user->username = $username;
                $user->is_admin = (int)$rows[0]['is_admin'];
                return $user;
            }
        } catch (PDOException $e) {
        }
        return null;
    }

    public function __sleep() {
        try {
            $pdo = connect_db();
            $stmt = $pdo->prepare('update users set is_admin = :is_admin where username = :username');
            $stmt->execute([
                ':username' => $this->username,
                ':is_admin' => $this->is_admin
            ]);
        } catch (PDOException $e) {
        }

        return ['username', 'is_admin', 'remember'];
    }


    public function __wakeup() {
        try {
            $pdo = connect_db();
            $stmt = $pdo->prepare('select is_admin from users where username = :username');
            $stmt->execute([
                ':username' => $this->username,
            ]);
            $rows = $stmt->fetchAll();
            if ($rows) {
                $this->is_admin = (int)$rows[0]['is_admin'];
            }
        } catch (PDOException $e) {
        }
    }
}

function connect_db()
{
    $pdo = new PDO('sqlite:'.__DIR__.'/database/db.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
}
