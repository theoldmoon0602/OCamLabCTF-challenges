<?php

session_start();


if (!isset( $_SESSION['username'] )) {
    header('Location: index.php');
    exit();
}

$message = 'You are not an admin.';
if ($_SESSION['username'] === 'admin') {
    $message = file_get_contents('../flag.txt');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?> </title>
    <style>
    .container {
      width: 800px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
    <div class="container">
        <h1>Hi <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?> </h1>
        <p>"<?= htmlspecialchars($message, ENT_QUOTES); ?>"</p>
    </div>
</body>
</html>
