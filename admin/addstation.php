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

if(isset($_POST['submit'])){

  $cs_name = $_POST['cs_name'];
  $cs_id = $_POST['cs_id'];
  $cs_address = $_POST['cs_address'];
  $cs_area = $_POST['cs_area'];
  $cs_points = $_POST['cs_points'];
  $cs_number = $_POST['cs_number'];
  $avail = $_POST['avail'];
  $cs_price = $_POST['cs_price'];
  $cs_image = $_FILES["cs_image"]['name'];


  if(file_exists("upload/".$_FILES["cs_image"]["name"]))
  {

    $store = $_FILES["cs_image"]["name"];  
    $_SESSION['status'] = "Image Already Exists '.$store.'";

  }else{

  $insert = "INSERT INTO cs_record(cs_name,cs_id,cs_address,cs_area,cs_points,cs_number,avail,cs_price,cs_image) VALUES('$cs_name','$cs_id','$cs_address','$cs_area','$cs_points','$cs_number','$avail','$cs_price','$cs_image')";
  $query_run = mysqli_query($conn, $insert);

  if($query_run){
    move_uploaded_file($_FILES["cs_image"]["tmp_name"], "upload/".$_FILES["cs_image"]["name"]);
    $_SESSION['updstatus'] = '<script>alert("Station Added Successfully!");</script>';
    header('location:stations.php'); // Display the formatted time
  }else{
    $_SESSION['updstatus'] = '<script>alert("Station isnt Added Due To Error, Please Try Again!");</script>';
    header('location:stations.php'); // Display the formatted time
  }

}

};

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="row pl-3">
        <div class="col-md-10" style="padding-top:0.5rem;">
    <h4> ADD <strong> CHARGING STATION </strong> :<h4>
    </div>
    <div class="col-md-2">
    <button type="button" class="btn btn-primary"><a href = "stations.php" style="color:white;"> VIEW STATIONS </a> </button>
    </div>
    </div>

<div class = "container-fluid">

    <section class="section_form">
    <form id="consultation-form" class="feed-form" action="" method="post" enctype="multipart/form-data">
    
      <div class="modal-body">

            <div class="form-group">
                <label> Station Name </label>
                <input id="cs_name" required name="cs_name" class="form-control" placeholder="Name" type="text">
            </div>

            <div class="form-group">
                <label> Station ID </label>
                <input id="cs_id"  required name="cs_id" class="form-control" placeholder="ChargingStation_Code" type="number">
            </div>

            <div class="form-group">
                <label> Location </label>
                <input id="cs_address"  name="cs_address" class="form-control" required placeholder="Enter Address" type="text">
            </div>

            <div class="form-group">
                <label> Area </label>
                <input id="cs_area" required name="cs_area" class="form-control" placeholder="Enter the Nearby Area" type="text">
            </div>

            <div class="form-group">
                <label> Points </label>
                <input id="cs_points"  name="cs_points" class="form-control" required placeholder="Number Of Points" type="number">
            </div>


            <div class="form-group">
                <label> Number </label>
                <input id="cs_number"  name="cs_number" class="form-control" required placeholder="123-456-7890" type="number">
            </div>

            <div class="form-group">
                <label> Availability </label>
                <input id="avail" required name="avail" class="form-control"  placeholder="Available" type="text">
            </div>

            <div class="form-group">
                <label> Price </label>
                <input id="cs_price"  name="cs_price" class="form-control" required placeholder="Price" type="number">
            </div>

            <div class="form-group">
                <label> Image </label>
                <input id="cs_image"  name="cs_image" class="form-control" required placeholder="Price" type="file">
            </div>

            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> ADD </button>
</div>
    </form>
     </section>
</div>

     <?php
include('includes/scripts.php');
include('includes/footer.php');
?>