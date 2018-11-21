<?php
include("config.php");
include ("session.php");

$P_Code = $_GET['P_Code'];
$result = mysqli_query($mysqli, "DELETE FROM Products_13158 WHERE P_Code=$P_Code");
header("Location:product.php");
?>
