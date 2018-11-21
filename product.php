<?php
include ("session.php");
?>
<!DOCTYPE html>
<html>
<body style="background-color:lavender">
<Head><title>Products</title></Head>

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
  <a href='index1.php'><b>Customer</b></a>
  <a  href='SalesP.php'><b>SalesPerson</b></a></a>
  <a href='user.php'><b>User</b></a>
  <a class="active" href='product.php'><b>Product</b></a>
  <a href='func1.php'><b>SalesOrder</b></a>
</div>
<form action="logout.php" align="right">
 <input type="submit" value="Logout" />
</form>
<form action='home.php' align='right'>
  <input type='submit' value='Home' />
</form>
<H1 align='center'><u>Products</u></H1>

</body>
</html>
<?php	

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Products_13158");

echo "<a href='addPR.php'><b>ADD A NEW PRODUCT</b></a><br/><br/>";
	
echo "<table border='1' align='center' table width='1200'> <tr style='background-color:DodgerBlue;'> <th>ProductCode</th> <th>Brand</th> <th>Type</th> <th>Shade</th> <th>Size</th> <th>SalesPrice</th> <th>Actions</th> </tr>";
		
	while($row = mysqli_fetch_array($result))	
	{	echo "<tr>";
		echo "<td>" . $row["P_Code"]."</td>"; 	
		echo "<td>" . $row["brand"]."</td>";
		echo "<td>" . $row["type"]."</td>";	
		echo "<td>" . $row["shade"]."</td>";
		echo "<td>" . $row["size"]."</td>";	
		echo "<td>" . $row["S_Price"]."</td>";
		echo "<td><a href=\"editPR.php?P_Code=$row[P_Code]\">Edit</a> | <a href=\"deletePR.php?P_Code=$row[P_Code]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";		}
	echo "</table>";		
		
?>
