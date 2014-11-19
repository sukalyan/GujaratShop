<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	$amount=$_REQUEST['restamt'];
	$cid=$_REQUEST['hid'];
	$tamount=$_REQUEST['restamt1'];
	if($amount==$tamount)
	{
		echo "delete from `rest` where `custid`='$cid'";
		mysql_query("delete from `rest` where `custid`='$cid'");
		$msg="sucessfully paid";
	}
	if($amount<$tamount)
	{
		$total=$tamount-$amount;
		echo "update `rest` set `rest`='$total' where `custid`='$cid'";
	mysql_query("update `rest` set `rest`='$total' where `custid`='$cid'");
	$msg="sucessfully updated";
	}
header("location:payrest.php?msg=$msg");
}
?>