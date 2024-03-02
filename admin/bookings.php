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

$sql = "SELECT * FROM booking";
$cs = $conn->query($sql);


include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="row pl-3">
        <div class="col-md-10 pl-2" style="padding-top:0.5rem;">
    <h4> ALL <strong> BOOKINGS </strong><h4>
    </div>
    </div>

    <div class = "container-fluid">

<div class="card-body">

<div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead>
      <tr>
      <th>Username </th>
        <th>Stations </th>
        <th>Point </th>
        <th>Date </th>
        <th>Time </th>
        <th>Vehicle Name </th>
        <th>Vehicle Number </th>
        <th>Phone Number </th>
        <th>EDIT </th>
        <th>DELETE </th>
      </tr>
    </thead>
    <tbody>

    <?php
while($row = mysqli_fetch_assoc($cs)){
?>
 
      <tr>
      <td> <?php echo $row["uname"]; ?> </td>
        <td> <?php echo $row["cname"]; ?> </td>
        <td> <?php echo $row["point"]; ?> </td>
        <td> <?php echo $row["date"];?> </td>
        <td> <?php echo $row["time"];?> </td>
        <td> <?php echo $row["vname"]; ?> </td>
        <td> <?php echo $row["vid"]; ?> </td>
        <td> <?php echo $row["cphone"]; ?> </td>
        <td>
            <form action="editbooking.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row["bid"]; ?>">
            <input type="submit" class="btn btn-primary" id="edit_btn" name = "edit_btn" href="editbooking.php" value = "EDIT">
            </form>
        </td>
        <td>
            <form action="deletebooking.php" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $row["bid"]; ?>">
              <input type="submit" class="btn btn-danger" id="delete_btn" name="delete_btn" href="deletebooking.php" value = "DELETE">
            </form>
        </td>
      </tr>

      <?php }
      ?>
        
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>