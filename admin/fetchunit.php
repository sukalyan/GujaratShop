<?php
include_once('function.php');
$bar=$_GET['bcode'];
$type=$_GET['type'];
$uid=$_GET['uid'];
if($type==3){ $typ="retailer_price";}
elseif($type==2){ $typ="distributer_price";}
else{ $typ="price";}
$fetch=mysql_query("select * from `stock` where `barcode`='$bar' and (stock.`uniqueid`='$uid' ) ")or die(mysql_error());
$res=mysql_fetch_array($fetch);
echo $price=$res[$typ];
?>