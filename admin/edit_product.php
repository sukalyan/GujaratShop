<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$id=$_GET['id'];
$sql=mysql_query("select * from `product` where `id`='$id'");
$res=mysql_fetch_array($sql);
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>


<script  type='text/javascript'>

function numberonly(contact)
{
//var contact=document.getElementById('cont').value;

if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#retailer_pcent").val("");
		$('#retailer_pcent').focus();
return false;
   }
}
function numberonly1(contact)
{
//var contact=document.getElementById('cont').value;

if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#distributer_pcnt").val("");
		$('#distributer_pcnt').focus();
return false;
   }
}
function numberonly2(contact)
{
//var contact=document.getElementById('cont').value;

if(isNaN(contact)|| contact.indexOf(" ")!=-1)
{
             	 alert("Enter numeric value");
		$("#customer_pcnt").val("");
		$('#customer_pcnt').focus();
return false;
   }
}

</script>
</head>
<body onload="select()">
    <div id="wrapper">
       <div id="header">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Edit Product</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
				    <form name="f" action="update_product.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
					    <td>Product Name</td>
					    <td>
						<input type="text" name="name" id="name" value="<?php echo $res['prod_name'];?>" class="text" required/>
						<input type="hidden" name="hd_nm" value="<?php echo $res['id'];?>"/>
						</td>
					</tr>
					<tr>
					    <td>Category</td>
					    <td>
						<select class="text" style="width:177px;" name="catname">
						<option value="">select</option>
						<?php
						$sqlcatt=mysql_query("select * from `category`");
						while($rescatt=mysql_fetch_array($sqlcatt))
						{
						?>
						<option value="<?php echo $rescatt['id'];?>"
						<?php 
						if($rescatt['id']==$res['category'])
						{
						echo 'selected="selected"';
						}
						?>><?php echo $rescatt['cat_name'];?></option>
						<?php
						}
						?>
						</select>
						</td>
					</tr>
					<tr>
					    <td>Company</td>
					    <td>
						<select class="text" style="width:177px;" name="compname">
						<option value="">select</option>
						<?php
						$sqlcomp=mysql_query("select * from `company`");
						while($rescomp=mysql_fetch_array($sqlcomp))
						{
						?>
						<option value="<?php echo $rescomp['id'];?>"
						<?php 
						if($rescomp['id']==$res['company'])
						{
						echo 'selected="selected"';
						}
						?>><?php echo $rescomp['comp_name'];?></option>
						<?php
						}
						?>
						</select>
						</td>
					</tr>
					<tr>
					    <td>minimum quantity</td>
					    <td>
						<input type="text" name="min" value="<?php echo $res['minimum'];?>"/>
						</td>
					</tr>
					
					<!--<tr>
					    <td>Retailer</td>
					    <td><input type="text" name="retailer_pcnt" id="retailer_pcent" value="<?php echo $res['retailer'];?>" onblur="return numberonly(this.value)" class="text wdt"><span style="margin-left:5px;">%</span></td>
					</tr>
					<tr>
					    <td>Distributer</td>
					    <td><input type="text" name="distributer_pcnt" id="distributer_pcnt" value="<?php echo $res['distributer'];?>" onblur="return numberonly1(this.value)" class="text wdt"><span style="margin-left:5px;">%</span></td>
					</tr>
					<tr>
					    <td>Customer</td>
					    <td><input type="text" name="customer_pcnt" id="customer_pcnt" value="<?php echo $res['customer'];?>" onblur="return numberonly2(this.value)" class="text wdt"><span style="margin-left:5px;">%</span></td>
					</tr>-->
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Update" class="btn"/></td>
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