<?php
include_once('templates/header.php');
require('../controller/connectdb.php');
?>

<body>
    <?php
        session_start();
        if(isset($_SESSION['email']))
        {
            if(isset($_SESSION[]))
            {
    ?>
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Custom Pokemon</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2"></div>
            <div class=col-md-4>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="create" method="post"> 
                <h3 style="font-size:2vw;">Upload Pokemon Sprite</h3>
                </br>
                <p>
                    <input type="file" name="pokemonSprite" id="pokemonSprite">
                </p>
                </br></br>
                <div class="form-group">
                    <label for="type1">Type 1</label>
                    <select class="form-control" id="type1" name="type1">
                        <option value="None"></option>    
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
                    <label for="type2">Type 2</label>
                    <select class="form-control" id="type2" name="type2">
                        <option value="None"></option>
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
            </div>
            <div class=col-md-4>
                <input type="text" name="pokeName" class="form-control" id="pokeName" placeholder="Enter Pokemon name" autofocus required>
                <input type="text" name="classification" class="form-control" id="classification" placeholder="Enter Pokemon classification" required>
                <input type="text" name="ability" class="form-control" id="ability" placeholder="Enter Pokemon ability" required>
                <input type="text" name="pokeRegion" class="form-control" id="pokeRegion" placeholder="Enter region" required>
                <input type="text" name="pokeHeight" class="form-control" id="pokeHeight" placeholder="Enter height" required>
                <input type="text" name="pokeWeight" class="form-control" id="pokeWeight" placeholder="Enter weight" required>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-4"></div>    
        <div class="col-md-4">
            <button class="btn btn-light" type="submit" >Create</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php 
        }
    }
    else
        header('Location: login.php');
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            createPokemon($pokeName, $height, $weight, $ability, $classification, $type1, $type2);
        }
    ?>

</body>
</html>