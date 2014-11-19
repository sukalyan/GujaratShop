<?php
include_once('function.php');
$uid=$_GET['cid'];
$fetch=mysql_query("select * from `rest` where `custid`='$uid'");
	    $res=mysql_fetch_array($fetch);
	    echo $rest1=$res['rest'];
?>