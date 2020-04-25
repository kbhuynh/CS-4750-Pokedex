<?php
include_once('templates/header.php');
require('controller/connectdb.php');
require('dbcommands/functions.php');
?>
<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
                <div class="form-group mx-sm-5 mb-2">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter a Pokemon name here" autofocus>
                </div>    
        </div>    
        <div class="col-md-1">
            <label for="sort">Sorting</label>
            <select class="" id="sort" name="sort">
                <option disabled selected>Choose a sort method</option>    
                <option value="alphaA">Alphabetical (Ascending)</option>
                <option value="alphaD">Alphabetical (Descending)</option>
            </select>
        </div>    
        </div>
        <div class="col-md-3"></div>
    </div>
</br></br>    
    <div class="row">
        <div class="col-md-1"></div>
        <div id="wrapperParent" class="col-md-10">
            <div id="wrapper" class="row">
                <?php 
                    $pokemon = getPokemon();
                    foreach ($pokemon as $p): 
                ?>
                    <div class="col-md-2 card" data-name=<?php echo strtolower($p['Pokemon_Name'])?>>
                        <a href="pokeInfo.php?pokedexNumber=<?php echo $p['pokedexNumber']?>" style="text-decoration:none; color: black;">
                            <div class="card-body">
                                <h3><?php echo $p['Pokemon_Name'] ?></h3>
                                <img src=<?php echo $p['sprite'] ?>>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['search']) > 0) //maybe use if (touched)
        {
            // do the things 
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="search.js"></script>

</body>
</html>