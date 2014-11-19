<?php
include_once('function.php');
	$barcode=htmlentities($_POST['barcode'],ENT_QUOTES);
	$category=htmlentities($_POST['category'],ENT_QUOTES);
	$company=htmlentities($_POST['company'],ENT_QUOTES);
	$product=htmlentities($_POST['product'],ENT_QUOTES);
	$unit=htmlentities($_POST['unit'],ENT_QUOTES);
	
	$mrp=htmlentities($_POST['mrp'],ENT_QUOTES);
	
	
	$date=date('Y-m-d');
	$uid=uniqid();
	$fetch=mysql_query("select * from `product` where `prod_name`='$product'") or die(mysql_error());
	$res=mysql_num_rows($fetch);
	if($res==0)
	{ 
	mysql_query("insert into `product` set `prod_name`='$product'");
	}
	//find prodid
//echo "select * from `product` where `prod_name`='$product'";
	$fetch1=mysql_query("select * from `product` where `prod_name`='$product'")or die(mysql_error());
	$res1=mysql_fetch_array($fetch1);
	$pid=$res1['id'];
	
	if($barcode!="" && $category!="" && $product!="" && $pid!="")
	{
/*echo "insert into `readystock` set `bar`='$barcode', `category`='$category' ,`company`='$company' ,`product`='$product',`mrp`='$mrp',`costprice`='$price',`distributer`='$pricedistributer' ,`retailer`='$priceretailer',`unit`='$unit'";*/
	$msg="sucessfully message";
	mysql_query("insert into `readystock` set `bar`='$barcode', `category`='$category' ,`company`='$company' ,`product`='$pid',`product_name`='$product',`mrp`='$mrp',`costprice`='$price',`distributer`='$pricedistributer' ,`retailer`='$priceretailer',`unit`='$unit',`type`='1'");
	$msg="sucessfully inserted";
	}
	header("location:readymade.php?msg=$msg");
?>