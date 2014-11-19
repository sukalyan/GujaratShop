<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
 $getorder=mysql_query("select * from `purchase` group by `order_no`")or die(mysql_error());
while($resorder=mysql_fetch_array($getorder))
{
$getemails[] = array(
'value'  =>$resorder['order_no']."(".$resorder['date'].")",
'idval' => $resorder['order_no']
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
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var available=<?= json_encode($getemails); ?>;
        $('#select').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: available,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
		var valorder=ui.item.idval;
        $('#select').val(valshow);
		 $('#sel').val(ui.item.idval);
		 $.ajax({url:"fetchorder.php?order="+valorder,success:function(result){
      $('#product').html(result);
                }});
        return false;
		}
        });
});
</script>
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
				      <td>Order Id</td>
				      <td>
				       <input type="text" name="select" id="select" >
					 <input type="hidden" name="sel" id="sel" >
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