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

if(isset($_POST['edit_btn'])){
    $eid = $_POST['edit_id']; 
  $cs = mysqli_query($conn,"SELECT * FROM cs_record where cs_id = $eid");
  };

if(isset($_POST['submit'])){
   
  $cs_name = $_POST["cs_name"];
  $cs_address = $_POST["cs_address"];
  $cs_area = $_POST["cs_area"];
  $cs_points = $_POST["cs_points"];
  $cs_number = $_POST["cs_number"];
  $avail = $_POST["avail"];
  $city = $_POST["city"];
  $cs_image = $_FILES["cs_image"]['name'];
  $cs_id = $_POST["eid"];


  if(isset($_FILES['cs_image']) && $_FILES['cs_image']['error'] == 0) {
    $target_dir = "upload/"; // directory where you want to store the file
    $target_file = $target_dir . basename($_FILES["cs_image"]["name"]);
    move_uploaded_file($_FILES["cs_image"]["tmp_name"], $target_file);
}

  // Update query
  $sql = "UPDATE cs_record SET cs_name='$cs_name', cs_address='$cs_address', cs_area='$cs_area', cs_points='$cs_points', cs_number='$cs_number', avail='$avail', city='$city', cs_image='$cs_image' WHERE cs_id='$cs_id'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['updstatus'] = '<script>alert("Data Updated Successfully!");</script>';
    header('location:stations.php'); // Display the formatted time

  } else {
        $_SESSION['updstatus'] = '<script>alert("Error: Updatation Failed!");</script>';
        header('location:stations.php'); // Display the formatted time
  }
    
  };

  if(isset($_POST['delete_btn'])){

     $did = $_POST['delete_id']; 
    echo $did;
  
  };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container">
<?php
while($row = mysqli_fetch_assoc($cs)) {
    ?>
 
 <form id="consultation-form" class="feed-form" action="" method="post" enctype="multipart/form-data">
    
    <div class="modal-body">

          <div class="form-group">
              <label> Station Name </label>
              <input id="cs_name" required name="cs_name" class="form-control" value="<?php echo $row["cs_name"]; ?>" splaceholder="Name" type="text">
          </div>

          <div class="form-group">
              <label> Address </label>
              <input id="cs_address"  name="cs_address" class="form-control" value="<?php echo $row["cs_address"]; ?>"  required placeholder="Enter Address" type="text">
          </div>

          <div class="form-group">
              <label> Area </label>
              <input id="cs_area" required name="cs_area" class="form-control" value="<?php echo $row["cs_area"]; ?>"  placeholder="Enter the Nearby Area" type="text">
          </div>

          <div class="form-group">
              <label> Points </label>
              <input id="cs_points"  name="cs_points" class="form-control" value="<?php echo $row["cs_points"]; ?>"  required placeholder="Number Of Points" type="number">
          </div>


          <div class="form-group">
              <label> Number </label>
              <input id="cs_number"  name="cs_number" class="form-control" value="<?php echo $row["cs_number"]; ?>"  required placeholder="123-456-7890" type="number">
          </div>

          <div class="form-group">
              <label> Availability </label>
              <input id="avail" required name="avail" class="form-control" value="<?php echo $row["avail"]; ?>"  placeholder="Available" type="text">
          </div>

          <div class="form-group">
              <label> City </label>
              <input id="city"  name="city" class="form-control" required placeholder="Price"  value="<?php echo $row["city"]; ?>" type="text">
          </div>

          <div class="form-group">
              <label> Image </label>
              <input id="cs_image"  name="cs_image" class="form-control" required placeholder="Price"  value="<?php echo $row["cs_image"]; ?>" type="file">
          </div>

          <div class="form-group">
          <input type="hidden" name="eid" value="<?php echo $row["cs_id"]; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
</div>
  </form>
        
        </div>
<!-- /.container-fluid -->
<?php }
?>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>