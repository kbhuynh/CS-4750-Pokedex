<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
?>

<h1>Hello <?php echo $_SESSION['email'];?></h1>
<?php
    $pokemon = getPokemonByLikes($_SESSION['email']);
    echo var_dump($pokemon);
    // foreach ($pokemon as $p):
?>



</body>
</html>
<?php } else {
    header('Location: login.php');
}?>