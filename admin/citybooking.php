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

$i =1;

$sql = "SELECT * FROM booking where city = 'Surat'";
$cs = $conn->query($sql);


include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="row pl-3">
        <div class="col-md-10 pl-2" style="padding-top:0.5rem;">
    <h4> BOOKINGS BASED ON <strong> CITY </strong><h4>
    </div>
    </div>

    <div class = "container-fluid">
<div class="card-body">
<div class="container">
  <div class="row gy-3">
<div class = "col-md-4">

<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <a href ="booking-ahmedabad.php" style="text-decoration-line: none">
  <div class="card-body">
    <h5 class="card-title"><strong>Ahmedabad</strong></h5>
    <p class="card-text">Checkout Bookings From Ahmedabad</p>
  </div>
</div>
</a>
</div>

<div class = "col-md-4">
<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
<a href ="booking-surat.php" style="text-decoration-line: none">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><strong>Surat</strong></h5>
    <p class="card-text">Checkout Bookings From Surat</p>
  </div>
</div>
</a>
</div>

<div class = "col-md-4">
<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
<a href ="booking-baroda.php" style="text-decoration-line: none">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><strong>Baroda</strong></h5>
    <p class="card-text">Checkout Bookings From Baroda</p>
  </div>
</div>
</a>
</div>

</div>
</div>
</div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>