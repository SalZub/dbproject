<?php
include ("session.php");
?>
<html>  
<body style="background-color:lavender">
      <head>  
           <title>Sales Order</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
<style>

/* Add a black background color to the top navigation */
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
  <a href='home.php'><b>HOME</b></a>
  <a href='index1.php'><b>Customer</b></a>
  <a  href='SalesP.php'><b>SalesPerson</b></a></a>
  <a href='user.php'><b>User</b></a>
  <a href='product.php'><b>Product</b></a>
  <a class="active" href='func1.php'><b>SalesOrder</b></a>

  <a  href='logout.php'><b>LOGOUT</b></a>


</div>
           <div class="container">  
                <div class="table-responsive"> 

<h3>Select CUSTOMER: </h3>

<?php
$host = "localhost";
$db_name = "assignment1";
$username = "root";
$password = "";
$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	$stmt = $con->prepare("select CID from Customer_13158");
	$stmt->execute();
    	echo "<select id='CID' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["CID"].'">'.$row["CID"].'</option>';                
	}
    	echo "</select>";
	?>
	</br>
<div id="live_data"></div>  
		</div>                 
           </div>  
      </body>  
 </html>  
 <script>  
 	$(document).ready(function(){  
	var CID= $('#CID').val();
	$("#CID").change(function(){
	CID = $('#CID').val();	
      	 fetch_data();
	});
	
	function fetch_data()
      {  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
		data:{CID:CID},
		dataType:"text",
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
	   var O_No = $('#O_No').text(); 
           var CID = CID;  
           var date = $('#date').text();  
           var SP_ID = $('#SP_ID').val();  
           var P_Code = $('#P_Code').val();
           var Quantity1 = $('#Quantity').text();  
           var Rate1 = $('#Rate').text(); 
	var Quantity= parseInt(Quantity1);
	var Rate= parseInt(Rate1); 
           var Amount = Quantity*Rate;  
           if(O_No == '')  
           {  
                alert("Enter OrderNo");  
                return false;  
           }   
	   if(date == '')  
           {  
                alert("Enter date");  
                return false;  
           }  
           if(Quantity == '')  
           {  
                alert("Enter Quanity");  
                return false;  
           }    
                $.ajax({  
                url:"insert5.php",  
                method:"POST",  
                data:{O_No:O_No, CID:CID,date:date,SP_ID:SP_ID, P_Code:P_Code, Quantity:Quantity, Rate:Rate,Amount:Amount},  
                dataType:"text",  
                success:function(data)  
                {  
                    // alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit5.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                    // alert(data);  
			fetch_data();
                }  
           });  
      }  

      $(document).on('blur', '.O_No', function(){  
           var id = $(this).data("id1");  
           var O_No = $(this).text();  
           edit_data(id, O_No, "O_No");  
      });  
      $(document).on('blur', '.date', function(){  
           var id= $(this).data("id3");  
           var date = $(this).text();  
           edit_data(id,date, "date");  
      });  
      $(document).on('blur', '.SP_ID', function(){  
           var id = $(this).data("id4");  
           var SP_ID = $(this).text();  
           edit_data(id,SP_ID, "SP_ID");  
      });  
      $(document).on('blur', '.P_Code', function(){  
           var id = $(this).data("id5");  
           var P_Code = $(this).text();  
           edit_data(id,P_Code, "P_Code");  
      });  
      $(document).on('blur', '.Quantity', function(){  
           var id = $(this).data("id6");  
           var Quantity= $(this).text();  
           edit_data(id,Quantity, "Quantity");  
      });  
      $(document).on('blur', '.Rate', function(){  
           var id = $(this).data("id7");  
           var Rate = $(this).text();  
           edit_data(id,Rate, "Rate");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url:"delete5.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data)
					{  
						fetch_data();  
                    }  
                });  
           }  
      });  
 });  
 </script>
