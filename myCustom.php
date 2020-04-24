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
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" id="search" method="post"> 
                <div class="form-group mx-sm-5 mb-2">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Enter a Pokemon name here" autofocus>
                </div>    
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