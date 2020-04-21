<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="Create Pokemon for Pokedex Database">  
    
  <link rel="shortcut icon" href="images/favicon.png" type="image/ico" />
  <title>Pokedex</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/custom.css" />
       
</head>

<body>  
    <header>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="teams.php">Teams</a></li>
            <li><a href="customPokemon.php">Custom Pokemon</a></li>
        </ul>
    </header>

    <div class="row">
        <div class="col-md-12">
            <h2>My Custom Pokemon</h2>
        </div>
    </div>
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
                    <!-- <label for="type1">Type 1</label> -->
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
                    <!-- <label for="type2">Type 2</label> -->
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
        if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['search']) > 0) //maybe use if (touched)
        {
            // do the things 
        }
    ?>

</body>
</html>