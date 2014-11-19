<?php
include_once('function.php');
$name=$_GET['name'];
$ival=$_GET['ivall'];
$fetch=mysql_query("select * from `product` where `prod_name`='$name'");
$res=mysql_fetch_array($fetch);
$id=$res['id'];
$fetch1=mysql_query("select * from `stock` where `product_id`='$id'");
$res1=mysql_fetch_array($fetch1);
$bar=$res1['barcode'];
$uid=$res1['uniqueid'];
?>
    <td id="bar<?php echo $ival;?>">Barcode<br/><input type="text" name="barcode[]" id="barcode<?php echo $ival;?>" value="<?php echo $bar;?>" oninput="return fetchh(this.value,<?php echo $ival;?>)" class="text">
	<input type="hidden" name="hduid" id="hduidd<?php echo $ival;?>" value="<?php echo $uid;?>"/>
	<input type="hidden" name="pdval[]" value="<?php echo $uid;?>"/> 
    </td>
