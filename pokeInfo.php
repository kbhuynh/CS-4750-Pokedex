<?php
include_once('templates/header.php');
?>
<body>
<?php 
    $pokemon = getPokemonByNumber($_COOKIE['pokedexNumber']);
?>

<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <img src="<?php echo $pokemon['8']; ?>" style="width: 90%;">
        </div>
        <div class="col-md-3">
            <h2><?php echo $pokemon['1']; ?></h2>
            <h2>No. <?php echo $pokemon['0']; ?></h2>
            <h3>Classification: <?php echo $pokemon['6']; ?> </h3>
            <h3>Type: [PLACEHOLDER]</h3>
            <h3>Generation: <?php echo $pokemon['2']; ?></h3>
            <h3>Height: <?php echo $pokemon['3']; ?> m</h3>
            <h3>Weight: <?php echo $pokemon['4']; ?> kg</h3>
            <h3>Evolutionary Chain: [PLACEHOLDER]]</h3>
            <h3>Abilities: <?php echo $pokemon['5']; ?></h3>
            <h3>Egg Groups: [PLACEHOLDER]</h3>
        </div>
        <div class="col-md-3"></div>
</div>
<?php
    if(!empty(getPokemonCreatorEmail($pokemon['0'])) && $_SESSION['email'] === getPokemonCreatorEmail($pokemon['0'])[0])
    {    
?>
    <a href="editPokemon.php">
        <button class="btn btn-primary small-box-button" type="" >Edit Pokemon</button>
    </a>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" id="delete" method="post"> 
        <a href="home.php">
            <button class="btn btn-danger small-box-button" type="" >Delete Pokemon</button>
        </a>
    </form>
<?php
    }  
?>
<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        deleteCustom($pokemon['0']);
        setcookie("pokedexNumber", "", time() - 3600); 
        header('Location: home.php');
    }
?>

</body>
</html>