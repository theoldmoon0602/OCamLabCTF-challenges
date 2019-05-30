<?php

require_once('../util.php');

session_start();


if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['user'];


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
    <h1>Hello <?= $user->username;?>!</h1>
<?php
    if ($user->is_admin) {
        echo file_get_contents('../flag.txt');
    } else {
        echo 'We are going to give the flag to only the admin.';
    }
?>
    <p><a href="logout.php">logout</a></p>
    </div>
</body>
</html>
