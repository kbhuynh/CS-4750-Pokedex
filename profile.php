<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
?>

<h1>Hello <?php echo $_SESSION['email'];?></h1>

<div id="wrapper" class="formContainer wrapper row d-flex justify-content-center">
    <div class="row mb-2" style="flex-basis:100%;justify-content:center;text-align:center;">
        <h2>My liked Pokemon</h2>
    </div>
<?php
    $pokemon = getPokemonByLikes($_SESSION['email']);
    foreach ($pokemon as $p):
?>

<div class="col-md-2 card" data-name=<?php echo strtolower($p['Pokemon_Name'])?>  data-number=<?php echo $p['pokedexNumber']?>>
    <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $p['pokedexNumber']?>)" style="text-decoration:none; color: black;">
        <div class="card-body">
            <h3><?php echo $p['Pokemon_Name'] ?></h3>
            <img class="sprite" src=<?php echo $p['sprite'] ?>>
        </div>
    </a>
    <form action="likes.php" method="post">
        <button id="like<?php echo $p['pokedexNumber']; ?>" name="like" class="like btn" value="<?php echo $p['pokedexNumber']; ?>" href="">
        <?php if(checkIfLiked($p['pokedexNumber'], $_SESSION['email']) > 0) { ?>    
            <i class="fa fa-heart" aria-hidden="true"></i>
        <?php } else { ?>
            <i class="fa fa-heart-o" aria-hidden="true"></i>
        <?php } ?>
        </button>
    </form>
</div>

<?php endforeach; ?>
</div>

</body>
</html>
<?php } else {
    header('Location: login.php');
}?>