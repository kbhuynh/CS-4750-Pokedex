<?php 

// function addTeam($team, $userEmail, $teamName, $poke1, $poke2, $poke3, $poke4, $poke5, $poke6)
// {
// 	global $db;

// 	$query = "INSERT INTO team (teamID, userEmail, teamName, pokemon1, pokemon2, pokemon3, pokemon4, pokemon5, pokemon6) VALUES (:team, :userEmail, :teamName, :poke1, :poke2, :poke3, :poke4, :poke5, :poke6)";
	
// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':team', $team);
// 	$statement->bindValue(':userEmail', $userEmail);
//     $statement->bindValue(':teamName', $teamName);
//     $statement->bindValue(':pokemon1', $pokemon1);
//     $statement->bindValue(':pokemon2', $pokemon2);
//     $statement->bindValue(':pokemon3', $pokemon3);
//     $statement->bindValue(':pokemon4', $pokemon4);
//     $statement->bindValue(':pokemon5', $pokemon5);
//     $statement->bindValue(':pokemon6', $pokemon6);
// 	$statement->execute();
	
// 	$statement->closeCursor();
// }

// // TODO
// function updateTeamInfo($team, $due, $priority, $id)
// {
// 	global $db;
	
// 	// example SQL statement to update data 
//     //     UPDATE todo SET team_desc = 'new team', due_date = '2020-04-13', priority = 'normal' WHERE team_id = 2;
// 	// assume team_id is a primary identifying a row of data in the table
	
// 	$query = "UPDATE todo SET team_desc=:team, due_date=:due, priority=:priority WHERE team_id=:id";
// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':team', $team);
// 	$statement->bindValue(':due', $due);
// 	$statement->bindValue(':priority', $priority);
// 	$statement->bindValue(':id', $id);
// 	$statement->execute();
// 	$statement->closeCursor();
// }

// // TODO
// function deleteTeam($id)
// {
// 	global $db;
	
// 	$query = "DELETE FROM todo WHERE team_id=:id";
// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':id', $id);
// 	$statement->execute();
// 	$statement->closeCursor();
// }

// TODO
function getAllTeams()
{
	global $db;
	$query = "SELECT * FROM team";
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

// // TODO
// function getTeamInfo_by_id($id)
// {
// 	global $db;
	
	
// 	$query = "SELECT * FROM todo where teamID = :id";
// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':id', $id);
// 	$statement->execute();
	
// 	// fetchAll() returns an array for all of the rows in the result set
// 	// fetch() return a row
// 	$results = $statement->fetch();
	
// 	$statement->closecursor();
	
// 	return $results;
// }

?>
