<?php
include_once('function.php');
$bar=$_GET['bar'];
$id=$_GET['ival'];
$fetch=mysql_query("select * from `readystock` where `bar`='$bar'");
$res=mysql_fetch_array($fetch);
$num=mysql_numrows($fetch);
if($num>0){
?>
<td>Barcode<br/><input type="text" name="barcode[]" id="barcode<?php echo $id;?>" class="text wdt" value="<?php echo $bar;?>"></td>
<td>Product
<?php
						$sqlpronm=mysql_query("select * from `product` where `id`='$res[product]'");
						$respronm=mysql_fetch_array($sqlpronm); ?>
						<input type="text" name="pname1" readonly="true" value="<?php echo $respronm['prod_name'];?>" class="text wdt">
						<input type="hidden" name="prod[]" id="product<?php echo $id;?>" value="<?php echo $res['product'];?>">
</td>
<td>category
<?php
						$sqlcat=mysql_query("select * from `category` where `id`='$res[category]'");
						$rescat=mysql_fetch_array($sqlcat);
						?>
						<input type="text" name="category1" readonly="true" value="<?php echo $rescat['cat_name'];?>" readonly="true" class="text wdt">
						<input type="hidden" name="cat[]" id="category<?php echo $id;?>" value="<?php echo $res['category'];?>">
</td>
<td>company<br/><!--<input type="text" name="comp[]" id="company<?php //echo $id;?>" readonly="true" class="text">-->
<?php
						$sqlcomp=mysql_query("select * from `company` where `id`='$res[company]'");
					        $rescomp=mysql_fetch_array($sqlcomp)
						?>
						<input type="text" name="company1" readonly="true" value="<?php echo $rescomp['comp_name'];?>" class="text wdt">
						<input type="hidden" name="comp[]" id="company<?php echo $id;?>"  value="<?php echo $res['company'];?>">
</td>
<td>Quantity<br/><input type="text" name="quantity[]" id="quantity<?php echo $id;?>" onBlur="return getprice(this.value);" class="text wdt"></td>
<td>Price<br/><input type="text" name="pric[]" id="prodprice<?php echo $id;?>"  class="text wdt"></td>

<?php }else {?>
<td>Barcode<br/><input type="text" name="barcode[]" id="barcode<?php echo $id;?>" class="text wdt" value="<?php echo $bar;?>" oninput="return fetch(this.value,<?php echo $id;?>)"></td>
<td>Product<input type="text" name="prod[]" id="product<?php echo $id;?>" class="text wdt"/></td>
<td>category<br/><!--<input type="text" name="cat[]" id="category<?php echo $id;?>"  class="text">-->
<select name="cat[]" id="category<?php echo $id;?>">
<?php
$selcat=mysql_query("select * from `category`");
while($rcat=mysql_fetch_array($selcat)){
?>
 <option value="<?php echo $rcat['id'];?>"><?php echo $rcat['cat_name'];?></option><?php }?>
</select>
</td>
<td>company<br/><!--<input type="text" name="comp[]" id="company<?php echo $id;?>"  class="text">-->
<select name="comp[]" id="company<?php echo $id;?>"  >
<?php
$selcomp=mysql_query("select * from `company`");
while($rcomp=mysql_fetch_array($selcomp)){
?>
<option value="<?php echo $rcomp['id'];?>"><?php echo $rcomp['comp_name'];?></option><?php }?>
</select>
</td>
<td>Quantity<br/><input type="text" name="quantity[]" id="quantity<?php echo $id;?>" onBlur="return getprice(this.value);" class="text wdt"></td>
<td>Price<br/><input type="text" name="pric[]" id="prodprice<?php echo $id;?>" class="text wdt"></td>
<?php }?>