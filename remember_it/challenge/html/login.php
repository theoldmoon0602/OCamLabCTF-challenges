<?php

require_once('../util.php');

session_start();

if (isset($_COOKIE['remember_token']) && !empty($_COOKIE['remember_token'])) {
    $user = unserialize(base64_decode($_COOKIE['remember_token']));
    $_SESSION['user'] = $user;
    $user->remember = false;

    header('Location: /user.php');
    exit();
}

if (isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = User::login($username, $password);
    if (is_null($user)) {
        exit('Login failed');
    } else {
        $user->remember = isset($_POST['remember']);
        $_SESSION['user'] = $user;

        header('Location: user.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remember It</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Remember It</h1>
        <form method="post">
          Username: <input type="text" name="username" placeholder="username" required /> <br />
          Password: <input type="password" name="password" placeholder="password" required /> <br />
          <input type="checkbox" name="remember">Remember Me<br />
          <input type="submit" value="Login" />
        </form>
    </div>
</body>
</html>
