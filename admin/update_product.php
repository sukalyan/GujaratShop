<?php
include_once('function.php');
	$hdid=$_POST['hd_nm'];
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	$catname=htmlentities($_POST['catname'],ENT_QUOTES);
	$compname=htmlentities($_POST['compname'],ENT_QUOTES);
        
        $reatiler=$_POST['retailer_pcnt'];
        $distributer=$_POST['distributer_pcnt'];
        $customer=$_POST['customer_pcnt'];
	$min=$_POST['min'];
	    mysql_query("update `product` set `prod_name`='$pname',`category`='$catname',`company`='$compname',`minimum`='$min',`retailer`='$reatiler',`distributer`='$distributer',`customer`='$customer' where `id`='$hdid'");
		$msg="Successfully Updated";
		header("location:product.php?msg=$msg");
?>