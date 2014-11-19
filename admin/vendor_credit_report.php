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
	$fetchdetail=mysql_query("select * from `transaction` where `vendor_id`='$venid'");
    }else{
    $fetchdetail=mysql_query("select * from `vendor` where `type`='0'");
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
				<h3>Vendor Credit Report</h3>
				</div>
				<div class="content2">
                                    <?php if(isset($_GET['msg'])){ echo $msg=$_GET['msg'];}?>
                    <form name="" action="" method="post" enctype="multipart/form-data">
                <table class="table">
			    <tr>
				<td><span style="font-weight:bold;">Vendor</span></td>
                
                <td align="left"> <input type="text" name="vendorid" class="vend text" style="margin-left:10px;" />
				<input type="hidden" name="hvid" class="hdvendval" />
                
				</td>
               
			    </tr>
                <tr>
                		<td>&nbsp;</td>
                		 <td><input type="submit" name="submit" value="search" class="btn"></td>
                </tr>
				</table>
				<table  class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:40px;">
				    <?php
				    if(isset($_POST['submit']))
			{ ?>
			<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
				<th>Vendor</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Date</th>
			    </tr>
			    <?php
			    while($resdetail=mysql_fetch_array($fetchdetail))
			    {  
			    $amtsql=mysql_query("select *  from `vendor` where `slno`='$venid' and `type`='0'");
			    $amtres=mysql_fetch_array($amtsql);
			    $amt=$resdetail['amount'];
			    ?>
			    <tr>
				<td class="td"><?php echo $amtres['name']."(".$amtres['phone'].")";?></td>
				<?php if($amt>0){?><td class="td"><?php echo $amt;?></td><td class="td"></td><?php } else {?>
				<td class="td"></td><td class="td"><?php echo 0-$amt;?></td><?php }?>
				<td class="td" style="border-right:1px solid #adadad;"><?php echo $resdetail['date'];?></td>
			    </tr><?php }?>
    
			 <?php }else{?>
			    <tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
				<th>Vendor</th>
				<th>Rest</th>
			    </tr>
			    <?php
			    while($resdetail=mysql_fetch_array($fetchdetail))
			    { $vid=$resdetail['slno'];
				$vname=$resdetail['name'];
				$vphone=$resdetail['phone'];
			    
			    $amtsql=mysql_query("select sum(amount) as totamount from `transaction` where `vendor_id`='$vid'");
			    $amtres=mysql_fetch_array($amtsql);
			    ?>
			    <tr>
				<td class="td"><?php echo $vname."(".$vphone.")";?></td>
				<td class="td" style="border-right:1px solid #adadad;"><?php $amount=$amtres['totamount'];echo $totamount=number_format((float)$amount, 2, '.', '');?></td>
			    </tr><?php } }?>
                        </table>
                    </form>
		</div>
            <div></div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>
