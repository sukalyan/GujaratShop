<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
    $a=0;
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
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Transaction Report</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
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
<input type="submit" name="submit" value="submit" class="btn"/>
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
$sql=mysql_query("select * from `transaction` where date between '$_POST[rpt]' and '$_POST[rpt1]' ");

echo "<span style='font-family:arial; font-size:16px; color:#51A351;'>Report From"."  ".$from." To ".$to."</span><span style='font-weight:bold;color:#51A351;margin-left:5px;'>:</span>";

?>
</div>
<?php
}else{$sql=mysql_query("select * from `transaction`");}
?>
	<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;" >
	    <tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
		<th>Date</th>
		<th>Credit</th>
		<th>Debit</th>
		<th>Balance</th>
	    </tr>
	    <?php
	    while($res=mysql_fetch_array($sql))
	    {
		$amount=$res['amount'];
	    ?>
	    <tr>
		<td class="td"><?php echo $res['date'];?></td>
		<?php $a=$amount+$a;
		if($amount>0)
		{ ?>
		<td class="td"><?php echo $res['amount'];?></td>
		<td class="td"></td>
		<td class="td" style="border-right:1px solid #adadad;"><?php echo $a;?></td><?php } else {?>
		<td class="td"></td>
		<td class="td"><?php echo $res['amount'];?></td>
		<td class="td" style="border-right:1px solid #adadad;"><?php echo $a;?></td>
		<?php }?>
	    </tr><?php }?>
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