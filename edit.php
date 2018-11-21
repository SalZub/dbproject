
<?php
include_once("config.php");
include ("session.php");
$errors=array();
if(isset($_POST['update']))
{	
	$CID = $_POST['CID'];
	$SName =  $_POST['SName'];
	$CName =$_POST['CName'];
	$CNo = $_POST['CNo'];
	$Address =  $_POST['Address'];
	$Area = $_POST['Area'];
	$GeometricCoordinates =  $_POST['GeometricCoordinates'];	
	//updating the table
if (preg_match('/[a-b]/', $CNo)) {
      array_push($errors, "contact number should be numeric");
    }
//
if (count($errors) == 0) {
	$result = mysqli_query($mysqli, "UPDATE Customer_13158 SET SName='$SName',CName='$CName',CNo='$CNo',Address='$Address',Area='$Area',GeometricCoordinates='$GeometricCoordinates' WHERE CID LIKE '$CID'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index1.php");
	}}

?>

<?php
//getting id from url
$CID = $_GET['CID'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Customer_13158 WHERE CID LIKE '$CID'");
while($row = mysqli_fetch_array($result))
{
	$SName = $row['SName'];
	$CName = $row['CName'];
	$CNo = $row['CNo'];	
	$Address = $row['Address'];
	$Area = $row['Area'];
	$GeometricCoordinates = $row['GeometricCoordinates'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
</head>

<body>
	<a href="index1.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php"><?php include("errors.php"); ?>
		<table border="0">
			<tr> 
				<td>ShopName</td>
				<td><input type="text" name="SName" value="<?php echo $SName;?>"></td>
			</tr>
			<tr> 
				<td>CustomerName</td>
				<td><input type="text" name="CName" value="<?php echo $CName;?>"></td>
			</tr>
			<tr> 
				<td>CustomerNo</td>
				<td><input type="text" name="CNo" value="<?php echo $CNo;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="Address" value="<?php echo $Address;?>"></td>
			</tr>
			<tr> 
				<td>Area</td>
				<td><input type="text" name="Area" value="<?php echo $Area;?>"></td>
			</tr>
			<tr> 
				<td>GeometricCoordinates</td>
				<td><input type="text" name="GeometricCoordinates" value="<?php echo $GeometricCoordinates;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="CID" value=<?php echo $_GET['CID'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
