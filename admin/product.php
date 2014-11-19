<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$getcategory=mysql_query("select * from `category`")or die(mysql_error());
while($rescategory=mysql_fetch_array($getcategory))
{
$getemail[] = array(
'value'  =>$rescategory['cat_name'],
'idval' => $rescategory['id']
	);
}
$getcompany=mysql_query("select * from `company`")or die(mysql_error());
while($rescompany=mysql_fetch_array($getcompany))
{
$getemails[] = array(
'value'  =>$rescompany['comp_name'],
'idval' => $rescompany['id']
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
        $('#catid').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrug,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#catid').val(valshow);
		 $('#hdcatid').val(ui.item.idval);
        return false;
		}
        });
});
</script>
<script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemails); ?>;
        $('#compid').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#compid').val(valshow);
		 $('#hdcompid').val(ui.item.idval);
        return false;
		}
        });
});
</script>
 <!--autocomplete end-->
  <!--<script>
    function focs()
    {
       $('#code').focus();
    }
  </script>-->
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
  <script  type='text/javascript'>

function numberonly0(contact)
{
if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#retailer_pcent").val("");
		$('#retailer_pcent').focus();
return false;
   }
}
function numberonly1(contact)
{
if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#distributer_pcnt").val("");
		$('#distributer_pcnt').focus();
return false;
   }
}
function numberonly2(contact)
{
if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#customer_pcnt").val("");
		$('#customer_pcnt').focus();
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
</script>
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_stock.php?id1="+vals;
			}
		}
		function stckavl(pid)
		{
		$.ajax({url:"checkavl.php?pidval="+pid,success:function(result){
              $("#stk").html(result);
                }}); 
		}
</script>
<script>
function valid()
		{
		var prodval=$('#prod').val();
		if(prodval=="")
		{
		alert("enter product");
		return false;
		}
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
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
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
				<h3>Add Product</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="product_action.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">
				    <table class="table" style="height:100px;">
					<tr>
					    <td>product</td>
					    <td>category</td>
					    <td>company</td>
					    <td>minimum quantity</td>
					</tr>
					<tr>
					    <td><input type="text" name="product" class="text" id="prod"></td>
					    <td>
						<input type="text" name="categ" id="catid" class="text" />
						<input type="hidden" name="category" id="hdcatid"/>
						<!--<select name="category" class="text wdt" id="cat">
						<?php
						$sqlcat=mysql_query("select * from `category`");
						while($rescat=mysql_fetch_array($sqlcat)){
						?>
						<option value="<?php echo $rescat['id']; ?>"><?php echo $rescat['cat_name'];?></option><?php }?>
						</select>-->
					    </td>
					
					    <td>
						<input type="text" name="compa" id="compid" class="text" />
						<input type="hidden" name="company" id="hdcompid"/>
						<!--<select name="company" class="text wdt" id="comp">
						<?php
						$sqlcomp=mysql_query("select * from `company`");
						while($rescomp=mysql_fetch_array($sqlcomp)){
						?>
						<option value="<?php echo $rescomp['id']; ?>"><?php echo $rescomp['comp_name'];?></option><?php }?>
						</select>-->
					    </td>
					    <td><input type="text" name="min" class="text" value="1"/></td>
					</tr>
					    <!--<tr>
						<?php
						$fetch=mysql_query("select * from `percent`");
						$res=mysql_fetch_array($fetch);
						?>
						<td>Retailer</br><input type="text" name="retailer_pcnt" id="retailer_pcent" value="<?php echo $res['retailer'];?>" onblur="return numberonly0(this.value)" class="text wdt"><span style="margin-left:5px;">%</span></td>
						<td>Distributer</br><input type="text" name="distributer_pcnt" id="distributer_pcnt" value="<?php echo $res['distributer'];?>" onblur="return numberonly1(this.value)"  class="text wdt"><span  style="margin-left:5px;">%</span></td>
						<td>Customer</br><input type="text" name="customer_pcnt" id="customer_pcnt" value="<?php echo $res['customer'];?>" onblur="return numberonly2(this.value)"  class="text wdt"><span  style="margin-left:5px;">%</span></td>
					    </tr>-->
					    <tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="insert" class="btn"></td>
					</tr>
				    </table>
					</form>
					<table class="table" cellpadding="0" cellspacing="0" style="line-height:3;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Product</th>
						<th>Category</th>
						<th>Company</th>
						<th>minimum</th>
					    <th>Action</th>
					</tr>
				    </table>
				    <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				       <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<?php
					$fet=mysql_query("select * from `product`");
					while($res=mysql_fetch_array($fet)){
					$sqlcat=mysql_query("select * from `category` where `id`='$res[category]'");
					$rescat=mysql_fetch_array($sqlcat);
					$sqlcomp=mysql_query("select * from `company` where `id`='$res[company]'");
					$rescomp=mysql_fetch_array($sqlcomp);
					?>
					<tr>
					    <td class="td"><?php echo $res['prod_name'];?></td>
						<td class="td"><?php echo $rescat['cat_name'];?></td>
						<td class="td"><?php echo $rescomp['comp_name'];?></td>
						<td class="td"><?php echo $res['minimum'];?></td>
					    <td class="td" style="border-right:1px solid #adadad;"><a href="edit_product.php?id=<?php echo $res['id'];?>"><img src="image/edit.png" width="57"></a></td>
					</tr><?php }?>
					</table>
				    </div>
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
