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

<input type ="hidden" name ="pokeNum"
value="<?php echo $_GET['pokedexNumber']?>" method="get">
<div class="row">
        <div class="col-md-2"></div>
            <div class=col-md-4></div>
</div>

<?php
echo $_GET['pokedexNumber']

?>




    <?php
        }
        else
        {
            header('Location: login.php');
        }
    ?>
</body>
</html>