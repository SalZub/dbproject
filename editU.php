
<?php
include_once("config.php");
include("editERROR.php");
include ("session.php");
?>

<?php

$UserID = $_GET['UserID'];

$result = mysqli_query($mysqli, "SELECT * FROM user_13158 WHERE UserID = '$UserID'");
while($row = mysqli_fetch_array($result))
{

$Pass = $row['Pass'];
$Active =$row['Active'];
$SP_ID = $row['SP_ID'];
}
?>
<!DOCTYPE html>
<html>
<head> 
<title>Edit Data</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action="logout.php" align='right'>
    <input type="submit" value="Logout" />
</form>
<body style='background-color: Beige'>
<a href="home.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="editU.php">
<?php include("errors.php");?>
 <table border="0">
  <tr> 
   <td>UserID</td>
   <td><?php echo $UserID;?></td>
  </tr>
   <tr> 
   <td>Password</td>
   <td><input type=password name="Pass" value="<?php echo $Pass;?>"></td>
  </tr>
<tr> 
   <td>Active</td>
   <td><?php
if(isset($Active)){
echo $Active;
}
?></td>
  </tr>
  <tr>
   <td>SalespersonID</td>
   <td><input type=text name="SP_ID" value="<?php echo $SP_ID;?>"></td>
  </tr>
  <tr>
   <td><input type="hidden" name="UserID" value=<?php echo $_GET['UserID'];?>></td>
   <td><input type="submit" name="update" value="Update"></td>
  </tr>
 </table>
</form>
</body>
</html>


