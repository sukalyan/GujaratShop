<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
$getdrugdet=mysql_query("select * from `vendor` where `type`='0'")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
$getemail[] = array(
'value'  =>$resdrugdet['name']."(".$resdrugdet['phone'].")",
'idval' => $resdrugdet['slno']
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
		$.ajax({url:"price.php?venval="+x+'&id='+y,success:function(result){
		    $('#rest').html(result);
				 }});
        return false;
		}
        });
});
</script>
 <!--autocomplete end-->
  <script>
    function focs()
    {
       $('#code').focus();
    }
  </script>
  <script  type='text/javascript'>

function numberonly()

{
	var contact=document.getElementById('price').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{
	    $("#price").val("");
            alert("Enter numeric value");

			return false;
    }
	
}
function crest()
{
    var inamount=$("#restamnt").val();
    var aval=$("#amt").val();
   //alert(inamount);
   //alert(aval);
    if ((aval-0)>(inamount-0))
    {
	$("#amt").val("");
	return false;
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
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_stock.php?id1="+vals;
			}
		}
</script>

</head>
<body onLoad="focs()">
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
				    <form name="f" action="payment_action.php" method="post" onSubmit="return crest()" enctype="multipart/form-data">
				    <table class="table">
					<tr>
						<td>Vendor Name</td>
						<td>
						<input type="text" name="vend" class="vend text" autocomplete="off" class="text"/>
						<input type="hidden" name="hdvendval" class="hdvendval"/>
						</td>
					</tr>
					<tbody id="rest"></tbody>
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