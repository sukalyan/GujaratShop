<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{

$getvendor=mysql_query("select * from `vendor` where `type`='0'")or die(mysql_error());
while($resvendor=mysql_fetch_array($getvendor))
{
$getemailven[] = array(
'value'  =>$resvendor['name'],
'idval' => $resvendor['slno']
	);
}

$getdrugdet=mysql_query("select * from `product`")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
$getemail[] = array(
'value'  =>$resdrugdet['prod_name'],
'idval' => $resdrugdet['id']
	);
}
$getdrugdets=mysql_query("select * from `company`")or die(mysql_error());
while($resdrugdets=mysql_fetch_array($getdrugdets))
{
$getemails[] = array(
'value'  =>$resdrugdets['comp_name'],
'idval' => $resdrugdets['id']
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
		.wdt
{
width:50px;
margin-right:2px;
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
        var available=<?= json_encode($getemailven); ?>;
        $('#vend').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: available,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#vend').val(valshow);
		 $('#hdvendval').val(ui.item.idval);
        return false;
		}
        });
});
</script>
  <script type="text/javascript">
  var i=1;
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('#pnm').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#pnm').val(valshow);
		 $('#hdpnmval').val(ui.item.idval);
		  var x=$('#hdpnmval').val();
		 $.ajax({url:"find_detail.php?pid="+x,success:function(result)
		 {
		 $('#tdid').html(result);
		 var cmpval=$('#cmpid').val();
		 var hdcmpval=$('#hdcmpid').val();
		 var catval=$('#catid').val();
		 var hdcatidval=$('#hdcatid').val();
		 $('#compid').val(cmpval);
		 $('#hdcmpvall').val(hdcmpval);
		 $('#cateid').val(catval);
		 $('#hdcatval').val(hdcatidval);
		 	
		 }});
		
		 $.ajax({url:"fetch_detail.php?pidval="+x+'&ival='+i,async: false,success:function(result)
		 {
			//alert(result);
			$('#tbb').append(result);	
		  $('#quant'+i).focus();
		 }});
		 
		 i++;
        return false;
		}
        });
		
});
</script>
<script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrug=<?= json_encode($getemails); ?>;
        $('#compid').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrug,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#compid').val(valshow);
		 $('#hdcmpvall').val(ui.item.idval);
		  var cmx=$('#hdcmpvall').val();
		 $.ajax({url:"cat_detail.php?cmpidd="+cmx,success:function(result)
		 {
		 $('#catidd').html(result);
		 var xcat=$('#categoryid').html();
		 $('#ctid').html(xcat);
		/* var xcatt=$('#productid').html();
		 $('#prid').html(xcatt);*/
		
		 var ctval=$('#cat_id').val();
		// alert(ctval);
		 $.ajax({url:"fetchprod_detail.php?categval="+ctval,success:function(result)
		 {
			$('#prdidd').html(result);	
			var xpid=$('#productid').html();
            $('#prid').html(xpid);	
		
		
		var pdval=$('#prod_id').val();
$.ajax({url:"fetch_detail.php?pidval="+pdval+'&ival='+i,async: false,success:function(result)
		 {
		 //alert(pdval);
			//$('#tbldata').html(result);		
			$('#tbb').append(result);	
			i++;
		 }});
		 
		 }});

		 }});

        return false;
		}
        });
});
</script>

<script>
	function getquant(qval,ivall)
{
var fqtval=$('#freequant'+ivall).val();
$.ajax({url:"total_quantity.php?quantval="+qval+'&fval='+fqtval,success:function(result){
$("#totquant"+ivall).val(result);
                }});
}
	function getquantt(qtyval,ivals)
{
var qtyyval=$('#quant'+ivals).val();
$.ajax({url:"total_quantity1.php?quaval="+qtyval+'&qtyyvall='+qtyyval,success:function(result){
$("#totquant"+ivals).val(result);
                }});
}


	function getprice(prval,jval)
{
var quantval=$('#quant'+jval).val();
$.ajax({url:"total_price.php?prcval="+prval+'&qtval='+quantval,success:function(result){
$("#totpricc"+jval).val(result);
                }});
}

function getspdisc(spval,jvals)
{
var totpriccvall=$('#totpricc'+jvals).val();
$.ajax({url:"total_spdisc.php?spdscval="+spval+'&totprc='+totpriccvall,success:function(result){
$('#hddisval').val(result);
//var dsc=0;
//$('#ddisc').val(dsc);
//$('#scdisc').val(dsc);
                }});
}

function getddisc(dval,jvl)
{
var spdiscc=$('#spdisc'+jvl).val();
var totpriccvals=$('#totpricc'+jvl).val();
$.ajax({url:"total_ddisc.php?ddscval="+dval+'&totprc='+totpriccvals+'&sp='+spdiscc,success:function(result){
$('#hddisval').val(result);
//var dsc=0;
//$('#spdisc').val(dsc);
//$('#scdisc').val(dsc);
                }});
}

function getscdisc(scval,zval)
{
var spdiscc=$('#spdisc'+zval).val();
var ddiscc=$('#ddisc'+zval).val();
var totpriccvalss=$('#totpricc'+zval).val();
$.ajax({url:"total_scdisc.php?dscval="+scval+'&totprc='+totpriccvalss+'&spp='+spdiscc+'&dsp='+ddiscc,success:function(result){
$('#hddisval').val(result);
//var dsc=0;
//$('#spdisc').val(dsc);
//$('#ddisc').val(dsc);
                }});
}

function gettax(txval,ivalue)
{
//var hdval=$('#hddisval').val();
var totpri=$('#totpricc'+ivalue).val();
$.ajax({url:"total_tax.php?taxval="+txval+'&totprval='+totpri,success:function(result){
$("#tottax"+ivalue).val(result);
var totprice=$("#totpricc"+ivalue).val();
var totaltax=$("#tottax"+ivalue).val();
var discount=$('#hddisval').val();
var xx=(totprice-0)-(discount-0)+(totaltax-0);
//$('#total'+ivalue).val(xx);
$('#total'+ivalue).val( xx.toFixed(2) );
                }});
}

</script>
<script>
function getpcattdetail(ctvall)
{

 $.ajax({url:"fetchprod_detail.php?categval="+ctvall,success:function(result)
		 {
			$('#prdidd').html(result);	
			var xpid=$('#productid').html();
            $('#prid').html(xpid);	
	var pdidvals=$('#prod_id').val();
$.ajax({url:"fetch_detail.php?pidval="+pdidvals+'&ival='+i,async: false,success:function(result)
		 {
		 //alert(pdidvals);
			//$('#tbldata').html(result);		
			$('#tbb').append(result);
			i++;			
		 }});			
		 }});
}
</script>
<script>
function getprdetail(pdvall)
{
//alert(j);
 $.ajax({url:"fetch_detail.php?pidval="+pdvall+'&ival='+i,success:function(result)
		 {
			//$('#tbldata').html(result);		
			$('#tbb').append(result);
			$('#hdival').value(i);
			 i++;
		 }});
		
}
</script>

<!--<script>
    $(function(){
	  var i=1;
	    $('#add1').click(function () {
		i++;
        $('#tbb').append('<tr id=addajaxx'+i+'><td>Barcode<br/><input type="text" name="barcode[]" id=barcode'+i+' oninput="return fetchh(this.value,'+i+')" class="text wdt"></td><td>Product<input type="text" name="prod[]" id=product'+i+' class="text wdt"/></td><td>category<br/><input type="text" name="pric[]" id=category'+i+' readonly="true" class="text wdt"></td><td>company<br/><input type="text" name="comp[]" id=company'+i+' readonly="true" class="text wdt"></td><td>Quantity<br/><input type="text" name="quantity[]" id=quantity'+i+' onBlur="return getprice(this.value);" class="text wdt"></td><td>Price<br/><input type="text" name="pric[]" id=prodprice'+i+' readonly="true" class="text wdt"></td></tr>');
		$('#barcode'+i).focus();
		}); 
	   });
</script>-->

<script>
function validtot()
{
var vnm=$('#vend').val();
if(vnm=="")
{
alert("Enter a vendor name to purchase a product");
return false;
}
var barnum=0;
$('.bar').each(function(e){
if(($(this).val()==0))
{
alert("Barcode should not be zero");
barnum=1;
return false;
}
else
{
return true;
}
});
if(barnum==1)
{
return false;
}
var out=0;
$('.hdd').each(function(e){
if(($(this).val()==0))
{
alert("total quantity should not zero");
out=1;
return false;
}
else
{
return true;
}
});
if(out==1)
{
return false;
}
}
</script>
</head>
<body>
    <div id="wrapper">
       <div id="header" style="width:950px;">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px; width:1022px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle" style="width:820px;"> 
                <div class="content2">
				<h3>Purchase Order</h3>
				</div>
				<form name="myform" action="insert_purchase_order.php" method="post" onsubmit="return validtot();">
				<div class="content3" style="width:40%;">
				<?php
				if(isset($_GET['mess']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['mess']."</span>";
				}
				?>
				<table class="table" style="width:100%;">
				<tr>
				<td style="font-weight:bold;">Vendor</td>
				<td>
				<input type="text" name="vend" id="vend" class="text"/>
				<!--<input type="hidden" name="hdvendval" id="hdvendval"/>-->
				</td>
				</tr>
				</table>
				</div>
				
				<div class="content3">
				<table class="table" style="width:100%; text-align:left; margin-top:0px;">
				<tr>
				<th>Product</th>
				<th>Company</th>
				<th>Category</th>
				</tr>
				<tr>
				<td id="prid">
				<input type="text" name="pname" class="text" id="pnm"/>
				<input type="hidden" name="hdpnmval" id="hdpnmval"/>
				</td>
				<td>
				<input type="text" name="cmpname" class="text" id="compid"/>
				<!--<input type="hidden" name="hdcmpvall" id="hdcmpvall"/>-->
				</td>
				<td id="ctid">
				<input type="text" name="catname" class="text" id="cateid"/>
				<!--<input type="hidden" name="hdcatval" id="hdcatval"/>-->
				</td>
				</tr>
				<tr>
				<td colspan="2"><input type="hidden" name="hddisval" id="hddisval"/></td>
				</tr>
				<tr>
				<td id="tdid" style="display:none;"></td>
				</tr>
				<tr>
				<td id="catidd" style="display:none;"></td>
				</tr>
				<tr>
				<td id="prdidd" style="display:none;"></td>
				</tr>
				</table>
			
				</div>
				
	
				<div class="content3" style="margin-left:1%;">
				
                    <table class="table" style="line-height:1.5;" cellspacing="0">
						<tr style="font-size:12px; line-height:1.3; background:url(image/yellow.png); color:#fff; height:55px;">
									
									<th>Barcode</th>
									<th>Product</th>
									<th>Quantity</th>
									<th>Free<br/>quantity</th>
									<th>Total<br/>quantity<span style="color:red;">*</span></th>
									<th>Mrp<br/></th>
									<th>Price/<br/>Unit</th>
									<th>Total<br/>price</th>
									<th>Special<br/>discount<br/>in %</th>
									<th>Dealer<br/>discount<br/>in %</th>
									<th>Scheme<br/>discount<br/>in %</th>
									<th>Tax<br/>in %</th>
									<th>Total<br/>tax</th>
									<th>Total<br/>amount</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
						</tr>
						<tbody  id="tbb"></tbody>
						<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="10">
						<input type="hidden" name="hdvendval" id="hdvendval"/>
						<input type="hidden" name="hdcmpvall" id="hdcmpvall"/>
						<input type="hidden" name="hdcatval" id="hdcatval"/>
						<input type="hidden" name="ival" id="hdival"/>

						<input type="submit" name="submit" value="submit" class="btn" class="button2" style="margin-top:2%;"/>
						</td>
						</tr>
					</table>
					
				
				</div>
				</form>
				<div class="content3" id="tbldata"> 
				</div>
				</div>
            <div></div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>
<?php
}
?>
