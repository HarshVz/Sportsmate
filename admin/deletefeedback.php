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

     $delete = "DELETE FROM feedback where fid = $did";

            if (mysqli_query($conn, $delete)) {
                $_SESSION['updstatus'] = '<script>alert("Removed Successfully!");</script>';
                header('location:feedbacks.php'); 
            }else{
                $_SESSION['updstatus'] = '<script>alert("Error: Removal Operation Failed!");</script>';
                header('location:feedbacks.php'); 
            }
  };

?>