<?php
// require('../controller/connectdb.php');
require('controller/connectdb.php');

///*******CREATING/DELETING TABLES*******///
function create_table()
{
   global $db;
   $query = "CREATE TABLE IF NOT EXISTS friends (
             name VARCHAR(30) PRIMARY KEY,
             major VARCHAR(20),
             year INT(1) )";
	
   $statement = $db->prepare($query);
   $statement->execute();
   $statement->closeCursor();
}

function drop_table()
{
   global $db;
   $query = "DROP TABLE friends";
	
   $statement = $db->prepare($query);
   $statement->execute();
   // closes the cursor and frees the connection to the server so other SQL statements may be issued
   $statement->closeCursor(); 
}

///*****SEARCHING POKEDEX********///
////////////////////////////////////////////////////////////////////////
function getPokemon()
{
   global $db;
   $query = "SELECT * FROM pokemon ORDER BY pokedexNumber";

   $statement = $db->prepare($query);
   $statement->execute();
   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();
   $statement->closeCursor();
	
   return $results;
}

function getpokemonByNumber($pokedexNumber)
{
   global $db;
   $query = "SELECT * FROM pokemon WHERE pokedexNumber = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $results = $statement->fetch(); // fetch() returns a row
   $statement->closeCursor();
	
   return $results;
}

function getPokemonByName($Pokemon_Name)
{
   global $db;
   $query = "SELECT * FROM pokemon WHERE Pokemon_Name = :Pokemon_Name";

   $statement = $db->prepare($query);
   $statement->bindValue(':Pokemon_Name', $Pokemon_Name);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByGen($generation)
{
   global $db;
   $query = "SELECT * FROM pokemon WHERE generation = :generation";

   $statement = $db->prepare($query);
   $statement->bindValue(':generation', $generation);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByType($type)
{
   global $db;
   $query = "SELECT * FROM pokemon AS P 
            WHERE P.pokedexNumber = 
               (SELECT T.pokedexNumber FROM pokemon_Types AS T 
               WHERE T.type1 = :type OR T.type2 = :type)";

   $statement = $db->prepare($query);
   $statement->bindValue(':type', $type);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByEgg($Egg_Group)
{
   global $db;
   $query = "SELECT * FROM pokemon AS P 
            WHERE P.pokedexNumber = 
               (SELECT E.pokedexNumber FROM Egg_group AS E 
               WHERE E.Egg_Group = :Egg_Group)";

   $statement = $db->prepare($query);
   $statement->bindValue(':Egg_Group', $Egg_Group);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByCustom()
{
   global $db;
   $query = "SELECT * FROM pokemon WHERE isCustom = 1";

   $statement = $db->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByLikes()
{
   global $db;
   $query = "SELECT * FROM pokemon AS P 
            WHERE P.pokedexNumber = 
               (SELECT L.pokedexNumber FROM Likes AS L 
               WHERE E.userEmail = $_SESSION[email])";

   $statement = $db->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonCreatorEmail($pokedexNumber)
{
   global $db;
   $query = "SELECT creatorEmail FROM design WHERE pokedexNumber = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $result = $statement->fetch();
   $statement->closeCursor();
   return $result;
}

function getTypeByNum($pokedexNumber)
{
   global $db;
   $query = "SELECT type1, type2 FROM Pokemon_Types WHERE pokedexNumber = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
   
   return $results;
}

function getEggByNum($pokedexNumber)
{
   global $db;
   $query = "SELECT eggGroup FROM Egg_Group WHERE pokedexNumber = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getEvoByNum($pokedexNumber)
{
   global $db;
   $query = "SELECT E1.*, E2.postPokemonNum FROM Evolve_Into AS E1 LEFT OUTER JOIN Evolve_Into AS E2 ON E1.postPokemonNum = E2.prePokemonNum WHERE E1.prePokemonNum = :pokedexNumber OR E1.postPokemonNum = :pokedexNumber OR E2.postPokemonNum = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
   
   return $results;
}

///******SIGN-UP & LOGIN******//
////////////////////////////////////////////////////////////////////////
function checkSignUp($email){
   global $db;
   $query = "SELECT * FROM User WHERE Email = :email";

   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();

   return sizeof($results);
}

function checkPassword($email, $password){
    global $db;
    $query = "SELECT * FROM User WHERE Email = :email";

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return password_verify($password, $results[0]["Password"]);
}

function addSignUp($email, $username, $password)
{
   global $db;
   $query = "INSERT INTO User (email, username, password) VALUES (:email, :username, :password)";
   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':username', $username);
   $hash_password = password_hash($password, PASSWORD_DEFAULT);
   $statement->bindValue(':password', $hash_password);
   if($statement->execute()){
      header("location: login.php");
   }
   else {
      echo "Something went wrong. Please try again later.";
   }
   $statement->closeCursor();
}


///*****TEAMS*****///
////////////////////////////////////////////////////////////////////////
function getAllTeams($userEmail)
{
	global $db;
	$query = "SELECT * FROM Team WHERE userEmail = :userEmail";

   $statement->bindValue(':userEmail', $userEmail);
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

function addTeam($userEmail, $teamName, $pokemon1, $pokemon2, $pokemon3, $pokemon4, $pokemon5, $pokemon6)
{
   global $db;
   $query = "INSERT INTO Team 
             VALUES (null, :userEmail, :teamName, :pokemon1, :pokemon2, :pokemon3, :pokemon4, :pokemon5, :pokemon6)";

   $statement = $db->prepare($query);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->bindValue(':teamName', $teamName);
   if($pokemon1 != "") {
       $p1 = explode('(' , rtrim($pokemon1, ')'));
       $p1 = $p1[1];
       $statement->bindValue(':pokemon1', $p1);
    }

    if($pokemon2 != "") {
       $p2 = explode('(' , rtrim($pokemon2, ')'));
       $p2 = $p2[1];
       $statement->bindValue(':pokemon2', $p2);
    } else {
       $statement->bindValue(':pokemon2', null);
    }

    if($pokemon3 != "") {
       $p3 = explode('(' , rtrim($pokemon3, ')'));
       $p3 = $p3[1];
       $statement->bindValue(':pokemon3', $p3);
    } else {
       $statement->bindValue(':pokemon3', null);
    }

    if($pokemon4 != "") {
       $p4 = explode('(' , rtrim($pokemon4, ')'));
       $p4 = $p4[1];
       $statement->bindValue(':pokemon4', $p4);
    } else {
       $statement->bindValue(':pokemon4', null);
    }

    if($pokemon5 != "") {
       $p5 = explode('(' , rtrim($pokemon5, ')'));
       $p5 = $p5[1];
       $statement->bindValue(':pokemon5', $p5);
    } else {
       $statement->bindValue(':pokemon5', null);
    } 

    if($pokemon6 != "") { 
       $p6 = explode('(' , rtrim($pokemon6, ')'));
       $p6 = $p6[1];
       $statement->bindValue(':pokemon6', $p6);
    } else {
       $statement->bindValue(':pokemon6', null);
    }

   if($statement->execute()){
      header("location: teams.php");
   }
   else {
      echo "Something went wrong. Please try again later.";
   }
   $statement->closeCursor();
}

function deleteTeam($teamID, $userEmail)
{
   global $db;
   $query = "DELETE FROM Team WHERE teamID = :teamID AND userEmail = :userEmail";

   $statement = $db->prepare($query);
   $statement->bindValue(':teamID', $teamID);
   $statement->bindValue(':userEmail', $userEmail);
   if($statement->execute()){
      header("location: myTeams.php");
   }
   else {
      echo "Something went wrong. Please try again later.";
   }
   $statement->closeCursor();
}

function editTeam($teamID, $userEmail, $teamName, $pokemon1, $pokemon2, $pokemon3, $pokemon4, $pokemon5, $pokemon6)
{
   global $db;
   $query = "UPDATE Team SET teamName = :teamName, pokemon1 = :pokemon1, pokemon2 = :pokemon2, pokemon3 = :pokemon3, pokemon4 = :pokemon4, pokemon5 = :pokemon5, pokemon6 = :pokemon6 WHERE teamID = :teamID AND userEmail = :userEmail";

   $statement = $db->prepare($query);
   $statement->bindValue(':teamID', $teamID);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->bindValue(':teamName', $teamName);
   if($pokemon1 != "") {
       $p1 = explode('(' , rtrim($pokemon1, ')'));
       $p1 = $p1[1];
       $statement->bindValue(':pokemon1', $p1);
    }

    if($pokemon2 != "") {
       $p2 = explode('(' , rtrim($pokemon2, ')'));
       $p2 = $p2[1];
       $statement->bindValue(':pokemon2', $p2);
    } else {
       $statement->bindValue(':pokemon2', null);
    }

    if($pokemon3 != "") {
       $p3 = explode('(' , rtrim($pokemon3, ')'));
       $p3 = $p3[1];
       $statement->bindValue(':pokemon3', $p3);
    } else {
       $statement->bindValue(':pokemon3', null);
    }

    if($pokemon4 != "") {
       $p4 = explode('(' , rtrim($pokemon4, ')'));
       $p4 = $p4[1];
       $statement->bindValue(':pokemon4', $p4);
    } else {
       $statement->bindValue(':pokemon4', null);
    }

    if($pokemon5 != "") {
       $p5 = explode('(' , rtrim($pokemon5, ')'));
       $p5 = $p5[1];
       $statement->bindValue(':pokemon5', $p5);
    } else {
       $statement->bindValue(':pokemon5', null);
    } 

    if($pokemon6 != "") { 
       $p6 = explode('(' , rtrim($pokemon6, ')'));
       $p6 = $p6[1];
       $statement->bindValue(':pokemon6', $p6);
    } else {
       $statement->bindValue(':pokemon6', null);
    }
   $statement->execute();
   $statement->closeCursor();
}

///******CUSTOM POKES******///
////////////////////////////////////////////////////////////////////////
function addCustom($Pokemon_Name, $Generation, $Height_m, $Weight_kg, $Abilities, $Classification, $Type1, $Type2, $Egg_Group, $Sprite)
{
   global $db;
   $query = "INSERT INTO pokemon VALUES ('', :Pokemon_Name, :Generation, :Height_m, :Weight_kg, :Abilities, :Classification, :isCustom, :Sprite)";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':Pokemon_Name', $Pokemon_Name);
   $statement->bindValue(':Generation', $Generation);
   $statement->bindValue(':Height_m', $Height_m);
   $statement->bindValue(':Weight_kg', $Weight_kg);
   $statement->bindValue(':Abilities', $Abilities);
   $statement->bindValue(':Classification', $Classification);
   $statement->bindValue(':isCustom', 1);
   $statement->bindValue(':Sprite', $Sprite);
   $statement->execute();
   $statement->closeCursor();

   global $db;
   $query = "SELECT pokedexNumber FROM pokemon WHERE Pokemon_Name = :Pokemon_Name";

   $statement = $db->prepare($query);
   $statement->bindValue(':Pokemon_Name', $Pokemon_Name);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
   $num = $results[0];

   global $db;
   $query = "INSERT INTO Egg_group VALUES (:pokedexNumber, :Egg_Group)";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $num);
   $statement->bindValue(':Egg_Group', $Egg_Group);
   $statement->execute();
   $statement->closeCursor();

   global $db;
   $query = "INSERT INTO Pokemon_Types VALUES (:pokedexNumber, :type1, :type2)";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $num);
   $statement->bindValue(':type1', $Type1);
   $statement->bindValue(':type2', $Type2);
   $statement->execute();
   $statement->closeCursor();

   global $db;
   $query = "INSERT INTO Design VALUES (:creatorEmail, :pokedexNumber)";

   $statement = $db->prepare($query);
   $statement->bindValue(':creatorEmail', $_SESSION['email']);
   $statement->bindValue(':pokedexNumber', $num);
   $statement->execute();
   $statement->closeCursor();
}

function editCustom($pokedexNumber, $Pokemon_Name, $Generation, $Height_m, $Weight_kg, $Abilities, $Classification, $Type1, $Type2, $Egg_Group, $Sprite)
{
   global $db;
   $query = "UPDATE pokemon SET Pokemon_Name = :Pokemon_Name, Generation = :Generation, Height_m = :Height_m,
   Weight_kg = :Weight_kg, Abilities = :Abilities, Abilities = :Classification, Sprite = :Sprite WHERE pokedexNumber = :pokedexNumber";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->bindValue(':Pokemon_Name', $Pokemon_Name);
   $statement->bindValue(':Generation', $Generation);
   $statement->bindValue(':Height_m', $Height_m);
   $statement->bindValue(':Weight_kg', $Weight_kg);
   $statement->bindValue(':Abilities', $Abilities);
   $statement->bindValue(':Classification', $Classification);
   $statement->bindValue(':Sprite', $Sprite);
   $statement->execute();
   $statement->closeCursor();

   global $db;
   $query = "UPDATE Egg_group SET Egg_Group = :Egg_Group WHERE pokedexNumber = :pokedexNumber";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->bindValue(':Egg_Group', $Egg_Group);
   $statement->execute();
   $statement->closeCursor();

   global $db;
   $query = "UPDATE Pokemon_Types SET type1 = :type1, type2 = :type2 WHERE pokedexNumber = :pokedexNumber)";

   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->bindValue(':type1', $Type1);
   $statement->bindValue(':type2', $Type2);
   $statement->execute();
   $statement->closeCursor();
}

function getCustom()
{
   global $db;
   $query = "SELECT * FROM pokemon NATURAL JOIN design WHERE creatorEmail= :email";

   $statement = $db->prepare($query);
   $statement->bindValue(':email', $_SESSION['email']);
   $statement->execute();
   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function deleteCustom($pokedexNumber)
{
   global $db;
   $query = "DELETE FROM pokemon WHERE pokedexNumber = :pokedexNumber";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $statement->closeCursor();
   
   global $db;
   $query = "DELETE FROM Egg_group WHERE pokedexNumber = :pokedexNumber";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $statement->closeCursor();
   
   global $db;
   $query = "DELETE FROM Pokemon_Types WHERE pokedexNumber = :pokedexNumber";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $statement->closeCursor();
   
   global $db;
   $query = "DELETE FROM Design WHERE pokedexNumber = :pokedexNumber";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->execute();
   $statement->closeCursor();
   
   return true;
}

///******MISC******///
////////////////////////////////////////////////////////////////////////
function addLike($pokedexNumber, $userEmail)
{
   global $db;
   $query = "INSERT INTO Likes VALUES (:pokedexNumber, :userEmail)";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->execute();
   $statement->closeCursor();
}

function removeLike($pokedexNumber, $userEmail)
{
   global $db;
   $query = "DELETE FROM Likes VALUES (:pokedexNumber, :userEmail)";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':pokedexNumber', $pokedexNumber);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->execute();
   $statement->closeCursor();
}


function addComment($commentID, $userEmail, $teamID, $text)
{
   global $db;
   $query = "INSERT INTO Comment_on VALUES (:commentID, :userEmail, :teamID, :comment)";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':commentID', $commentID);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->bindValue(':teamID', $teamID);
   $statement->bindValue(':comment', $text);
   $statement->execute();
   $statement->closeCursor();
}



////////////////////////SAMPLES CODE///////////////////////////

function addFriend($name, $major, $year)
{
   global $db;
   
   // insert into friends (name, major, year) values ('someone', 'CS', 4);
   $query = "INSERT INTO friends VALUES (:name, :major, :year)";
   
   echo "addFriend: $name : $major : $year <br/>";
   $statement = $db->prepare($query);
   $statement->bindValue(':name', $name);
   $statement->bindValue(':major', $major);
   $statement->bindValue(':year', $year);
   $statement->execute();     // if the statement is successfully executed, execute() returns true
   // false otherwise
      
   $statement->closeCursor();
}


function updateFriendInfo($name, $major, $year)
{
   global $db;
   
   // update friends set major="EE", year=2 where name="someoneelse"
   $query = "UPDATE friends SET major=:major, year=:year WHERE name=:name";
   $statement = $db->prepare($query);
   $statement->bindValue(':name', $name);
   $statement->bindValue(':major', $major);
   $statement->bindValue(':year', $year);
   $statement->execute();
   $statement->closeCursor();
}


function deleteFriend($name)
{
   global $db;
   
   $query = "DELETE FROM friends WHERE name=:name";
   $statement = $db->prepare($query);
   $statement->bindValue(':name', $name);
   $statement->execute();
   $statement->closeCursor();
}


?>