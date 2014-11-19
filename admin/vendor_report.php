<?php
include_once('function.php');

$getvendor=mysql_query("select * from `vendor` where `type`='0'")or die(mysql_error());
   while($resvendor=mysql_fetch_array($getvendor))
    {
	$getemail[] = array(
	'value'  => $resvendor['name']."(".$resvendor['phone'].")",
	'idval' => $resvendor['slno']
	);
    }
    if(isset($_POST['submit']))
    {
	$venid=$_REQUEST['hvid'];
	$fetchdetail=mysql_query("select * from `purchase` where `vendor_id`='$venid'");
    }else{
    $fetchdetail=mysql_query("select * from `purchase`");
    }
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <style type="text/css"> 
		.btn
		{
		margin-left:15px;
		}
    </style>
	<script src="js/jquery.min.js"></script>
<script>
    function fetch(bar)
    {
        $.ajax({url:"fetchproduct.php?code="+bar,success:function(result){
                $("#product").html(result);
                }});  
    }
    function getprice(pri)
    { 
      var code=$("#barcode").val();
      $.ajax({url:"fetchprice.php?qun="+pri+'&bar='+code,success:function(result){
                $("#prodprice").val(result);
                }});  
    }
</script>
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
				<h3>Vendor Report</h3>
				</div>
				<div class="content3">
                                    <?php if(isset($_GET['msg'])){ echo $msg=$_GET['msg'];}?>
                    <form name="" action="" method="post" enctype="multipart/form-data">
                <table class="table">
			    <tr>
				<td><span style="font-weight:bold;">Vendor</span></td><td> <input type="text" name="vendorid" class="vend text" style="margin-left:10px;" />
				<input type="hidden" name="hvid" class="hdvendval" />
             
				</td>
                 
			    </tr>
                <tr>
                		<td><input type="submit" name="submit" value="search" class="btn"/></td>
                </tr>
				</table>
				<table class="table"  cellspacing="0" cellpadding="0" style="line-height:3;  margin-top:40px;">
			    <tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
				<th>Vendor</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Date</th>
			    </tr>
			    <?php
			    while($resdetail=mysql_fetch_array($fetchdetail))
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
                    </form>
		    <div id="content2" style="width:800px; padding:10px; ">
		<form name="f" method="post" action="data_to_excel.php">
		<input type="submit" name="submit" value="hardcopy">
		    <input type="hidden" name="table" value="purchase">
		</form>
	    </div>
		</div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>