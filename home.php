<?php
include("config.php");
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 1;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 10%;
    background-color: teal;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
 
</style>
</head>

<body style="background-color:lightblue">
<form action="logout.php" align='right'>
    <input type="submit" value="Logout" />
</form>



 <h1 align='center'>Welcome <?php echo $login_session; ?></h1> 
<ul>
<li><a href='index1.php'><b>Customer</b></a></li>
<li><a href='SalesP.php'><b>SalesPerson</b></a></li>
<li><a href='user.php'><b>User</b></a></li>
<li><a href='product.php'><b>Product</b></a></li>
<li><a href='func1.php'><b>SalesOrder</b></a></li>
</ul>
     
   </body>
   
</html>

