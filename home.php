<?php
include_once('templates/header.php');
require('controller/connectdb.php');
require('dbcommands/functions.php');
?>
<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="search" method="post"> 
                <div class="form-group mx-sm-5 mb-2">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter a Pokemon name here" autofocus>
                </div>    
        </div>    
            <div class="col-md-1">
                <label for="sort">Sorting</label>
                <select class="" id="sort" name="sort">
                    <option value="None"></option>    
                    <option value="alphaA">Alphabetical (Ascending)</option>
                    <option value="alphaD">Alphabetical (Descending)</option>
                </select>
            </div>    
        </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</br></br>    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <?php 
                    $pokemon = getPokemon();
                    foreach ($pokemon as $p): 
                ?>
                    <div class="col-md-2 card">
                    <a onclick="selectPokemon()" style="text-decoration:none; color: black;">
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

</body>
</html>