<html>
<body style="background-color:lavender">
<Head><title>Administration Department</title></Head>

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
    color: black;a
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
  <a href='SalesP.php'><b>SalesPerson</b></a></a>
  <a class="active" href='user.php'><b>User</b></a>
<a href='product.php'><b>Product</b></a>
<a href='func1.php'><b>SalesOrder</b></a>
</div>
<form action="logout.php" align="right">
 <input type="submit" value="Logout" />
</form>
<form action='home.php' align='right'>
  <input type='submit' value='Home' />
</form>
<H1 align='center'><u>User</u></H1>

</body>
</html>
<?php
include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM user_13158 where UserID<>'admin'");
$result1 = mysqli_query($mysqli, "SELECT * FROM user_13158 where UserID='admin'");

echo "<a href='addU.php'><b>ADD A NEW USER</b></a><br/><br/>";
	
echo "<table border='1' align='center' table width='1200'> <tr style='background-color:DodgerBlue;'> <th>UserID</th> <th>Password</th> <th>Active</th> <th>SP_ID</th><th>Actions</th> </tr>";

$row1=mysqli_fetch_array($result1);
		echo "<tr>";
		echo "<td>" . $row1["UserID"]."</td>"; 	
		//echo "<td>" . $row1["Pass"]."</td>";
		echo"<td>*****</td>";
		echo "<td>" . $row1["Active"]."</td>";
		echo "<td>" . $row1["SP_ID"]."</td>";	
		echo "</tr>";
	while($row = mysqli_fetch_array($result))	
	{	echo "<tr>";
		echo "<td>" . $row["UserID"]."</td>"; 	
		echo "<td>****</td>";
		//echo "<td>" . $row["Pass"]."</td>";
		echo "<td>" . $row["Active"]."</td>";
		echo "<td>" . $row["SP_ID"]."</td>";
	
	echo "<td><a href=\"editU.php?UserID=$row[UserID]\">Edit</a> | <a href=\"deleteU.php?UserID=$row[UserID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";		}
	echo "</table>";		
?>	
