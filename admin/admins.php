<?php 
@include 'config.php';
@include 'session.php';

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "user_db";

$conn = mysqli_connect($server, $user, $password, $dbname);
$sql = "SELECT * FROM user_form where user_type = 'admin'";
$data = $conn->query($sql);


if(isset($_POST['submit'])){

  $name = $_POST['username']; 
  $email = $_POST['email']; 
  $password = $_POST['password']; 

  $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$password','admin')";
  mysqli_query($conn, $insert);

};


include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<?php echo $_SESSION['updstatus']; $_SESSION['updstatus'] = ""; ?>



<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="deleteadmin.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="row pl-3">
        <div class="col-md-10" style="padding-top:0.5rem">
    <h4> <strong> ADMIN DATA </strong><h4>
    </div>
    <div class="col-md-2">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> Add Admin </button>
    </div>
    </div>

<div class = "container-fluid">
<div class="card-body">

<div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead>
      <tr>
        <th> Userame </th>
        <th>Email </th>
        <th>Password</th>
        <th>EDIT </th>
        <th>DELETE </th>
      </tr>
    </thead>
    <tbody>

    <?php
while($row = mysqli_fetch_assoc($data)){
?>
 
      <tr>
        <td> <?php echo $row["name"]; ?> </td>
        <td> <?php echo $row["email"]; ?> </td>
        <td> <?php echo $row["password"]; ?> </td>
        <td>
            <form action="editadmin.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row["id"]; ?>">
                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
            </form>
        </td>
        <td>
            <form action="deleteadmin.php" method="post">
            <input type="hidden" name="delete_id" value="<?php echo $row["id"]; ?>">
              <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
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