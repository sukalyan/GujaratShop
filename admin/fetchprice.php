<?php
include_once('function.php');
$qun=$_GET['qun'];
$bar=$_GET['bar'];
$uid=$_GET['unid'];
$type=$_GET['type'];
if($type==3){ $typ="retailer_price";}
elseif($type==2){ $typ="distributer_price";}
else{ $typ="price";} 
$fetch=mysql_query("select * from `stock` where `barcode`='$bar' and `uniqueid`='$uid'")or die(mysql_error());
$res=mysql_fetch_array($fetch);
$fetch2=mysql_query("select sum(quantity) as quantity from `stock` where `barcode`='$bar' and `uniqueid`='$uid' group by price");
$res2=mysql_fetch_array($fetch2);
$fsell=mysql_query("select sum(quantity) as sumqun from `sell` where `barcode`='$bar' and `uniqueid`='$uid'");
$rsell=mysql_fetch_array($fsell);
$freestk=mysql_query("select sum(quantity) as qunty from `freestock` where `barcode`='$bar' and `price`='$res[price]' and `product_id`='$res[product_id]'") or die(mysql_error());
$resfreestk=mysql_fetch_array($freestk);
$freestock=$resfreestk['qunty'];
$sell=$rsell['sumqun'];
$dquantity=$res2['quantity'];
$avl=$dquantity-($sell+$freestock);
//$avl=$dquantity-$sell;

if($avl>=$qun && $qun!=""){
$dprice=$res[$typ];
$price=$qun*$dprice;
//echo $dprice;
 echo $price1=number_format((float)$price, 2, '.', '');
}else{echo $price1=0;}
?>