<?php

@include 'config.php';
@include 'session.php';



if(isset($_POST['edit_btn'])){
    $eid = $_POST['edit_id']; 
    $msg = $_POST['msg']; 
  

header('location: mailto:'.$eid.'?cc='.$eid.' &bcc='.$eid.' &subject=Re:'.$msg.' &body=Type Your Message Here!');



};



?>