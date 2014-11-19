<?php
include_once('function.php');
$uid=$_GET['id1'];
//echo "delete from `purchase` where `uniqueid`='$uid'";
$rdate=date('Y-m-d');
mysql_query("delete from `purchase` where `uniqueid`='$uid'");

$fetch=mysql_query("select * from `purchase` where `uniqueid`='$uid'");
$res=mysql_fetch_array($fetch);
$num=mysql_numrows($fetch);
if($num>0){

$vendor_id=$res['vendor_id'];
$product_id=$res['product_id'];
$quantity=$res['quantity'];
$freequantity=$res['freequantity'];
$totalquantity=$res['totalquantity'];
$mrp=$res['mrp'];
$price=$res['price'];
$totalprice=$res['totalprice'];
$specialdiscount=$res['specialdiscount'];
$dealerdiscount=$res['dealerdiscount'];
$schemediscount=$res['schemediscount'];
$tax=$res['tax'];
$totaltax=$res['totaltax'];
$totalamount=$res['totalamount'];
$date=$res['date'];
$bar=$res['bar'];
$category=$res['category'];
$company=$res['company'];
$uniqueid=$res['uniqueid'];
$order_no=$res['order_no'];
mysql_query("insert into `return` set `vendor_id`='$vendor_id',`product_id`='$product_id',`quantity`='$quantity',`freequantity`='$freequantity',
`totalquantity`='$totalquantity',`mrp`='$mrp',`price`='$price',`totalprice`='$totalprice',`specialdiscount`='$specialdiscount',`dealerdiscount`='$dealerdiscount',
`schemediscount`='$schemediscount',`tax`='$tax',`totaltax`='$totaltax',`totalamount`='$totalamount',`date`='$date',`bar`='$bar',
`category`='$category',`company`='$company',`uniqueid`='$uniqueid',`order_no`='$order_no',`return_date`='$rdate'") or die(mysql_error());

mysql_query("delete from `purchase` where `uniqueid`='$uid'");
$msg="sucessfully returened";
}
header("location:return.php?msg=$msg")
?>