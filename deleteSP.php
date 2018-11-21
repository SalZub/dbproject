<?php
include("config.php");
include ("session.php");

$SP_ID = $_GET['SP_ID'];
$result = mysqli_query($mysqli, "DELETE FROM SalesPerson_13158 WHERE SP_ID=$SP_ID");
header("Location:SalesP.php");
?>
