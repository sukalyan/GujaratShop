<?php
include_once('function.php');
	$code=htmlentities($_POST['bar'],ENT_QUOTES);
	//echo $pname=htmlentities($_POST['pname'],ENT_QUOTES);
	$uid=htmlentities($_POST['hpid'],ENT_QUOTES);
	$quant=htmlentities($_POST['quant'],ENT_QUOTES);
	$price=htmlentities($_POST['price'],ENT_QUOTES);
	
	 $category=htmlentities($_POST['cat'],ENT_QUOTES);
	 $company=htmlentities($_POST['comp'],ENT_QUOTES);
	 
	 $orderno=$_POST['ordername'];
	
	$retailerprice=htmlentities($_POST['priceretailer'],ENT_QUOTES);
	$distributerprice=htmlentities($_POST['pricedistributer'],ENT_QUOTES);
	$date=date('Y-m-d');
	//$uid=uniqid();
	$fetch=mysql_query("select * from `purchase` where `uniqueid`='$uid'");
	$res=mysql_fetch_array($fetch);
	$pid=$res['product_id'];
	
	$fetch1=mysql_query("select * from `product` where `id`='$pid'")or die(mysql_error());
	$res1=mysql_fetch_array($fetch1);
	$pname=$res1['prod_name'];
	if($pname!="" && $quant!="" && $price!="")
	{
	    $pr=$quant*$price;
	   //echo "select * from `stock` where  `uniqueid`='$uid' and `product_id`='$pid' and `price` like '$price'";
	    $sqll=mysql_query("select * from `stock` where  `uniqueid`='$uid'")or die(mysql_error());
	    $num=mysql_num_rows($sqll);
	$fetchamount=mysql_fetch_array($sqll);
	if($num==0){
	    //echo "insert into `stock` set `product_id`='$pid',`quantity`='$quant',`price`='$price',`retailer_price`='$retailerprice',`distributer_price`='$distributerprice',`totprice`='$pr',`barcode`='$code',`uniqueid`='$uid',`date`='$date',`cat`='$category',`comp`='$company'";
	   mysql_query("insert into `stock` set `product_id`='$pid',`quantity`='$quant',`price`='$price',`retailer_price`='$retailerprice',`distributer_price`='$distributerprice',`totprice`='$pr',`barcode`='$code',`uniqueid`='$uid',`date`='$date',`cat`='$category',`comp`='$company',`order_no`='$orderno'")or die(mysql_error());
		$msg="Successfully Added";
		}
		else
		{
		    $quant1=$quant+$fetchamount['quantity'];
		    //echo "update  `stock` set `quantity`='$quant1' where `uniqueid`='$uid'";
		    mysql_query("update  `stock` set `quantity`='$quant1' where `uniqueid`='$uid'")or die(mysql_error());
		}

		}
		else
		{
		$msg="Please enter required fields";
		}
		
		header("location:addstock.php?msg=$msg");
?>