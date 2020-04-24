<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="Teams page for Pokedex Database">  
    
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
            <li style="float:right"><a class="navbar-right" href="login.php">Login</a></li>
        </ul>
    </header>
    <div class="row">
        <div class="col-md-3"></div>
        <div class=col-md-6>
            <h2>Teams</h2>
        </div>
        <div class="col-md-3"></div>
    </div>
</br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class=col-md-4>
            <a href="createTeam.php">
                <button class="btn btn-lg btn-success box-button" type="submit" >Create Team</button>
            </a>
        </div>
        <div class=col-md-4>
            <a href="myTeams.php">
                <button class="btn btn-lg btn-primary box-button" type="submit" >My Teams</button>
            </a>
        </div>
        <div class="col-md-2"></div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['search']) > 0) //maybe use if (touched)
        {
            // do the things 
        }
    ?>
    <?php 
        // }
        // else
            // header('Location: login.php');
    ?>
</body>
</html>