<?php
include_once('function.php');
	$code=$_POST['bar'];
	$quant=$_POST['quant'];
	$retailerprice=$_POST['priceretailer'];
	$distributerprice=$_POST['pricedistributer'];
	$customerprice=$_POST['price'];

	 $pid=$_POST['hpid'];
	 $company=$_POST['comid'];
	 $category=$_POST['catid'];
           $huid=$_POST['uid'];
           $order=$_POST['order'];
           //var_dump($code);
            //var_dump($quant);
            //var_dump($retailerprice);
             // var_dump($distributerprice);
              //var_dump($customerprice);
               // var_dump($pid);
               // var_dump($company);
               // var_dump($category);
               // var_dump($huid);
	
	  $date=date('Y-m-d');
         foreach($code as $key => $value)
    {
         $barcode=$value;
	 $product=$pid[$key];
	 $quan=$quant[$key];
	 
	 
         $rpdisc=$retailerprice[$key];
	 $ddisc=$distributerprice[$key];
	 $cdisc=$customerprice[$key];
         $uid=$huid[$key];
          $catid=$category[$key];
          $compid=$company[$key];
          $orderno=$order[$key];
	 
	//echo "insert into `stock` set `product_id`='$product',`quantity`='$quan',`price`='$cdisc',`retailer_price`='$rpdisc',`distributer_price`='$ddisc',`totprice`='',`barcode`='$barcode',`uniqueid`='$uid',`date`='$date',`cat`='$catid',`comp`='$compid'";
	   mysql_query("insert into `stock` set `product_id`='$product',`quantity`='$quan',`price`='$cdisc',`retailer_price`='$rpdisc',`distributer_price`='$ddisc',`totprice`='',`barcode`='$barcode',`uniqueid`='$uid',`date`='$date',`cat`='$catid',`comp`='$compid',`order_no`='$orderno'")or die(mysql_error());
	  // mysql_query("update `product` set `barcode`='$code' where `id`='$pid'");
    }
		
		header("location:purchase_order.php");
?>