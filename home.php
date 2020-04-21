<!-- Hello~ -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="Home page for Pokedex Database">  
    
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
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="login" method="post"> 
                <div class="form-group mx-sm-5 mb-2">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter a Pokemon name here" autofocus>
                </div>    
        </div>    
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit" >Filters</button>
            </div>    
        </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</br></br>    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 card">
                <div class="card-body"><p>
                <p></div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body">
                    <img src="data:image/jpeg;base64,'.$imageData.'">
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body"><p>
                </p></div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 card">
                <div class="card-body"><p>
                <p></div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body">
                    <img src="data:image/jpeg;base64,'.$imageData.'">
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body"><p>
                </p></div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 card">
                <div class="card-body"><p>
                <p></div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body">
                    <img src="data:image/jpeg;base64,'.$imageData.'">
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="card-body"><p>
                </p></div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" && strlen($_POST['search']) > 0) //maybe use if (touched)
        {
            // do the things 
        }
    ?>

</body>
</html>