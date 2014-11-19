<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$id=$_GET['id'];
$sql=mysql_query("select * from `company` where `id`='$id'");
$res=mysql_fetch_array($sql);
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>


</head>
<body onLoad="select()">
    <div id="wrapper">
       <div id="header">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Edit company</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
				    <form name="f" action="update_comp.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
					    <td>Product Name</td>
					    <td>
						<input type="text" name="name" id="name" value="<?php echo $res['comp_name'];?>" class="text" required/>
						<input type="hidden" name="hd_nm" value="<?php echo $res['id'];?>"/>
						</td>
					</tr>
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