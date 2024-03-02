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
echo "Connected successfully";

if(isset($_POST['submit'])){

    // Escape user inputs for security
    $time_slot = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $station = mysqli_real_escape_string($conn, $_POST['station']);

    $fdate = date("Y-m-d", strtotime($date));
    $ftime = date("g:i a", strtotime($time_slot));

        // Attempt to insert the form data into your table
        $sql = "INSERT INTO slot (date, sdate, station, status)
        VALUES ('$fdate', '$ftime', '$station', '$status')";



        if (mysqli_query($conn, $sql)) {

       $_SESSION['updstatus'] = '<script>alert("Slot Added Successfully!");</script>';
        header('location:slot.php'); // Display the formatted time
        } else {
        $_SESSION['updstatus'] = '<script>alert("Slot Isnt Added Due To Some Errors!");</script>';
        header('location:slot.php'); // Display the formatted time
        }
        }

include('includes/header.php'); 
include('includes/navbar.php'); 
?>



    <div class = "container-fluid">
		<div class="col-md-10 container bg-default">
			
			<h4 class="text-center my-2">
			ADD SLOT <STRONG> FOR BOOKING </STRONG>
			</h4>

			<hr>
			
			<form action="" method="POST">
				<div class="form-row">
					<div class="col-md-6 form-group">
						<label for="time">TIME SLOT</label>
						<input type="time" name="time" class="form-control" id="time" placeholder="Enter Time">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>

					<div class="col-md-6 form-group">
						<label for="date">Date</label>
						<input type="date" name="date" class="form-control" id="date" placeholder="Enter Time">
						<div class="invalid-feedback">
							Valid last name is required.
						</div>
					</div>
				</div>

                <div class="form-group">
                <label for="status">Status</label>
						<select type="text" class="form-control" id="status" name = "status">
							<option value="Available">Available</option>
							<option value="NA">NA</option>
						</select>
						<div class="invalid-feedback">
							Please provide a valid status.
						</div>
				</div>

			<div class="form-group">
						<label for="station">Stations</label>
						<select type="text" class="form-control" id="station" name="station">
							<option value>Choose...</option>
						
							<?php

$cs = "SELECT cs_name FROM cs_record";
$csn = $conn->query($cs);


if ($csn) {
  while($row = mysqli_fetch_assoc($csn)) {
                 echo '<option class="slot available" value ="' . $row["cs_name"]. '">' . $row["cs_name"] . '</option>';
          }
      }
    ?>
    <option value>None</option>
    </SELECT>
					</div>

                

					<hr class="mb-4">
				
					<button class="btn btn-primary bt-lg btn-block" name="submit" type="submit">ADD TIME SLOT</button>
			</form>
		</div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>