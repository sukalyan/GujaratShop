<?php
include_once('function.php');
$billid=$_GET['bid'];
$grand=$_GET['grand'];
$paid=$_GET['paid'];
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
 window.onload=function()
 {
     var bill=<?php echo $billid; ?>;
     var grand=<?php echo $grand; ?>;
     var pai=<?php echo $paid; ?>;
     window.open("bill.php?bid="+bill+'&grand='+grand+'&paid='+pai);
        window.location.href = 'sell.php';
    };
</script>