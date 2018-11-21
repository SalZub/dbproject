<?php
include("config.php");

include ("session.php");

$UserID = $_GET['UserID'];
$result = mysqli_query($mysqli, "DELETE FROM user_13158 WHERE UserID='$UserID'");
header("Location:user.php");
?>


