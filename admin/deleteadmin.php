<?php
@include 'config.php';
@include 'session.php';

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "user_db";

$conn = mysqli_connect($server, $user, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['delete_btn'])){

    $did = $_POST['delete_id']; 

     $delete = "DELETE FROM user_form where id = $did";

            if (mysqli_query($conn, $delete)) {
                $_SESSION['updstatus'] = '<script>alert("Data Deleted Successfully!");</script>';
                header('location:admins.php'); 
            }else{
                $_SESSION['updstatus'] = '<script>alert("Error: Delete Operation Failed!");</script>';
                header('location:admins.php'); 
            }
  };


  
if(isset($_POST['submit'])){

    $name = $_POST['username']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
  
    $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$password','admin')";
    
    if (mysqli_query($conn, $insert)) {
  
      $_SESSION['updstatus'] = '<script>alert("Admin Created Successfully!");</script>';
      header('location:admins.php'); 
  
    }else{
      $_SESSION['updstatus'] = '<script>alert("Admin Creation Failed!");</script>';
      header('location:admins.php'); 
  }
  
  };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>