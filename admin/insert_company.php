<?php
include_once('function.php');
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	$sql=mysql_query("select * from `company` where `comp_name`='$pname'");
	$num=mysql_num_rows($sql);
	if($num==0){
	    mysql_query("insert into `company` set `comp_name`='$pname'");
		$msg="Successfully Added";
		}
		else
		{
		$msg="It is already exist";
		}
		header("location:addcompany.php?msg=$msg");
?>