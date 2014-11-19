<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
<style>
.table
{
width:500px;
}
</style>
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
				<h3>Product Stock Available</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr>
<td colspan="2" style="font-weight:bold;">Existing Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">

<th>Product name</th>
<th>Quantity</th>
<th>Price for 1piece</th>
<th>Total Price</th>
<th>Barcode</th>
<th>Date</th>

</tr>

<?php

$sqlstock=mysql_query("select * from `stock`");
while($resstock=mysql_fetch_array($sqlstock)){
$proname=mysql_query("select * from `product` where `id`='$resstock[product_id]'");
$resproname=mysql_fetch_array($proname);

?>
<tr>

<td class="td"><?php echo $resproname['prod_name'];?></td>
<td class="td"><?php echo $resstock['quantity'];?></td>
<td class="td"><?php echo $resstock['price'];?></td>
<td class="td"><?php echo $resstock['totprice'];?></td>
<td class="td"><?php echo $resstock['barcode'];?></td>
<td class="td" style="border-right:1px solid #adadad;"><?php echo $resstock['date'];?></td>

</tr>
<?php
}
?>

</table>
				   
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr>
<td colspan="2" style="font-weight:bold;">Sell Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
<th>Product name</th>
<th>Quantity</th>
<th>Price for 1piece</th>
<th>Total Price</th>
<th>Barcode</th>
<th>Date</th>
</tr>
<?php
$sqlsell=mysql_query("select * from `sell`");
while($ressell=mysql_fetch_array($sqlsell)){
$pname=mysql_query("select * from `product` where `id`='$ressell[productid]'");
$respro=mysql_fetch_array($pname);
?>
<tr>
<td class="td"><?php echo $respro['prod_name'];?></td>
<td class="td"><?php echo $ressell['quantity'];?></td>
<td class="td"><?php echo $ressell['price'];?></td>
<td class="td"><?php echo $ressell['totprice'];?></td>
<td class="td" ><?php echo $ressell['barcode'];?></td>
<td class="td" style="border-right:1px solid #adadad;"><?php echo $ressell['date'];?></td>
</tr>
<?php
}
?>
</table>

<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr >
<td colspan="2" style="font-weight:bold;">Final Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
<th>Product name</th>
<th>Quantity</th>
<th>Price</th>
<th>Barcode</th>
</tr>
<?php
$sql=mysql_query("select `barcode`,`product_id`,`price`,sum(`quantity`) as quant from `stock` group by `price`,`barcode`");
while($ress=mysql_fetch_array($sql)){
//echo "<br/>".$ress['quant']."-----".$ress['product_id']."----".$ress['price']."-----".$ress['barcode']."stock<br/>";
$stockquant=$ress['quant'];
$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `price`='$ress[price]' and `productid`='$ress[product_id]'");
while($ressel=mysql_fetch_array($sqlsel)){
//echo "<br/>".$ressel['qty']."-----".$ressel['productid']."----".$ressel['price']."-----".$ressel['barcode']."<br/>";
$sellquant=$ressel['qty'];
$less=$stockquant-$sellquant;
$sqlproname=mysql_query("select * from `product` where `id`='$ress[product_id]'");
$resproname=mysql_fetch_array($sqlproname);
?>
<tr>

<td class="td"><?php echo $resproname['prod_name'];?></td>
<td class="td"><?php echo $less;?></td>
<td class="td"><?php echo $ress['price'];?></td>
<td class="td" style="border-right:1px solid #adadad;"><?php echo $ress['barcode'];?></td>
</tr>
<?php
}
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