<?php

session_start();

include('dbconfig.php');
if(!$_SESSION['admin_name'] AND $_SESSION['email'])
{
header('Location:index.php');
}

?>