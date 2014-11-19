<?php
include_once('function.php');
$pid=$_GET['pidval'];
$cat=$_GET['cat'];
$com=$_GET['com'];


$fetch=mysql_query("select * from `stock` where `cat`='$cat' and `comp`='$com' and `product_id`='$pid'");
echo $num=mysql_num_rows($fetch);
?>