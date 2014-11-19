<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$getproduct=mysql_query("select * from `purchase`")or die(mysql_error());
while($resproduct=mysql_fetch_array($getproduct))
{
    $id=$resproduct['product_id'];
    $getname=mysql_query("select * from `product` where `id`='$resproduct[product_id]'")or die(mysql_error());
    $resname=mysql_fetch_array($getname);
$getemail[] = array(
'value'  =>$resname['prod_name'],
'idval' => $resproduct['bar']
	);
}

 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
	
    <script src="js/jquery.min.js"></script>
	 <!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrug=<?= json_encode($getemail); ?>;
        $('#productname').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrug,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#productname').val(valshow);
		 $('#hpid').val(ui.item.idval);
		 $('#bar').val(ui.item.idval);
		 var bar=$('#hpid').val();
		 fetchdet(bar)
        return false;
		}
        });
});
</script>
 <!--autocomplete end-->
  <script>
    function focs()
    {
       $('#code').focus();
    }
  </script>
  <script>
    function fetchdet(val)
    {
	//alert(val);
	$.ajax({url:"fetchdetail.php?code="+val,success:function(result){
                $("#prodetail").html(result);
$('#qtyid').focus();
var pid=$('#hpid').val();
stckavl(pid);
                }});  
    }
    function fetchdet1(val)
    {
	//alert(val);
	$.ajax({url:"fetchdetail.php?code="+val,success:function(result){
                $("#prodetail").html(result);
$('#qtyid').focus();
var pid=$('#hpid').val();
stckavl(pid);
                }});  
    }
  </script>
  <script  type='text/javascript'>

function numberonly()

{
	var contact=document.getElementById('price').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{
	    $("#price").val("");
            alert("Enter numeric value");

			return false;
    }
	
}

</script>
  <script type="text/javascript">
function numbersonly(e,qtval){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
var x=$("#quantt").val();
if((qtval-0)>(x-0))
{
alert("stock not available");
$('#qtyid').val(''); 
return false;
}
}

function chec()
{
var quantt=$('#quantt').val();
var qu=$('#qtyid').val();
if(quantt>qu){$('#qtyid').val("")}
}

function change(cunid)
{
   //alert(cunid);
    $.ajax({url:"addorder.php?uid="+cunid,success:function(result){
                $('#order').val(result);
                }});
   $.ajax({url:"addmrp.php?uid="+cunid,success:function(result){
                $('#mrp').val(result);
                }});
   $.ajax({url:"addspri.php?uid="+cunid,success:function(result){
                $('#spri').val(result);
		var pid=$('#hpid').val();
		stckavl(pid);
		var retailpcnt=$('#retailpcnt').val();
		var distpcnt=$('#distpcnt').val();
		var custpcnt=$('#custpcnt').val();
		//alert(retailpcnt);
		//alert(distpcnt);
		//alert(custpcnt);
		calprice1(retailpcnt)
		calprice2(distpcnt)
		calprice3(custpcnt)
$('#qtyid').focus();
                }});  
}
</script>
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_stock.php?id1="+vals;
			}
		}
		function stckavl(pi)
		{
		$.ajax({url:"checkavl.php?pidval="+pi,success:function(result){
              $("#stk").html(result);
                }}); 
		}
		function valid()
		{
		var bcode=$('#code').val();
		var selval=$("#sel").val();
		var qval=$('#qtyid').val(); 
		var avl=$("#quantt").val();
		var prval=$("#price").val();
		if(bcode=="")
		{
		alert("enter barcode");
		return false;
		}
		if(selval==0)
		{
		alert("choose a product");
		return false;
		}
		if(qval=="")
		{
		alert("enter quantity");
		return false;
		}
		if((qval-0)>(avl-0))
		{
		alert("stock not available");
		$('#qtyid').val(''); 
		return false;
		}
		if(prval=="")
		{
		alert("enter price");
		return false;
		}
		}
</script>
<script>
    function calprice1(cval)
{
   //alert(cval);
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
 var totalprice=totalprice1.toFixed(2)
 $("#priceretailer").val(totalprice);
}
function calprice2(cval)
{
   // alert(cval);
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
  var totalprice=totalprice1.toFixed(2)
 $("#pricedistributer").val(totalprice);
}
function calprice3(cval)
{
    //alert(cval);
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
  var totalprice=totalprice1.toFixed(2)
 $("#price").val(totalprice);
}
</script>
<script>
    function calpercent1(cval)
{
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#retailpcnt").val(rpcen);
  }
}
function calpercent2(cval)
{
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#distpcnt").val(rpcen);
  }
}
function calpercent3(cval)
{
 var mrp=$("#mrp").val();
  var spri=$("#spri").val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#custpcnt").val(rpcen);
  }
}
</script>

</head>
<body onLoad="focs()">
    <div id="wrapper">
       <div id="header">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Product Stock</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="insert_stock.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">
				    <table class="table" style="width:100%;">
					<tr>
					<td>Bar</td>
					<td colspan="2"><input type="text" name="bar" id="bar" onBlur="return fetchdet(this.value);" class="text"></td>
					</tr>
					<tbody id="prodetail">
					<tr>
					    <td>Product Name</td>
					    <td colspan="2">
						<input type="text" name="productname" id="productname" class="text">
						<input type="hidden" name="hpid" id="hpid">
						</td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><input type="text" name="quant"  onBlur="return chec(this.value);" class="text" id="qtyid"/></td>
						<td id="stk"></td>
					</tr>
					<tr>
						<td>Mrp</td>
						<td colspan="2"><input type="text" name="mrp" id="mrp" class="text"></td>
					</tr>
					<tr>
						<td colspan="3">Purchase Price</td>
					</tr>
					
					<tr>
						<td>Retailer</td>
						<td>Distributer</td>
						<td>Customer</td>
					</tr>
					<tr>
					<td><input type="text" name="retailpcnt" id="retailpcnt" class="text" style="width: 50px; margin-right:3px;" />%<input type="text" name="priceretailer" id="priceretailer" class="text"  style="width: 50px;  margin-right:3px;margin-left:4px;"/>Rs</td>
					<td><input type="text" name="distpcnt" id="distpcnt" class="text"  style="width: 50px; margin-right:3px;"  />%<input type="text" name="pricedistributer" id="pricedistributer" class="text" style="width: 50px; margin-right:3px;margin-left:4px;"/>Rs</td>
					<td><input type="text" name="custpcnt" id="custpcnt" class="text" style="width: 50px; margin-right:3px;"  />%<input type="text" name="price" id="price" class="text"  style="width: 50px; margin-right:3px;margin-left:4px;"/>Rs</td>
					</tr>
					</tbody>
					
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn" class="button2"/></td>
					     <td>&nbsp;</td>
					</tr>
				    </table>
				    </form>
				   <table class="table" cellspacing="0" cellpadding="0" style="line-height:3;" align="center">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
						<th>Barcodeno</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Retailer price</th>
						<th>Distributer price</th>
						<th> Customer Price</th>
						<th> Total Price</th>
					   <!-- <th>Action</th>-->
					</tr>
					<?php
					$fetstock=mysql_query("select * from `stock`");
					while($resstock=mysql_fetch_array($fetstock))
					{
					    $getname=mysql_query("select * from `product` where `barcode`='$resstock[barcode]'")or die(mysql_error());
					    $resname=mysql_fetch_array($getname);
					?>
					<tr>
						<td class="td"><?php echo $resstock['barcode'];?></td>
						<td class="td"><?php echo $resname['prod_name'];?></td>
						<td class="td"><?php echo $resstock['quantity'];?></td>
						<td class="td"><?php echo $resstock['retailer_price'];?></td>
						<td class="td"><?php echo $resstock['distributer_price'];?></td>
						<td class="td"><?php echo $resstock['price'];?></td>
						<td class="td" style="border-right:1px solid #adadad;"><?php echo $resstock['totprice'];?></td>
						 <!--<td  class="td" style="border-right:1px solid #adadad;"><a href="edit_stock.php?id=<?php echo $resstock['id'];?>"><img src="image/edit.png" width="60"></a></td>-->
					    <!--<td onClick="delete_data(<?php echo $resstock['id']; ?>)" class="td" style="border-right:1px solid #adadad;"><img src="image/delete.png" width="70"></td>-->
					</tr>
					<?php 
					}
					?>
				    </table>
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
