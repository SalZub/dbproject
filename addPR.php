
<?php
include_once("config.php");
include ("session.php");

if(isset($_POST['submit'])) {  

    $P_Code = $_POST['P_Code'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $shade = $_POST['shade'];
    $size = $_POST['size'];
    $S_Price = $_POST['S_Price'];
          $result = mysqli_query($mysqli, "INSERT INTO Products_13158(P_Code,brand,type,shade,size,S_Price) VALUES ('$P_Code','$brand','$type','$shade','$size','$S_Price')"); 
        echo "<font color='green'><b>Data added successfully.</b>";
        echo "<br/><a href='product.php'>View Result</a>";
    }

?>

<html>
<head><title>Add a Product</title></head>
<body>
    <a href="product.php">ProductDisplay</a>
    <br/><br/>
	    <form action="addPR.php" method="post">
	<label for="P_Code">ProductCode</label><br/>
	<input type="text" name="P_Code" id="P_Code">
	<br/>
	<label for="brand">Brand</label><br/>
	<input type="text" name="brand" id="brand">
	<br/>
	<label for="type">Type</label><br/>
	<input type="text" name="type" id="type">
	<br/>
	<label for="shade">Shade</label><br/>
	<input type="text" name="shade" id="shade">
	<br/>
	<label for="size">size</label><br/>
	<input type="text" name="size" id="size">
	<br/>
	<label for="S_Price">SalesPrice</label><br/>
	<input type="text" name="S_Price" id="S_Price">
<br/><br/>	
	<input type="submit" name="submit" value="Submit">
		</form>
</body>
</html>
