<?php
@include 'config.php';
@include 'session.php';

$server = "localhost";
$user = "root";
$password = "root";
$dbname = "user_db";

$conn = mysqli_connect($server, $user, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['edit_btn'])){
    $eid = $_POST['edit_id']; 
    
  $data = mysqli_query($conn,"SELECT * FROM user_form where id = $eid");
  };

    if(isset($_POST['submit'])){

        $name = $_POST['username']; 
        $email = $_POST['email']; 
        $new_password = $_POST['password'];
        $key = $_POST['key']; 

        $update ="UPDATE user_form SET 
                    name = '$name',
                    email = '$email',
                    password = '$new_password'
                    WHERE id = '$key'";
    
            if (mysqli_query($conn, $update)) {

                $_SESSION['updstatus'] = '<script>alert("Data Updated Successfully!");</script>';
                header('location:admins.php'); 
            
            }else{
                $_SESSION['updstatus'] = '<script>alert("Error: Updatation Failed!");</script>';
                header('location:admins.php'); 
            }
    
  };

include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container">
    
<?php
while($row = mysqli_fetch_assoc($data)){
?>
<form action="" method="POST">

<div class="modal-body">

    <div class="form-group">
        <label> Username </label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $row["name"]; ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row["email"]; ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="hidden" name="key" value="<?php echo $row["id"]; ?>">
        <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $row["password"]; ?> ">
    </div>
    <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
</div>
</div>
</form>

<?php }
      ?>
</div>