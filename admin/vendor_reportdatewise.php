<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
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
				<h3>Purchase Report Daywise</h3>
				</div>
				<div class="content3">
<form name="f" method="post">
<table class="table" style="height:100px;">
<tr>
<td>Date:</td>
<td>From</td>
<td><input type="text" name="rpt" size="12" id="inputField" class="text"/></td>
<td>To</td>
<td><input type="text" name="rpt1" size="12" id="inputField1" class="text"/></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td>&nbsp;</td> 
<td>
<input type="submit" name="submit" value="submit"  class="btn"/>
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['rpt']) && isset($_POST['rpt1'])){
?>
<div style="width:auto; height:auto; float:left; margin-left:10px; word-spacing:5px;">
<?php
$from=$_POST['rpt'];
$to=$_POST['rpt1'];
$sql=mysql_query("select * from `purchase` where date between '$_POST[rpt]' and '$_POST[rpt1]' ");
$res=mysql_fetch_array($sql);
echo "<span style='font-family:arial; font-size:16px; color:#51A351;'>Report From"."  ".$from." To ".$to."</span><span style='font-weight:bold;color:#51A351;margin-left:5px;'>:</span>";

?>
</div>
<?php
}
?>
				   <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
										<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
											<th>Vendor</th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Date</th>
										</tr>
										</table>
				   <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				      <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
										<?php
										if(isset($_POST['rpt'])=="" && isset($_POST['rpt1'])==""){
						$sqlsell=mysql_query("select * from `purchase`");
						}
						
						else{
						$sqlsell=mysql_query("select * from `purchase` where date between '$_POST[rpt]' and '$_POST[rpt1]'");
						$no=mysql_num_rows($sqlsell);
						if($no>0){
						}
						else{
						echo "<span style='font-family:arial;margin-left:20px;color:red;'>"."You have no records"."</span>";
						}
						}
						while($resdetail=mysql_fetch_array($sqlsell))
						{ $vid=$resdetail['vendor_id'];
						$pid=$resdetail['product_id'];
						
						$fvendor=mysql_query("select * from `vendor` where `slno`='$vid'");
						$fres=mysql_fetch_array($fvendor);
						$fproduct=mysql_query("select * from `product` where `id`='$pid'");
						$rproduct=mysql_fetch_array($fproduct);
						?>
						<tr>
						    <td  class="td"><?php echo $fres['name']."(".$fres['phone'].")";?></td>
						    <td  class="td"><?php echo $rproduct['prod_name'];?></td>
						    <td  class="td"><?php echo $resdetail['quantity'];?></td>
						    <td  class="td"><?php echo $resdetail['price'];?></td>
						    <td class="td" style="border-right:1px solid #adadad;"><?php echo $resdetail['date'];?></td>
						</tr><?php }?>
									</table>
				   </div>
				    <div id="content2" style="width:800px; padding:10px; ">
					<form name="f" method="post" action="vendorpurchase_to_excel.php">
					 <?php
					 if(isset($_POST['rpt'])=="" && isset($_POST['rpt1'])==""){
					  ?>
					    <input type="submit" name="submi" value="hardcopy">
					    <input type="hidden" name="table" value="transaction">
					      <?php } else{?>
					     <input type="submit" name="submi" value="hardcopy">
					    <input type="hidden" name="table" value="transaction">
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
