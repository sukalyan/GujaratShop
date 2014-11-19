<?php
include_once("function.php");
$billid=$_GET['bid'];
$fetch=mysql_query("select * from `sell` where `billid`='$billid'")or die(mysql_error());
$res=mysql_fetch_array($fetch);
 $foun=mysql_numrows($fetch);
 if($foun!=0){
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>shop</title>
</head>
<body>
    <table align="center" border="1" width="30">
	<tr>
	    <td colspan="4" align="center">
		INVOICE</br>
		<img alt="testing" src="barcode.php?text=<?php echo $billid;?>" width="100" height="20"/><?php echo $res['date'];?></br>
	    </td>
	</tr>
	<tr>
	    <th colspan="4"> Address</th>
	   
	</tr>
	<tr>
	    <td colspan="4">
		<center><strong>City Mart</strong></br>
		Nuabazar, Thanachak, Bhadrak</br>
		pin-756100</center>
		
	    </td>
	    
	</tr>
	<tr>
	    <th colspan="4"> PRODUCTS</td>
	</tr>
	<tr>
	    <th colspan="2">Details</th>
	    <th>Quantity</th>
	    <th>Price</th>
	</tr>
	<?php
	$total=0;
	$t=0;
		$fetch1=mysql_query("select * from `sell` where `billid`='$billid'")or die(mysql_error());
		while($res1=mysql_fetch_array($fetch1))
		{
		$fetproduct=mysql_query("select * from `product` where `id`='$res1[productid]'");
		$resproduct=mysql_fetch_array($fetproduct);
		$total=$total+$res1['totprice'];
		if($res1['checked']!=""){
		$tax=$res1['totprice']*0.04;
		$t=$t+$tax;
		}
		?>
	<tr>
	    <td colspan="2">
		<?php
		echo $resproduct['prod_name'];
		?>
	    </td>
	    <td><?php echo $res1['quantity'];?></td>
	    <td><?php echo $res1['price'];?></td>
	</tr><?php }?>
	<tr>
	    <td colspan="3" align="right"></td>
	   
	   
	</tr>
	<tr>
	    <td colspan="3" align="right">TOTAL</td>
	    
	    <td><?php echo $total;?></td>
	</tr>
    </table>
</body>
</html><?php }?>