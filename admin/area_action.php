<?php
include_once("function.php");
if(isset($_POST['submit']))
{
    
    $introducer=htmlentities($_REQUEST['introducer']);
    $area=htmlentities($_REQUEST['area']);
    
    $phone=htmlentities($_REQUEST['phone']);
    $fatname=htmlentities($_REQUEST['fatname']);
    $dob=htmlentities($_REQUEST['dob']);
    $age=htmlentities($_REQUEST['age']);
    $year=htmlentities($_REQUEST['year']);
    $sex=htmlentities($_REQUEST['sex']);
    $location=htmlentities($_REQUEST['location']);
    $occupation=htmlentities($_REQUEST['occupation']);
    $iproof=htmlentities($_REQUEST['iproof']);
    
    $email=htmlentities($_REQUEST['email']);
    //$amount=htmlentities($_REQUEST['amount']);
    $address=htmlentities($_REQUEST['address']);
    
    $fetchcount=mysql_query("select * from `area`");
    $rescount=mysql_numrows($fetchcount);
    if($rescount==0)
    {
	$id=10000;
    }else{ $id=$_REQUEST['id'];}
    $fetch=mysql_query("select * from `area` where `name`='$introducer'");
    $res=mysql_numrows($fetch);
    if($res==0)
    {
	//echo "insert into `area` set `introducer_name`='$introducer',`introducer_id`='$id', `area`='$area',`address`='$address'";
    mysql_query("insert into `area` set `introducer_name`='$introducer',`introducer_id`='$id', `area`='$area',`phone`='$phone',`fatname`='$fatname'
		,`dob`='$dob',`age`='$age',`year`='$year',`sex`='$sex',`location`='$location',`occupation`='$occupation',`email`='$email'
		,`iproof`='$iproof',`address`='$address'") or die(mysql_error());
    $msg="sucessfully inserted";
    }
}
header("location:area.php?msg=$msg");
?>
