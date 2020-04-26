<?php
include_once('templates/header.php');
if(isset($_SESSION['email']))
{
  $pokemon = getPokemon();
?>

  <h1>My Teams</h1>
  <div class="table-responsive-lg mb-5">

    <table class="table table-striped table-bordered">
      <tr>
        <th>Team</th>
        <th>Pokemon 1</th>
        <th>Pokemon 2</th>
        <th>Pokemon 3</th>
        <th>Pokemon 4</th>
        <th>Pokemon 5</th>
        <th>Pokemon 6</th>
        <th></th>
        <th></th>
      </tr>      
      <?php foreach ($teams as $team): ?>
      <tr>
        <td>
          <?php echo $team['teamName']; // refer to column name in the table ?> 
        </td>
        <td>
          <?php echo '<p>' . $pokemon[intval($team['pokemon1'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon1'])-1]['sprite'] . '"/>' ?> 
        </td>        
        <td>
          <?php 
            if($team['pokemon2'] != "")
              echo '<p>' . $pokemon[intval($team['pokemon2'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon2'])-1]['sprite'] . '"/>' 
          ?> 
        </td>        
        <td>
          <?php 
            if($team['pokemon3'] != "")
              echo '<p>' . $pokemon[intval($team['pokemon3'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon3'])-1]['sprite'] . '"/>' 
          ?> 
        </td>        
        <td>
          <?php 
            if($team['pokemon4'] != "")
              echo '<p>' . $pokemon[intval($team['pokemon4'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon4'])-1]['sprite'] . '"/>' 
          ?> 
        </td>       
        <td>
          <?php 
            if($team['pokemon5'] != "")
              echo '<p>' . $pokemon[intval($team['pokemon5'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon5'])-1]['sprite'] . '"/>' 
          ?> 
        </td>        
        <td>
          <?php 
            if($team['pokemon6'] != "")
              echo '<p>' . $pokemon[intval($team['pokemon6'])-1]['Pokemon_Name'] . '</p><img src="' . $pokemon[intval($team['pokemon6'])-1]['sprite'] . '"/>' 
          ?> 
        </td>        
        <td>
          <form action="createTeam.php" method="post">
            <input type="submit" value="Edit" name="action" class="btn btn-primary" />             
            <input type="hidden" name="teamID" value="<?php echo $team['teamID'] ?>" />
            <input type="hidden" name="teamname" value="<?php echo $team['teamName'] ?>" />
            <input type="hidden" name="p1" value="<?php echo $team['pokemon1'] ?>" />
            <input type="hidden" name="p2" value="<?php echo $team['pokemon2'] ?>" />
            <input type="hidden" name="p3" value="<?php echo $team['pokemon3'] ?>" />
            <input type="hidden" name="p4" value="<?php echo $team['pokemon4'] ?>" />
            <input type="hidden" name="p5" value="<?php echo $team['pokemon5'] ?>" />
            <input type="hidden" name="p6" value="<?php echo $team['pokemon6'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="teams.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />      
            <input type="hidden" name="teamID" value="<?php echo $team['teamID'] ?>" />
          </form>
        </td>                                
      </tr>
      <?php endforeach; ?>
      <tr>
        <td align="center" colspan="9"><a href="createTeam.php" class="btn btn-primary">Create Team</a></td>
      </tr>
    </table>
    
  </div>
  
  
</body>
</html>
<?php } else {
  header('Location: login.php');
}
?>