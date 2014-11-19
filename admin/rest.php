<?php
include_once('function.php');
$grand=$_GET['grand'];
$billid=$_GET['bid'];
$cash=$_GET['cash'];
$card=$_GET['card'];
$customer=$_GET['cust'];
$paid=$cash+$card;

//echo "select sum(totalprice) as total from `sell` where `billid`='$billid'";
if(isset($_GET['grand']))
{ $amount=$grand ;}else{
$fetchbill=mysql_query("select sum(totprice) as total from `sell` where `billid`='$billid'");
$resbill=mysql_fetch_array($fetchbill);
$amount=$resbill['total'];
}
//echo $amount;
//echo $cash;
//echo $card;
//echo $customer;
//echo $paid;
	    //$fetchloc=mysql_query("select * from `vendor` where `slno`='$customer'");
	    //$resloc=mysql_fetch_array($fetchloc);
	    //$locat=$resloc['location'];
	    //mysql_query("update `sell` set `name`='$customer',`address`='$locat'  where `billid`='$billid'");
echo "$amount--------$paid-----$customer";
	/*if($amount!="" && $paid!="" && $paid!="0" && $customer!="" && $paid<$amount)
	{echo "324324";*/
	   $rest=$amount-$paid;
	    
	    $fetchcust=mysql_query("select * from `vendor` where `slno`='$customer'");
	    $rescust=mysql_fetch_array($fetchcust);
	    $bal=$rescust['balance'];
	    $location=$rescust['location'];
		echo "$bal>=$rest";
	    if($bal>=$rest)
	    {
		 $balance=$bal-$rest;
		mysql_query("update `vendor` set `balance`='$balance' where `slno`='$customer'");
		 mysql_query("update `rest` set `rest`=rest+'$rest' where `custid`='$customer'");
	    }else{
	    $fetch=mysql_query("select * from `rest` where `custid`='$customer'")or die(mysql_error());
	    $res=mysql_fetch_array($fetch);
	    $num=mysql_numrows($fetch);
		echo $num;
	    if($num>0){
	    $rest1=$res['rest'];
	   echo  $trest=$rest+$rest1;
	    //echo "insert into `rest` set `custid`='$customer',`rest`='$trest'";
	    mysql_query("update `rest` set `rest`='$trest' where `custid`='$customer'");
	    }else{mysql_query("insert into `rest` set `custid`='$customer',`rest`='$rest'");
		}}

	//}
	header("location:billredirect.php?bid=$billid&grand=$grand");
?>