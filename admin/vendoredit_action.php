<?php
include_once('function.php');
 if(isset($_POST['submit']))
    {
	$name=htmlentities($_REQUEST['name']);
	$phone=htmlentities($_REQUEST['phone']);
	$address=htmlentities($_REQUEST['address']);
	$email=htmlentities($_REQUEST['email']);
	$id=htmlentities($_REQUEST['hid']);
	
	
	   // echo "update `vendor` set `name`='$name',`phone`='$phone',`address`='$address',`email`='$email' where `slno`='$id'";
	    mysql_query("update `vendor` set `name`='$name',`phone`='$phone',`address`='$address',`email`='$email' where `slno`='$id'");
	    $msg="sucessfully updated";
	
	header("location:vendor.php?msg=$msg");
    }
?>