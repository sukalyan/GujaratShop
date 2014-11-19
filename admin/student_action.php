<?php
include_once("function.php");
if(isset($_POST['submit']))
{
    $area=htmlentities($_REQUEST['area']);
    $address=htmlentities($_REQUEST['address']);
    $fetch=mysql_query("select * from `area` where `area`='$area'");
    $res=mysql_numrows($fetch);
    if($res==0)
    {
    mysql_query("insert into `area` set `area`='$area',`address`='$address'");
    $msg="sucessfully inserted";
    }
}
header("location:area.php?msg=$msg");
?>
