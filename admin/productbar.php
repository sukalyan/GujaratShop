<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
 $getproduct=mysql_query("select * from `product`")or die(mysql_error());
while($resproduct=mysql_fetch_array($getproduct))
{
$getemail[] = array(
'value'  =>$resproduct['prod_name'],
'idval' => $resproduct['id']
	);
}
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
	 <!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('#prod').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#prod').val(valshow);
		 $('#produc').val(ui.item.idval);
        return false;
		}
        });
});
</script>
 <!--autocomplete end-->
 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_product.php?id1="+vals;
			}
		}
</script>
 <script>
  function select()
  {
   $("#bar").focus(); 
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
				<h3>Product Barcode</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="productbar_action.php" method="post" enctype="multipart/form-data">
				    <table class="table">
					<tr>
					 <td>barcode</td>
					 <td><input type="text" name="bar" id="bar"></td>
					</tr>
					<tr>
					    <td>Product Name</td>
					    <!--<td>
					     <select name="produc">
					      <?php
					      /*$fetch=mysql_query("select * from `product`");
					      while($res=mysql_fetch_array($fetch))
					      { $comp=$res['company'];
					      $fetch1=mysql_query("select * from `company` where `id`='$comp'");
					      $res1=mysql_fetch_array($fetch1);*/
					      ?>
					      <option value="<?php //echo $res['id'];?>"><?php //echo $res['prod_name']."(".$res1['comp_name'].")";?></option><?php //}?>
					     </select>
					    </td>-->
					    <td><input type="text" name="prod" id="prod"></td>
					    <input type="hidden" name="produc" id="produc">
					</tr>
					
					<tr>
					    <td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn"/></td>
					</tr>
				    </table>
				    </form>
				    
				   <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				      <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Product</th>
						<th>Category</th>
						<th>Company</th>
						<th>minimum</th>
						<th>Bar</th>
					    <!--<th>Action</th>-->
					</tr>
					<?php
					$fet=mysql_query("select * from `product`");
					while($res=mysql_fetch_array($fet)){
					$sqlcat=mysql_query("select * from `category` where `id`='$res[category]'");
					$rescat=mysql_fetch_array($sqlcat);
					$sqlcomp=mysql_query("select * from `company` where `id`='$res[company]'");
					$rescomp=mysql_fetch_array($sqlcomp);
					?>
					<tr>
					    <td class="td"><?php echo $res['prod_name'];?></td>
						<td class="td"><?php echo $rescat['cat_name'];?></td>
						<td class="td"><?php echo $rescomp['comp_name'];?></td>
						<td class="td"><?php echo $res['minimum'];?></td>
						<td class="td"><?php echo $res['barcode'];?></td>
					    <!--<td class="td" style="border-right:1px solid #adadad;"><a href="edit_product.php?id=<?php echo $res['id'];?>"><img src="image/edit.png" width="57"></a></td>-->
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