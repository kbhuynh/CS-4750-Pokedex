<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>
    <?php
        session_start();
        if(isset($_SESSION['email']))
        {
    ?>



    <?php 
        }
        else
            header('Location: login.php');
    ?>
</body>
</html>