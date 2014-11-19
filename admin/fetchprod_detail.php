<?php
include_once('function.php');
$categval=$_GET['categval'];
$fetch=mysql_query("select * from `product` where `category`='$categval'");
?>
<div id="productid">
<select onchange="return getprdetail(this.value);"  id="prod_id">
<?php
while($ress=mysql_fetch_array($fetch)){
?>
<option value="<?php echo $ress['id'];?>"><?php echo $ress['prod_name'];?></option>
<?php
}
?>
</select>
</div>