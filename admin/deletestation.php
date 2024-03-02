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
     $cs = "DELETE FROM cs_record WHERE cs_id = '$did'";

   if (mysqli_query($conn, $cs)) {

   $_SESSION['updstatus'] = '<script>alert("Station Removed Successfully!");</script>';
   header('location:stations.php');

   }else{
   $_SESSION['updstatus'] = '<script>alert("Error: Station Removal Failed!");</script>';
   header('location:stations.php');
   }
 
 };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>