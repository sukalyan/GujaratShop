<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{

$getproduct=mysql_query("select * from `product`")or die(mysql_error());
   while($resproduct=mysql_fetch_array($getproduct))
    {
	$getemail[] = array(
	'value'  => $resproduct['prod_name'],
	'idval' => $resproduct['id']
	);
    }
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <style type="text/css"> 
		.text
		{
		width:130px;
		}
    </style>
	<script src="js/jquery.min.js"></script>
	
	<!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
 <!--autocomplete end-->
  <script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('#pnm1').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#pnm1').val(valshow);
		 $('#hdpnmval1').val(ui.item.idval);
		}
        });
});
</script>
<script>
    var i=1;
    function fetch(bar)
    {i++;
	$.ajax({url:"append.php?typ="+i+'&bar='+bar,
	       success:function(result){
                $("#tbb").append(result);
				 $("#barcode1").val("");
				 $("#barcode"+i).focus();
                }
		});
    }
	function fetch1(bar)
    {i++;
	$.ajax({url:"append.php?typ="+i+'&name='+bar,
	       success:function(result){
                $("#tbb").append(result);
				 $("#barcode1").val("");
				 $("#pnm1").val("");
				 $("#pnm"+i).focus();
                }
		});
    }
</script>
    <script>
    function focs()
    {
       $('#barcode1').focus();
    }
	  function fetchh(bar,ival)
    {
        $.ajax({url:"fetchproductt.php?code="+bar+'&ivall='+ival,success:function(result){
                $("#productt"+ival).html(result);
			    var sll=$("#seluidd"+ival).val();
				$('#hduidd'+ival).val(sll);
			  $("#seluidd"+ival).change(function()
    {		
        var sll=$("#seluidd"+ival).val();
		$('#hduidd'+ival).val(sll);
		$("#prodprice"+ivalue).val("");
	});
			   
                }});
    }
	function getpricee(pri,ivalue)
    { 
      var code=$("#barcode"+ivalue).val();
	   var uidd=$('#hduidd'+ivalue).val();
      $.ajax({url:"fetchprice.php?qun="+pri+'&bar='+code+'&idval='+ivalue+'&unid='+uidd,success:function(result){
                if (result==0) {
                    alert("stock not available");
                    $("#prodprice"+ivalue).val("");
                    $('#quantity').focus(); 
                }else { $("#prodprice"+ivalue).val(result);}
                }});  
    }
	function delrow(slno)
	   {
	   $('#'+slno).remove();
	   }
</script>
<script>
    function fproduct(pnameval)
	   {
	    $.ajax({url:"fproduct.php?name="+pnameval,success:function(result){
                $("#bar1").html(result);
                }}); 
	   }
	   
	   function fproductt(pnameval,pval)
	   {
	    //alert(pnameval);
	    $.ajax({url:"fproductt.php?name="+pnameval+'&ivall='+pval,success:function(result){
                $("#bar"+pval).html(result);
                }}); 
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
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Trade</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:100px;">
                                    <?php if(isset($_GET['msg'])){echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";} ?>
                    <form name="" action="sellaction.php" method="post" enctype="multipart/form-data">
                        <table class="table" align="center">
				<td id="bar1">Barcode<br/><input type="text" name="barcode" id="barcode1" oninput="return fetch(this.value)" class="text">
						    <input type="hidden" name="hduid" id="hduid"/>
				</td>
				<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text" onBlur="return fetch1(this.value)"/></td>
			    <tbody id="tbb"></tbody>
                            <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
                                <td><input type="submit" name="submit" value="submit" class="btn"></td>
								<!--<td>&nbsp;</td>-->
								<td>&nbsp;</td>
                            </tr>
                        </table>
                    </form>
		</div>
            <div></div>
         </div> 
        </div> 
	</div>	
    </div>
</body>
</html>
<?php
}
?>
