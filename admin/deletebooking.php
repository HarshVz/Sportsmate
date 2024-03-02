<?php
@include 'config.php';
@include 'session.php';

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "cs_master";


$conn = mysqli_connect($server, $user, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 
  if(isset($_POST['delete_btn'])){

     $did = $_POST['delete_id']; 
    $cs = "DELETE FROM booking WHERE bid = '$did'";

    if (mysqli_query($conn, $cs)) {

    $_SESSION['updstatus'] = '<script>alert("Data Deleted Successfully!");</script>';
    header('location:bookingsdate.php'); // Display the formatted time

    }else{
    $_SESSION['updstatus'] = '<script>alert("Error: Delete Operation Failed!");</script>';
    header('location:bookingsdate.php'); // Display the formatted time
    }
  
  };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>