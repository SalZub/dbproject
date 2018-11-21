<?php
include ("session.php"); 
?>
<html>
<head>
<script>
function showCust(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getCust.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
<div class="input-group">
  	  <label>Enetr Customer ID</label>
	<input type="text" name="CID" value="<?php echo $CID; ?>">
  	</div>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html> 
