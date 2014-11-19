<?php
include_once('function.php');
$cmpidval=$_GET['cmpidd'];
$fetch=mysql_query("select * from `product` where `company`='$cmpidval' group by `category`");
?>
<div id="categoryid">
<select onchange="return getpcattdetail(this.value);"  id="cat_id">
<?php
while($res=mysql_fetch_array($fetch)){
$sqlcat=mysql_query("select * from `category` where `id`='$res[category]'");
$rescat=mysql_fetch_array($sqlcat);
?>
<option value="<?php echo $rescat['id'];?>"><?php echo $rescat['cat_name'];?></option>
<?php
}
?>
</select>
</div>