
<?php
session_start();
$UserID = "";
$Active = "";
$SP_ID = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'assignment1');


if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $UserID = mysqli_real_escape_string($db, $_POST['UserID']);
  $Pass = mysqli_real_escape_string($db, $_POST['Pass']);
$Active=isset($_POST["Active"])?$_POST["Active"]:"";

  $SP_ID = mysqli_real_escape_string($db, $_POST['SP_ID']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($UserID)) { array_push($errors, "Username is required"); }
  if (empty($Pass)) { array_push($errors, "Password is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user_13158 WHERE UserID='$UserID' OR SP_ID='$SP_ID' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['UserID'] === $UserID) {
      array_push($errors, "Username already exists");
    }

    if ($user['SP_ID'] === $SP_ID) {
      array_push($errors, "SalesPerson is already a user");
    }
  }
  
  // Finally, register user if there are no errors in the form
 	if ( count($errors) == 0) {
  	//$Pass = md5($Pass);//encrypt the password before saving in the database
if (empty($SPID)) {
$query="INSERT INTO user_13158 (UserID, Pass, Active) VALUES ('$UserID', '$Pass', '0')";
}
else{
  	$query = "INSERT INTO user_13158 (UserID, Pass, Active,SP_ID) 
  			  VALUES('$UserID', '$Pass', '0','$SP_ID')";
}
  	mysqli_query($db, $query);
  	$_SESSION['UserID'] = $UserID;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: user.php');
  }}
?>

