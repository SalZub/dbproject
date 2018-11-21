<?php  
include ("session.php");
 $connect = mysqli_connect("localhost", "root", "", "assignment1");  
 $output = '';  
$CID=isset($_POST["CID"])?$_POST["CID"]:"";
 $sql = "SELECT * FROM SalesOrder_13158 WHERE CID='$CID' ORDER BY O_No";  
 $sql1 = "SELECT * FROM Customer_13158 WHERE CID='$CID'";
 $sql2 = "SELECT SP_ID FROM SalesPerson_13158";
 $sql3 = "SELECT P_Code FROM Products_13158";
 $result = mysqli_query($connect, $sql);  
 $result1 = mysqli_query($connect, $sql1);
 $result2 = mysqli_query($connect, $sql2);
 $row = mysqli_fetch_array($result1);
 $output .= '  
<table border="1" align="center" table width="1200">
<tr style="background-color:DodgerBlue; padding: 20px;"> <th>ID</th> <th>ShopName</th> <th>CustomerName</th> <th>ContactNo</th> <th>Address</th> <th>Area</th> <th>GeographicalCoordinates</th></tr>
	 
	<tr style="background-color: white; padding: 20px;">
	     <td>'.$row["CID"].'</td>
	     <td>'.$row["SName"].'</td>
	     <td>'.$row["CName"].'</td>
	     <td>'.$row["CNo"].'</td>
	     <td>'.$row["Address"].'</td>
	     <td>'.$row["Area"].'</td>
	     <td>'.$row["GeometricCoordinates"].'</td>
	</tr>
	</table>
<h3>Sale Orders</h3>
      <div class="table-responsive">  
           <table  class="table table-bordered"" align="center" table width="1200">  
                <tr style="background-color:DodgerBlue;">  
                     <th width="10%" style="padding: 20px;">Order No.</th>  
                     <th width="40%" style="padding: 20px;">Customer ID</th>  
                     <th width="40%" style="padding: 20px;">date</th> 
                     <th width="40%" style="padding: 20px;">Salesperson ID</th>
                     <th width="40%" style="padding: 20px;">Product Code</th>
                     <th width="40%" style="padding: 20px;">Quantity</th>
                     <th width="40%" style="padding: 20px;">Rate</th>
                     <th width="40%" style="padding: 20px;">Amount</th> 
                     <th width="10%" style="padding: 20px;">Action</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
	   $result3 = mysqli_query($connect, $sql3);
		//pcode and spid
	   $result2 = mysqli_query($connect, $sql2);
           $output .= '  
           <tr style="background-color: white; padding: 20px;">  
                     <td class="O_No" data-id1="'.$row["O_No"].'" contenteditable>'.$row["O_No"].'</td>  
                     <td>'.$row["CID"].'</td> 
                     <td class="date" data-id3="'.$row["O_No"].'" contenteditable>'.$row["date"].'</td>
                     <td>';
		     $output .= '<select class="SP_ID form-control" data-id4="'.$row["O_No"].'">';
			$output .= '<option value="">None</option>';
    			while ($row1 = mysqli_fetch_array($result2)) { 
$output .= '<option value="'.$row1["SP_ID"].'"'.($row["SP_ID"]==$row1["SP_ID"]?'selected="selected"':"").'>'.$row1["SP_ID"].'</option>';
             									}
$output .= '</select>
			</td>
                     	<td>';
		     	$output .= '<select class="P_Code form-control" data-id5="'.$row["O_No"].'">';
			$output .= '<option value="">None</option>';
    			while ($row2 = mysqli_fetch_array($result3)) { 

$output .= '<option value="'.$row2["P_Code"].'"'.($row["P_Code"]==$row2["P_Code"]?'selected="selected"':"").'>'.$row2["P_Code"].'</option>';
                  	                 
			}
    			$output .= '</select>
		     </td>
                     <td class="Quantity" data-id6="'.$row["O_No"].'" contenteditable>'.$row["Quantity"].'</td>
                     <td class="Rate" data-id7="'.$row["O_No"].'" contenteditable>'.$row["Rate"].'</td>
                     <td>'.$row["Amount"].'</td> 
<td><button type="button" name="delete_btn" data-id9="'.$row["O_No"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>
        </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="O_No" contenteditable></td>  
                <td id="CID">'.$CID.'</td>  
                <td id="date" contenteditable></td>  
                <td>';
		$output .= '<select id="SP_ID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["SP_ID"].'">'.$row1["SP_ID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="P_Code" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["P_Code"].'">'.$row2["P_Code"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
$output .= '
		<tr>  
                <td id="O_No" contenteditable></td>  
                <td id="CID">'.$CID.'</td>  
                <td id="date" contenteditable></td>  
                <td>';
		$output .= '<select id="SP_ID" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["SP_ID"].'">'.$row1["SP_ID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="P_Code" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["P_Code"].'">'.$row2["P_Code"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>		
<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
