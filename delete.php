<?php
include("config.php");
include ("session.php");

$CID = $_GET['CID'];
$result = mysqli_query($mysqli, "DELETE FROM Customer_13158 WHERE CID like '$CID'");
//redirecting to the display page 
header("Location:index1.php");
?>
