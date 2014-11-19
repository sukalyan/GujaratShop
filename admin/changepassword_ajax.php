<?php
include_once("function.php");
$venval=$_GET['venval'];
$vid=$_GET['id'];
$sql=mysql_query("select * from `login` where `slno`='$vid'");
$res=mysql_fetch_array($sql);
?>
 <td>Password</td>
<td>
<input type="text" name="password" id="password" value="<?php echo $res['password'];?>" class="text"/>
</td>   