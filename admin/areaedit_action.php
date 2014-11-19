<?php
include_once("function.php");
if(isset($_POST['submit']))
{
    $area=htmlentities($_REQUEST['area']);
    $phone=htmlentities($_REQUEST['phone']);
    $fatname=htmlentities($_REQUEST['fatname']);
    $dob=htmlentities($_REQUEST['dob']);
    $age=htmlentities($_REQUEST['age']);
    $year=htmlentities($_REQUEST['year']);
    $sex=htmlentities($_REQUEST['sex']);
    $address=htmlentities($_REQUEST['address']);
    $location=htmlentities($_REQUEST['location']);
    $occupation=htmlentities($_REQUEST['occupation']);
    $iproof=htmlentities($_REQUEST['iproof']);
    $email=$_REQUEST['email'];
    $slno=$_REQUEST['slno'];

    mysql_query("update `area` set `area`='$area',`phone`='$phone'
                ,`fatname`='$fatname',`dob`='$dob',`age`='$age' ,`year`='$year',`sex`='$sex',`address`='$address'
                ,`location`='$location',`occupation`='$occupation',`iproof`='$iproof',`email`='$email' where `slno`='$slno'") or die(mysql_error());
				
    $msg="sucessfully Updated";
	 
}
header("location:area.php?msg=$msg");
?>
