<?php
include_once('function.php');
$i=$_GET['num'];
 $bar=$_GET['bar'];
 $type=$_GET['type'];
 if($type==3){ $typ="retailer_price";}
elseif($type==2){ $typ="distributer_price";}
else{ $typ="price";}
 $fetch=mysql_query("select * from `stock` where `barcode`='$bar'");
 $num=mysql_numrows($fetch);
 if($num>1){
 ?>
 <tr id="<?php echo $i;?>">
 <td>
 <input type="text" name="bar[]" id="bar<?php echo $i?>" value="<?php echo $bar;?>" class="bcd<?php echo $i;?>" readonly></td>
 <td>
    <select name="sel[]" id="sel<?php echo $i;?>" onchange="change(<?php echo $i;?>)">
 <?php
 while($res=mysql_fetch_array($fetch))
 {
    $uid=$res['uniqueid'];
    $qunti=$res['quantity'];
    $fsell=mysql_query("select sum `quntity` as qunti from `sell` where `uniqueid`='$uid'");
    $rsell=mysql_fetch_array($fsell);
    $squntity=$rsell['qunti'];
    $avlqunt=$qunti-$squntity;
    if($avlqunt>0){
	$fpname=mysql_query("select * from product where `id`='$res[product_id]' ");
    $rpname=mysql_fetch_array($fpname);
    ?>
    <option value="<?php echo $uid;?>"><?php echo $rpname['prod_name']."(".$res[$typ].")";?></option><?php }}?>
    </select>
</td>
 <td><input type="text" name="quantity[]" id="quantity<?php echo $i;?>" class="qrow" value="1" onblur="return change(<?php echo $i;?>)"></td>
 <td><input type="text" name="pric[]" id="pric<?php echo $i;?>" class="prow" value=""></td>
 <td><input type="text" name="discount[]" id="dis<?php echo $i;?>" class="drow" value="<?php echo 0;?>" onblur="return finalamount(this.value,<?php echo $i;?>)"></td>
 <td><input type="text" name="total[]" id="total<?php echo $i;?>" class="trow" value=""></td>
 <td><input type="button" name="delete" value="delete" onclick="return delrow(<?php echo $i;?>);" class="btn"/></td>
 </tr>
 <?php }elseif($num==1) {
    $res=mysql_fetch_array($fetch);
    $uid=$res['uniqueid'];
    $qunti=$res['quantity'];
    $res[$typ];
    $fsell=mysql_query("select sum `quntity` as qunti from `sell` where `uniqueid`='$uid'");
    $rsell=mysql_fetch_array($fsell);
    $squntity=$rsell['qunti'];
    $avlqunt=$qunti-$squntity;
    if($avlqunt>0){
	$fpname=mysql_query("select * from product where `id`='$res[product_id]' ");
    $rpname=mysql_fetch_array($fpname);
    ?>
 <tr id="<?php echo $i;?>">
 <td>
 <input type="text" name="bar[]" id="bar<?php echo $i?>" value="<?php echo $bar;?>" class="bcd<?php echo $i;?>" readonly></td>
 <td><input type="text" name="select[]" id="select<?php echo $i;?>" class="srow" value="<?php echo $rpname['prod_name']."(".$res[$typ].")";?>" readonly="true"></td>
 <input type="hidden" name="sel[]" id="sel<?php echo $i;?>" value="<?php echo $uid;?>">
 <td><input type="text" name="quantity[]" id="quantity<?php echo $i;?>" class="qrow" value="1" onblur="return change(<?php echo $i;?>)"></td>
 <td><input type="text" name="pric[]" id="pric<?php echo $i;?>" class="prow" value="<?php echo $res[$typ];?>"></td>
 <td><input type="text" name="discount[]" id="dis<?php echo $i;?>" class="drow" value="<?php echo 0;?>" onblur="return finalamount(this.value,<?php echo $i;?>)"></td>
 <td><input type="text" name="total[]" id="total<?php echo $i;?>" class="trow" value="<?php echo $res[$typ];?>"></td>
 <td><input type="button" name="delete" value="delete" onclick="return delrow(<?php echo $i;?>);" class="btn"/></td>
</tr>
 <?php }} elseif($num==0){ echo 'NoProductFound';}?>

 
    
