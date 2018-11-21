<?php
 $connect = mysqli_connect("localhost", "root", "", "assignment1"); 

include ("session.php");
$id=isset($_POST["id"])?$_POST["id"]:"";
$text=isset($_POST["text"])?$_POST["text"]:"";
$column_name=isset($_POST["column_name"])?$_POST["column_name"]:"";
$query = "UPDATE SalesOrder_13158 SET ".$column_name."='".$text."' WHERE O_No='".$id."'";
if($column_name=='P_Code'){
	$res = mysqli_query($connect, "SELECT S_Price FROM Products_13158 WHERE P_Code='".$text."'");
	$row = mysqli_fetch_array($res);
	mysqli_query($connect, "UPDATE SalesOrder_13158 SET Rate='".$row['S_Price']."' WHERE O_No='".$id."'");
}  
if(mysqli_query($connect, $query))
 {
      mysqli_query($connect, "UPDATE SalesOrder_13158 SET Amount=Rate*Quantity WHERE O_No='".$id."'");
  echo 'Data Updated';
 }
?>
 
 
