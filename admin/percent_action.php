<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	$retail=$_REQUEST['retailer_pcnt'];
	$distributer=$_REQUEST['distributer_pcnt'];
	$customer=$_REQUEST['customer_pcnt'];
	$fetch=mysql_query("select * from percent");
	$res=mysql_num_rows($fetch);
	if($res==0){
	mysql_query("insert into `percent` set `retailer`='$retail',`distributer`='$distributer',`customer`='$customer'");
	}else{mysql_query("update `percent` set `retailer`='$retail',`distributer`='$distributer',`customer`='$customer' where `slno`='1'"); }
	$msg="sucessfully Updated";
	header("location:percentage.php?msg=$msg");
}
?>