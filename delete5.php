<?php 
 $conn = mysqli_connect("localhost", "root", "", "assignment1"); 
include ("session.php");

$id=isset($_POST["id"])?$_POST["id"]:"";

 $sql = "DELETE FROM SalesOrder_13158 WHERE O_No = $id"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Deleted Successfully!'; 
 } 
 ?>

	
