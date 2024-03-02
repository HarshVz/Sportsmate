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
    
    $st = "SELECT cs_name FROM cs_record";
    $stns = $conn->query($st);

    $cs = mysqli_query($conn,"SELECT * FROM slot where sid = $eid");
  };

  if(isset($_POST['submit'])){
    $time_slot = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $station = mysqli_real_escape_string($conn, $_POST['station']);
    $id =  mysqli_real_escape_string($conn, $_POST['id']);

    $fdate = date("Y-m-d", strtotime($date));
    $ftime = date("g:i a", strtotime($time_slot));

    $sql = "UPDATE slot SET 
                date = '$fdate', 
                sdate = '$ftime', 
                station = '$station', 
                status = '$status'
            WHERE sid = '$id'";


     if (mysqli_query($conn, $sql)) {

        $_SESSION['updstatus'] = '<script>alert("Slot Details Updated Successfully!");</script>';
        header('location:slot.php'); // Display the formatted time
    
    }else{
        $_SESSION['updstatus'] = '<script>alert("Error:Slot Details Updatation Failed!");</script>';
        header('location:slot.php'); // Display the formatted time
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
 
 <form action="" method="POST">
				<div class="form-row">
					<div class="col-md-6 form-group">
						<label for="time">TIME SLOT</label>
						<input type="time" name="time" class="form-control" id="time" placeholder="Enter Time" value="<?php echo $row["sdate"]; ?>">
						<div class="invalid-feedback">
							Valid Time is required.
						</div>
					</div>

					<div class="col-md-6 form-group">
						<label for="date">Date</label>
						<input type="date" name="date" class="form-control" id="date"  value="<?php echo $row["date"]; ?>" placeholder="Enter Time">
						<div class="invalid-feedback">
							Valid date is required.
						</div>
					</div>
				</div>

                <div class="form-group">
                <label for="status">Status</label>
						<select type="text" class="form-control" id="status" value="<?php echo $row["status"]; ?>" name = "status">
							<option value="<?php echo $row["status"]; ?>" > <?php echo $row["status"]; ?> </option>
                            <option>Available</option>
							<option>NA</option>
						</select>
						<div class="invalid-feedback">
							Please provide a valid status.
						</div>
				</div>

			<div class="form-group">
						<label for="station">Stations</label>
						<select type="text" class="form-control" id="station" name="station">
							<option value="<?php echo $row["station"]; ?>" > <?php echo $row["station"]; ?> </option>
						
<?php

if ($stns) {
  while($row2 = mysqli_fetch_assoc($stns)) {
                 echo '<option class="slot available" value ="' . $row2["cs_name"]. '">' . $row2["cs_name"] . '</option>';
          }
      }
    ?>
    
    <option value>None</option>
    </SELECT>
					</div>

            
					<hr class="mb-4">
                    <input type="hidden" name="id" value="<?php echo $row["sid"]; ?>">
					<button class="btn btn-primary bt-lg btn-block" name="submit" type="submit">ADD TIME SLOT</button>
			</form>
<!-- /.container-fluid -->
<?php }
?>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>