<?php
include_once("function.php");
$venval=$_GET['venval'];
$vid=$_GET['id'];
//echo $tp;
//echo "select sum(amount) as totamount from `transaction` where `vendor_id`='$vid'";
$sql=mysql_query("select sum(amount) as totamount from `transaction` where `vendor_id`='$vid'");
$res=mysql_fetch_array($sql);
$amount=$res['totamount'];
 $total=number_format((float)$amount, 2, '.', '');
if($res['totamount']>0){
?>
<tr>
<td>Rest Amount</td>
<td>
<input type="text" name="restamnt" id="restamnt" value="<?php if($res['totamount']){ echo $total;}else{echo 0;}?>" readonly="true" class="text"/>
</td>
</tr>
<tr>
<td>Amount</td>
<td><input type="text" name="amt" id="amt" class="text"></td>
</tr>
<tr>
	<td>&nbsp;</td>
    <td><input type="submit" name="pay" value="pay" class="btn"></td>
</tr>
<?php
}
else{?>
 <td>Amount</td>
<td>
<input type="text" name="amnt" value="<?php if($res['totamount']){ echo $total;}else{echo 0;}?>" class="text" id="restamnt" readonly="true"/>
</td>   
<?php }
?>