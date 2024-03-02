   <!-- Sidebar -->
   <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
  </div>
  <div class="sidebar-brand-text mx-2">EV CHARGE</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  INTERFACE
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-user"></i>
    <span>Users</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Audience Base:</h6>
      <a class="collapse-item" href="admins.php">Admins</a>
      <a class="collapse-item" href="users.php">Users</a>
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="citybooking.php" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
    <i class="fas fa-fw fa-bolt"></i>
    <span>Charging Stations</span>
  </a>
  <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Stations Related</h6>
      <a class="collapse-item" href="citystations.php">City Based</a>
      <a class="collapse-item" href="stations.php">View Stations</a>
      <a class="collapse-item" href="addstation.php">Add Stations</a>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
    <i class="fas fa-fw fa-book"></i>
    <span>Bookings</span>
  </a>
  <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="bookings.php">All Bookings</a>
      <a class="collapse-item" href="bookingsdate.php">Bookings With Filter</a>  
      <a class="collapse-item" href="citybooking.php">City Based</a>
  </div>
  </li>

  
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
    <i class="fas fa-fw fa-book"></i>
    <span>SLOTS</span>
  </a>
  <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="slot.php">Slots</a>
      <a class="collapse-item" href="addslot.php">Add Slot</a>  
  </div>
  </li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pages
</div>


<li class="nav-item">
  <a class="nav-link" href="bookings.php">
    <i class="fas fa-fw fa-book"></i>
    <span>Booking</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light mb-4 bg-white topbar static-top ">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
          <br>

<div class="input-group inputSearch">
  <input type="text" class="form-control" placeholder="Search.." aria-label="Search User" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">
      <a href="#/"><i class="fa fa-search"></i></a></span>
  </div>
</div>
          </form>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



          <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell text-dark fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter text-white">*</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>



<?php  

$fedbeck = mysqli_connect('localhost', 'root', 'root', 'user_db');

$co = 0;
$fd = "SELECT * FROM feedback ORDER BY fid DESC";
$fdback = $fedbeck->query($fd);

 ?>
          
          
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw text-dark"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter text-white">!</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" >
                <h6 class="dropdown-header">
                  Message Center
                </h6>

                <?php
while($row = mysqli_fetch_assoc($fdback)) {
    ?>

                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-2">
                  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $row["message"]; ?> </div>
                    <div class="small text-gray-500"><?php echo $row["email"]; ?> </div>
                  </div>
                </a>
              
                  <?php

                $co++;
    if ($co == 4) {
        break;

    }
}?>

                <a class="dropdown-item text-center small text-gray-500" href="feedbacks.php">Read More Messages</a>
              </div>
            </li>




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               ADMIN
                  
                </span>
                <i class="fas fa-fw fa-user-secret text-dark"></i>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

