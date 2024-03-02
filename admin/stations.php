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

$sql = "SELECT * FROM cs_record";
$cs = $conn->query($sql);

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php echo $_SESSION['updstatus']; $_SESSION['updstatus'] = ""; ?>




<div class="row pl-3">
        <div class="col-md-10" style="padding-top:0.5rem;">
    <h4> ALL <strong> CHARGING STATIONS </strong><h4>
    </div>
    </div>

    <div class = "container-fluid">
    <hr>
<div class="card-body">

<div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead>
      <tr>
        <th>Name </th>
        <th>Availability </th>
        <th>Points </th>
        <th>City </th>
        <th>Address </th>
        <th>EDIT </th>
        <th>DELETE </th>
      </tr>
    </thead>
    <tbody>

    <?php
while($row = mysqli_fetch_assoc($cs)){
?>
 
      <tr>
        <td> <?php echo $row["cs_name"]; ?> </td>
        <td> <?php echo $row["avail"]; ?> </td>
        <td> <?php echo $row["cs_points"]; ?> </td>
        <td> <?php echo $row["city"]; ?> </td>
        <td> <?php echo $row["cs_address"]; ?> </td>
        <td>
            <form action="editstation.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row["cs_id"]; ?> ">
                <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
            </form>
        </td>
        <td>
            <form action="deletestation.php" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $row["cs_id"]; ?> ">
              <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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