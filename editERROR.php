<?php
include_once("config.php");
$errors=array();
if(isset($_POST['update']))
{ 
	$UserID = $_POST['UserID'];
	$Pass = $_POST['Pass'];
	$Active=isset($_POST["Active"])?$_POST["Active"]:"";
	$SP_ID = $_POST['SP_ID'];
  $result = mysqli_query($mysqli, "SELECT * FROM user_13158 WHERE SP_ID='$SP_ID' LIMIT 1");
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['SP_ID'] === $SP_ID) {
      array_push($errors, "SalesPerson is already a user");

	header("Location: editU.php?UserID=$UserID");
    }
  }
if(count($errors) == 0) {
$result = mysqli_query($mysqli,"UPDATE user_13158 SET UserID='$UserID', Pass='$Pass', SP_ID='$SP_ID' WHERE UserID='".$UserID."'");
header("Location: user.php");
}
}
?>


