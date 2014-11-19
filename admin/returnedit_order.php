<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
 $uid=$_GET['id'];
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
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
				<h3>Return Product</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="return_action.php" method="post" enctype="multipart/form-data">
				    <table class="table">
                                        <?php
                                        $fetch=mysql_query("select * from `purchase` where `uniqueid`='$uid'");
                                        $res=mysql_fetch_array($fetch);
                                        
                                        $fetch1=mysql_query("select * from `product` where `id`='$res[product_id]'") or die(mysql_error());
                                        $res1=mysql_fetch_array($fetch1);
                                        ?>
				     <tr>
                                        <td>product</td>
                                        <td><input type="text" name="name" value="<?php echo $res1['prod_name']; ?>" readonly="true"></td>
                                        <input type="hidden" name="huid" value="<?php echo $uid; ?>">
                                     </tr>
                                     <tr>
                                        <td>Free</td>
                                        <td><input type="text" name="free" value="<?php echo $res['freequantity']; ?>" readonly="true"></td>
					<td>Free Return<input type="text" name="returnfree" value="0"></td>
                                     </tr>
                                     <tr>
                                        <td>Quntity</td>
                                        <td><input type="text" name="quntity" value="<?php echo $res['quantity']; ?>" readonly></td>
					<td>Quntity Return<input type="text" name="returnquntity" value="0"></td>
                                     </tr>
				     <tr>
                                        <td>Total</td>
                                        <td><input type="text" name="total" value="<?php echo $res['totalquantity']; ?>" readonly="true"></td>
                                     </tr>
									 <tr>
									 <td>Sold</td>
									 <?php
									 $fetsold=mysql_query("select * from `sell` where `uniqueid`='$uid'");
									 $ressold=mysql_num_rows($fetsold);
									 ?>
									 <td><input type="text" name="sold" value="<?php echo $ressold; ?>" readonly="true"></td>
									 </tr>
				     <!--<tr>
                                        <td>Return</td>
                                        <td><input type="text" name="return" ></td>
                                     </tr>-->
                                     <tr>
                                        <td colspan="2"><input type="submit" name="submit" value="return"></td>
                                     </tr>
				    </table>
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