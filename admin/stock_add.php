<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
/*$bcode=$_GET['bcode'];
$prodname=$_GET['prodnm'];
$totquantity=$_GET['quant'];
$mrpp=$_GET['mrpvals'];
$prcval=$_GET['prvall'];
$compy=$_GET['compy'];
$category=$_GET['category'];
$vidval=$_GET['vid'];

$quantity=$_GET['qt'];
$freequantity=$_GET['fre'];
$pricval=$_GET['pval'];
$dicnt=$_GET['disc'];
$dicnt1=$_GET['disc1'];
$dicnt2=$_GET['disc2'];
$taxvalue=$_GET['tx'];
$totaltaxvalue=$_GET['tt'];
$totalamount=$_GET['amnt'];

$mrpval=$mrpp-$prcval;
$sql=mysql_query("select * from `percent`");
$res2=mysql_fetch_array($sql);
$retailer=$res2['retailer'];
$distributer=$res2['distributer'];
$customer=$res2['customer'];
$aret=$mrpval*($retailer/100);
$ret1=$prcval+$aret;
$ret=number_format((float)$ret1, 2, '.', ''); 
$adis=$mrpval*($distributer/100);
$dis1=$prcval+$adis;
$dis=number_format((float)$dis1, 2, '.', ''); 
$acust=$mrpval*($customer/100);
$cust1=$prcval+$acust;
$cust=number_format((float)$cust1, 2, '.', ''); */

 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
	
    <script src="js/jquery.min.js"></script>
	
  <script>
    function focs()
    {
       $('#bar').focus();
    }
  </script>

  <script  type='text/javascript'>

function numberonly()

{
	var contact=document.getElementById('spri').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{
	    $("#spri").val("");
            alert("Enter numeric value");

			return false;
    }
	
}

</script>
  <script type="text/javascript">
function chec()
{
var quantt=$('#quantt').val();
var qu=$('#qtyid').val();
if(quantt>qu){$('#qtyid').val("")}
}

function change(val)
{
		var retailpcnt=$('#retailpcnt'+val).val();
		var distpcnt=$('#distpcnt'+val).val();
		var custpcnt=$('#custpcnt'+val).val();
		calprice1(retailpcnt,val);
		calprice2(distpcnt,val);
		calprice3(custpcnt,val);
//$('#qtyid').focus();
}
</script>

<script>
    function calprice1(cval,ival)
{
  //alert(cval);
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
 var totalprice=totalprice1.toFixed(2)
 $("#priceretailer"+ival).val(totalprice);
}
function calprice2(cval,ival)
{
    //alert(cval);
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
  var totalprice=totalprice1.toFixed(2)
  //alert(totalprice);
 $("#pricedistributer"+ival).val(totalprice);
}
function calprice3(cval,ival)
{
    //alert(cval);
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
  var tmrp=mrp-spri;
 var fprice=tmrp*(cval/100);
 var totalprice1=(spri-0)+(fprice-0);
  var totalprice=totalprice1.toFixed(2)
 $("#price"+ival).val(totalprice);
}
</script>
<script>
  function change1(val)
{
		var retailprice=$('#priceretailer'+val).val();
		calpercent1(retailprice,val);
//$('#qtyid').focus();
}
function change2(val)
{
		var distprice=$('#pricedistributer'+val).val();
		calpercent2(distprice,val);
}
function change3(val)
{
		var custprice=$('#price'+val).val();
		calpercent3(custprice,val);
//$('#qtyid').focus();
}
    function calpercent1(cval,ival)
{
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#retailpcnt"+ival).val(rpcen);
  }
}
function calpercent2(cval,ival)
{
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#distpcnt"+ival).val(rpcen);
  }
}
function calpercent3(cval,ival)
{
 var mrp=$("#mrp"+ival).val();
  var spri=$("#cprice"+ival).val();
   var tmpr=mrp-spri;
  if ((cval-0)>(spri-0) && (cval-0)<(mrp-0))
  {
    var pro=cval-spri;
    var rpcen=(pro/tmpr)*100;
    $("#custpcnt"+ival).val(rpcen);
  }
}
function show_checked(ival)
{
  var bar=$("#bar"+ival).val();
  $.ajax({url:"findlastprice.php?bar="+bar,success:function(result){
		var arr=result.split("|");
		alert(arr[0]);
		$("#custpcnt"+ival).val(arr[0]);
		$("#priceretailer"+ival).val(arr[1]);
		$("#pricedistributer"+ival).val(arr[2]);
                 }}); 
}
</script>
<style>
  input{ width: 50px;}
  
</style>
</head>
<body onLoad="focs()">
    <div id="wrapper">
       <!--<div id="header">Admin Panel</div>-->
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php //include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Product Stock</h3>
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="stock_insert1.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">
				    <table class="table" style="width:100%;">
					<tr>
					<td>Bar</td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Mrp</td>
					<td>Price</td>
					<td colspan="2">Retailer</td>
					<td colspan="2">Distributer</td>
					<td colspan="2">Customer</td>
					</tr>
					<?php
					$i=1;
					$fetch=mysql_query("select * from `tempuid`");
					while($res=mysql_fetch_array($fetch))
					{
					  //echo "select * from `purchase` where `uniqueid`='$res[uid]'";
					  $fetch1=mysql_query("select * from `purchase` where `uniqueid`='$res[uid]'");
					  $res1=mysql_fetch_array($fetch1);
					  
					  $fetchname=mysql_query("select * from `product` where `id`='$res1[product_id]'");
					  $resname=mysql_fetch_array($fetchname);
					  
					  $query=mysql_query("select * from `percent`");
					  $fetch2=mysql_fetch_array($query);
					       $cust=$fetch2['customer'];
					       $distributer=$fetch2['distributer'];
					      $retailer=$fetch2['retailer'];
					     
					     $totalamount=$res1['totalamount'];
					     $quantity=$res1['quantity'];
					     
					       $mrps=$res1['mrp'];
					       $price=$totalamount/$quantity;
					      
					      $p=$mrps-$price;
					      $dpect=$p*($distributer/100);
					      $dprice=$dpect+$price;
					  
					      $cpect=$p*($cust/100);
					      $cprice=$cpect+$price;
					      
					       
					      $rpect=$p*($retailer/100);
					      $rprice=$rpect+$price;
					?>
					<tr>
					<td><input type="text" name="bar[]" id="bar<?php echo $i;?>" value="<?php echo $res1['bar'];?>" readonly="true"  class="text"></td>
					 <td> <input type="text" name="productname[]" id="productname<?php echo $i;?>" value="<?php echo $resname['prod_name'];?>" readonly="true" class="text"></td>
					    <td><input type="text" name="quant[]" id="qunt<?php echo $i;?>" value="<?php echo $res1['totalquantity'];?>"  class="text" id="qtyid"/></td>
					   <td><input type="text" name="mrp[]" id="mrp<?php echo $i;?>" value="<?php echo $res1['mrp'];?>" readonly="true"  class="text"></td>
					  <td><input type="text" name="cprice[]" value="<?php echo $price;?>" id="cprice<?php echo $i;?>" readonly="true" ></td>
					
					<td><input type="text" name="retailpcnt[]" id="retailpcnt<?php echo $i;?>" value="<?php echo $retailer;?>" onBlur="return change(<?php echo $i;?>)" class="text" style="width: 50px; margin-right:3px;" />%</td>
					<td><input type="text" name="priceretailer[]" id="priceretailer<?php echo $i;?>" value="<?php echo $rprice;?>" onBlur="return change1(<?php echo $i;?>)"  class="text"  style="width: 50px;  margin-right:3px;margin-left:4px;"/>Rs</td>
					
					<td><input type="text" name="distpcnt[]" id="distpcnt<?php echo $i;?>" class="text" value="<?php echo $distributer;?>" onBlur="return change(<?php echo $i;?>)"  style="width: 50px; margin-right:3px;"  />%</td>
					<td><input type="text" name="pricedistributer[]" id="pricedistributer<?php echo $i;?>" value="<?php echo $dprice;?>" onBlur="return change2(<?php echo $i;?>)"  class="text" style="width: 50px; margin-right:3px;margin-left:4px;"/>Rs</td>
					
					<td><input type="text" name="custpcnt[]" id="custpcnt<?php echo $i;?>" class="text" value="<?php echo $cust;?>" onBlur="return change(<?php echo $i;?>)" style="width: 50px; margin-right:3px;"  />%</td>
				        <td><input type="text" name="price[]" id="price<?php echo $i;?>" class="text"  value="<?php echo $cprice;?>" onBlur="return change3(<?php echo $i;?>)"  style="width: 50px; margin-right:3px;margin-left:4px;"/>Rs</td>
					<td><input type="checkbox" name="chq[]" id="chq<?php echo $i;?>" class="text" onclick="return show_checked(<?php echo $i;?>)">check</td>
					<input type="hidden" name="hpid[]" value="<?php echo $res1['product_id'];?>" id="hpid<?php echo $i;?>">
					<input type="hidden" name="uid[]" value="<?php echo $res['uid'];?>" id="huid<?php echo $i;?>">
					<input type="hidden" name="catid[]" value="<?php echo $resname['category'];?>" id="catid<?php echo $i;?>">
					<input type="hidden" name="comid[]" value="<?php echo $resname['company'];?>" id="comid<?php echo $i;?>">
					<input type="hidden" name="order[]" value="<?php echo $res1['order_no'];?>" id="order<?php echo $i;?>">
					
					</tr>
					<tr>
					<?php $i++;}?>
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn" class="button2"/></td>
					     <td>&nbsp;</td>
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
