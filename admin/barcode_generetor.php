<?php
include_once('function.php');
$getproduct=mysql_query("select * from `product`")or die(mysql_error());
   while($resproduct=mysql_fetch_array($getproduct))
    {
	$getemail[] = array(
	'value'  => $resproduct['prod_name'],
	'idval' => $resproduct['id']
	);
    }
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}
</script>
</head>
<body>
    <div id="wrapper">
       <div id="header">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Generate Barcode</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
                    <form name="" action="barcodeaction.php" method="post" enctype="multipart/form-data">
                        <table class="table" style="line-height:2.5;">
			    <tr>
				<td>Barcode</td>
				<td><input type="text" name="barcode" id="barcode" onkeypress="return numbersonly(event)" class="text" required></td>
			    </tr>
			    <tr>
				<td>Pieces of Barcode</td>
				<td><input type="text" name="number" id="number" onkeypress="return numbersonly(event)" class="text" required></td>
			    </tr>
			    <tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Generate" class="btn" style="width:65px;"></td>
			    </tr>
                        </table>
                    </form>
		</div>
            <div></div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>