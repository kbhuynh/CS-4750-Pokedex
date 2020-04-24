<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles/custom.css" />
  
</head>
<?php
include_once('templates/header.php');
require('controller/connectdb.php');
?>

<body>
  
  <div class="container">

    <table class="table table-striped table-bordered">
      <tr>
        <th>Team</th>
        <th>Pokemon 1</th>
        <th>Pokemon 2</th>
        <th>Pokemon 3</th>
        <th>Pokemon 4</th>
        <th>Pokemon 5</th>
        <th>Pokemon 6</th>
        <th>(Add?)</th>
        <th>(Delete?)</th>
      </tr>      
      <?php foreach ($teams as $team): ?>
      <tr>
        <td>
          <?php echo $team['team_name']; // refer to column name in the table ?> 
        </td>
        <td>
          <?php echo $task['pokemon1']; ?> 
        </td>        
        <td>
          <?php echo $task['pokemon2']; ?> 
        </td>        
        <td>
          <?php echo $task['pokemon3']; ?> 
        </td>        
        <td>
          <?php echo $task['pokemon4']; ?> 
        </td>       
        <td>
          <?php echo $task['pokemon5']; ?> 
        </td>        
        <td>
          <?php echo $task['pokemon6']; ?> 
        </td>        
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Add" name="action" class="btn btn-primary" />             
            <input type="hidden" name="teamID" value="<?php echo $task['teamID'] ?>" />
          </form> 
        </td>                        
        <td>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />      
            <input type="hidden" name="teamID" value="<?php echo $task['teamID'] ?>" />
          </form>
        </td>                                
      </tr>
      <?php endforeach; ?>
    </table>
    
  </div>
  
  
</body>
</html>