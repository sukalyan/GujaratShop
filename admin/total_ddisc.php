<?php
include_once('function.php');
$ddscval=$_GET['ddscval'];
$spval=$_GET['sp'];
$totdisc=$ddscval+$spval;
$totprc=$_GET['totprc'];
$tot=$totprc*($totdisc/100);
//$totd=$totprc-$tot;
echo $tot;
?>
