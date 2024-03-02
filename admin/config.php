<?php

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "user_db";

$conn = mysqli_connect($server, $user, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


//$conn = mysqli_connect('localhost','root','','user_db');
//$conn = mysqli_connect("localhost","root","","user_db");

?>