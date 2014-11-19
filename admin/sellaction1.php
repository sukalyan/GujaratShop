<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	
	$date=date("Y-m-d");
	$time=$_SESSION['time']=time();
	$name=htmlentities($_REQUEST['name']);
	$uid1=$_REQUEST['pdval'];
	$qun1=$_REQUEST['quantity'];
	$price1=$_REQUEST['pric'];
	$barcode1=$_REQUEST['barcode'];
	$address=htmlentities($_REQUEST['address']);
	$check=$_REQUEST['check'];
	//var_dump($barcode1);
	//var_dump($pid1);
	//var_dump($price1);
	//var_dump($qun1);
	if($name!="")
	{
	foreach($barcode1 as $key => $value)
    {
	 $barcode=$value;
	 $price=$price1[$key];
	 $qun=$qun1[$key];
	 $uid=$uid1[$key];
	 $pr=$price/$qun;
	 $ch=$check[$key];
	if($name!="" &&  $uid!="" && $qun!="" && $price!=""  && $price!=0)
	{
	    $fetch=mysql_query("select * from `stock` where `uniqueid`='$uid'");
	    $res=mysql_fetch_array($fetch);
	    $pid=$res['product_id'];
	  // echo "insert into `sell` set billid='$time',`name`='$name',`productid`='$pid',`quantity`='$qun',`price`='$price',`barcode`='$barcode',`address`='$address',`uniqueid`='$uid'";
	    mysql_query("insert into `sell` set `billid`='$time',`name`='$name',`productid`='$pid',`quantity`='$qun',`price`='$pr',`totprice`='$price',`barcode`='$barcode',`date`='$date',`address`='$address',`uniqueid`='$uid',`checked`='$ch'");
	   // echo "insert into `transaction` set `amount`='$price',`billid`='$time',`date`='$date'";
	    mysql_query("insert into `transaction` set `amount`='$price',`billid`='$time',`date`='$date',`uniqueid`='$uid'");
	}else{}
	
    }
	$t=$time;
	unset($_SESSION['time']);
	header("location:billredirect1.php?bid=$t");
    }else{
	    unset($_SESSION['time']);
	    $msg="input correct data";
	   header("location:usersell.php?msg=$msg");
	    }
}
?>