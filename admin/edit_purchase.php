<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$id=$_GET['id'];
$sqlpurchase=mysql_query("select * from `purchase` where `id`='$id'");
$respurchase=mysql_fetch_array($sqlpurchase);
$sqlvendor=mysql_query("select * from `vendor` where `slno`='$respurchase[vendor_id]'");
$resvendor=mysql_fetch_array($sqlvendor);

$getdrugdet=mysql_query("select * from `vendor`")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
$getemail[] = array(
'value'  =>$resdrugdet['name']."(".$resdrugdet['phone'].")",
'idval' => $resdrugdet['slno']
	);
}
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
	 <!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('.vend').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('.vend').val(valshow);
		 $('.hdvendval').val(ui.item.idval);
        return false;
		}
        });
});
</script>
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
				<h3>Edit Purchase</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
				    <form name="f" action="update_purchase.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
						<td>Vendor Name</td>
						<td>
						<input type="text" name="vend" class="vend text" autocomplete="off" value="<?php echo $resvendor['name']."(".$resvendor['phone'].")";?>" readonly="true"/>
						<input type="hidden" name="hdvendval" class="hdvendval" value="<?php echo $resvendor['slno'];?>"/>
						<input type="hidden" name="hdval" value="<?php echo $respurchase['id'];?>"/>
						</td>
					</tr>
					<tr>
					    <td>Product Name</td>
					    <td>
						<select name="pname" class="text" style="width:173px;">
						<?php
						$sqlpronm=mysql_query("select * from `product`");
						while($respronm=mysql_fetch_array($sqlpronm))
						{
						?>
						<option value="<?php echo $respronm['id'];?>" <?php
						if($respurchase['product_id']==$respronm['id'])
						{
						echo "selected='selected'";
						}
						?>><?php echo $respronm['prod_name'];?></option>
						<?php
						}
						?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="text" name="quant" onkeypress="return numbersonly(event)" class="text" value="<?php echo $respurchase['quantity'];?>"/>for 1 packet</td>
					</tr>
					<!--<tr>
						<td>Price</td>
						<td><input type="text" name="price" id="price" onkeypress="return only()" class="text" value="<?php echo $respurchase['price'];?>"/></td>
					</tr>-->
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