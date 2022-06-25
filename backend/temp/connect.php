<?php

$serverName = "localhost";
$databaseName = "consuline";
$userName = "root";
$password= "";
$conn=mysqli_connect($serverName,$userName,$password,$databaseName);
if(!$conn){
  echo "Error Connecting to Database";
}


?>
