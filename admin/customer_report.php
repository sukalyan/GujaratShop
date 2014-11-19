<?php
include_once('function.php');

$getvendor=mysql_query("select DISTINCT `introducer` from `vendor` where `type`!='0'")or die(mysql_error());
   while($resvendor=mysql_fetch_array($getvendor))
    {
	$getemail[] = array(
	'value'  => $resvendor['introducer']
	);
    }
    if(isset($_POST['submit']))
    { $loc=$_REQUEST['introducer'];
    $fetchdetail=mysql_query("select * from `vendor` where `introducer` like '$loc' and `type` NOT LIKE '0'");
	//echo "select * from `vendor` where `location` like '$loc' and `type` NOT LIKE '0'";
	}
    else { $fetchdetail=mysql_query("select * from `vendor` where type NOT LIKE '0'");}
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
				<h3>Agent wise customer Report</h3>
				</div>
				<div class="content3">
                                    <?php if(isset($_GET['msg'])){ echo $msg=$_GET['msg'];}?>
                    <form name="" action="" method="post" enctype="multipart/form-data">
                <table class="table">
			    <tr>
				<td><span style="font-weight:bold;">Agent</span></td>
				<td> <input type="text" name="introducer" class="vend text" style="margin-left:10px;" />
				</td>
                 
			    </tr>
                <tr>
                		<td><input type="submit" name="submit" value="search" class="btn"/></td>
                </tr>
				</table>
				<table class="table"  cellspacing="0" cellpadding="0" style="line-height:3;  margin-top:40px;">
			    <tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
				<th>Customer</th>
				<th>Contact</th>
				<th>Address</th>
				<th>Email</th>
				<th>Type</th>
				<th>Location</th>
			    </tr>
			    <?php
			    while($resdetail=mysql_fetch_array($fetchdetail))
			    {
			    ?>
			    <tr>
				<td  class="td"><?php echo $resdetail['name'];?></td>
				<td  class="td"><?php echo $resdetail['phone'];?></td>
				<td  class="td"><?php echo $resdetail['address'];?></td>
				<td  class="td"><?php echo $resdetail['email'];?></td>
				<td  class="td">
				<?php
				if($resdetail['type']==1){ echo "customer";}
				if($resdetail['type']==2){ echo "distributer";}
				if($resdetail['type']==3){ echo "retailer";}
				?>
				</td>
				<td class="td" style="border-right:1px solid #adadad;"><?php echo $resdetail['location'];?></td>
			    </tr><?php }?>
                        </table>
                    </form>
		<div id="content2" style="width:800px; padding:10px; ">
		    <form name="f" method="post" action="customer_to_excel.php">
			<input type="submit" name="submit" value="hardcopy">
			<input type="hidden" name="table" value="vendor">
		    </form>
		</div>
		</div>
				
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>