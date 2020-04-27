<?php
session_start();
require('dbcommands/functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['like'])) { 
    if (likePokemon($_POST['like'], $_SESSION['email']) == "unlike" ) {
        removeLike($_POST['like'], $_SESSION['email']);
        header('Location: home.php');
    } else {
        likePokemon($_POST['like'], $_SESSION['email']);
    }
}

?>