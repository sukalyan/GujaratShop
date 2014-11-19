<?php
include_once('function.php');
	$barcode=$_GET['barcode'];
	$number=$_GET['number'];
?>
<style>
@media print
{    
    .no-print
    {
        display: none !important;
    }
	
}
</style>
<script>
    function pr()
    {
	 window.print();
    }
</script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<div style="width:970px; height: auto; float:left; ">
    <?php
    for($i=0;$i<$barcode;$i++)
	{
	    $code=mt_rand();
	    mysql_query("insert into `barcode` set `barcode`='$code'");
	    for($c=0;$c<$number;$c++)
	    {
	    ?>
   <div style="width:120px; height:240px; float: left; margin-top:1px; margin-left:1px; font-size:12px; text-align: center;">
    <table align="center" style="font-size:12px;">
	<tr>
	    <td>
		<img alt="testing" src="barcode.php?text=<?php echo $code;?>" width="100" height="20"/>
		<br/>
		   <span style="margin-left:5px;"><?php echo $code;?></span> 
	    </td>
	</tr>
    </table>
   </div>
	<?php }} ?>
	</br>
	
</div>
<div style="width:970px; height: auto; float:left;" class="no-print">
	    <input type="submit" name="submit" value="print" onclick="return pr();">
	</div>


