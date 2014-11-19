<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$getname=mysql_query("select * from `login`")or die(mysql_error());
while($resname=mysql_fetch_array($getname))
{
$getemail[] = array(
'value'  =>$resname['username'],
'idval' => $resname['slno']
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
        $('.vend').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
		$('.vend').val(valshow);
		$('.hdvendval').val(ui.item.idval);
		var x=$('.vend').val();
		var y=$('.hdvendval').val();
		$.ajax({url:"changepassword_ajax.php?venval="+x+'&id='+y,success:function(result){
		    $('#pass').html(result);
				 }});
        return false;
		}
        });
});
</script>
 <!--autocomplete end-->
 <script>
    function check()
    {
	var upass=$("#password").val();
	if (upass=="")
	{
	    alert("Enter password");
	    return false;
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
				<h3>Payment</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="changepassword_action.php" method="post" onSubmit="return check()" enctype="multipart/form-data">
				    <table class="table">
					<tr>
						<td>user Name</td>
						<td>
						<input type="text" name="user" class="vend text" autocomplete="off" class="text"/>
						<input type="hidden" name="hdvendval" class="hdvendval"/>
						</td>
					</tr>
					<tbody id="pass">
					    <td>Password</td>
					    <td>
						<input type="text" name="password" id="password" value="" class="text"/>
					    </td> 
					</tbody>
					<tr>
					    <td colspan="2">
						<input type="submit" name="submit" value="change">
					    </td>
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