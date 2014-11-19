<?php
include_once("function.php");
$id=$_GET['id1'];
mysql_query("delete from `stock` where `id`='$id'");
$msg="successfully deleted";
header("location:addstock.php?msg=$msg");
?>
