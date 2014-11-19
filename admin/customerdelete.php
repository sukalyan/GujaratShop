<?php
include_once("function.php");
$id=$_GET['id1'];
$res=mysql_query("delete from `vendor`  where `slno`='$id'");
$msg="sucessfully deleted";
header("location:customer.php?msg=$msg");
?>
