
<?php
include_once("config.php");
include ("session.php");
$errors=array();

if(isset($_POST['update']))
{	
	$SP_ID = $_POST['SP_ID'];
    	$SP_Name = $_POST['SP_Name'];
   	$SP_No = $_POST['SP_No'];
    	$Customer = $_POST['Customer'];

 if (preg_match('/[a-b]/', $SP_No)) {
      array_push($errors, "only numbers allowed");

	header("Location: editSP.php?SP_ID=$SP_ID,");
    }
if (count($errors) == 0) {

	$result = mysqli_query($mysqli, "UPDATE SalesPerson_13158 SET SP_Name='$SP_Name',SP_No='$SP_No',Customer='$Customer' WHERE SP_ID=$SP_ID");
		
		header("Location: SalesP.php");
}	}


?>

<?php

$SP_ID = $_GET['SP_ID'];
$result = mysqli_query($mysqli, "SELECT * FROM SalesPerson_13158 WHERE SP_ID=$SP_ID");
while($row = mysqli_fetch_array($result))
{
	$SP_Name = $row['SP_Name'];
	$SP_No = $row['SP_No'];
	$Customer = $row['Customer'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<a href="SalesP.php">Sales Department</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editSP.php">
<?php include("errors.php"); ?>
		<table border="0">
<tr> 
				<td>SP_ID</td>
				<td><?php echo $SP_ID;?></td>
			</tr>			
			<tr> 
				<td>Name</td>
				<td><input type="text" name="SP_Name" value="<?php echo $SP_Name;?>"></td>
			</tr>
			<tr> 
				<td>Number</td>
				<td><input type="text" name="SP_No" value="<?php echo $SP_No;?>"></td>
			</tr>
			<tr> 
				<td>Customer</td>
				<td><input type="numeric" name="Customer" value="<?php echo $Customer;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="SP_ID" value=<?php echo $_GET['SP_ID'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
