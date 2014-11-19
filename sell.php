<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}
else
{
mysql_query("delete from `freestock`");
$getproduct=mysql_query("select * from `product`")or die(mysql_error());
   while($resproduct=mysql_fetch_array($getproduct))
    {
	$getemail[] = array(
	'value'  => $resproduct['prod_name'],
	'idval' => $resproduct['id']
	);
    }
    $getcustomer=mysql_query("select * from `vendor` where `type` NOT LIKE '0'")or die(mysql_error());
   while($rescustomer=mysql_fetch_array($getcustomer))
    {
	$getem[] = array(
	'value'  => $rescustomer['slno'],
	'idval' => $rescustomer['name'],
	'type' => $rescustomer['type'],
	'area' => $rescustomer['address']
	);
    }
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <style type="text/css"> 
		.text
		{
		width:130px;
		}
    </style>
	<script src="js/jquery.min.js"></script>
	
	<!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('#pnm1').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#pnm1').val(valshow);
		 $('#hdpnmval1').val(ui.item.idval);
		 fetch1(valshow);
		}
        });
});
    
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getem); ?>;
        $('#cust').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#cust').val(valshow);
		 $('#custname').val(ui.item.idval);
		 $('#custtype').val(ui.item.type);
		 $('#custarea').val(ui.item.area);
		 var cslno=$('#cust').val();
		 $.ajax({url:"rest_amount.php?slno="+cslno,success:function(result){
		 $("#addrest").html(result);
                 }}); 
		 focs();
		}
        });
});
</script>
<script>
    var i=1;
    function fetch(bar)
    {i++;
   //alert(bar);
   if (bar!="") {
	$.ajax({url:"append.php?typ="+i+'&bar='+bar,
	       success:function(result){
                $("#tbb").append(result);
				 $("#barcode1").val("");
				 $("#barcode"+i).focus();
                }
		});
   }else{ return false;}
    }
	function fetch1(bar)
    {i++;
	$.ajax({url:"append.php?typ="+i+'&name='+bar,
	       success:function(result){
                $("#tbb").append(result);
				 $("#barcode1").val("");
				 $("#pnm1").val("");
				 $("#barcode"+i).focus();
                }
		});
    }
</script>
    <script>
    function focs()
    {
       $('#barcode1').focus();
    }
    function focs1()
    {
       $('#cust').focus();
    }
    
    
    function fetchh(bar,ival)
    {
	 var ctype=$("#ctype").val();
        $.ajax({url:"fetchproductt.php?code="+bar+'&ivall='+ival+'&type='+ctype,success:function(result){
                $("#productt"+ival).html(result); 
		$('#quantity'+ival).focus();
			    var sll=$("#seluidd"+ival).val();
				$('#hduidd'+ival).val(sll);
			  $("#seluidd"+ival).change(function()
    {		
        var sll=$("#seluidd"+ival).val();
		$('#hduidd'+ival).val(sll);
		$("#prodprice"+ival).val("");
	});
			   
                }});
    }
	function getpricee(pri,ivalue)
    { 
      var code=$("#barcode"+ivalue).val();
      var ctype=$("#custtype").val();
	   var uidd=$('#hduidd'+ivalue).val();
	   if(uidd!=""){
      $.ajax({url:"fetchprice.php?qun="+pri+'&bar='+code+'&idval='+ivalue+'&unid='+uidd+'&type='+ctype,success:function(result){
                if (result==0) {
                    alert("stock not available");
                    $("#prodprice"+ivalue).val("");
                    $('#barcode'+ivalue).focus(); 
                }else {
				$("#prodprice"+ivalue).val(result);
				
				$.ajax({url:"insert_free.php?bcode="+code+'&uid='+uidd+'&ivalls='+ivalue+'&qty='+pri,success:function(result)
				{
				}
				});
				$.ajax({url:"fetchunit.php?bcode="+code+'&type='+ctype+'&uid='+uidd,success:function(result)
				{
				 $("#unitprice"+ivalue).val(result);
				}
				});
				$('#discount'+ivalue).focus();
				}
                }});  
				}else {$('#quantity'+ivalue).focus();}
    }
	function delrow(slno)
	   {
	   $('#'+slno).remove();
	    $.ajax({url:"delete_free.php?slnoo="+slno,success:function(result)
				{
				}
				});
	   }
</script>
<script>
    function fproduct(pnameval)
	   {
	    //alert(pnameval);
	    $.ajax({url:"fproduct.php?name="+pnameval,success:function(result){
                $("#bar1").html(result);
                }}); 
	   }
	   
	   function fproductt(pnameval,pval)
	   {
	    //alert(pnameval);
	    $.ajax({url:"fproductt.php?name="+pnameval+'&ivall='+pval,success:function(result){
                $("#bar"+pval).html(result);
                }}); 
	   }
	   
	   function addall(args)
	   {
	  // alert(args);
	    var total=0;
	    for(var fval = args; fval >= 2; fval--)
	    {
	     var sumtotal=$("#totprice"+fval).val();
	     if (sumtotal=='undefined')
	     { 
		sumtotal=0;
	     }else
	     {
		var total=(total-0)+(sumtotal-0);
		if ((total-0)>0)
		{
	      $("#alltotal").val(total);
	      $("#grand").val(total);
	      paybleamount();
		}
	     }
	    }
	   
	   }
	   
	   function caldiscount(discount)
	   {
	    var tot= parseFloat($("#alltotal").val());
	    //alert(tot);
	    if ((discount-0)<tot)
	    {
		//alert(discount);
	    var grand=tot-discount;
	     $("#grand").val(grand);
	     paybleamount()
	     }else{ $("#discount").val(""); $("#discount").focus(); }
	   }
	   function paybleamount()
	   {
	   var restamt=$("#restamount").val();
	   var grandtotal=$("#grand").val();
	    
	   var grandrest=((restamt-0) + (grandtotal-0));
	   $("#totamount").val(grandrest);
	   }
	   
	   function finalamount(dis,ivalue)
	   {
	   //alert(dis);
	    var totalamount=$("#prodprice"+ivalue).val();
		var discount=totalamount*(dis/100);
		var finalamount=totalamount-discount
		$("#totprice"+ivalue).val(finalamount);
		
		addall(ivalue);
		var restamount=$("#restamount").val();
		var lasttamount=$("#advanceamount").val();
		var allamount=$("#alltotal").val();
		var payble=lasttamount-((allamount-0)+(restamount-0));
		var positivepay=0-payble;
		//alert(payble);
		if(payble<0){ $("#totamount").val(positivepay);}else{$("#totamount").val("");}
		$('#barcode1').focus();
	   }
</script>

</head>
<body onLoad="focs1()">
    <div id="wrapper">
       <div id="header">admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Trade</h3>
				</div>
				<div class="content3">
                                    <?php if(isset($_GET['msg'])){echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";} ?>
                    <form name="" action="sellaction.php" method="post">
                        <table class="table" align="center">
			    <tr>
                               <!-- <td colspan="3">Type</br>
				    <select name="type" id="ctype">
					<option value="1">Customer</option>
					<option value="2">Distributer</option>
					<option value="3">Retailer</option>
				    </select>
				</td>-->
				<td colspan="2">Customer Id</br>
				    <input type="text" name="cust" id="cust" class="text" onBlur="return focs();">
					<input type="hidden" name="custtype" id="custtype" class="text">
					<input type="hidden" name="custarea" id="custarea" class="text">
				</td>
				<td>Name<input type="text" name="custname" id="custname" class="text" readonly="true"></td>
                            </tr>
			    <tr>
				<td id="bar1">Barcode<br/>
				    <input type="text" name="barcode" id="barcode1" onBlur="return fetch(this.value)" class="text">
				    <input type="hidden" name="hduid" id="hduid"/>
				</td>
				<td>&nbsp;</td>
				<!--<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text" onBlur="return fetch1(this.value)"/></td>-->
				<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text"/></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			    </tr>
			    <tbody id="tbb"></tbody>
			    <tr>
                                <td colspan="5" align="center">&nbsp;</td>
                            </tr>
                            
			    <tr>
				<td colspan="5">Total Rs.<input type="text" name="total" id="alltotal" class="text" readonly="true"></td>
			    </tr>
			    <!--<tr>
			    <td colspan="5">Discount Rs.<input type="text" name="discount" id="discount" onBlur="return caldiscount(this.value);" class="text" ></td>
			  </tr>
			  <tr>
			    <td colspan="5">Grand Total RS.<input type="text" name="grand" id="grand" class="text" ></td>
			  </tr>-->
			  
			  <tr>
				 <tbody id="addrest"></tbody>
			  </tr>
			  <tr>
			    <td colspan="5">Amount Payble RS.<input type="text" name="totamount" id="totamount" class="text" ></td>
			  </tr>
			   <tr>
			    <td colspan="5">Balance<input type="text" name="netamount" id="netamount" class="text" ></td>
			  </tr>
			  <tr>
                                <td colspan="5" align="center"><input type="submit" name="submit" value="submit" class="btn button2"></td>
                            </tr>
                        </table>
                    </form>
		</div>
            <div>
	    </div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>
<?php
}
?>
