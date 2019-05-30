<?php

require_once('../util.php');

session_start();

if (isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (User::register($username, $password)) {
        header('Location: index.php');
    }
    else {
        exit('Failed to Register');
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
          <input type="submit" value="Register" />
        </form>
    </div>
</body>
</html>
