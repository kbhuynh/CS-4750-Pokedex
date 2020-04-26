<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
?>

<div class="wrapper-sm formContainer">
    <h1>Create Team</h1>
    <form id="createTeam" class="form" action="teams.php" method="post">
        <div class="form-group">
            <label for="teamname">Team Name</label>
            <input type="text" name="teamname" class="form-control" placeholder="Enter team name" required>
        </div>
        <div class="form-group">
            <label for="p1">Pokemon 1</label>
            <input id="p1" list="pokemon" class="form-control custom-select" type="text" name="p1" placeholder="Enter or select a pokemon" required>
            <datalist id="pokemon" name="pokemon">
                <?php
                    $pokemon = getPokemon();
                    foreach ($pokemon as $p): 
                ?>
                <option value="<?php echo $p['Pokemon_Name'] . ' (' . $p['pokedexNumber'] . ')'; ?>">
                <?php endforeach; ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="p2">Pokemon 2</label>
            <input id="p2" list="pokemon" class="form-control custom-select" type="text" name="p2" placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p3">Pokemon 3</label>
            <input id="p3" list="pokemon" class="form-control custom-select" type="text" name="p3" placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p4">Pokemon 4</label>
            <input id="p4" list="pokemon" class="form-control custom-select" type="text" name="p4" placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p5">Pokemon 5</label>
            <input id="p5" list="pokemon" class="form-control custom-select" type="text" name="p5" placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p6">Pokemon 6</label>
            <input id="p6" list="pokemon" class="form-control custom-select" type="text" name="p6" placeholder="Enter or select a pokemon">
        </div>
        <input type="hidden" name="action" value="Add">
        <div class="form-group formSubmit">
            <button class="btn btn-lg btn-primary" type="submit" >Create</button>  
        </div>
    </form>
</div>

</body>
</html>

<?php } else { 
    header('Location: login.php');
}?>