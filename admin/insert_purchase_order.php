<?php
		include_once('function.php');
		mysql_query("delete from `tempuid`");
		
		
		 $vname=$_POST['hdvendval'];
		  $compname=$_POST['hcompid'];
		   $catname=$_POST['hcatid'];
		 $bar=$_POST['bar'];
		 $pname=$_POST['prod'];
		 $pidval=$_POST['hdprod'];
		 $quant=$_POST['quant'];
		 $freequant=$_POST['freequant'];
		  $totquant=$_POST['totquant'];
		   $mrpp=$_POST['mrp'];
		    $pricc=$_POST['pric'];
			$totpric=$_POST['totpricc'];
			$spdis=$_POST['spdisc'];
			$ddis=$_POST['ddisc'];
			$scdis=$_POST['scdisc'];
			$taxx=$_POST['tax'];
			$tottaxx=$_POST['tottax'];
			$total=$_POST['total'];
			$huid=$_POST['unique'];
			 $chk=$_POST['chk'];
			$date=date('Y-m-d');
			$totamount=0;
			//var_dump($chk);
			$highpurchase=mysql_query("select max(id) as muid from `purchase`");
		        $highres=mysql_fetch_array($highpurchase);
			$order_no=1000+$highres['muid']+1;
			//$order_no=uniqid();
		//if($vname!=""){	
    foreach($bar as $key => $value)
    {
	 $barcode=$value;
	 $product=$pidval[$key];
	 $quan=$quant[$key];
	 $freequan=$freequant[$key];
	 $totquanty=$totquant[$key];
	 $mrps=$mrpp[$key];
	 $price=$pricc[$key];
	 $totprice=$totpric[$key];
	 $spdisc=$spdis[$key];
	 $ddisc=$ddis[$key];
	 $scdisc=$scdis[$key];
	 $taxxval=$taxx[$key];
	 $tottaxxval=$tottaxx[$key];
	 $totalval=$total[$key];
	 
	 $uid=$huid[$key];
	 
	 $compval=$compname[$key];
	 $catval=$catname[$key];
	 
	$totamount=$totamount+$totalval;
	
	  mysql_query("insert into `purchase` set `vendor_id`='$vname',`product_id`='$product',`quantity`='$quan',`freequantity`='$freequan',`totalquantity`='$totquanty',`mrp`='$mrps',`price`='$price',`totalprice`='$totprice',`specialdiscount`='$spdisc',`dealerdiscount`='$ddisc',`schemediscount`='$scdisc',`tax`='$taxxval',`totaltax`='$tottaxxval',`totalamount`='$totalval',`date`='$date',`bar`='$barcode',`category`='$catval',`company`='$compval',`uniqueid`='$uid',`order_no`='$order_no'") or die(mysql_error());
	  //echo "insert into `purchase` set `vendor_id`='$vname',`product_id`='$product',`quantity`='$quan',`freequantity`='$freequan',`totalquantity`='$totquanty',`mrp`='$mrps',`price`='$price',`totalprice`='$totprice',`specialdiscount`='$spdisc',`dealerdiscount`='$ddisc',`schemediscount`='$scdisc',`tax`='$taxxval',`totaltax`='$tottaxxval',`totalamount`='$totalval',`date`='$date',`bar`='$barcode',`category`='$catval',`company`='$compval',`uniqueid`='$uid'";
	 }
	 foreach($_POST['chk'] as $check)
	 {
	    //echo "insert into `tempuid` set `uid`='$check'";
	    mysql_query("insert into `tempuid` set `uid`='$check'");
	 }
	 //echo "insert into `transaction` set `vendor_id`='$vname',`amount`='$totamount',`date`='$date'";
	 mysql_query("insert into `transaction` set `vendor_id`='$vname',`amount`='$totamount',`date`='$date','desc'='product purchesed'");
	 $msg="Successfully Purchased";	
	 /*}
	 else
	 {
	 $msg="Enter a vendor name";
	 }*/
	 if($chk!="")
 {
    //echo "inside";
     header("location:stock_add.php");
 }
 else{
	 header("location:purchase_order.php?mess=$msg");
 }
?>