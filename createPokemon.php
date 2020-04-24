<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>

<body>
    <div class="row">
        <div class="col-md-12">
            <h2>My Custom Pokemon</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-2"></div>
        <!-- <form action="<?php $_SERVER['PHP_SELF'] ?>" id="create" method="post">  -->
            <div class=col-md-4>
                <!-- Upload Pokemon Sprite
                <p>
                    <input type="file" name="pokemonSprite" id="pokemonSprite">
                </p> -->
            </div>
            <div class=col-md-4>
                <input type="text" name="pokeName" class="form-control" id="pokeName" placeholder="Enter Pokemon name" autofocus required>
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
                    </select>
                </div>
                <input type="text" name="pokeRegion" class="form-control" id="pokeRegion" placeholder="Enter region" required>
                <input type="text" name="pokeHeight" class="form-control" id="pokeHeight" placeholder="Enter height" required>
                <input type="text" name="pokeWeight" class="form-control" id="pokeWeight" placeholder="Enter weight" required>
            </div>
        <!-- </form> -->
    </div>
    <div class="row">
        <div class="col-md-4"></div>    
        <div class="col-md-4">
            <button class="btn btn-light" type="submit" >Create</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php 
        // }
        // else
            // header('Location: login.php');
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['search']) > 0) //maybe use if (touched)
        {
            // do the things 
        }
    ?>

</body>
</html>