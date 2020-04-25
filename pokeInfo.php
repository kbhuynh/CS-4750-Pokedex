<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>
<body>


<input type ="hidden" name ="pokeNum"
value="<?php echo $_GET['pokedexNumber']?>" method="get">
<div class="row">
        <div class="col-md-2"></div>
            <div class=col-md-4></div>
</div>

<?php
echo $_GET['pokedexNumber']

?>


</body>
</html>