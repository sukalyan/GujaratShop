<?php
include_once('function.php');
$path='shop_gujrat/admin'.date("d-m-Y").'.sql';
$text = file_get_contents($path);
header("Content-Disposition: attachment; filename=\"$path\"");
echo $text;
?>
