<?php
include_once('function.php');
$bar=$_GET['code'];
$fetch=mysql_query("select * from `stock` where `barcode`='$bar'");
?>
<span id="1">
Product<br/>
<select class="text" name="pdval[]" id="seluid">
<!--<option>select</option>-->
	    <?php
	    while($res=mysql_fetch_array($fetch))
{
$stockquant=$res['quantity'];
$pid=$res['product_id'];
$fetch1=mysql_query("select * from `product` where `id`='$pid'");
$res1=mysql_fetch_array($fetch1);
	?>
	    
	    <option value="<?php echo $res['uniqueid'];?>"><?php echo $res1['prod_name']."(".$res['price'].")";?></option>
		<?php }?>
</select>
</span>