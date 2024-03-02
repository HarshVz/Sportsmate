<?php
@include 'config.php';
@include 'session.php';

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php 

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "user_db";
$count = 0;

$conn = mysqli_connect($server, $user, $password, $dbname);
$sql = "SELECT * FROM user_form where user_type = 'user' ORDER BY id DESC";
$data = $conn->query($sql);

$feed = "SELECT * FROM feedback ORDER BY fid DESC";
$feedback = $conn->query($feed);

$countu = "SELECT COUNT(*) as total_users FROM user_form where user_type = 'user'";
$result = mysqli_query($conn, $countu);
$countu2 = "SELECT COUNT(*) as total_admin FROM user_form where user_type = 'admin'";
$result2 = mysqli_query($conn, $countu2);


$conncs = mysqli_connect($server, $user, $password, 'cs_master');

$sqlcs = "SELECT * FROM booking ORDER BY bid DESC";
$cs = $conncs->query($sqlcs);

$countbooking ="SELECT COUNT(*) as countbookings FROM booking";
$countb = mysqli_query($conncs, $countbooking);


$countstations ="SELECT COUNT(*) as countstations FROM cs_record";
$counts = mysqli_query($conncs, $countstations);

$boks = "SELECT COUNT(DISTINCT uname) AS user_booking FROM booking";
$countd = mysqli_query($conncs, $boks);

$row = mysqli_fetch_assoc($result2);
$total_admin = $row['total_admin'];

$row = mysqli_fetch_assoc($countb);
$countbooking = $row['countbookings'];

$row = mysqli_fetch_assoc($countd);
$user_booking = $row['user_booking'];

$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];


$current_time = time();
$last_30_days = 30 * 24 * 60 * 60; // in seconds
$recentbookings = "SELECT COUNT(*) AS num_users FROM booking WHERE date < ($current_time - $last_30_days)";
$cbook = mysqli_query($conncs, $recentbookings);

$row = mysqli_fetch_assoc($cbook);
$num_users = $row['num_users'];

?>
<div class="row" style="margin-top:-3rem;" >
<div class="col-lg-6 d-none d-lg-block"><img src="upload/about.png" alt="" class="img-fluid"></div>
<div class="col-md-5 align-content-end" style="margin-top:10%; padding:3%; padding-left:5%">
              <div>
                <h1 class="display-4 fw-normal" style = " font-family:'Poppins', sans-serif; font-weight: 700 ; letter-spacing: -1px;"> Welcome Back,</h1>
                <h1 class="display-4 fw-normal" style = " font-family:'Poppins', sans-serif; font-weight: 700 ; letter-spacing: -1px;"> <strong><?php echo $_SESSION['admin_name'] ?></strong>.</h1>
              <p class="lead fw-normal typing-demo"  style = " font-family:Roboto, sans-serif; font-weight: 300;">"Good Governance Depends On Ability To Take Responsibility By Both Admin & Users."</p>
              <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
              </div>
            </div>
</div>



<div class="container m-2">
  <!-- Icon Cards-->
  <div class="row m-1">
  <div class="col-12 mt-1 mb-1">
        <h4 class="text-uppercase">Minimal Statistics Cards</h4>
        <p>Statistics on minimal cards.</p>
      </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fa-sharp fa-solid fa-address-card"></i>
              </div>
              <div class="mr-5">CheckOut Users!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="align-self-center">
              <i class="fa-sharp fa-solid fa-cart-shopping-fast"></i>
              </div>
              <div class="mr-5">Manage All Bookings!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="bookings.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fa-solid fa-calendar-check"></i>
              </div>
              <div class="mr-5">Update & Manage Slots!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="slot.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fa-sharp fa-solid fa-charging-station"></i>
              </div>
              <div class="mr-5">Manage Charging Stations!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="stations.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>



      <div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fa-solid primary fa-users fa-xl"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $total_users; ?></h3>
                  <span>Total Clients</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fa-solid success fa-message fa-xl"></i>
                </div>
                <div class="media-body text-right">
                  <h3>156</h3>
                  <span>Feedback Recieved</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fa-solid danger fa-check-to-slot fa-xl"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php 
echo $countbooking;
?></h3>
                  <span>Bookings</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fa-solid warning fa-shop fa-xl"></i>
                </div>
                <div class="media-body text-right">
                <h3><?php $row = mysqli_fetch_assoc($counts);
echo $row['countstations'];
?></h3>
                  <span>Charging Stations</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="primary">278</h3>
                  <span>Payments</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-book-open primary font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning"><?php echo $user_booking; ?></h3>
                  <span>Users Booked Slots</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-bubbles warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success"><?php echo $total_users; ?></h3>
                  <span>No Of Admins</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-cup success font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="danger">423</h3>
                  <span>No Of Slots</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-direction danger font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <div class="row">
    <div class="col-xl-6 col-md-12">
      <div class="card overflow-hidden">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-pencil primary font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Clients</h4>
                <span>Registered In 30 Days</span>
              </div>
              <div class="align-self-center">
              <h1><?php 
echo $total_users;
?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-speech warning font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Bookings</h4>
                <span>Of Last 30 Days</span>
              </div>
              <div class="align-self-center"> 
              <h1><?php
echo $num_users;
?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</div>

      <div id="wrapper" class="animate">
    <div class="container-fluid">

    <section id="stats-subtitle" class="ml-2">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Statistics With Subtitle</h4>
      <p>Statistics on minimal cards with Title &amp; Sub Title.</p>
    </div>
  </div>
</section>


      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recently Joined Users</h5>
            <table class="table">
            <thead>
              <tr>
                <th>Username </th>
                <th>Email </th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>

            <?php
            while($row = mysqli_fetch_assoc($data)){
            ?>

              <tr>
                <td> <?php echo $row["name"]; ?> </td>
                <td><?php echo $row["email"]; ?></td>
                <td>  <?php echo $row["password"]; ?> </td>
              </tr>

              <?php
              $count++;
             if ($count == 3) {
              break;
          }  
            }
              ?>
              
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
<?php
$count=0;
?>

        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Bookings</h5>
              <table class="table">
            <thead>
              <tr>
                <th>Username </th>
                <th>Station</th>
                <th>Time </th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>

            <?php
            while($row = mysqli_fetch_assoc($cs)){
            ?>

              <tr>
                <td> <?php echo $row["uname"]; ?> </td>
                <td><?php echo $row["cname"]; ?></td>
                <td>  <?php echo $row["time"]; ?> </td>
                <td>  <?php echo $row["date"]; ?> </td>
              </tr>

              <?php
              $count++;
             if ($count == 3) {
              break;
          }  
            }
              ?>
              
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- Begin Page Content -->
<!-- Button trigger modal -->
<div class="container" style="font-family: 'Rubik', sans-serif;">

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>