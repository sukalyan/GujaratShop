<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	
	$date=date("Y-m-d");
	$time=$_SESSION['time']=time();
	//$type=htmlentities($_REQUEST['type']);
	//$address=htmlentities($_REQUEST['address']);
	$type=htmlentities($_REQUEST['type']);
	if($type==3){ $typ="retailer_price";}
elseif($type==2){ $typ="distributer_price";}
else{ $typ="price";} 
	$uid1=$_REQUEST['pdval'];
	$qun1=$_REQUEST['quantity'];
	$price1=$_REQUEST['pric'];
	$barcode1=$_REQUEST['barcode'];
	
	//$check=$_REQUEST['check'];
	//var_dump($barcode1);
	//var_dump($price1);
	//var_dump($qun1);
	//var_dump($price1);
	//var_dump($uid1);
	//var_dump($check);
	
	foreach($barcode1 as $key => $value)
    {
	 $barcode=$value;
	 $price=$price1[$key];
	 $qun=$qun1[$key];
	 $uid=$uid1[$key];
	 $pr1=$price/$qun;
	 $pr=number_format((float)$pr1, 2, '.', '');
	 //$ch=$check[$key];
	if( $uid!="" && $qun!="" && $price!=""  && $price!=0)
	{
	    $fetch=mysql_query("select * from `stock` where `uniqueid`='$uid'");
	    $res=mysql_fetch_array($fetch);
	    $pid=$res['product_id'];
	   //echo "insert into `sell` set billid='$time',`name`='$name',`productid`='$pid',`quantity`='$qun',`price`='$price',`barcode`='$barcode',`address`='$address',`uniqueid`='$uid',`checked`='$ch'";
	   mysql_query("insert into `sell` set `billid`='$time',`name`='$name',`productid`='$pid',`quantity`='$qun',`price`='$pr',`totprice`='$price',`barcode`='$barcode',`date`='$date',`address`='$address',`uniqueid`='$uid',`checked`='$ch'");
	   // echo "insert into `transaction` set `amount`='$price',`billid`='$time',`date`='$date'";
	    mysql_query("insert into `transaction` set `amount`='$price',`billid`='$time',`date`='$date',`uniqueid`='$uid'");
	    
	    //calculation for available//
	    //echo "select sum(`quantity`) as quant from `stock` where `barcode`='$barcode' and `product_id`='$pid' and `price` like '$price'";
$sql=mysql_query("select sum(`quantity`) as quant from `stock` where `barcode`='$barcode' and `product_id`='$pid' and `$typ` like'$price'")or die(mysql_error());
$ress=mysql_fetch_array($sql);
$stockquant=$ress['quant'];
$sqlsel=mysql_query("select *,sum(`quantity`) as qty from `sell` where `barcode`='$barcode' and `price` like '$price' and `productid`='$pid'")or die(mysql_error());
$ressel=mysql_fetch_array($sqlsel);
$sellquant=$ressel['qty'];
$less=$stockquant-$sellquant;
//echo "<br/>"."--".$stockquant;
//echo "<br/>"."sell".$sellquant;
//echo "<br/>".$less."avlquanty";
$sqlproname=mysql_query("select * from `product` where `id`='$pid'");
$resproname=mysql_fetch_array($sqlproname);
mysql_query("delete from `final` where `product_id`='$pid' and `price` like '$pr'");
//echo "<br/>"."insert into `final` set `product_id`='$pid',`quantity`='$less',`price`='$pr',`date`='$date'";
mysql_query("insert into `final` set `product_id`='$pid',`quantity`='$less',`price`='$pr',`date`='$date'");
//end calculation for available//
	}else{}
    }
	$t=$time;
	unset($_SESSION['time']);
	header("location:billredirect1.php?bid=$t&type=$type");
}
?>