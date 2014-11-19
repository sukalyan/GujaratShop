<?php
include_once('function.php');
 if(isset($_POST['submit']))
    {
	$name=htmlentities($_REQUEST['name']);
	$phone=htmlentities($_REQUEST['phone']);
	$fatname=htmlentities($_REQUEST['fatname']);
	$dob=htmlentities($_REQUEST['dob']);
	$age=htmlentities($_REQUEST['age']);
	$year=htmlentities($_REQUEST['year']);
	$sex=htmlentities($_REQUEST['sex']);
	$address=htmlentities($_REQUEST['address']);
	$location=htmlentities($_REQUEST['location']);
	$occupation=htmlentities($_REQUEST['occupation']);
	$introducer=htmlentities($_REQUEST['introducer']);
	$iproof=htmlentities($_REQUEST['iproof']);
	
	
	$email=htmlentities($_REQUEST['email']);
	$slno=htmlentities($_REQUEST['slno']);
	
	if($name!="" && $phone!="" && $address!="")
	{
	    echo "update `vendor` set `name`='$name',`phone`='$phone',`father`='$fatname',`dob`='$dob'
			,`age`='$age',`year`='$year',`sex`='$sex',`address`='$address',`location`='$location',`occupation`='$occupation'
			,`introducer`='$introducer',`identity`='$iproof' where `slno`='$slno'";
	    mysql_query("update `vendor` set `name`='$name',`phone`='$phone',`father`='$fatname',`dob`='$dob'
			,`age`='$age',`year`='$year',`sex`='$sex',`address`='$address',`location`='$location',`occupation`='$occupation'
			,`introducer`='$introducer',`identity`='$iproof',`email`='$email' where `slno`='$slno'");
	    $msg="sucessfully updated";
	}
	header("location:customer.php?msg=$msg");
    }
?>