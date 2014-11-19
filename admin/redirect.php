<?php
$code=$_GET['barcode'];
$prodname=$_GET['prod'];
$totquantity=$_GET['tot'];
$mrpp=$_GET['mrpp'];
$prcval=$_GET['prval'];
$compvall=$_GET['compvall'];
$catval=$_GET['catval'];
$vendval=$_GET['vend'];


$quantval=$_GET['quanty'];
$freeval=$_GET['free'];
//$totprval=$_GET['totprice'];
$spdiscval=$_GET['spedisc'];
$ddiscval=$_GET['ddiscnt'];
$scdiscval=$_GET['scdiscnt'];
$taxval=$_GET['tx'];
//$tottaxval=$_GET['totax'];
//$totalval=$_GET['totl'];
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
 // var ttaxval=<?php echo $tottaxval;?>;
  //var totamt=<?php echo $totalval;?>;
 //window.onload=function()
 //{
 var bar=<?php if($code==""){echo $code=0;}else{echo $code;}?>;
  var p="<?php echo $prodname;?>";
 var qty=<?php echo $totquantity;?>;
 var mpval=<?php echo $mrpp;?>;
 var pval=<?php echo $prcval;?>;
 var cmpval=<?php echo $compvall;?>;
 var catgval=<?php echo $catval;?>;
 var vendorval=<?php echo $vendval;?>;
 
  var qtyval=<?php echo $quantval;?>;
  var freeqtyval=<?php if($freeval==""){echo $freeval=0;}else{echo $freeval;}?>;
  //var prval=<?php echo $totprval;?>;
  var spdisval=<?php if($spdiscval==""){echo $spdiscval=0;}else{echo $spdiscval;}?>;
  var ddisval=<?php if($ddiscval==""){echo $ddiscval=0;}else{echo $ddiscval;}?>;
  var scdisval=<?php if($scdiscval==""){echo $scdiscval=0;}else{echo $scdiscval;}?>;
  var txval=<?php if($taxval==""){echo $taxval=0;}else{echo $taxval;}?>;
  
    window.open("stock_add.php?bcode="+bar+'&prodnm='+p+'&quant='+qty+'&mrpvals='+mpval+'&prvall='+pval+'&compy='+cmpval+'&category='+catgval+'&qt='+qtyval+'&fre='+freeqtyval+'&disc='+spdisval+'&disc1='+ddisval+'&disc2='+scdisval+'&tx='+txval+'&vid='+vendorval);
	window.location.href="purchase_order.php";
	//window.close();
 //};
</script>