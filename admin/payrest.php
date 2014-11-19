<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
$getcust=mysql_query("select * from `vendor` where `type` NOT LIKE '0' and `balance`<'0'")or die(mysql_error());
while($rescust=mysql_fetch_array($getcust))
{
$getemails[] = array(
'value'  =>$rescust['name']."(".$rescust['address'].")",
'idval' => $rescust['slno'],
'balance' => $rescust['balance']
	);
}

/*$getcustid=mysql_query("select * from `rest`")or die(mysql_error());
while($rescustid=mysql_fetch_array($getcustid))
{
    $getcust=mysql_query("select * from `vendor` where `type`='1' and `slno`='$rescustid[custid]'")or die(mysql_error());
    $rescust=mysql_fetch_array($getcust);
$getemails[] = array(
'value' =>$rescust['name']."( ID:".$rescust['slno'].")",
'idval' => $rescust['slno']
	);
}*/

 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
   <!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	jQuery.noConflict();
        var availabledrugs=<?=json_encode($getemails); ?>;
        $('#customers').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#customers').val(valshow);
		$('#customerid').val(ui.item.idval);
		$('#restamt1').val(ui.item.balance);
		$('#restamt').val(ui.item.balance);
		}
        });
});
</script>
</head>
<body>
    <div id="wrapper">
       <div id="header" style="margin-top:20px;">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Customer Payment</h3>
				</div>
				<div class="content3">
				<?php 
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$msg=$_GET['msg']."</span>";
				}
				?>
				    <form name="" action="payrest_action.php" method="post" enctype="multipart/form-data">
				    <table class="table" style="margin-top:10px;">
					<tr>
					    <td>Customer Name</td>
				      <td><input type="text" name="name" id="customers" autocomplete="off" class="text">
				        <input type="hidden" id="customerid" name="hid"></td>
					</tr>
					<tr>
					    <td>Rest Payment</td>
					    <td><input type="text" name="restamt" id="restamt" class="text"><input type="hidden" id="restamt1" name="restamt1"></td>
					</tr>
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="pay" class="btn"></td>
					</tr>
				    </table>
				    </form>
				    <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Name</th>
					    <th>Rest</th>
					</tr>
					
					    <?php
					    $fetch=mysql_query("select * from `vendor` where `balance`<'0'");
					   while($res=mysql_fetch_array($fetch))
					   {
					    ?>
					<tr>
					    <td class="td"><?php echo $res['name']."(".$res['address'].")"; ?></td>
					    <td class="td" style="border-right:1px solid #adadad;"><?php echo $res['balance']?></td>
					</tr><?php }?>
				    </table>
				    </table>
				</div>
		    <div>
	    </div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html> <?php }?>