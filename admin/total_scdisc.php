<?php
include_once('function.php');
$dscval=$_GET['dscval'];
$spp=$_GET['spp'];
$dsp=$_GET['dsp'];
$toto=$dscval+$spp+$dsp;
$totprc=$_GET['totprc'];
$tot=$totprc*($toto/100);
//$totdsc=$totprc-$tot;
echo $tot;
?>
