<?php

/******************************/
// More info on connecting PHP and DB
// http://www.cs.virginia.edu/~up3f/cs4640/supplement/connecting-PHP-DB.html

/******************************/
// connecting to GCP cloud SQL instance

$username = 'root';
$password = 'pass123';

$dbname = 'pokedex';

// if PHP is on GCP standard App Engine, use instance name to connect
$host = 'cs4750-268020:us-east4:pokedex';

// if PHP is hosted somewhere else (non-GCP), use public IP address to connect
// $host = "public-IP-address-to-cloud-instance";

/******************************/

// $dsn = "mysql:host=$host;dbname=$dbname";
$dsn = "mysql:unix_socket=/cloudsql/cs4750-268020:us-east4:pokedex;dbname=pokedex";
$db = "";

/** connect to the database **/
try 
{
   $db = new PDO($dsn, $username, $password);   
   echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // VINH CONNECTING TO LOCAL XAMPP IF THE GOOGLE CLOUD ONE FAILS SO THAT I CAN TEST LOCALLY
   try
   {
      $host = 'localhost:3306';
      $dbname = 'pokedex';

      $username = 'test';
      $password = 'pass123';

      $dsn = "mysql:host=$host;dbname=$dbname";
      $db = "";

      $db = new PDO($dsn, $username, $password);   
      // echo "<p>You are connected to your local database</p>";
   }
   catch (PDOException $e)
   {
      // Call a method from any object, 
      // use the object's name followed by -> and then method's name
      // All exception objects provide a getMessage() method that returns the error message 
      $error_message = $e->getMessage();        
      echo "<p>An error occurred while connecting to the database: $error_message </p>";
   }
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>
