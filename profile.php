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

<h1><?php echo $_SESSION['email']?></h1>



    <?php
        }
        else
        {
            header('Location: login.php');
        }
    ?>
</body>
</html>