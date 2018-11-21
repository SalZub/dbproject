<?php
include("admin.php");
 if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add a new user</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="addU.php">
<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>UserID</label>
	<input type="text" name="UserID" value="<?php echo $UserID; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="Pass" >
  	</div>
  	
  	<div class="input-group">
  	  <label>SP_ID</label>
  	  <input type="numeric" name="SP_ID">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
