<?php
include_once('function.php');
$pid=$_GET['pidval'];
$sqlpurchase=mysql_query("select sum(totalquantity) as quant from `purchase` where `uniqueid`='$pid'");
$respurchase=mysql_fetch_array($sqlpurchase);
$purquntity=$respurchase['quant'];
$sqlstock=mysql_query("select sum(quantity) as quantt from `stock` where `uniqueid`='$pid'");
$resstock=mysql_fetch_array($sqlstock);
$stckquntity=$resstock['quantt'];
$avlquant=$purquntity-$stckquntity;
?>
<input type="text" name="qty" value="<?php echo $avlquant;?>" style="width:60px;" id="quantt" readonly="true"/>
