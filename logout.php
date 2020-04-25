<?php 
session_start();
$_SESSION['email'] = null;
session_unset();

header("Location: login.php");
session_destroy();
exit;
?> 