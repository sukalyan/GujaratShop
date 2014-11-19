<?php
include_once('function.php');
    $barcode=htmlentities($_REQUEST['barcode']);
    $number=htmlentities($_REQUEST['number']);
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
 window.onload=function()
 {
     var bill=<?php echo $barcode; ?>;
     var num=<?php echo $number; ?>;
	 if(bill==0 || num==0){
	  var mess="Please Enter Number Except '0'";
	   window.location.href = 'barcode_generetor.php?msg='+mess;
	 }
	 else{
     window.open("barcodeprint.php?barcode="+bill+'&number='+num);
	//document.location.href="bill.php?bid="+bill;
        window.location.href = 'barcode_generetor.php';
		}
    };
</script>