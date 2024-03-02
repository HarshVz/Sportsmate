<?php


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
  $image = $_FILES["cs_image"]['name'];


  if(file_exists("upload/".$_FILES["cs_image"]["name"])){

    $store = $_FILES["cs_image"]["name"];  
    $_SESSION['status'] = "Image Already Exists '.$store.'";

  }else{

  $insert = "INSERT INTO cs_record(cs_name,cs_id,cs_address,cs_area,cs_points,cs_number,avail,cs_price) VALUES('$cs_name','$cs_id','$cs_address','$cs_area','$cs_points','$cs_number','$avail','$cs_price')";
  $query_run = mysqli_query($conn, $insert);

  if($query_run){
    move_uploaded_file($_FILES["cs_image"]["tmp"],"upload/".$_FILES["cs_image"]["name"]);
    $_SESSION['success'] = "Inserted";

  }else{
    $_SESSION['success'] = " Not Inserted";
  }

}

};

?>