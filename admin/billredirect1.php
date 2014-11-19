<?php
include_once('function.php');
$billid=$_GET['bid'];
$type=$_GET['type'];
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
 window.onload=function()
 {
     var bill=<?php echo $billid; ?>;
      var typ=<?php echo $type; ?>;
     window.open("bill.php?bid="+bill+'&type='+typ);
	//document.location.href="bill.php?bid="+bill;
        window.location.href = 'usersell.php';
    };
</script>