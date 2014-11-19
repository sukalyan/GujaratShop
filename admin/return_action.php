<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	$free=htmlentities($_REQUEST['free']);
	$freereturn=htmlentities($_REQUEST['returnfree']);
	 $quntity=htmlentities($_REQUEST['quntity']);
	  $returnquntity=htmlentities($_REQUEST['returnquntity']);
	  $total=htmlentities($_REQUEST['total']);
	$sold=$_REQUEST['sold'];
	$uid=$_REQUEST['huid'];
	$aval=$total-$sold;
	if($aval>=($freereturn+$returnquntity))
	{
	$avltotal=$total-($freereturn+$returnquntity);
	$sqlpurchase=mysql_query("select * from `purchase`  where `uniqueid`='$uid'");
	$fetchpurchase=mysql_fetch_array($sqlpurchase);
	$vendorid=$fetchpurchase['vendor_id'];
	$mrp=$fetchpurchase['mrp'];
	$date=date("Y-m-d");
	
	if(isset($_REQUEST['returnfree'])>0 && $free>=$freereturn)
	{
	$avlfree=$free-$freereturn;
	if($avlfree<$aval)
	{
	//echo "update `purchase` set `freequantity`='$avlfree',`totalquantity`='$avltotal' where `uniqueid`='$uid'";
	//echo "update `stock` set `quantity`='$avltotal' where `uniqueid`='$uid'";
	mysql_query("update `purchase` set `freequantity`='$avlfree',`totalquantity`='$avltotal' where `uniqueid`='$uid'");
	mysql_query("update `stock` set `quantity`='$avltotal' where `uniqueid`='$uid'");
	$msg="sucessfully Updated";
	}
	}
	if(isset($_REQUEST['returnquntity'])>0 && $quntity>=$returnquntity)
	{
	$avlquantity=$quntity-$returnquntity;
	if($avlquantity<$aval)
	{
	//echo "update `purchase` set `quantity`='$avlquantity',`totalquantity`='$avltotal' where `uniqueid`='$uid'";
	mysql_query("update `purchase` set `quantity`='$avlquantity',`totalquantity`='$avltotal' where `uniqueid`='$uid'");
	$msg="sucessfully Updated";
	
	$sqlstock=mysql_query("select * from `stock`  where `uniqueid`='$uid'");
	$fetch=mysql_fetch_array($sqlstock);
	$stqun=$fetch['quantity'];
	if($stqun>$qunt)
	{
		$amount=$returnquntity*$mrp;
	//echo "update `stock` set `quantity`='$avltotal' where `uniqueid`='$uid'";
	mysql_query("update `stock` set `quantity`='$avltotal' where `uniqueid`='$uid'");
	mysql_query("insert into `transaction` set `vendor_id`='$vendorid',`amount`='$amount',`date`='$date'");
	}else{ $msg="failed";}
	}
	}
	}else{ $msg="failed";}
	header("location:return.php?msg=$msg");
}
?>