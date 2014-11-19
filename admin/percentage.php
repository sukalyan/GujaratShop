<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>

 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_product.php?id1="+vals;
			}
		}
</script>
 <script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}

</script>
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
<style>
.wdt
{
width:160px;
}
</style>
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
				<h3>Enter Percentage</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="percent_action.php" method="post" enctype="multipart/form-data">
				    <table class="table" style="width:600px;">
					<tr>
					    <td>&nbsp;</td>
					    <td>Retailer</td>
					    <td>Distributer</td>
					    <td>Customer</td>
					</tr>
					<tr>
					 <?php
					 $fetch=mysql_query("select * from `percent`");
					 $res=mysql_fetch_array($fetch);
					 ?>
					 <td>Percent</td>
					 <td><input type="text" name="retailer_pcnt" id="retailer_pcent" value="<?php echo $res['retailer'];?>" onBlur="return numberonly(this.value)" class="text wdt"><span style="margin-left:5px;">%</span></td>
					 <td><input type="text" name="distributer_pcnt" id="distributer_pcnt" value="<?php echo $res['distributer'];?>" onBlur="return numberonly1(this.value)"  class="text wdt"><span  style="margin-left:5px;">%</span></td>
					 <td><input type="text" name="customer_pcnt" id="customer_pcnt" value="<?php echo $res['customer'];?>" onBlur="return numberonly2(this.value)"  class="text wdt"><span  style="margin-left:5px;">%</span></td>
					</tr>
					<tr>
					    <td>&nbsp;</td>
						<td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Update" class="btn" style="margin-top:10px;"/></td>
						<td>&nbsp;</td>
					</tr>
				    </table>
				    </form>
		
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>
 <?php 
 }
 ?>