<?php
include_once('function.php');
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	$sql=mysql_query("select * from `category` where `cat_name`='$pname'") or die(mysql_error());
	$num=mysql_num_rows($sql);
	if($num==0){
	    mysql_query("insert into `category` set `cat_name`='$pname'")or die(mysql_error());
		$msg="Successfully Added";
		}
		else
		{
		$msg="It is already exist";
		}
		header("location:addcategory.php?msg=$msg");
?>