<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="author" content="Grace Wu, April Xie, Kevin Huynh, Vinh Do">
  <meta name="description" content="Custom Pokemon page for Pokedex Database">  
    
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
        <div class=col-md-6>
            <h2>My Custom Pokemon</h2>
        </div>
        <div class="col-md-3"></div>
    </div>
</br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class=col-md-4>
            <a href="createPokemon.php">
                <button class="btn btn-lg btn-success box-button" type="submit" >Create a</br>Pokemon</button>
            </a>
        </div>
        <div class=col-md-4>
            <a href="myCustom.php">
                <button class="btn btn-lg btn-primary box-button" type="submit" >My Custom<br>Pokemon</button>
            </a>
        </div>
        <div class="col-md-2"></div>
    </div>



</body>
</html>