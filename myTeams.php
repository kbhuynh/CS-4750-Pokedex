<?php
require('connectdb.php');
require('teamActions.php');

$action = "list_teams";        // default action
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="My Team page for Pokedex Database">  
    
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
    <div class="container">

    <?php
    $team_to_update = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $teams = getAllTeams();
        include('viewTeam.php');        // default action
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['action']) && ($_POST['action'] == 'Edit'))
        {
            $tteam_to_update = getTeamInfo_by_id($_POST['teamID']);		
            include('editTeam.php');
            if (!empty($_POST['teamID']) && !empty($_POST['pokemon1']) && !empty($_POST['pokemon2']))
            {
                editTeam($_POST['teamID'], $_POST['pokemon1'], $_POST['pokemon2'], $_POST['pokemon3'], $_POST['pokemon4'], $_POST['pokemon5'], $_POST['pokemon6']);
                header("Location: myTeams.php?action=list_teams");
            }
        }
        else if (!empty($_POST['action']) && ($_POST['action'] == 'Add'))
        {
            if (!empty($_POST['teamID']) && !empty($_POST['pokemon1']) && !empty($_POST['pokemon2']))
            {
                addTeam($_POST['teamID'], $_POST['pokemon1'], $_POST['pokemon2'], $_POST['pokemon3'], $_POST['pokemon4'], $_POST['pokemon5'], $_POST['pokemon6']);
                header("Location: myTeams.php?action=list_teams");
            }
        }
        else if (!empty($_POST['action']) && ($_POST['action'] == 'Delete'))
        {
            if (!empty($_POST['teamID']) )
            {
                deleteTeam($_POST['teamID']);
                header("Location: myTeams.php?action=list_teams");
            }
        }
    }
    ?>
    </div>
    <?php 
        // }
        // else
            // header('Location: login.php');
    ?>
</body>
</html>