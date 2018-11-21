<?php  
include ("session.php");
 $connect = mysqli_connect("localhost", "root", "", "assignment1"); 
$O_No=isset($_POST["O_No"])?$_POST["O_No"]:"";
$CID=isset($_POST["CID"])?$_POST["CID"]:"";
$date=isset($_POST["date"])?$_POST["date"]:"";
$SP_ID=isset($_POST["SP_ID"])?$_POST["SP_D"]:"";
$P_Code=isset($_POST["P_Code"])?$_POST["P_Code"]:"";
$Quantity=isset($_POST["Quantity"])?$_POST["Quantity"]:"";
//$Rate=isset($_POST["Rate"])?$_POST["Rate"]:"";
$Amount=isset($_POST["Amount"])?$_POST["Amount"]:"";

 $res = mysqli_query($connect, "SELECT S_Price FROM Products_13158 WHERE P_Code='$P_Code'");
 $row = mysqli_fetch_array($res);     
$Rate=$row["S_Price"];
 $sql = "INSERT INTO SalesOrder_13158 VALUES('$O_No','$CID','$date','$SP_ID','$P_Code','$Quantity','$Rate','$Amount')";  
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE SalesOrder_13158 SET Amount=($Rate*$Quantity) WHERE O_No='".$_POST["O_No"]."'");
      echo 'Data Inserted';  
 }  
 ?> 
