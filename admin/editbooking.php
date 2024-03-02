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
    
  $cs = mysqli_query($conn,"SELECT * FROM booking where bid = $eid");
  };

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $stations = $_POST['stations'];
    $point = $_POST['point'];
    $id = $_POST['bid'];

    // Parse the input time using strtotime() and format it using date()

    $date = $_POST['date'];
    $comp = date("Y-m-d", strtotime($date));

    $time = $_POST['time'];
    $formattedTime = date("h:i A", strtotime($time));

    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_number = $_POST['vehicle_number'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE booking SET 
                uname = '$username', 
                cname = '$stations', 
                point = '$point', 
                date = '$comp', 
                time = '$formattedTime', 
                vname = '$vehicle_name', 
                vid = '$vehicle_number', 
                cphone = '$phone_number' 
            WHERE bid = '$id'";


     if (mysqli_query($conn, $sql)) {

        $_SESSION['updstatus'] = '<script>alert("Data Updated Successfully!");</script>';
        header('location:bookingsdate.php'); // Display the formatted time
    
    }else{
        $_SESSION['updstatus'] = '<script>alert("Error: Updatation Failed!");</script>';
        header('location:bookingsdate.php'); // Display the formatted time
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
 
      <form action="#" method="POST">
        <div class="form-group">

                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row["uname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="stations">Station Name</label>
                        <input type="text" class="form-control" name="stations" value="<?php echo $row["cname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="point">Type Of Charging</label>
                        <input type="text" class="form-control" name="point" value="<?php echo $row["point"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $row["date"];?>">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control"id="myTime" name="time" step="60" value="<?php echo $row["time"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vehicle_name">Vehicle Name</label>
                        <input type="text" class="form-control" name="vehicle_name" value="<?php echo $row["vname"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vehicle_number">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number" value="<?php echo $row["vid"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" value="<?php echo $row["cphone"]; ?>">
                    </div>
                    <input type="hidden" name="bid" value="<?php echo $row["bid"]; ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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