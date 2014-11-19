<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}
else
{
mysql_query("delete from `freestock`");
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
				 $("#barcode"+i).focus();
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
    {//alert("inside");
	 var ctype=$("#ctype").val();
        $.ajax({url:"fetchproductt.php?code="+bar+'&ivall='+ival+'&type='+ctype,success:function(result){
                $("#productt"+ival).html(result);
		$('#seluidd'+ival).focus();
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
      var ctype=$("#ctype").val();
	   var uidd=$('#hduidd'+ivalue).val();
      $.ajax({url:"fetchprice.php?qun="+pri+'&bar='+code+'&idval='+ivalue+'&unid='+uidd+'&type='+ctype,success:function(result){
                if (result==0) {
                    alert("stock not available");
                    $("#prodprice"+ivalue).val("");
                    $('#barcode'+ivalue).focus(); 
                }else {
				$("#prodprice"+ivalue).val(result);
				$.ajax({url:"insert_free.php?bcode="+code+'&uid='+uidd+'&ivalls='+ivalue+'&qty='+pri,success:function(result)
				{
				}
				});
				$('#barcode1').focus();
				}
                }});  
    }
	function delrow(slno)
	   {
	   $('#'+slno).remove();
	    $.ajax({url:"delete_free.php?slnoo="+slno,success:function(result)
				{
				}
				});
	   }
</script>
<script>
    function fproduct(pnameval)
	   {
	    //alert(pnameval);
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
       <div id="header">admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu1.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Trade</h3>
				</div>
				<div class="content3">
                                    <?php if(isset($_GET['msg'])){echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";} ?>
                    <form name="" action="sellaction.php" method="post">
                        <table class="table" align="center">
			    <tr>
                                <td colspan="4">Type</br>
				    <select name="type" id="ctype">
					<option value="1">Customer</option>
					<option value="2">Distributer</option>
					<option value="3">Retailer</option>
				    </select>
				</td>
                            </tr>
                        <tr>
				<td id="bar1">Barcode<br/>
				    <input type="text" name="barcode" id="barcode1" oninput="return fetch(this.value)" class="text">
				    <input type="hidden" name="hduid" id="hduid"/>
				</td>
				<td id="product1">Product<br/><input type="text" name="prod" id="pnm1" class="text" onBlur="return fetch1(this.value)"/></td>
			    <tbody id="tbb"></tbody>
                </tr>
                			<tr>
                                <td colspan="4" align="center">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center"><input type="submit" name="submit" value="submit" class="btn button2"></td>
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
