<?php
include_once('function.php');
	$code=htmlentities($_POST['bar'],ENT_QUOTES);
	$quant=htmlentities($_POST['quant'],ENT_QUOTES);
	$retailerprice=htmlentities($_POST['priceretailer'],ENT_QUOTES);
	$distributerprice=htmlentities($_POST['pricedistributer'],ENT_QUOTES);
	$customerprice=htmlentities($_POST['price'],ENT_QUOTES);
	
	 $pid=htmlentities($_POST['hpid'],ENT_QUOTES);
	 $company=htmlentities($_POST['hcomp'],ENT_QUOTES);
	 $category=htmlentities($_POST['hcat'],ENT_QUOTES);
	 $hvidval=htmlentities($_POST['hvid'],ENT_QUOTES);
	 
	  $hqnt=htmlentities($_POST['hqnt'],ENT_QUOTES);
	  $hfree=htmlentities($_POST['hfree'],ENT_QUOTES);
	   $hdmrp=htmlentities($_POST['mrp'],ENT_QUOTES);
	    $hprc=htmlentities($_POST['orgprice'],ENT_QUOTES);
	  $hdisc=htmlentities($_POST['hdisc'],ENT_QUOTES);
	$hdisc1=htmlentities($_POST['hdisc1'],ENT_QUOTES);
	$hdisc2=htmlentities($_POST['hdisc2'],ENT_QUOTES);
	$hdtax=htmlentities($_POST['hdtax'],ENT_QUOTES);
       // $orderno=$_POST['ordername'];
	
	 $date=date('Y-m-d');
	 $uid=uniqid();
	 $pr=$quant*$hprc;
	 $tot=$hqnt*$hprc;
	 $discount=$hdisc+$hdisc1+$hdisc2;
	$totdiscount=$tot*($discount/100);
	$tottax=$tot*($hdtax/100);
	$totalval=$tot-$totdiscount+$tottax;
	//$totamount=$totamount+$totalval;
	    //echo "insert into `stock` set `product_id`='$pid',`quantity`='$quant',`price`='$customerprice',`retailer_price`='$retailerprice',`distributer_price`='$distributerprice',`totprice`='$pr',`barcode`='$code',`uniqueid`='$uid',`date`='$date',`cat`='$category',`comp`='$company'";
	   mysql_query("insert into `stock` set `product_id`='$pid',`quantity`='$quant',`price`='$customerprice',`retailer_price`='$retailerprice',`distributer_price`='$distributerprice',`totprice`='$pr',`barcode`='$code',`uniqueid`='$uid',`date`='$date',`cat`='$category',`comp`='$company',`order_no`='$orderno'")or die(mysql_error());
	   mysql_query("update `product` set `barcode`='$code' where `id`='$pid'");
           //echo "insert into `purchase` set `product_id`='$pid',`quantity`='$hqnt',`freequantity`='$hfree',`totalquantity`='$quant',`mrp`='$hdmrp',`price`='$hprc',`totalprice`='$tot',`specialdiscount`='$hdisc',`dealerdiscount`='$hdisc1',`schemediscount`='$hdisc2',`tax`='$hdtax',`totaltax`='$tottax',`totalamount`='$totalval',`date`='$date',`bar`='$code',`category`='$category',`company`='$company',`uniqueid`='$uid'";
	  mysql_query("insert into `purchase` set `vendor_id`='$hvidval',`product_id`='$pid',`quantity`='$hqnt',`freequantity`='$hfree',`totalquantity`='$quant',`mrp`='$hdmrp',`price`='$hprc',`totalprice`='$tot',`specialdiscount`='$hdisc',`dealerdiscount`='$hdisc1',`schemediscount`='$hdisc2',`tax`='$hdtax',`totaltax`='$tottax',`totalamount`='$totalval',`date`='$date',`bar`='$code',`category`='$category',`company`='$company',`uniqueid`='$uid'") or die(mysql_error());
	  mysql_query("insert into `transaction` set `vendor_id`='$hvidval',`amount`='$totalval',`date`='$date'");
		$msg="Successfully Added";
		
		header("location:purchase_order.php");
?>