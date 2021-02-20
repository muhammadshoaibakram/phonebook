<?php 
require "db.php";

$sql = "CREATE DATABASE phonebook";

if ($connection->query($sql) === TRUE) {
	echo "create database successfully";
}

else{
	echo "failed create databse";
}

 ?>