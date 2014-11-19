<?php
include_once("function.php");
$id=$_GET['id1'];
mysql_query("delete from `purchase` where `id`='$id'");
$msg="successfully deleted";
header("location:purchase_order.php?msg=$msg");
?>