<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
<script src="js/jquery.min.js"></script>
<script>
function getcomment(cmnt,ival)
{
var proid=$('#hdproid'+ival).val();
var prc=$('#hdprice'+ival).val();
var bar=$('#hdbarcode'+ival).val();
	$.ajax({url:"insert_comment.php?hdproidval="+proid+'&hdpriceval='+prc+'&hdbarcodeval='+bar+'&comntval='+cmnt,
	       success:function(result){
                }
		});
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
                <div class="content2">
				<h3>Final Product Stock</h3>
				</div>
				<div class="content3">
<form name="f" action="insert_comment.php" method="post">
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr >
<td colspan="2" style="font-weight:bold;">Final Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
<th>Product name</th>
<th>Quantity</th>
<th>Price</th>
<th>Barcode</th>
<th>Add Comment</th>
</tr>
<?php
$i=0;
$sql=mysql_query("select `barcode`,`product_id`,`price`,sum(`quantity`) as quant from `stock` group by `price`,`barcode`");
//$sql=mysql_query("select `barcode`,`product_id`,sum(`quantity`) as quant from `stock` group by `barcode`");
while($ress=mysql_fetch_array($sql)){
$i++;
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
<tr id="<?php echo $i;?>">
<td class="td" style="border:1px solid #fa3232; "><?php echo $resproname['prod_name'];?><input type="hidden" name="hdproid" id="hdproid<?php echo $i;?>" value="<?php echo $resproname['id'];?>"/></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; "><?php echo $less;?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; "><?php echo $ress['price'];?><input type="hidden" name="hdprice" id="hdprice<?php echo $i;?>" value="<?php echo $ress['price'];?>"/></td>
<td class="td" style="border:1px solid #fa3232; border-left:none;"><?php echo $ress['barcode'];?><input type="hidden" name="hdbarcode" id="hdbarcode<?php echo $i;?>" value="<?php echo $ress['barcode'];?>"/></td>
<td>
<!--<div style="width:120px; float:left;">-->
<textarea class="text" style="width:110px; text-align:center; margin-left:5px; border:1px solid #fa3232;" name="comnt" id="comnt<?php echo $i;?>" onblur="return getcomment(this.value,<?php echo $i;?>);">
<?php
$sqll=mysql_query("select * from `comment` where `product_id`='$resproname[id]' and `price`='$ress[price]' and `barcode`='$ress[barcode]'");
$no=mysql_num_rows($sqll);
if($no==0){
echo "Low Stock";
}
else{
while($res=mysql_fetch_array($sqll)){
echo $res['review'];
}
}
?>
</textarea>
<!--</div>-->
<!--<div style="width:70px; float:left;">
<input type="submit" name="submit" value="add" style="padding:2px; margin-top:5px;"/>
</div>-->
</td>
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
<td>&nbsp;</td>
</tr>
<?php
}
}
}
?>
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
