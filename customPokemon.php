<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>

<<<<<<< HEAD
<body>
=======
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
            <li style="float:right"><a class="navbar-right" href="login.php">Login</a></li>
        </ul>
    </header>
>>>>>>> b3ef539f85b001a5df279b31526af47bbd8da6ac
    <div class="row">
        <div class="col-md-3"></div>
        <div class=col-md-6>
            <h2>My Custom Pokemon</h2>
        </div>
        <div class="col-md-3"></div>
    </div>
</br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class=col-md-4>
            <a href="createPokemon.php">
                <button class="btn btn-lg btn-success box-button" type="submit" >Create a</br>Pokemon</button>
            </a>
        </div>
        <div class=col-md-4>
            <a href="myCustom.php">
                <button class="btn btn-lg btn-primary box-button" type="submit" >My Custom<br>Pokemon</button>
            </a>
        </div>
        <div class="col-md-2"></div>
    </div>


    <?php 
        // }
        // else
            // header('Location: login.php');
    ?>
</body>
</html>