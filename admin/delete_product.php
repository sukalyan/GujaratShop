<?php
include_once("function.php");
$id=$_GET['id1'];
mysql_query("delete from `product` where `id`='$id'");
$msg="successfully deleted";
header("location:addproduct.php?msg=$msg");
?>
