<?php
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

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
    </style>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <style>

body{
  padding-top: 8rem;
  font-family: "Poppins", sans-serif;
  color:black;
}
h2 p{
  font-family: "Poppins", sans-serif;
  color:black;
}


  </style>


  </head>
  <body>


  

     <!-- Navigation bar-->


 <div id = "navd">
<nav data-toggled="false" data-transitionable="false" class="fixed-top">
  <div id="nav-logo-section" class="nav-section">
    <a href="#">
    EV-CHARGE
    </a>
  </div>
  <div id="nav-mobile-section">
    <div id="nav-link-section" class="nav-section">
    <a href = "features.php">FEATURES</a>
    <a href = "Stations.php">STATIONS</a>
    <a href = "about.php">ABOUT</a>
    </div>
    <div id="nav-social-section" class="nav-section">
      <a href="station_search.php">
       <i class="fa-sharp fa-solid fa-car"></i>
      </a>
      <a href="bookings.php">
        <i class="fa-sharp fa-solid fa-calendar-days"></i>
      </a>
    </div>
    <div id="nav-contact-section" class="nav-section">
    <a href = "profile.php"><i class="fa-sharp fa-solid fa-user"></i>&nbsp;&nbsp;PROFILE</a>
    </div>
  </div>
  <div>
  <button id="nav-toggle-button" type="button" onclick="handleNavToggle()">
    <span>Menu</span>
    <i class="fa-solid fa-bars"></i>
</div>
  </button>
</nav>
</div>



</body>
    <script src="https://kit.fontawesome.com/30f135d9e0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>