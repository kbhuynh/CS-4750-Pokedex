<?php
require('../controller/connectdb.php');
session_start();

if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['email']) > 0)
{
    $user = trim($_POST['email']);
    if(isset($_POST['password']))
    {
        $pwd = trim($_POST['pwd']);
        $_SESSION['email'] = $user;
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $_SESSION['pwd'] = $hash_pwd;
        header('Location: home.php');
    }
}



?>