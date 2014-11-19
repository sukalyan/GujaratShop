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
		function forgetEnterKey(evt)
{
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && ((node.type == "text") || 
          (node.type == "password")))
    {
        return false;
    }
} 
document.onkeypress = forgetEnterKey;
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
                <div class="content2">
				<h3>Enter category</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="insert_category.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
					    <td>Category Name</td>
					    <td><input type="text" name="name" id="name" required class="text"/></td>
					</tr>
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn"/></td>
					</tr>
				    </table>
				    </form>
				    <table class="table" cellpadding="0" cellspacing="0" style="line-height:3;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Name</th>
					    <th colspan="2">Action</th>
					</tr>
					</table>
				    <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				       <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<?php
					$fet=mysql_query("select * from `category`");
					while($res=mysql_fetch_array($fet)){
					?>
					<tr>
					    <td class="td"><?php echo $res['cat_name'];?></td>
					    <td class="td"><a href="edit_category.php?id=<?php echo $res['id'];?>"><img src="image/edit.png" width="60"></a></td>
					    <td onClick="delete_data(<?php echo $res['id']; ?>)" class="td" style="border-right:1px solid #adadad;"><img src="image/delete.png" width="70"></td>
					</tr><?php }?>
				       </table>
				    </div>
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