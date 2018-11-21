<?php
include("config.php");
include ("session.php");
?>

<!DOCTYPE html>
<html>
<body style="background-color:lavender">
<Head><title>Customer Table</title></Head>
<style>

/* Add a black background color to the  navigation */
.nav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.nav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.nav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.nav a.active {
    background-color: #4CAF50;
    color: white;
}

</style>
<body>
 <div class="nav">
  <a class="active" href='index1.php'><b>Customer</b></a></a>
  <a href='SalesP.php'><b>SalesPerson</b></a>
  <a href='user.php'><b>User</b></a>
<a href='product.php'><b>Product</b></a>
<a href='func1.php'><b>SalesOrder</b></a>
</div>
<form action="logout.php" align="right">
 <input type="submit" value="Logout" />
</form>
<form action='home.php' align='right'>
  <input type='submit' value='Home' />
</form>
<H1 align='center'><u>Customer Table</u></H1>

</body>
</html>

<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM Customer_13158 ORDER BY CID");
echo "<a href='add.php'><b>Add Customer</b></a><br/><br/>";
echo "<table border='1' align='center' table width='1200'> <tr style='background-color:DodgerBlue;'> <th>ID</th> <th>ShopName</th> <th>CustomerName</th> <th>ContactNo</th> <th>Address</th> <th>Area</th> <th>GeographicalCoordinates</th><th>Actions</th> </tr>";

	while($row = mysqli_fetch_array($result))	
	{	echo "<tr>";
		echo "<td>" . $row["CID"]."</td>"; 	
		echo "<td>" . $row["SName"]."</td>";
		echo "<td>" . $row["CName"]."</td>";	
		echo "<td>" . $row["CNo"]."</td>";
		echo "<td>" . $row["Address"]."</td>";	
		echo "<td>" . $row["Area"]."</td>";
		echo "<td>" . $row["GeometricCoordinates"]."</td>";
		echo "<td><a href=\"edit.php?CID=$row[CID]\">Edit</a> | <a href=\"delete.php?CID=$row[CID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";		}
	echo "</table>";
?>
