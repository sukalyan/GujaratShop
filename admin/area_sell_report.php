<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 $getarea=mysql_query("select * from `area`")or die(mysql_error());
   while($resarea=mysql_fetch_array($getarea))
    {
	$getemail[] = array(
	'value'  => $resarea['introducer_id'],
	'idval' => $resarea['introducer_id']
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
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('#area').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#area').val(valshow);
		 $('#hiarea').val(ui.item.idval);
		}
        });
});
  </script>
  <!--datepicker start--->
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			
		});
		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%Y-%m-%d"
			
		});
	};
</script>
<!--datepicker end--->
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
				<h3>Sell Report Areawise</h3>
				</div>
				<div class="content3">
<form name="f" method="post">
<table class="table" style="height:100px;">
 <tr>
  <td>Area</td>
  <td><input type="text" name="area" id="area"></td>
  <input type="hidden" name="hiarea" id="hiarea">
 </tr>
 <tr>
  <td><input type="submit" name="submit" value="show" class="btn"></td>
 </tr>
</table>
<table class="table" style="height:100px;">
<tr>
<td>Date:</td>
<td>From</td>
<td><input type="text" name="dt1" size="12" id="inputField" class="text"/></td>
<td>To</td>
<td><input type="text" name="dt2" size="12" id="inputField1" class="text"/></td>
</tr>
<tr> 
<td>
<input type="submit" name="sub" value="submit"  class="btn"/>
</td>
</tr>
</table>
</form>
				  <?php
				   if(isset($_POST['submit']))
				     {
				      $are1=$_REQUEST['hiarea'];
				      $sqlare1=mysql_query("select * from `area` where `introducer_id`='$are1'");
				      $resare1=mysql_fetch_array($sqlare1);
				      echo "<span style='font-family:arial;margin-left:20px;color:red;'>"."Sell Report for $resare1[area]"."</span>";
				     }
				   ?>
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
										if(isset($_POST['submit']))
										{
										 $are=$_REQUEST['hiarea'];
										 $sqlintro=mysql_query("select * from `vendor` where `introducer`='$are'");
										while($resintro=mysql_fetch_array($sqlintro))
										{
										 $custid=$resintro['slno'];
										 $sqlsell=mysql_query("select * from `sell` where `name`='$custid'");
										 
											while($ressell=mysql_fetch_array($sqlsell))
												{
											$sqlproname=mysql_query("select * from `product` where `id`='$ressell[productid]' ");
											$resproname=mysql_fetch_array($sqlproname);
											$total=$total+$ressell['totprice'];
										?>
										<tr>
										    <td class="td" style="width: 74px;"><?php  echo $ressell['date'];?></td>
										    <td class="td"  style="width: 200px;"><?php  echo $resproname['prod_name'];?></td>
										    <td class="td"  style="width: 100px;"><?php  echo $ressell['quantity'];?></td>
										    <td class="td"  style="width: 100px;"><?php  echo $ressell['price'];?></td>
										    <td class="td" style="border-right:1px solid #adadad;"  style="width: 100px;"><?php  echo $ressell['totprice'];?></td>
											<!--<td class="td" style="border-right:1px solid #adadad;"><?php  //echo $ressell['barcode'];?></td>-->
										</tr>
										<?php
												}}}
										?>
										<?php
										if(isset($_POST['sub']))
										{
										 $are=$_REQUEST['hiarea'];
										 $from=$_POST['dt1'];
										 $to=$_POST['dt2'];
										 $sqlintro=mysql_query("select * from `vendor` where `introducer`='$are'");
										while($resintro=mysql_fetch_array($sqlintro))
										{
										 $custid=$resintro['slno'];
										
										 $sqlsell=mysql_query("select * from `sell` where `date` between '$_POST[dt1]' and '$_POST[dt2]'");
										 
											while($ressell=mysql_fetch_array($sqlsell))
												{
												 $nid=$ressell['name'];
												if($nid==$custid){
											$sqlproname=mysql_query("select * from `product` where `id`='$ressell[productid]' ");
											$resproname=mysql_fetch_array($sqlproname);
											$total=$total+$ressell['totprice'];
										?>
										<tr>
										    <td class="td" style="width: 74px;"><?php  echo $ressell['date'];?></td>
										    <td class="td"  style="width: 200px;"><?php  echo $resproname['prod_name'];?></td>
										    <td class="td"  style="width: 100px;"><?php  echo $ressell['quantity'];?></td>
										    <td class="td"  style="width: 100px;"><?php  echo $ressell['price'];?></td>
										    <td class="td" style="border-right:1px solid #adadad;"  style="width: 100px;"><?php  echo $ressell['totprice'];?></td>
											<!--<td class="td" style="border-right:1px solid #adadad;"><?php  //echo $ressell['barcode'];?></td>-->
										</tr>
										<?php
												}}}}
										?>
									</table>
				   </div>
				   <table border="1" class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
				       <tr>
					<td colspan="3" align="center">TOTAL</td>
					<td style="color:#FF0000;" align="center"><strong><?php echo $total;?></strong></td>
				       </tr>
				   </table>
				   <div id="content2" style="width:800px; padding:10px; ">
		<form name="f" method="post" action="sell_to_excel.php">
		 <?php
		 if(isset($_POST['rpt'])=="" && isset($_POST['rpt1'])==""){
		  ?>
		    <input type="submit" name="submi" value="hardcopy">
		    <input type="hidden" name="table" value="sell">
		      <?php } else{?>
		     <input type="submit" name="submi" value="hardcopy">
		    <input type="hidden" name="table" value="sell">
		     <input type="hidden" name="from" value="<?php echo $from;?>">
		      <input type="hidden" name="to" value="<?php echo $to;?>">
		      <?php }?>
		</form>
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
