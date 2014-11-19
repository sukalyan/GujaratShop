<?php
include_once('function.php');
$path='shop_gujrat'.date("d-m-Y").'.sql';
echo $text = file_get_contents($path);
header("Content-Disposition: attachment; filename=\"$path\"");
echo $text;
?>
