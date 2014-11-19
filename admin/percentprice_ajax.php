<?php
include_once("function.php");
$mrpval=$_GET['mrp'];
$sql=mysql_query("select * from `percent`");
$res=mysql_fetch_array($sql);
$retailer=$res['retailer'];
$distributer=$res['distributer'];
$customer=$res['customer'];
$ret=$mrpval*($retailer/100);
$dis=$mrpval*($distributer/100);
$cust=$mrpval*($customer/100);
?>
</tr>
					<tr>
					<td>Retailer</td>
					<td>Distributer</td>
					<td>Customer</td>
					</tr>
					<tr>
						<td><input type="text" name="priceretailer" id="priceretailer" value="<?php echo $ret;?>" readonly="true"  class="text"/></td>
						<td><input type="text" name="pricedistributer" id="pricedistributer" value="<?php echo $dis;?>" readonly="true" class="text"/></td>
						<td><input type="text" name="price" id="price" readonly="true" value="<?php echo $cust;?>"  class="text"/></td>
					</tr>
?>