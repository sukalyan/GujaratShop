<?php
include_once('function.php');
	$hdid=$_POST['hdid'];
	$pname=htmlentities($_POST['pname'],ENT_QUOTES);
	$quant=htmlentities($_POST['quant'],ENT_QUOTES);
	$retailerprice=htmlentities($_POST['retailerprice'],ENT_QUOTES);
	$distributerprice=htmlentities($_POST['distributerprice'],ENT_QUOTES);
	$price=htmlentities($_POST['price'],ENT_QUOTES);
	if($pname!="" && $quant!="" && $price!=""){
	    $pri=$quant*$price;
	    mysql_query("update `stock` set `quantity`='$quant',`retailer_price`='$retailerprice',`distributer_price`='$distributerprice',`price`='$price',`totprice`='$pri' where `id`='$hdid'");
		$msg="Successfully Updated";
		}
		else
		{
			$msg="Please enter required fields";
		}
		header("location:addstock.php?msg=$msg");
?>