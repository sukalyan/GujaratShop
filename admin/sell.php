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
	'idval' => $resproduct['barcode']
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
		input
		{
		    width: 100px;
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
		var barcode=ui.item.idval;
        $('#pnm1').val(valshow);
		 $('#hdpnmval1').val(ui.item.idval);
		 addbar(barcode);
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
    function focs1()
    {
       $('#cust').focus();
    }
     function focs()
    {
       $('#barcode1').focus();
    }
  </script>
  <script>
     var i=1;
    function addbar(bar)
    { 
	if (bar!="")
	{ i++;
	$('#hiddenival').val(i);
	var ctype=$("#custtype").val();
	 $.ajax({url:"append.php?num="+i+'&bar='+bar+'&type='+ctype,success:function(result){
	    if(result=='NoProductFound') {
		alert(result);
		$('#barcode1').val("");
		$('#quantity1').focus();
		}else{
                $("#tbb").append(result);
		$('#quantity'+i).focus();
		$('#quantity'+i).blur();}
		addall(ival);
				 }});

    }
    }
    function change(ival)
    {
     var quat=$("#quantity"+ival).val();
     var bar=$("#bar"+ival).val();
     var sel=$("#sel"+ival).val();
     var ctype=$("#custtype").val();
	 $.ajax({url:"fetchprice.php?qun="+quat+'&bar='+bar+'&unid='+sel+'&type='+ctype,success:function(result){
	    if (result==0) {delrow(ival)}else{
	    $("#pric"+ival).val(result);
	    $("#total"+ival).val(result);}
	    $('#barcode1').val("");
	    $('#barcode1').focus();
	    addall(ival);
				 }});
    }
    

	  function addall(args) {
                var add = 0; 
                $(".trow").each(function() { 
        add += Number($(this).val()); 
                }); 
                $("#arrtotal").text(add);
		$("#alltotal").val(0-add);
	      var restamt=$("#advanceamount").val();
	   var grandtotal=$("#alltotal").val(); 
	   var grandrest=((parseFloat(restamt)) + (parseFloat(grandtotal)));
	   $("#totamount").val(grandrest);
	   netbalan();
	  }

	   
	   function finalamount(dis,ivalue)
	   {
	   //alert(dis);
	    var pric=$("#pric"+ivalue).val();
	    var qunt=$("#quantity"+ivalue).val();
	    var totalamount=pric*qunt;
		var discount=totalamount*(dis/100);
		var finalamount=totalamount-discount
		$("#total"+ivalue).val(finalamount);
		addall(ivalue);
		netbalan();
		$('#barcode1').focus();
	   }
function netbalan()
{ 
    var paycard=$("#paycard").val();
    var payamount=$("#payamount").val();
    var totamount=$("#totamount").val();
    if (paycard=="") { paycard=0;}
    if (payamount=="") { payamount=0;}
    var totalpaid=(parseFloat(paycard))+(parseFloat(payamount));
    if (totamount!="" && totamount<0)
    {
	 var netbalance=parseFloat(0-totamount)-parseFloat(totalpaid);
	 $("#netamount").val(netbalance);
    }
    if (totamount!="" && totamount>=0)
    {
	 var netbalance=parseFloat(totamount)+parseFloat(totalpaid);
	 $("#netamount").val(netbalance);
    }
   
}	 
    
    function delrow(slno)
	   {
	   $('#'+slno).remove();
	    $.ajax({url:"delete_free.php?slnoo="+slno,success:function(result)
				{
				}
				});
	   }
	   function forgetEnterKey(evt)
{
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && ((node.type == "text") || 
          (node.type == "password")))
    {
        return false;
    }
} 
document.onkeypress = forgetEnterKey;
  </script>
  
     <script type="text/javascript">
       $(document).keyup(function(e) {
	  var j=$('#hiddenival').val();
	 // alert(j);
  /*if (e.keyCode == 66) {
    $(".bcd"+j).focus();
   // $("#code_read_box").val(String.fromCharCode(e.keyCode));
  }*/
  if(e.keyCode == 65)
  {
  var proselect=$("#select"+j).val();
  var prosel=$("#sel"+j).val();
	  if(proselect){
	 // $("#select"+j).focus();
	  }
	  else if(prosel)
	  {
	   $("#sel"+j).focus();
	  }
  }
   if(e.keyCode == 81)
  {
  $("#quantity"+j).focus();
  }
  if(e.keyCode == 66)
  {
  $("#dis"+j).focus();
  }
  if(e.keyCode == 67)
  {
  $("#paycard").focus();
  }
  if(e.keyCode == 89)
  {
  $("#payamount").focus();
  }
});
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
				    <input type="text" name="barcode" id="barcode1" onblur="return addbar(this.value)" class="text">
				    <input type="hidden" name="hduid" id="hduid"/>
				</td>
				<td>&nbsp;</td>
				<!--<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text" onBlur="return fetch1(this.value)"/></td>-->
				<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text"/></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			    </tr>
			</table>
			<table>
			    <tr>
				<th>Barcode</th>
				<th>Product</th>
				<th>Quntity</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Total</th>
				<th>Action</th>
			    </tr>
			    <tbody id="tbb"></tbody>
			    <tr>
				<td colspan="7">Total Rs.<input type="text" name="alltotal" id="alltotal" class="text" readonly="true"></td>
			    </tr>
			    <tr>
				 <tbody id="addrest"></tbody>
			  </tr>
			     <tr>
				<td colspan="7">Balance<input type="text" name="netamount" id="netamount" class="text" readonly="true"></td>
				<input type="hidden" name="arrtotal" id="arrtotal">
				    <input type="hidden" name="hiddenival" id="hiddenival">
			    </tr>
			    <tr>
				<td><input type="submit" name="submit" value="submit"></td>
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
