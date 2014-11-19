<?php
include_once('function.php');
$code=$_GET['codeval'];
$pid=$_GET['pid'];
$totqnt=$_GET['totqnt'];
$mrvl=$_GET['mrvl'];
$privl=$_GET['privl'];
$tprc=$_GET['tprc'];
$hdcom=$_GET['hdcom'];
$hdcat=$_GET['hdcat'];
$venid=$_GET['ven'];

 $uid=uniqid();
 $date=date('Y-m-d');
 
 $mrpval=$mrvl-$privl;
$sql=mysql_query("select * from `percent`");
$res2=mysql_fetch_array($sql);
$retailer=$res2['retailer'];
$distributer=$res2['distributer'];
$customer=$res2['customer'];
$aret=$mrpval*($retailer/100);
$ret1=$privl+$aret;
$ret=number_format((float)$ret1, 2, '.', ''); 
$adis=$mrpval*($distributer/100);
$dis1=$privl+$adis;
$dis=number_format((float)$dis1, 2, '.', ''); 
$acust=$mrpval*($customer/100);
$cust1=$privl+$acust;
$cust=number_format((float)$cust1, 2, '.', ''); 

 $qt=$_GET['qt'];
	  $frqt=$_GET['frqt'];
	  $hdisc=$_GET['specdiscnt'];
	$hdisc1=$_GET['dedisc'];
	$hdisc2=$_GET['scemdisc'];
	$hdtax=$_GET['txxval'];
	$hdtottax=$_GET['ttaxx'];
	$totamnt=$_GET['totamnt'];
mysql_query("insert into `stock` set `product_id`='$pid',`quantity`='$totqnt',`price`='$cust',`retailer_price`='$ret',`distributer_price`='$dis',`totprice`='$tprc',`barcode`='$code',`uniqueid`='$uid',`date`='$date',`cat`='$hdcat',`comp`='$hdcom'");
mysql_query("insert into `transaction` set `vendor_id`='$venid',`amount`='$totamnt',`date`='$date'");
mysql_query("insert into `purchase` set `vendor_id`='$venid',`product_id`='$pid',`quantity`='$qt',`freequantity`='$frqt',`totalquantity`='$totqnt',`mrp`='$mrvl',`price`='$privl',`totalprice`='$tprc',`specialdiscount`='$hdisc',`dealerdiscount`='$hdisc1',`schemediscount`='$hdisc2',`tax`='$hdtax',`totaltax`='$hdtottax',`totalamount`='$totamnt',`date`='$date',`bar`='$code',`category`='$hdcat',`company`='$hdcom',`uniqueid`='$uid'");
?>