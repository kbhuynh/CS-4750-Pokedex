<?php
        session_start();
        if(isset($_SESSION['email']))
        {
?>
<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>
<body>


<h1>Hello <?php echo $_SESSION['email']?></h1>



    <?php
        }
        else
        {
            header('Location: login.php');
        }
    ?>
</body>
</html>