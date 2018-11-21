
<?php
include_once("config.php");
$errors=array();
if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }


if(isset($_POST['submit'])) {  
    $SP_ID =  $_POST['SP_ID'];
    $SP_Name =  $_POST['SP_Name'];
    $SP_No =  $_POST['SP_No'];
    $Customer =  $_POST['Customer'];
// check number format
    if (!preg_match('/[0-9]/', $SP_No)) {
      array_push($errors2, "only numbers allowed");
    }

  if (count($errors2) == 0) {
          $result = mysqli_query($mysqli, "INSERT INTO SalesPerson_13158(SP_ID,SP_Name,SP_No,Customer) VALUES ('$SP_ID','$SP_Name','$SP_No','$Customer')"); 
        echo "<font color='green'><b>Data added successfully.</b>";
        echo "<br/><a href='SalesP.php'>View Result</a>";
    }
}

?>
