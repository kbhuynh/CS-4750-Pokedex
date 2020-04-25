<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>
<body>
    <?php
        session_start();
        if(isset($_SESSION['email']))
        {
    ?>
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
        }
        else
            header('Location: login.php');
    ?>
</body>
</html>