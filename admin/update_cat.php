<?php
include_once('function.php');
	$hdid=$_POST['hd_nm'];
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	    mysql_query("update `category` set `cat_name`='$pname' where `id`='$hdid'");
		$msg="Successfully Updated";
		header("location:addcategory.php?msg=$msg");
?>