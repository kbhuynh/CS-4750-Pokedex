<?php
include_once('templates/header.php');
include('../controller/connectdb.php');
require('dbcommands/functions.php');
?>
<body>
    <h1>Pokédex</h1>
    <div class="row">
        <div class="col-md-12 wrapper">
            <div class="row">
                <div id="stuff" class="col-md-12">
                    <div id="searchParent" class="form-group">
                        <input type="text" name="search" class="form-control mb-0" id="search" placeholder="Enter a Pokemon name here" autofocus>
                    </div>   
                    <div id="sortCol">
                        <label for="sort">Sort By: </label>
                        <select class="form-control" id="sort" name="sort">
                            <option selected value="alphaN">Pokedex Number</option>   
                            <option value="alphaA">Alphabetical (Ascending)</option>
                            <option value="alphaD">Alphabetical (Descending)</option>
                        </select>
                    </div>   
                </div>      
            </div>
        </div>
    </div> 
    <div class="row">
        <div id="wrapperParent" class="col-md-12">
            <div id="wrapper" class="wrapper row d-flex justify-content-center">
                <?php 
                    $pokemon = getPokemon();
                    foreach ($pokemon as $p): 
                ?>
                    <div class="col-md-2 card" data-name=<?php echo strtolower($p['Pokemon_Name'])?>  data-number=<?php echo $p['pokedexNumber']?>>
                        <a href="pokeInfo.php?pokedexNumber=<?php echo $p['pokedexNumber']?>" style="text-decoration:none; color: black;">
                            <div class="card-body">
                                <h3><?php echo $p['Pokemon_Name'] ?></h3>
                                <img class="sprite" src=<?php echo $p['sprite'] ?>>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- <a href="#" id="load">Load More</a> -->
    <a href="#" id="scroll" style="display: none;"><span></span></a>


    <script src="styles/search.js"></script>

</body>
</html>