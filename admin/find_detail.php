<?php
include_once('function.php');
$prodval=$_GET['pid'];
$fetch=mysql_query("select * from `product` where `id`='$prodval'");
$res=mysql_fetch_array($fetch);
$sqlcompany=mysql_query("select * from `company` where `id`='$res[company]'");
$rescompany=mysql_fetch_array($sqlcompany);
$sqlcategory=mysql_query("select * from `category` where `id`='$res[category]'");
$category=mysql_fetch_array($sqlcategory);
?>
<input type="text" name="cmpname" class="text" value="<?php echo $rescompany['comp_name'];?>" id="cmpid"/>
<input type="hidden" name="hdcmp"  value="<?php echo $rescompany['id'];?>" id="hdcmpid"/>
<input type="text" name="catname" class="text" value="<?php echo $category['cat_name'];?>" id="catid"/>
<input type="hidden" name="hdcat"  value="<?php echo $category['id'];?>" id="hdcatid"/>
