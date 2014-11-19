<?php
include_once('function.php');
	$hdval=$_POST['hdval'];
	$hdvendval=$_POST['hdvendval'];
	$pname=htmlentities($_POST['pname'],ENT_QUOTES);
	$quant=htmlentities($_POST['quant'],ENT_QUOTES);
	$price=htmlentities($_POST['price'],ENT_QUOTES);
	if($hdvendval!="" && $quant!=""){
	    mysql_query("update `purchase` set `vendor_id`='$hdvendval',`product_id`='$pname',`quantity`='$quant' where `id`='$hdval'");
		$msg="Successfully Updated";
		}
		else
		{
			$msg="Please enter required fields";
		}
		header("location:purchase_order.php?msg=$msg");
?>