<?php
   include("config.php");
   if(isset($_POST['UserID']) and isset($_POST['Pass'])){
      $UserID = mysqli_real_escape_string($mysqli,$_POST['UserID']);
      $Pass = mysqli_real_escape_string($mysqli,$_POST['Pass']); 
      $sql = "SELECT UserID FROM user_13158 WHERE UserID = '$UserID' and Pass = '$Pass'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);     
      $count = mysqli_num_rows($result);
     
      if($count == 1) {
  	session_start();   
	$_SESSION['login_user'] = $UserID;   
	$qr = "UPDATE user_13158 set Active='1' WHERE UserID='$UserID'";
	mysqli_query($mysqli, $qr);
	header("location: home.php");
      }
	else {
         	$error = "Your Login Name or Password is invalid";
		echo "<script type='text/javascript'>alert('$error');</script>";
      		}}
  ?>
<html>
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "UserID" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "Pass" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               

					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
