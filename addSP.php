
<?php
include_once("config.php");
include("session.php");
$errors=array();
if(isset($_POST['submit'])) {  
    $SP_ID = $_POST['SP_ID'];
    $SP_Name = $_POST['SP_Name'];
    $SP_No = $_POST['SP_No'];
    $Customer = $_POST['Customer'];
//
$SP_check_query = "SELECT * FROM SalesPerson_13158 WHERE SP_ID='$SP_ID' LIMIT 1";
  $result = mysqli_query($mysqli, $SP_check_query);
  $SP = mysqli_fetch_assoc($result);
  
  if ($SP) { // if SP exists
    if ($SP['SP_ID'] === $SP_ID) {
      array_push($errors, "SP_ID not available");
    }
  }
  
//
 if (preg_match('/[a-b]/', $SP_No)) {
      array_push($errors, "only numbers allowed");
    }
//
if (count($errors) == 0) {
          $res = mysqli_query($mysqli, "INSERT INTO SalesPerson_13158 (SP_ID,SP_Name,SP_No,Customer) VALUES ('$SP_ID','$SP_Name','$SP_No','$Customer')"); 
        echo "<font color='green'><b>Data added successfully.</b>";
        echo "<br/><a href='SalesP.php'>View Result</a>";
    }}

?>

<html>
<head><title>Add a Sales Person</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
    <a href="SalesP.php">Sales Department</a>
    <br/><br/>
	    <form action="addSP.php" method="post">
<?php include("errors.php"); ?>
	<label for="SP_ID">SP_ID</label><br/>
	<input type="numeric" name="SP_ID" id="SP_ID">
	<br/>
	<label for="SP_Name">Name</label><br/>
	<input type="text" name="SP_Name" id="SP_Name">
	<br/>
	<label for="SP_No">Number</label><br/>
	<input type="text" name="SP_No" id="SP_No">
	<br/>
	<label for="Customer">Customer</label><br/>
	<input type="text" name="Customer" id="Customer">
<br/><br/>	
	<input type="submit" name="submit" value="Submit">
		</form>
</body>
</html>

