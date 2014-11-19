<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>

</head>
<body>
<div id="wrapper">
       <div id="header">User Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu1.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Final Product Stock</h3>
				</div>
				<div class="content3">

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
//$sql=mysql_query("select `barcode`,`product_id`,sum(`quantity`) as quant from `stock` group by `barcode`");
while($ress=mysql_fetch_array($sql)){
//echo "<br/>".$ress['quant']."-----".$ress['product_id']."----".$ress['price']."-----".$ress['barcode']."stock<br/>";
$stockquant=$ress['quant'];
$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `price` like '$ress[price]' and `productid`='$ress[product_id]'")or die(mysql_error());
//$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `productid`='$ress[product_id]'");
//echo "select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `price`='$ress[price]' and `productid`='$ress[product_id]'";
while($ressel=mysql_fetch_array($sqlsel)){
//echo "<br/>".$ressel['qty']."-----".$ressel['productid']."----".$ressel['price']."-----".$ressel['barcode']."<br/>";
$sellquant=$ressel['qty'];
$less=$stockquant-$sellquant;
//echo $less;
$sqlproname=mysql_query("select * from `product` where `id`='$ress[product_id]'");
$resproname=mysql_fetch_array($sqlproname);
$min=$resproname['minimum'];
if($less<$min)
{
?>
<tr>
<td class="td" style="border:1px solid #fa3232; border-top:1px solid #adadad;"><?php echo $resproname['prod_name'];?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:1px solid #adadad;"><?php echo $less;?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:1px solid #adadad;"><?php echo $ress['price'];?></td>
<td class="td" style="border-right:1px solid #adadad; border:1px solid #fa3232; border-left:none;border-top:1px solid #adadad;"><?php echo $ress['barcode'];?></td>
<td ><input type="text" value="Low stock" readonly class="text" style="width:90px; text-align:center; margin-left:5px; border:1px solid #fa3232;"/></td>
</tr>

<?php
}
else
{
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
