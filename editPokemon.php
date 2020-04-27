<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
?>

<?php 
    $pokemon = getPokemonByNumber($_COOKIE['pokedexNumber']);
    $types = getTypeByNum($_COOKIE['pokedexNumber']);
    $egg = getEggByNum($_COOKIE['pokedexNumber']);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(substr($_POST['pokeSprite'], -4) == ".jpg" || substr($_POST['pokeSprite'], -4) == ".png" || substr($_POST['pokeSprite'], -4) == ".gif" ) 
        {
            editCustom($pokemon['0'], $_POST['pokeName'], $_POST['pokeGeneration'], $_POST['pokeHeight'],
            $_POST['pokeWeight'], $_POST['ability'], $_POST['classification'], $_POST['type1'],
            $_POST['type2'], $_POST['eggGroup'], $_POST['pokeSprite']);
            header('Location: pokeInfo.php');
        }
    }
?>

    <div class="row">
        <div class="col-md-12">
            <h2>Edit Pokemon</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2"></div>
            <div class=col-md-4>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="edit" method="post"> 
                </br>
                    <input type="text" value="<?php echo $pokemon['8']; ?>" name="pokeSprite" class="form-control" id="pokeSprite" placeholder="Enter URL to Pokemon sprite" required>
                </br></br>
                <div class="form-group">
                    <select class="form-control" id="type1" name="type1">
                        <option value="<?php echo ($types['0']) ?>" selected><?php echo ucfirst($types['0']) ?></option>    
                        <option value="normal">Normal</option>
                        <option value="grass">Grass</option>
                        <option value="fire">Fire</option>
                        <option value="water">Water</option>
                        <option value="fighting">Fighting</option>
                        <option value="flying">Flying</option>
                        <option value="ground">Ground</option>
                        <option value="rock">Rock</option>
                        <option value="bug">Bug</option>
                        <option value="ghost">Ghost</option>
                        <option value="electric">Electric</option>
                        <option value="psychic">Psychic</option>
                        <option value="ice">Ice</option>
                        <option value="dragon">Dragon</option>
                        <option value="dark">Dark</option>
                        <option value="steel">Steel</option>
                        <option value="fairy">Fairy</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="type2" name="type2">
                        <option value="<?php echo ($types['1']) ?>" selected><?php echo ucfirst($types['1']) ?></option>    
                        <option value="">None</option>
                        <option value="normal">Normal</option>
                        <option value="grass">Grass</option>
                        <option value="fire">Fire</option>
                        <option value="water">Water</option>
                        <option value="fighting">Fighting</option>
                        <option value="flying">Flying</option>
                        <option value="poison">Poison</option>
                        <option value="ground">Ground</option>
                        <option value="rock">Rock</option>
                        <option value="bug">Bug</option>
                        <option value="ghost">Ghost</option>
                        <option value="electric">Electric</option>
                        <option value="psychic">Psychic</option>
                        <option value="ice">Ice</option>
                        <option value="dragon">Dragon</option>
                        <option value="dark">Dark</option>
                        <option value="steel">Steel</option>
                        <option value="fairy">Fairy</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="eggGroup" name="eggGroup">
                        <option value="<?php echo ($egg['0']['0'])?>" selected><?php echo ucfirst($egg['0']['0']) ?></option>    
                        <option value="monster">Monster</option>
                        <option value="water1">Water 1</option>
                        <option value="bug">Bug</option>
                        <option value="flying">Flying</option>
                        <option value="ground">Ground</option>
                        <option value="fairy">Fairy</option>
                        <option value="plant">Plant</option>
                        <option value="humanshape">Humanshape</option>
                        <option value="water3">Water 3</option>
                        <option value="mineral">Mineral</option>
                        <option value="indeterminate">Indeterminate</option>
                        <option value="water2">Water 2</option>
                        <option value="ditto">Ditto</option>
                        <option value="dragon">Dragon</option>
                        <option value="no-eggs">No Eggs</option>
                    </select>
                </div>
            </div>
            <div class=col-md-4>
                <input type="text" value="<?php echo $pokemon['1']; ?>" name="pokeName" class="form-control" id="pokeName" placeholder="Enter Pokemon name" autofocus required>
                <input type="text" value="<?php echo $pokemon['6']; ?>" name="classification" class="form-control" id="classification" placeholder="Enter Pokemon classification" required>
                <input type="text" value="<?php echo $pokemon['5']; ?>" name="ability" class="form-control" id="ability" placeholder="Enter Pokemon ability" required>
                <input type="text" value="<?php echo $pokemon['2']; ?>" name="pokeGeneration" class="form-control" id="pokeGeneration" placeholder="Enter generation" required>
                <input type="text" value="<?php echo $pokemon['3']; ?>" name="pokeHeight" class="form-control" id="pokeHeight" placeholder="Enter height" required>
                <input type="text" value="<?php echo $pokemon['4']; ?>" name="pokeWeight" class="form-control" id="pokeWeight" placeholder="Enter weight" required>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>    
        <div class="col-md-4">
            <button class="btn btn-light" type="submit" >Edit</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    </form>

</body>
</html>
<?php } else {
    header('Location: login.php');
} ?> 