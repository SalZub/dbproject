<?php
include ("session.php");
?>
<!DOCTYPE html>
<html>
<body style="background-color:lavender">
<Head><title>Sales Department</title></Head>

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
  <a class="active" href='SalesP.php'><b>SalesPerson</b></a></a>
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
<H1 align='center'><u>Sales Department</u></H1>

</body>
</html>
<?php
include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM SalesPerson_13158");

echo "<a href='addSP.php'><b>ADD A NEW SALES PERSON</b></a><br/><br/>";
	
echo "<table border='1' align='center' table width='1200'> <tr style='background-color:DodgerBlue;'> <th>SP_ID</th> <th>SP_Name</th> <th>SP_No</th> <th>Customer</th><th>Actions</th> </tr>";

	while($row = mysqli_fetch_array($result))	
	{	echo "<tr>";
		echo "<td>" . $row["SP_ID"]."</td>"; 	
		echo "<td>" . $row["SP_Name"]."</td>";
		echo "<td>" . $row["SP_No"]."</td>";
		echo "<td>" . $row["Customer"]."</td>";
		echo "<td><a href=\"editSP.php?SP_ID=$row[SP_ID]\">Edit</a> | <a href=\"deleteSP.php?SP_ID=$row[SP_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";		}
	echo "</table>";		

?>
