<?php
include_once('function.php');
$taxval=$_GET['taxval'];
$totprval=$_GET['totprval'];
$tot=$totprval*($taxval/100);
echo $tot;
?>
