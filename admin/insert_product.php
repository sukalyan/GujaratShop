<?php
include_once('function.php');
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	$sql=mysql_query("select * from `product` where `prod_name`='$pname'");
	$num=mysql_num_rows($sql);
	if($num==0){
	    mysql_query("insert into `product` set `prod_name`='$pname'");
		$msg="Successfully Added";
		}
		else
		{
		$msg="It is already exist";
		}
		header("location:addproduct.php?msg=$msg");
?>