<<<<<<< HEAD
<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>
=======
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="Create Team page for Pokedex Database">  
    
  <link rel="shortcut icon" href="images/favicon.png" type="image/ico" />
  <title>Pokedex</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/custom.css" />
       
</head>

<body>  
    <?php
        // session_start();
        // if(isset($_SESSION['userEmail']))
        // {
    ?>
    <header>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="teams.php">Teams</a></li>
            <li><a href="customPokemon.php">Custom Pokemon</a></li>
            <li style="float:right"><a href="register.php">Register</a></li>
            <li style="float:right"><a class="navbar-right" href="#">Login</a></li>
        </ul>
    </header>


    <?php 
        // }
        // else
            // header('Location: login.php');
    ?>
</body>
>>>>>>> b3ef539f85b001a5df279b31526af47bbd8da6ac
</html>