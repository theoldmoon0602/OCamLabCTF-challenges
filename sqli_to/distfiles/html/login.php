<?php

require_once '../utils.php';

session_start();


if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $db = connect_db();
        $stmt = $db->prepare('select username, password from users where username=:username and password=:password');
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
        ]);
        $rows = $stmt->fetchAll();
        if (count($rows) == 0) {
            $_SESSION['login'] = 'Login failed';
        }
        else {
            $_SESSION['username'] = $username;
            header('Location: member.php');
            exit();
        }
    }
    catch (Exception $e) {
        $_SESSION['login'] = 'Login failed';
        var_dump($e);
    }
}
header('Location: index.php');