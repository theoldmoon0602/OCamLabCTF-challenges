<?php

require_once('../util.php');

session_start();



if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->remember) {
        setcookie('remember_token', base64_encode(serialize($_SESSION['user'])), time()+3600*24);
    } else {
        setcookie('remember_token', 0, time() - 1);
    }
}
unset($_SESSION['user']);
header('Location: index.php');