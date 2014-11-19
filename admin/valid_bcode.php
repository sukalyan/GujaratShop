<?php
include_once('function.php');
$barcode=$_GET['bcodeval'];
$sqlproduct=mysql_query("select `barcode` from `product` where `barcode`='$barcode'");
$res=mysql_fetch_array($sqlproduct);
if($res['barcode']==$barcode)
{
echo "ok";
}
?>