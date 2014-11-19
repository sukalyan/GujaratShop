<?php 
include_once('function.php');
$quant=$_GET['qtyy'];
echo $quant;
$sql=mysql_query("select `barcode`,`product_id`,sum(`quantity`) as quant from `stock` group by `barcode`");
while($ress=mysql_fetch_array($sql)){
//echo "<br/>".$ress['quant']."-----".$ress['product_id']."----".$ress['price']."-----".$ress['barcode']."stock<br/>";
$stockquant=$ress['quant'];
//$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `price`='$ress[price]' and `productid`='$ress[product_id]'");
//echo "select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `price`='$ress[price]' and `productid`='$ress[product_id]'";
$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$ress[barcode]' and `productid`='$ress[product_id]'");
while($ressel=mysql_fetch_array($sqlsel)){
//echo "<br/>".$ressel['qty']."-----".$ressel['productid']."----".$ressel['price']."-----".$ressel['barcode']."<br/>";
$sellquant=$ressel['qty'];
$less=$stockquant-$sellquant;
echo "<br/>".$less;
}
}
?>