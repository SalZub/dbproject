<?php
include("config.php");
include("login.php");
   session_start();
$qr = "UPDATE user_13158 set Active='0' WHERE Active='1'";
mysqli_query($mysqli, $qr);
 //  session_unset();
   session_destroy();

     header("Location: login.php");
   
?>
