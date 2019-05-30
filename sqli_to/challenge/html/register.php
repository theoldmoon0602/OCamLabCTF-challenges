<?php

require_once '../utils.php';

session_start();



if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $db = connect_db();
        $db->exec("insert into users(username, password) values ('$username', '$password')");
        $_SESSION['register'] = 'Register succeeded';
    }
    catch (PDOException $e) {
        $_SESSION['register'] = $e->getMessage();
    }
}
header('Location: index.php');
