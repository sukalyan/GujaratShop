<?php
include_once('function.php');
	$hdid=$_POST['hd_nm'];
	$pname=htmlentities($_POST['name'],ENT_QUOTES);
	    mysql_query("update `company` set `comp_name`='$pname' where `id`='$hdid'");
		$msg="Successfully Updated";
		header("location:addcompany.php?msg=$msg");
?>