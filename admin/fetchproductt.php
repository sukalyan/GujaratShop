<?php
include_once('function.php');
$bar=$_GET['code'];
$id=$_GET['ivall'];
$type=$_GET['type'];
if($type==3){ $typ="retailer_price";}
elseif($type==2){ $typ="distributer_price";}
else{ $typ="price";} 
$fetch=mysql_query("select * from `stock` where `barcode`='$bar' group by `product_id`,`$typ`");
$cnt=mysql_num_rows($fetch);
?>
<span id="<?php echo $id;?>">
Product<br/>
<select class="text" name="pdval[]" id="seluidd<?php echo $id;?>" onchange="changeselect(<?php echo $id;?>)" <?php if($cnt==1) echo "style='display: none;'"; ?>>
	    <?php
	    while($res=mysql_fetch_array($fetch))
{
$stockquant=$res['quantity'];
$pid=$res['product_id'];
$fetch1=mysql_query("select * from `product` where `id`='$pid'");
$res1=mysql_fetch_array($fetch1);
	?>
	<option value="<?php echo $res['uniqueid'];?>"><?php echo $res1['prod_name']."(".$res[$typ].")";?></option>
		<?php }?>
</select>
<?php 
$fetch=mysql_query("select * from `stock` where `barcode`='$bar' group by `product_id`,`$typ`");
$res=mysql_fetch_array($fetch);
if ($cnt==1)
echo "$res1[prod_name](".$res[$typ].")";
?>
</span>