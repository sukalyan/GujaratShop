<?php
include_once('function.php');
$order=$_GET['order'];
?>
<span id="1">
    <?php
    $fetch=mysql_query("select * from `purchase` where `order_no`='$order'");
    while($res=mysql_fetch_array($fetch))
    {
        $fetch1=mysql_query("select * from `product` where `id`='$res[product_id]'") or die(mysql_error());
        $res1=mysql_fetch_array($fetch1);
    ?>
    <tr>
        <td><?php echo $res1['prod_name'];?></td>
        <td><?php echo $res['totalquantity'];?></td>
        <td><a href="returnedit_order.php?id=<?php echo $res['uniqueid'];?>"><img src="image/edit.png" width="60"></a></td>
        <td onClick="delete_data('<?php echo $res['uniqueid']; ?>')"><img src="image/delete.png" width="70"></td>
    </tr><?php }?>
</span>