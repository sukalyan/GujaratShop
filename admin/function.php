<?php
ini_set('display_errors',0);
session_start();
$host='localhost';
$user='root';
$pass='colourfade';
$db='shop_inventory';
$sql=mysql_connect($host,$user,$pass) or die('database not connected'.mysql_error());
mysql_select_db($db,$sql) or die('database not selected'.mysql_error());
?>
