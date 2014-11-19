<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$getdrugdet=mysql_query("select * from `vendor`")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
$getemail[] = array(
'value'  =>$resdrugdet['name'],
'idval' => $resdrugdet['slno']
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
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('.vend').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('.vend').val(valshow);
		 $('.hdvendval').val(ui.item.idval);
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
    function found(mrpval)
    {
	//alert(mrpval);
	$.ajax({url:"percentprice_ajax.php?mrp="+mrpval,success:function(result){
              $("#addprice").html(result);
                }}); 
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
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Product Stock</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:100px; margin-top:10px; font-family:arial;">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="readystock.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">
				    <table class="table">
					<tr>
					<td>Barcode</td>
					<td><input type="text" name="barcode" value="" id="code"></td>
					</tr>
					<tr>
					<td>category</td>
					<td>
						<select name="category">
						<?php
						$sqlcat=mysql_query("select * from `category`");
						while($rescat=mysql_fetch_array($sqlcat)){
						?>
						<option value="<?php echo $rescat['id']; ?>"><?php echo $rescat['cat_name'];?></option><?php }?>
						</select>
						</td>
					</tr>
					<tr>
					<td>company</td>
					<td>
						<select name="company">
						<?php
						$sqlcomp=mysql_query("select * from `company`");
						while($rescomp=mysql_fetch_array($sqlcomp)){
						?>
						<option value="<?php echo $rescomp['id']; ?>"><?php echo $rescomp['comp_name'];?></option><?php }?>
						</td>
					</tr>
					<tr>
					<td>Unit</td>
					<td>
					<select name="unit">
					<option value="pc">piece</option>
					<option value="kg">Kg</option>
					<option value="lt">liter</option>
					</select>
					</td>
					</tr>
					<tr>
					<td>product</td>
					<td><input type="text" name="product"></td>
					</tr>
					<tr>
					<tr>
					<td>MRP</td>
					<td><input type="text" name="mrp" id="mrp" onblur="found(this.value)"></td>
					<tbody id="addprice">   
					</tr>
					<tr>
					<td>Retailer</td>
					<td>Distributer</td>
					<td>Customer</td>
					</tr>
					<tr>
						<td><input type="text"  readonly="true"  class="text"/></td>
						<td><input type="text"  readonly="true" class="text"/></td>
						<td><input type="text"  readonly="true"  class="text"/></td>
					</tr>
					</tbody>
					<tr>
					<td colspan="2"><input type="submit" name="submit" value="insert"></td>
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
