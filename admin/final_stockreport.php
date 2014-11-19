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
				<h3>Stock Report</h3>
				</div>
				<div class="content3">
<table class="table" cellspacing="0" cellpadding="0" style="line-height:3;">
<tr >
<td colspan="2" style="font-weight:bold;">Stock:</td>
</tr>
<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
<th>Product name</th>
<th>Quantity</th>
<th>Price</th>
<th>Date</th>
</tr>
<?php
 $now = time();
$fetch=mysql_query("select * from `final`");
while($res=mysql_fetch_array($fetch))
{
 $id=$res['product_id'];
 $dat=$res['date'];
 $stock=$res['quantity'];

     $your_date = strtotime("$dat");
     $datediff = $now - $your_date;
     $day=floor($datediff/(60*60*24));
$sqlproname=mysql_query("select * from `product` where `id`='$id'");
$resproname=mysql_fetch_array($sqlproname);
if($day>10 && $stock>0)
{
?>
<tr>
<td class="td" style="border:1px solid #fa3232; border-top:none;"><?php echo $resproname['prod_name'];?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $res['quantity'];?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $res['price'];?></td>
<td class="td" style="border-right:1px solid #adadad; border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $res['date'];?></td>
<td ><input type="text" value="oldstock" readonly class="text" style="width:90px; text-align:center; margin-left:5px; border:1px solid #fa3232;"/></td>
</tr>
<?php
}
}
$fetchstock=mysql_query("select * from `stock`") or die(mysql_error());
while($resstock=mysql_fetch_array($fetchstock))
{
      $dat1=$resstock['date'];
     $your_date1 = strtotime("$dat1");
     $datediff1 = $now - $your_date1;
     $day1=floor($datediff1/(60*60*24));
 $uid=$resstock['uniqueid'];
 $fetch1=mysql_query("select * from `sell` where `uniqueid` like '$uid'")or die(mysql_error());
 $num=mysql_numrows($fetch1);
 if($num==0 && $day1>10)
 {
 $proname=mysql_query("select * from `product` where `id`='$resstock[product_id]'");
 $resname=mysql_fetch_array($proname);
?>
<tr>
<td class="td" style="border:1px solid #fa3232; border-top:none;"><?php echo $resname['prod_name'];?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $resstock['quantity'];?></td>
<td class="td" style="border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $resstock['price'];?></td>
<td class="td" style="border-right:1px solid #adadad; border:1px solid #fa3232; border-left:none; border-top:none;"><?php echo $resstock['date'];?></td>
<td ><input type="text" value="oldstock" readonly class="text" style="width:90px; text-align:center; margin-left:5px; border:1px solid #fa3232;"/></td>
</tr>
<?php }}?>
</table>
				   
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
