
<?php
include_once("config.php");
include ("session.php");
if(isset($_POST['update']))
{	
	$P_Code = $_POST['P_Code'];
	$brand =  $_POST['brand'];
	$type =$_POST['type'];
	$shade = $_POST['shade'];
	$size =  $_POST['size'];
	$S_Price = $_POST['S_Price'];

	$result = mysqli_query($mysqli, "UPDATE Products_13158 SET type='$type',shade='$shade',size='$size',S_Price='$S_Price' WHERE P_Code=$P_Code");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: product.php");
	}

?>

<?php

$P_Code = $_GET['P_Code'];
$result = mysqli_query($mysqli, "SELECT * FROM Products_13158 WHERE P_Code=$P_Code");
while($row = mysqli_fetch_array($result))
{
	$brand = $row['brand'];
	$type = $row['type'];
	$shade= $row['shade'];	
	$size = $row['size'];
	$S_Price = $row['S_Price'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="product.php">Product</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editPR.php">
		<table border="0">
<tr> 
				<td>ProductCode</td>
				<td><?php echo $P_Code;?></td>
			</tr>			
<tr> 
				<td>brand</td>
				<td><?php echo $brand;?></td>
			</tr>
			<tr> 
				<td>type</td>
				<td><input type="text" name="type" value="<?php echo $type;?>"></td>
			</tr>
			<tr> 
				<td>shade</td>
				<td><input type="text" name="shade" value="<?php echo $shade;?>"></td>
			</tr>
			<tr> 
				<td>size</td>
				<td><input type="text" name="size" value="<?php echo $size;?>"></td>
			</tr>
			<tr> 
				<td>S_Price</td>
				<td><input type="numeric" name="S_Price" value="<?php echo $S_Price;?>"></td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="P_Code" value=<?php echo $_GET['P_Code'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
