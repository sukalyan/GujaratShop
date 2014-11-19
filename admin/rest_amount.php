<?php
include_once('function.php');
$cid=$_GET['slno'];

	    $fetchrest=mysql_query("select * from `rest` where `custid`='$cid'");
	    $resrest=mysql_fetch_array($fetchrest);
	    
		if($resrest['rest']>0)
		{$restamount=$resrest['rest'];}else{ $restamount=0;}
		
		$fetchamount=mysql_query("select * from `vendor` where `slno`='$cid'");
	    $resamount=mysql_fetch_array($fetchamount);
	    $amount=$resamount['balance'];
?>
<tr>
  <td>Last Balance</td>
  <td><input type="text" name="advanceamount" id="advanceamount" value="<?php echo $amount;?>" class="text" readonly="true"></td>
  <input type="hidden" name="restamount" id="restamount" value="<?php echo $restamount;?>">
</tr>
 <input type="hidden" name="restamount" id="restamount" value="<?php echo $restamount;?>" class="text" readonly="true">
<tr>
  <td>Amount Payble RS.</td>
  <td><input type="text" name="totamount" id="totamount" class="text" ></td>
</tr>
<tr>
    <td>payment By card</td>
    <td><input type="text" name="paycard" id="paycard" class="text" onblur="return netbalan()" /></td>
</tr>
<tr>
    <td>payment By cash</td>
    <td><input type="text" name="payamount" id="payamount" class="text" onblur="return netbalan()" /></td>
</tr>	