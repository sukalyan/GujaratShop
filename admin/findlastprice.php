<?php
include_once('function.php');
$bar=$_GET['bar'];
//echo "select max(id) as id from `stock` where `barcode`='$bar'";
$fetch=mysql_query("select max(id) as id from `stock` where `barcode`='$bar'");
$res=mysql_fetch_array($fetch);
$slno=$res['id'];

$fetchsql=mysql_query("select * from `stock` where `id`='$slno'");
$ressql=mysql_fetch_array($fetchsql);
echo $data=$ressql['price']."|".$ressql['retailer_price']."|".$ressql['distributer_price'];
?>