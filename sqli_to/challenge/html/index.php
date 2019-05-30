<?php session_start(); ?>


<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>Login me</title>
  <style>
    .container {
      width: 800px;
      margin: 0 auto;
    }
    form {
      font-family: monospace;
      font-size: 120%;
    }
    input[type=text],input[type=password] {
      border: none;
      border-bottom: 1px solid #000;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login Me</h1>

    <h2>Login</h2>
    <?php
    if (isset($_SESSION['login'])) {
      echo '<p>';
      echo(htmlspecialchars($_SESSION['login'], ENT_QUOTES));
      echo '</p>';
      echo PHP_EOL;

      unset($_SESSION['login']);
    }
    ?>
    <form action="login.php" method="post">
      Username: <input type="text" name="username" placeholder="username" required /> <br />
      Password: <input type="password" name="password" placeholder="password" required /> <br />
      <input type="submit" value="Login" />
    </form>

    <h2>Register</h2>
    <?php
      if (isset($_SESSION['register'])) {
        echo '<p>';
        echo(htmlspecialchars($_SESSION['register'], ENT_QUOTES));
        echo '</p>';
        echo PHP_EOL;

        unset($_SESSION['register']);
      }
    ?>

    <form action="register.php" method="post">
      Username: <input type="text" name="username" placeholder="username" required /> <br />
      Password: <input type="password" name="password" placeholder="password" required /> <br />

      <input type="submit" value="Register" />
    </form>
  </div>

</body>
</html>
