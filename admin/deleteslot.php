<?php
@include 'config.php';
@include 'session.php';

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "cs_master";

$conn = mysqli_connect($server, $user, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['delete_btn'])){

    $did = $_POST['delete_id']; 

     $delete = "DELETE FROM slot where sid = $did";

            if (mysqli_query($conn, $delete)) {
                $_SESSION['updstatus'] = '<script>alert("Slot Deleted Successfully!");</script>';
                header('location:slot.php'); 
            }else{
                $_SESSION['updstatus'] = '<script>alert("Error: Slot Delete Operation Failed!");</script>';
                header('location:slot.php'); 
            }
  };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>