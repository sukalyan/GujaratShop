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
    <script>
     function fetch(val)
     {
      //alert(val);
      $.ajax({url:"fetchorder.php?order="+val,success:function(result){
      $('#product').html(result);
                }});
     }
     
     		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="returndelete_order.php?id1="+vals;
			}
		}
    </script>
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
				    <form name="f" action="insert_company.php" method="post" enctype="multipart/form-data">
				    <table class="table">
				     <tr>
				      <td>Product Id</td>
				      <td>
				       <select name="sel" id="sel" onchange="return fetch(this.value)">
					<?php
					$fetch=mysql_query("select * from `purchase` group by `order_no`");
					while($res=mysql_fetch_array($fetch))
					{
					?>
					<option value="<?php echo $res['order_no'];?>"><?php echo $res['order_no']."(".$res['date'].")";?></option><?php }?>
				       </select>
				      </td>
				     </tr>
				     <tr>
					<th>product</th>
					<th>Quntity</th>
					<th colspan="2">Action</th>
				     </tr>
				     <tbody id="product" align="center"></tbody>
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