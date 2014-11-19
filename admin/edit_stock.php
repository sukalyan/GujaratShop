<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$id=$_GET['id'];
$sqlstock=mysql_query("select * from `stock` where `id`='$id'");
$resstock=mysql_fetch_array($sqlstock);

 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <style type="text/css"> 
		.text
		{
		width:190px;
		}
    </style>
    <script src="js/jquery.min.js"></script>

<script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}


function only()

{
    //alert("inside");
	var contact=document.getElementById('price').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{

            alert("Enter numeric value");
           $("#price").val("");
			return false;
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
				<h3>Edit Stock</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
				    <form name="f" action="update_stock.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
					<input type="hidden" name="hdid" value="<?php echo $resstock['id'];?>"/>
					    <td>Product Name</td>
					    <td colspan="2">
						<?php
						$sqlpronm=mysql_query("select * from `product` where `id`='$resstock[product_id]'");
						$respronm=mysql_fetch_array($sqlpronm);
						?>
						<input type="text" name="pname" class="text" value="<?php echo $respronm['prod_name'];?>" readonly="true" style="width:190px;">
						</td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td colspan="2"><input type="text" name="quant" onkeypress="return numbersonly(event)" class="text" value="<?php echo $resstock['quantity'];?>"/></td>
					</tr>
					<tr>
						<td colspan="3">Price</td>
						
					</tr>
					<tr>
						<td>Retailer Price</td>
						<td>Distributer Price</td>
						<td>Customer Price</td>
					</tr>
					<tr>
						<td><input type="text" name="retailerprice" id="reatilerprice" onkeypress="return only()" class="text" value="<?php echo $resstock['retailer_price'];?>"/></td>
						<td><input type="text" name="distributerprice" id="distributerprice" onkeypress="return only()" class="text" value="<?php echo $resstock['distributer_price'];?>"/></td>
						<td><input type="text" name="price" id="price" onkeypress="return only()" class="text" value="<?php echo $resstock['price'];?>"/></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Update" class="btn"/></td>
					</tr>
				    </table>
				    </form>
				</div>
		    <div>
	    </div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html> 
<?php 
}
?>