<?php
include_once('function.php');
$date=date("Y-m-d");
	$id=$_POST['hdvendval'];
	$amt=$_POST['amt'];
	$amount="-".$amt;
	//echo "insert into `transaction` set `vendor_id`='$id',`amount`='$amount',`date`='$date'";
	mysql_query("insert into `transaction` set `vendor_id`='$id',`amount`='$amount',`date`='$date'");
	$msg="payment sucessfully";
		header("location:payment.php?msg=$msg");
?>