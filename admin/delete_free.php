<?php
include_once('function.php');
$slnoo=$_GET['slnoo'];
mysql_query("delete from `freestock` where `slno`='$slnoo'");
?>