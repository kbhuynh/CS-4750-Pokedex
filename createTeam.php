<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
    if($_SERVER['REQUEST_METHOD'] == "GET") {
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
        <input type="hidden" name="action" value="Edit">
        <div class="form-group formSubmit">
            <button class="btn btn-lg btn-primary" type="submit" >Create</button>  
        </div>
    </form>
</div>

</body>
</html>

<?php } else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == 'Edit') { ?>

    <div class="wrapper-sm formContainer">
    <h1>Edit Team</h1>
    <form id="createTeam" class="form" action="teams.php" method="post">
        <input type="hidden" name="teamID" value="<?php echo $_POST['teamID']; ?>">
        <div class="form-group">
            <label for="teamname">Team Name</label>
            <input type="text" name="teamname" class="form-control" value="<?php echo $_POST['teamname']; ?>" placeholder="Enter team name" required>
        </div>
        <?php $pokemon = getPokemon(); ?>
        <div class="form-group">
            <label for="p1">Pokemon 1</label>
            <input id="p1" list="pokemon" class="form-control custom-select" type="text" name="p1" 
                value="<?php if(isset($_POST['p1'])) echo $pokemon[$_POST['p1']-1]['Pokemon_Name'] . ' (' . $_POST['p1'] . ')' ; ?>"
                placeholder="Enter or select a pokemon" required>
            <datalist id="pokemon" name="pokemon">
                <?php
                    foreach ($pokemon as $p): 
                ?>
                <option value="<?php echo $p['Pokemon_Name'] . ' (' . $p['pokedexNumber'] . ')'; ?>">
                <?php endforeach; ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="p2">Pokemon 2</label>
            <input id="p2" list="pokemon" class="form-control custom-select" type="text" name="p2" 
                value="<?php if(isset($_POST['p2'])) echo $pokemon[$_POST['p2']-1]['Pokemon_Name'] . ' (' . $_POST['p2'] . ')' ; ?>" 
                placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p3">Pokemon 3</label>
            <input id="p3" list="pokemon" class="form-control custom-select" type="text" name="p3" 
                value="<?php if(isset($_POST['p3'])) echo $pokemon[$_POST['p3']-1]['Pokemon_Name'] . ' (' . $_POST['p3'] . ')' ; ?>"
                placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p4">Pokemon 4</label>
            <input id="p4" list="pokemon" class="form-control custom-select" type="text" name="p4" 
                value="<?php if(isset($_POST['p4'])) echo $pokemon[$_POST['p4']-1]['Pokemon_Name'] . ' (' . $_POST['p4'] . ')' ; ?>"
                placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p5">Pokemon 5</label>
            <input id="p5" list="pokemon" class="form-control custom-select" type="text" name="p5" 
                value="<?php if(isset($_POST['p5'])) echo $pokemon[$_POST['p5']-1]['Pokemon_Name'] . ' (' . $_POST['p5'] . ')' ; ?>"
                placeholder="Enter or select a pokemon">
        </div>
        <div class="form-group">
            <label for="p6">Pokemon 6</label>
            <input id="p6" list="pokemon" class="form-control custom-select" type="text" name="p6" 
                value="<?php if(isset($_POST['p6'])) echo $pokemon[$_POST['p6']-1]['Pokemon_Name'] . ' (' . $_POST['p6'] . ')' ; ?>"
                placeholder="Enter or select a pokemon">
        </div>
        <input type="hidden" name="action" value="Edit">
        <div class="form-group formSubmit">
            <button class="btn btn-lg btn-primary" type="submit" >Create</button>  
        </div>
    </form>
</div>

</body>
</html>

<?php }
} else { 
    header('Location: login.php');
}?>