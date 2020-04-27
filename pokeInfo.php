<?php
include_once('templates/header.php');
?>
<body>
<?php 
    $pokemon = getPokemonByNumber($_COOKIE['pokedexNumber']);
    $types = getTypeByNum($_COOKIE['pokedexNumber']);
    $evos = getEvoByNum($_COOKIE['pokedexNumber']);
    $egg = getEggByNum($_COOKIE['pokedexNumber']);
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
            <?php 
                if($types['1'] == "") {
            ?>
                <h3>Type: <?php echo ucfirst($types['0']); ?></h3>
            <?php 
                } else {
            ?>
                <h3>Type: <?php echo ucfirst($types['0']) . "/" . ucfirst($types['1']); ?></h3>
            <?php 
               }
            ?>
            <h3>Generation: <?php echo $pokemon['2']; ?></h3>
            <h3>Height: <?php echo $pokemon['3']; ?> m</h3>
            <h3>Weight: <?php echo $pokemon['4']; ?> kg</h3>
            <?php 
                if($evos == null) {
            ?>
                <h3>Evolutionary Chain: None</h3>
            <?php 
                } elseif($evos['2'] == "") {
            ?>
                Evolutionary Chain:
                <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $evos['0']; ?>)">
                    <?php echo getPokemonByNumber($evos['0'])['1']; ?>
                </a>
                &rarr;
                <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $evos['1']; ?>)">
                    <?php echo getPokemonByNumber($evos['1'])['1']; ?>
                </a>
            <?php 
                } else {
            ?>
                Evolutionary Chain:
                <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $evos['0']; ?>)">
                    <?php echo getPokemonByNumber($evos['0'])['1']; ?>
                </a>
                &rarr;
                <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $evos['1']; ?>)">
                    <?php echo getPokemonByNumber($evos['1'])['1']; ?>
                </a>
                &rarr;
                <a href='pokeInfo.php' onclick="return pokeInfo(<?php echo $evos['2']; ?>)">
                    <?php echo getPokemonByNumber($evos['2'])['1']; ?>
                </a>
            <?php 
                }
            ?>
            <h3>Abilities: <?php echo $pokemon['5']; ?></h3>
            <h3>Egg Groups: <?php echo ucfirst($egg['0']['0']); ?></h3>
        </div>
        <div class="col-md-3"></div>
</div>
<?php
    if(!empty(getPokemonCreatorEmail($pokemon['0'])) && $_SESSION['email'] === getPokemonCreatorEmail($pokemon['0'])[0])
    {    
?>
</br>
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
<script>
    function pokeInfo($pokedexNumber)
    {
        console.log($pokedexNumber);
        document.cookie = "pokedexNumber="+$pokedexNumber;
        return true;
    }
</script>

</body>
</html>