<?php
include_once('function.php');
 $uid=$_GET['uid'];
 $fetch=mysql_query("select * from `purchase` where `uniqueid`='$uid'");
 $num=mysql_fetch_array($fetch);
 echo $num['mrp'];
?>