<?php
include_once('function.php');
$bcode=$_GET['bcode'];
$uid=$_GET['uid'];
$ivalls=$_GET['ivalls'];
$qty=$_GET['qty'];
$sql=mysql_query("select * from `stock` where `uniqueid`='$uid'");
$res=mysql_fetch_array($sql);
$prc=$res['price'];
$proid=$res['product_id'];
$sqlfree=mysql_query("select * from `freestock` where `slno`='$ivalls'");
$num=mysql_num_rows($sqlfree);
if($num==0){
mysql_query("insert into `freestock` set `product_id`='$proid',`barcode`='$bcode',`quantity`='$qty',`price`='$prc',`slno`='$ivalls'");
}
else
{
mysql_query("update `freestock` set `product_id`='$proid',`barcode`='$bcode',`quantity`='$qty',`price`='$prc' where `slno`='$ivalls'");
}
?>