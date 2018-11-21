<?php
include("config.php");
include ("session.php");$errors=array();
if(isset($_POST['submit'])) {  

    $CID = $_POST['CID'];
    $SName = $_POST['SName'];
    $CName = $_POST['CName'];
    $CNo = $_POST['CNo'];
    $Address = $_POST['Address'];
    $Area = $_POST['Area'];
    $GeometricCoordinates = $_POST['GeometricCoordinates'];
        
if (preg_match('/[a-b]/', $CNo)) {
      array_push($errors, "contact number should be numeric");
    }
//
if (count($errors) == 0) {
          $result = mysqli_query($mysqli, "INSERT INTO Customer_13158(CID,SName,CName,CNo,Address,Area,GeometricCoordinates) VALUES ('$CID','$SName','$CName','$CNo','$Address','$Area','$GeometricCoordinates')"); 
        echo "<font color='green'><b>Data added successfully.</b>";
        echo "<br/><a href='index1.php'>View Result</a>";
}    }

?>

<html>
<head><title>Add a Customer</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>

<body>
    <a href="index1.php">Home</a>
    <br/><br/>
	    <form action="add.php" method="post" name="form1">
<?php include("errors.php"); ?>
	<label for="CID">Customer</label><br/>
	<input type="text" name="CID" id="CID">
	<br/>
	<label for="SName">ShopName</label><br/>
	<input type="text" name="SName" id="SName">
	<br/>
	<label for="CName">CustomerName</label><br/>
	<input type="text" name="CName" id="CName" required>
	<br/>
	<label for="CNo">CustomerNo</label><br/>
	<input type="text" name="CNo" id="CNo" required>
	<br/>
	<label for="Address">Address</label><br/>
	<input type="text" name="Address" id="Address">
	<br/>
	<label for="Area">Area</label><br/>
	<input type="text" name="Area" id="Area">
	<br/>
	<label for="GeometricCoordinates">GeometricCoordinates</label><br/>
	<input type="text" name="GeometricCoordinates" id="GeometricCoordinates">
<br/><br/>	
	<input type="submit" name="submit" value="Submit">
		</form>
</body></html>
