<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 
 $getcategory=mysql_query("select * from `category`")or die(mysql_error());
   while($rescategory=mysql_fetch_array($getcategory))
    {
	$getcat[] = array(
	'value'  => $rescategory['cat_name'],
	'idval' => $rescategory['id']
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
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getcat); ?>;
        $('#cnm').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#cnm').val(valshow);
		 $('#catid').val(ui.item.idval);
		}
        });
});
</script>
</head>
<body>
    <div id="wrapper">
       <div id="header">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Sell Report Categorywise</h3>
				</div>
				<div class="content3">
<form name="f" method="post" action="">
<table class="table" style="height:100px;">
 <tr>
  <td>category</td>
  <td><input type="text" name="cat" id="cnm" class="text"></td>
  <input type="hidden" name="catid" id="catid">
 </tr>
<tr>
<td>&nbsp;</td>
<td>
<input type="submit" name="submit" value="submit"  class="btn"/>
</td>
</tr>
</table>
</form>
				   <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
										<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
											<th style="width: 70px;">Date</th>
											<th style="width: 200px;">Product Name</th>
											<th style="width: 85px;">Quantity</th>
											<th>Price</th>
											<th>Total Price</th>		
											<!--<th>Barcode</th>-->
										</tr>
										</table>
				   <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				      <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
										<?php
										 if(isset($_POST['cat']))
										 {
										  $id=$_REQUEST['catid'];
										  $sqlstock=mysql_query("select * from `stock` where `cat`='$id'");
										 }
											while($restock=mysql_fetch_array($sqlstock))
											   {
											$sqlsell=mysql_query("select * from `sell` where `uniqueid`='$restock[uniqueid]'");
											while($ressell=mysql_fetch_array($sqlsell))
											{
											 $sqlproduct=mysql_query("select * from `product` where `id`='$restock[product_id]'");
											 $resproduct=mysql_fetch_array($sqlproduct);
										?>
										<tr>
										    <td class="td" style="width: 74px;"><?php  echo $ressell['date'];?></td>
											<td class="td"  style="width: 200px;"><?php  echo $resproduct['prod_name'];?></td>
											<td class="td"  style="width: 100px;"><?php  echo $ressell['quantity'];?></td>
											<td class="td"  style="width: 100px;"><?php  echo $ressell['price'];?></td>
											<td class="td" style="border-right:1px solid #adadad;"><?php  echo $ressell['totprice'];?></td>
											<!--<td class="td" style="border-right:1px solid #adadad;"><?php  //echo $ressell['barcode'];?></td>-->
										</tr>
										<?php
												}}
										?>
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
 <?php }?>
