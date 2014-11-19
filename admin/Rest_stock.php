<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
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
				<h3>Rest Product Stock</h3>
				</div>
				<div class="content3">
<form name="f" action="insert_comment.php" method="post">
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr >
<td colspan="2" style="font-weight:bold;">Rest Inventory:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
<th>Product name</th>
<th>Quantity</th>
<th>Mrp</th>
<th>Price</th>
<th>Barcode</th>
</tr>
</table>
 <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
  <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
     <?php
  $sql=mysql_query("select *,sum(`totalquantity`) as quant from `purchase` group by `uniqueid`");
  while($ress=mysql_fetch_array($sql)){
  //echo "<br/>".$ress['quant']."-----".$ress['product_id']."----".$ress['uniqueid']."stock<br/>";
  $purchasequant=$ress['quant'];
  $sqlstock=mysql_query("select *,sum(`quantity`) as qty from `stock` where `barcode`='$ress[bar]' and `product_id`='$ress[product_id]' and `uniqueid`='$ress[uniqueid]'")or die(mysql_error());
  //echo "select *,sum(`quantity`) as qty from `stock` where `barcode`='$ress[bar]' and `product_id`='$ress[product_id]' and `uniqueid`='$ress[uniqueid]'";
  while($resstock=mysql_fetch_array($sqlstock)){
  //echo "<br/>".$resstock['qty']."-----".$resstock['product_id']."----".$resstock['uniqueid']."-----".$resstock['barcode']."<br/>";
  $stockquant=$resstock['qty'];
  $less=$purchasequant-$stockquant;
  //echo $less;
  $sqlproname=mysql_query("select * from `product` where `id`='$ress[product_id]'");
  $resproname=mysql_fetch_array($sqlproname);
  ?>
  <tr>
  <td class="td" style="width: 280px;"><?php echo $resproname['prod_name'];?></td>
  <td class="td" style="width: 100px;"><?php echo $less;?></td>
  <td class="td" style="width: 100px;"><?php echo $ress['mrp'];?></td>
  <td class="td" style="width: 90px;"><?php echo $resstock['price'];?></td>
  <td class="td" style="border-right:1px solid #adadad;"><?php echo $ress['bar'];?></td>
  </tr>
  <?php
  }
  }
  ?>
  </table>
 </div>
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
