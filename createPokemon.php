<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
?>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(substr($_POST['pokeSprite'], -4) == ".jpg" || substr($_POST['pokeSprite'], -4) == ".png" || substr($_POST['pokeSprite'], -4) == ".gif" ) 
            {
                addCustom($_POST['pokeName'], $_POST['pokeGeneration'], $_POST['pokeHeight'], $_POST['pokeWeight'],
                $_POST['ability'], $_POST['classification'], $_POST['type1'], 
                $_POST['type2'], $_POST['eggGroup'], $_POST['pokeSprite'], $_SESSION['email']);    

                $results = getPokemonByName($_POST['pokeName']);
                setcookie('pokedexNumber', $results[0]);
                header('Location: pokeInfo.php');
            }
            else 
            {
                echo "<p style='color:red; font-size: 1.5em; font-weight: 700;
                font-family: 'Space Mono', monospace;'>Incorrect file format</p>";
            }
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <h2>My Custom Pokemon</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2"></div>
            <div class=col-md-4>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="create" method="post"> 
                </br>
                    
                    <input type="text" name="pokeSprite" class="form-control" id="pokeSprite" placeholder="Enter URL to Pokemon sprite" required>
                    <label for="pokeSprite">Image URL must be in jpg/png/gif format</label>
                </br></br>
                <div class="form-group">
                    <!-- <label for="type1">Type 1</label> -->
                    <select class="form-control" id="type1" name="type1">
                        <option disabled selected>Type 1</option>    
                        <!-- <option value=""></option>     -->
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
                        <option value="" disabled selected>Type 2</option>    
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
                        <option disabled selected>Egg Group</option>    
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
                <input type="text" name="pokeName" class="form-control" id="pokeName" placeholder="Enter Pokemon name" autofocus required>
                <input type="text" name="classification" class="form-control" id="classification" placeholder="Enter Pokemon classification" required>
                <input type="text" name="ability" class="form-control" id="ability" placeholder="Enter Pokemon ability" required>
                <input type="number" step="1" name="pokeGeneration" class="form-control" id="pokeGeneration" placeholder="Enter generation" required>
                <input type="number" step="0.1"name="pokeHeight" class="form-control" id="pokeHeight" placeholder="Enter height" required>
                <input type="number" step="0.1" name="pokeWeight" class="form-control" id="pokeWeight" placeholder="Enter weight" required>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>    
        <div class="col-md-4">
            <button class="btn btn-light" type="submit" >Create</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>
<?php } else {
    header('Location: login.php');
} ?> 