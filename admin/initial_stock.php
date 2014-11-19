<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
<!--datepicker start--->
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			
		});
		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%Y-%m-%d"
			
		});
	};
</script>
<!--datepicker end--->
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
                <div class="content2">
				<h3>Initial Product Stock</h3>
				</div>
				<div class="content3">
				<form name="f" method="post">
<table class="table" style="height:100px;">
<tr>
<td>Date:</td>
<td>From</td>
<td><input type="text" name="rpt" size="12" id="inputField" class="text"/></td>
<td>To</td>
<td><input type="text" name="rpt1" size="12" id="inputField1" class="text"/></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td>&nbsp;</td> 
<td>
<input type="submit" name="submit" value="submit"  class="btn"/>
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['rpt']) && isset($_POST['rpt1'])){
?>
<div style="width:auto; height:auto; float:left; margin-left:10px; word-spacing:5px;">
<?php
$from=$_POST['rpt'];
$to=$_POST['rpt1'];
echo "<span style='font-family:arial; font-size:16px; color:#51A351;'>Report From"."  ".$from." To ".$to."</span><span style='font-weight:bold;color:#51A351;margin-left:5px;'>:</span>";
?>
</div>
<?php
}
?>
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr>
<td colspan="2" style="font-weight:bold;">Existing Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">

<th>Product name</th>
<th>Quantity</th>
<th>Price for 1piece</th>
<!--<th>Total Price</th>-->
<th>Barcode</th>
<th>Date</th>

</tr>

<?php
if(isset($_POST['rpt'])=="" && isset($_POST['rpt1'])=="")
{
$sqlstock=mysql_query("select * from `stock`");
	}	
else{
$sqlstock=mysql_query("select * from `stock` where date between '$_POST[rpt]' and '$_POST[rpt1]'");
}
while($resstock=mysql_fetch_array($sqlstock)){
$proname=mysql_query("select * from `product` where `id`='$resstock[product_id]'");
$resproname=mysql_fetch_array($proname);

?>
<tr>

<td class="td"><?php echo $resproname['prod_name'];?></td>
<td class="td"><?php echo $resstock['quantity'];?></td>
<td class="td"><?php echo $resstock['price'];?></td>
<!--<td class="td"><?php echo $resstock['totprice'];?></td>-->
<td class="td"><?php echo $resstock['barcode'];?></td>
<td class="td" style="border-right:1px solid #adadad;"><?php echo $resstock['date'];?></td>

</tr>
<?php
}
?>

</table>
				   
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
