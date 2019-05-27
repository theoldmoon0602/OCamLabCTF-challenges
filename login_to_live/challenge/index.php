<?php
if (isset($_GET['source'])) {
    highlight_file(__FILE__);
    exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $pdo = new PDO("sqlite::memory:");
    $pdo->exec('create table users(username text, password text);');
    $pdo->exec('insert into users(username, password) values ("sibling", "chocolate");');
    $pdo->exec('insert into users(username, password) values ("uduki", "namahamu-melon");');
    $pdo->exec('insert into users(username, password) values ("mio", "fried-chicken");');

    $rows = $pdo->query("select username from users where username='${_POST['username']}' and password='${_POST['password']}'");
    foreach ($rows as $row) {
        if ($row[0] === "mika") {
            exit(include "flag.php");
        }
        exit("Hello, ${row[0]}");
    }
}

?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>Login to Live</title>
    <style>
html,body {
    height: 100%;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
}
form {
    border: 10px double black;
    padding: 40px;
    font-size: 20px;
    font-family: monospace;
}
input[type=text],input[type=password] {
    border: none;
    border-bottom: solid 2px black;
    text-align: center;
}
input[type=submit] {
    border: solid 2px black;
    background: none;
    padding: 0 16px;
    font-size: 20px;
    float: right;
}
input[type=submit]:active {
    position: relative;
    top: 2px;
}
    </style>
</head>
<body>
    <form method="POST">
        <a href="?source">source</a><br/>
        username: <input type="text" name="username" autofocus><br/>
        password: <input type="password" name="password"><br/>
        <input type="submit" value="Login">
    </form>
</body>
</html>
