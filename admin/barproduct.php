<?php
include_once('function.php');
$bar=$_GET['bar'];
$prid=$_GET['prid'];
mysql_query("update `product` set `barcode`='$bar' where `id`='$prid'");
?>