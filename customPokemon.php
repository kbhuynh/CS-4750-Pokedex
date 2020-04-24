<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>

<body>  
    <?php
        // session_start();
        // if(isset($_SESSION['userEmail']))
        // {
    ?>
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