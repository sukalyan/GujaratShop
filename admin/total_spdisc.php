<?php
include_once('function.php');
$spdscval=$_GET['spdscval'];
$totprc=$_GET['totprc'];
$tot=$totprc*($spdscval/100);
//$totsp=$totprc-$tot;
echo $tot;
?>
