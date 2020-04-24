<?php 

// Prepared statement (or parameterized statement) happens in 2 phases:
//   1. prepare() sends a template to the server, the server analyzes the syntax
//                and initialize the internal structure.
//   2. bind value (if applicable) and execute
//      bindValue() fills in the template (~fill in the blanks).
//                For example, bindValue(':name', $name);
//                the server will locate the missing part signified by a colon
//                (in this example, :name) in the template
//                and replaces it with the actual value from $name.
//                Thus, be sure to match the name; a mismatch is ignored.
//      execute() actually executes the SQL statement

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
   $query = "SELECT * FROM Pokemon";

   $statement = $db->prepare($query);
   $statement->execute();
   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();
   $statement->closeCursor();
	
   return $results;
}

function getPokemonByNumber($pokedexNumber)
{
   global $db;
   $query = "SELECT * FROM Pokemon WHERE pokedexNumber = :pokedexNumber";

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
   $query = "SELECT * FROM Pokemon WHERE Pokemon_Name = :Pokemon_Name";

   $statement = $db->prepare($query);
   $statement->bindValue(':Pokemon_Name', $Pokemon_Name);
   $statement->execute();
   $results = $statement->fetch();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByGen($Generation)
{
   global $db;
   $query = "SELECT * FROM Pokemon WHERE Generation = :Generation";

   $statement = $db->prepare($query);
   $statement->bindValue(':Generation', $Generation);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByType($type)
{
   global $db;
   $query = "SELECT * FROM Pokemon AS P 
            WHERE P.pokedexNumber = 
               (SELECT T.pokedexNumber FROM Pokemon_Types AS T 
               WHERE T.type1 = :type OR T.type2 = :type)";

   $statement = $db->prepare($query);
   $statement->bindValue(':type', $type);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByEgg($eggGroup)
{
   global $db;
   $query = "SELECT * FROM Pokemon AS P 
            WHERE P.pokedexNumber = 
               (SELECT E.pokedexNumber FROM Egg_group AS E 
               WHERE E.eggGroup = :eggGroup)";

   $statement = $db->prepare($query);
   $statement->bindValue(':eggGroup', $eggGroup);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

function getPokemonByCustom()
{
   global $db;
   $query = "SELECT * FROM Pokemon WHERE isCustom = 1";

   $statement = $db->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();
   
   return $results;
}

// function getPokemonByLikes()
// {
//    global $db;
//    $query = "SELECT * FROM Pokemon AS P 
//             WHERE P.pokedexNumber = 
//                (SELECT L.pokedexNumber FROM Likes AS L 
//                WHERE E.userEmail = $_SESSION['userEmail'])";

//    $statement = $db->prepare($query);
//    $statement->execute();
//    $results = $statement->fetchAll();
//    $statement->closeCursor();
   
//    return $results;
// }

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

function addSignUp($email, $username, $password)
{
   global $db;
   $query = "INSERT INTO User VALUES (:email, :username, :password)";

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

function checkLogIn($email, $password){
   global $db;
   $query = "SELECT * FROM User WHERE Email = :email AND Password = :password";

   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $hash_password = password_hash($password, PASSWORD_DEFAULT);
   $statement->bindValue(':password', $hash_password);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();

   return sizeof($results);
}


///*****TEAMS*****///
////////////////////////////////////////////////////////////////////////
function addTeam($teamID, $userEmail, $teamName, $pokemon1)
{
   global $db;
   $query = "INSERT INTO Team VALUES (:teamID, :userEmail, :teamName, :pokemon1, NULL, NULL, NULL, NUll, NULL)";

   $statement = $db->prepare($query);
   $statement->bindValue(':teamID', $teamID);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->bindValue(':teamName', $teamName);
   $statement->bindValue(':pokemon1', $pokemon1);
   if($statement->execute()){
      header("location: myTeams.php");
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

//alterTeam???


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

function addComment($commentID, $userEmail, $teamID, $text)
{
   global $db;
   $query = "INSERT INTO Comment_on VALUES (:commentID, :userEmail, :teamID, :text)";
   
   $statement = $db->prepare($query);
   $statement->bindValue(':commentID', $commentID);
   $statement->bindValue(':userEmail', $userEmail);
   $statement->bindValue(':teamID', $teamID);
   $statement->bindValue(':text', $text);
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

