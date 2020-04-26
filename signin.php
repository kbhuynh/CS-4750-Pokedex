<?php
session_start();
// require('dbcommands/functions.php');
require('../dbcommands/functions.php');

if(!isset($_SESSION['email']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if(strlen($_POST['email']) > 0 && checkSignUp($_POST['email']) != 0)
    {
        $user = trim($_POST['email']);
        if(isset($_POST['password']) && checkPassword($_POST['email'], $_POST['password']))
        {
            $pwd = trim($_POST['password']);
            $_SESSION['email'] = $user;
            $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $_SESSION['pwd'] = $hash_pwd;
            header('Location: home.php');
        } else { 
            die(header("location:login.php?loginFailed=true&reason=wrongpass"));
        }
    } else { 
        die(header("location:login.php?loginFailed=true&reason=password"));
    }
}
?>