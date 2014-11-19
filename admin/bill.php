<?php
include_once("function.php");
$billid=$_GET['bid'];
 $type=$_GET['type'];
 $grand=$_GET['grand'];
 $paid=$_GET['paid'];
$fetch=mysql_query("select * from `sell` where `billid`='$billid'")or die(mysql_error());
$res=mysql_fetch_array($fetch);
 $foun=mysql_num_rows($fetch);
 if($foun!=0){
   /* $getcust=mysql_query("select * from `vendor` where `type`='$type'")or die(mysql_error());
while($rescust=mysql_fetch_array($getcust))
{
$getemails[] = array(
'value'  =>$rescust['name']."(".$rescust['address'].")",
'idval' => $rescust['slno']
	);
}*/
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>shop</title>
	<!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
 <!--autocomplete end-->
  <!--<script type="text/javascript">
    $(function(){
        var availabledrugs=<?=json_encode($getemails);?>;
        $('#customers').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
	    $('#customers').val(valshow);
	    $('#customerid').val(ui.item.idval);
	    var custid=$('#customerid').val();
	    $.ajax({url:"addbody.php",success:function(result)
		 {
		    $("#addamount").html(result);
		 }});
		}
        });
});
</script>-->
<style>
@media print
{    
    .no-print
    {
        display: none !important;
    }
	
}
</style>
<script type="text/javascript">
   
    /*function pay()
    {
	var amount=$('#htotalamount').val();
	var custid=$('#customerid').val();
	var billid=$('#biillid').val();
	if ($('#paycard').val()!="")
	{
	    var card=$('#paycard').val();
	}else { var card=0;}
	
	if ($('#payamount').val()!="")
	{
	    var cash=$('#payamount').val();
	}else { var cash=0;}
	 
	 var paidamount=(cash-0)+(card-0);
	 //alert(paidamount);
	if (custid!="") {
	if ((paidamount-0)<=(amount-0)) {
	    
		    $.ajax({url:"rest.php?amt="+amount+'&cash='+cash+'&card='+card+'&cust='+custid+'&bill='+billid,success:function(result)
		 {
		    window.print();
		    window.close();
		 }});
	//window.print();
	//window.close();
	}else { alert("enter less amount"); return false;}
	}else { window.print();
		    window.close();}
    }*/
    function pr()
    {
      window.print();
		    window.close();
    }
</script>
</head>
<body onload="pr()">
    <table align="center" border="1" width="30">
	<tr>
	    <td colspan="5" align="center">
		INVOICE</br>
		<img alt="testing" src="barcode.php?text=<?php echo $billid;?>" width="100" height="20"/><?php echo $res['date'];?></br>
	    </td>
	</tr>
	<tr>
	    <th colspan="5"> Address</th>
	    
	</tr>
	<tr>
	    <td colspan="5">
		<center><strong>City Mart</strong></br>
		Nuabazar, Thanachak, Bhadrak</br>
		pin-756100</center>
		
	    </td>
	    
	</tr>
	<tr>
	    <th colspan="5"> PRODUCTS</td>
	</tr>
	<tr>
	    <th colspan="2">Details</th>
	    <th>Quantity</th>
	    <th>Price</th>
	    <th>TOTAL</th>
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
	    <td><?php echo $res1['totprice'];?></td>
	</tr><?php }?>
	<!--<tr>
	    <td colspan="3" align="right"></td>
	    <td><?php //echo $total;?></td>
	</tr>-->
	<tr>
	    <td colspan="4" align="right">TOTAL</td>
	    
	    <td><?php echo number_format((float)$total, 2, '.', '');?></td>
	</tr>
	<tr>
	    <td colspan="4" align="right">GRAND TOTAL</td>
	    
	    <td><?php echo number_format((float)$grand, 2, '.', '');?></td>
	</tr>
	<?php
	if(isset($_GET['paid'])){
	?>
	<tr>
	    <td colspan="4" align="right">Paid</td>
	    
	    <td><?php echo number_format((float)$paid, 2, '.', '');?></td>
	</tr><?php }?>
    </table>
   <!-- <table align="center" id="payment" class="no-print">
	<tr>
	    <td>customer</td>
	    <td>
	       <?php
	      // $fetname=mysql_query("select * from `vendor` where `slno`='$res[name]'");
	       //$resname=mysql_fetch_array($fetname);
	       ?>
		<input type="text" name="custom" id="customers" value="<?php //echo $resname['name'];?>" readonly="true" />
		 <input type="hidden" name="customid" value="<?php //echo $res['name']?>" id="customerid" />
		 <input type="hidden" name="billid" id="biillid" value="<?php //echo $billid;?>" />
		  <input type="hidden" name="htotamount" id="htotalamount" value="<?php //echo $total;?>">
		</td>
	</tr>
	<tbody id="addamount"></tbody>
	 <tr>
	    <td>payment card</td>
	    <td><input type="text" name="paycard" id="paycard" /></td>
	 </tr>
	 <tr>
	    <td>payment cash</td>
	    <td><input type="text" name="payamount" id="payamount" /></td>
	 </tr>		

	<tr>
	    <td colspan="2"><input type="button" name="button" value="pay" id="button" onClick="return pay()"</td>
	</tr>
    </table>-->
</body>
</html><?php }?>