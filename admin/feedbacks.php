<?php
@include 'config.php';
@include 'session.php';

include('includes/header.php'); 
include('includes/navbar.php'); 



//header('location: mailto:harsh.uploads@gmail.com?cc=harsh.uploads@gmail.com &bcc=harsh.uploads@gmail.com &subject=Enter The Subject &body=Type Your Message Here!');


$feed = "SELECT * FROM feedback ORDER BY fid DESC";
$feedback = $conn->query($feed);


?>
<?php echo $_SESSION['updstatus']; $_SESSION['updstatus'] = ""; ?>



<div class="row pl-3">
        <div class="col" style="padding-top:0.5rem">
    <h4> <strong> FEEDBACK REPLYS</strong><h4>
    </div>
    </div>
<div class = "container-fluid">
<div class="card-body">

<div class="table-responsive">

  <table class="table" id="dataTable" width="100%" cellspacing="0">

    <thead>
      <tr>
        <th>Name </th>
        <th>Email </th>
        <th>Message</th>
        <th>REPLY </th>
        <th>DELETE </th>
      </tr>
    </thead>
    <tbody>

    <?php
while($row = mysqli_fetch_assoc($feedback)){
?>
 
      <tr>
        <td> <?php echo $row["name"]; ?> </td>
        <td> <?php echo $row["email"]; ?> </td>
        <td> <?php echo $row["message"]; ?> </td>
        <td>
            <form action="sendfeedback.php" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $row["email"]; ?>">
            <input type="hidden" name="msg" value="<?php echo $row["message"]; ?>">
                <input type="submit" name="edit_btn" class="btn btn-success"></button>
            </form>
        </td>
        <td>
            <form action="deletefeedback.php" method="post">
            <input type="hidden" name="delete_id" value="<?php echo $row["fid"]; ?>">
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


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>