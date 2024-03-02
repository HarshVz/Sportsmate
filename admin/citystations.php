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

$i =6;

$sql = "SELECT * FROM cs_record";
$cs = $conn->query($sql);


include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="row pl-3">
        <div class="col-md-10 pl-2" style="padding-top:0.5rem;">
    <h4> STATIONS BASED ON <strong> CITY </strong><h4>
    </div>
    </div>
    <div class = "container-fluid">
<div class="container">
  <div class="row gy-3">
<div class = "col-md-4">

<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
<a href ="ahmedabad.php" style="text-decoration-line: none">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><strong>Ahmedabad</strong></h5>
    <p class="card-text">Checkout Stations From Ahmedabad</p>
  </div>
</a>
</div>
</div>

<div class = "col-md-4">
<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
<a href ="surat.php" style="text-decoration-line: none">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><strong>Surat</strong></h5>
    <p class="card-text">Checkout Stations From Surat</p>
  </div>
</a>
</div>
</div>

<div class = "col-md-4">
<div class="card"  style="box-shadow: 2px 3px 4px rgba(12,12,12,0.2);">
<a href ="surat.php" style="text-decoration-line: none">
  <img src="cars/z<?php echo $i++;?>.gif" class="card-img-top" alt="..." style=" width: 400x; height: 280px;">
  <div class="card-body">
    <h5 class="card-title"><strong>Baroda</strong></h5>
    <p class="card-text">Checkout Stations From Baroda</p>
  </div>
</a>
</div>
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