<?php 

$servername ="localhost";
$username ="root";
$password ="";
$database = "phonebook";

$connection = new mysqli($servername , $username , $password ,$database); 

if ($connection->connect_error) {
	die("connection error:".$connection->connect_error);

}
else{

	// echo "connection successfully <br>";
}


 ?>