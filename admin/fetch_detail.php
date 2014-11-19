<?php
include_once('function.php');
$prodval=$_GET['pidval'];
$vdval=$_GET['vdval'];
$ival=$_GET['ival'];
$fetch=mysql_query("select * from `product` where `id`='$prodval'");
$res=mysql_fetch_array($fetch);
$sqlpurchase=mysql_query("select sum(quantity) as quant from `purchase` where `product_id`='$res[id]'");
$respurchase=mysql_fetch_array($sqlpurchase);
$sqlstock=mysql_query("select sum(quantity) as quantt from `stock` where `product_id`='$res[id]'");
$resstock=mysql_fetch_array($sqlstock);
$uid=uniqid();
?>

					
							
							<tr id="<?php echo $ival;?>" style="line-height:2.6;">
							<td>
							<input type="text" name="bar[]" id="barcode<?php echo $ival;?>"  class="text wdt bar" value="<?php echo $res['barcode'];?>" readonly style="width:85px;"/>
							</td>
							<td>
							<input type="text" name="prod[]" id="product<?php echo $ival;?>" class="text wdt" value="<?php echo $res['prod_name'];?>" style="width:75px;"/>
							<input type="hidden" name="hdprod[]" id="hdprod<?php echo $ival;?>" value="<?php echo $prodval;?>"/>
							<input type="hidden" name="hcatid[]" id="hdcat<?php echo $ival;?>" value="<?php echo $res['category'];?>"/>
							<input type="hidden" name="hcompid[]" id="hdcomp<?php echo $ival;?>" value="<?php echo $res['company'];?>"/>
							<input type="hidden" name="unique[]" value="<?php echo $uid;?>"/>
							</td>
							<td><input type="text" name="quant[]" id="quant<?php echo $ival;?>" class="text wdt" onblur="return getquant(this.value,<?php echo $ival;?>)" ></td>
							<td><input type="text" name="freequant[]" id="freequant<?php echo $ival;?>" class="text wdt" value="<?php //echo $avlquant;?>" onblur="return getquantt(this.value,<?php echo $ival;?>)"></td>
							<td><input type="text" name="totquant[]" id="totquant<?php echo $ival;?>" class="text wdt hdd" style="background:#ede193;"></td>
							<td><input type="text" name="mrp[]" id="mrp<?php echo $ival;?>" class="text wdt"></td>
							<td><input type="text" name="pric[]" id="pric<?php echo $ival;?>" class="text wdt" onblur="return getprice(this.value,<?php echo $ival;?>);"></td>
							<td><input type="text" name="totpricc[]" id="totpricc<?php echo $ival;?>" class="text wdt"></td>
							<td><input type="text" name="spdisc[]" id="spdisc<?php echo $ival;?>" class="text wdt" onblur="return getspdisc(this.value,<?php echo $ival;?>);"></td>
							<td><input type="text" name="ddisc[]" id="ddisc<?php echo $ival;?>" class="text wdt" onblur="return getddisc(this.value,<?php echo $ival;?>);"></td>
							<td><input type="text" name="scdisc[]" id="scdisc<?php echo $ival;?>" class="text wdt" onblur="return getscdisc(this.value,<?php echo $ival;?>);"></td>
							<td><input type="text" name="tax[]" id="tax<?php echo $ival;?>" class="text wdt" onblur="return gettax(this.value,<?php echo $ival;?>);"></td>
							<td><input type="text" name="tottax[]" id="tottax<?php echo $ival;?>" class="text wdt" readonly></td>
							<td><input type="text" name="total[]" id="total<?php echo $ival;?>" class="text wdt"></td>
							<td class="delete" style="font-weight:bold; color:red;">X</td>
							<td>
							<input type="checkbox" name="chk[]" value="<?php echo $uid;?>" id="chk<?php echo $ival;?>"/>
							</td>
							</tr>
						  
                      <script>
					  $(function(){
					  $('.delete').click(function(){
					  var ret=confirm("Are u sure to delete this item");
					  if (ret==true)
					  {
					  $(this).parent().remove();
					  //$(this).parent().parent().remove();
					 //window.location.href="purchase_order.php";
					  }
					  else
					  {
					  return false;
					  }
					  });
					  });
					  </script>
		      <script>
		       $(function(){
					      var jvals=<?php echo $ival;?>;
					  $('#chk'+jvals).click(function(){
					  var barcd=$('#barcode'+jvals).val();
					  if (barcd=="")
					      {
					       var ans=prompt("enter bar code");
						$('#barcode'+jvals).val(ans);
						var proid=$('#hdprod'+jvals).val();
						var hdcatval=$('#hdcat'+jvals).val();
						var hdcompval=$('#hdcomp'+jvals).val();
						$.ajax({url:"barproduct.php?prid="+proid+'&bar='+ans,success:function(result){
					      }});
						
					      }
					      });
					   });
		      </script>
		      
					 <script>
					 /* $(function(){   
					  var jvals=<?php echo $ival;?>;
					  $('#chk'+jvals).click(function(){
					  var barcd=$('#barcode'+jvals).val();
					  var pronm=$('#hdprod'+jvals).val();
					  var totqt=$('#totquant'+jvals).val();
					  var mrpval=$('#mrp'+jvals).val();
					  var pricval=$('#pric'+jvals).val();
					   var hdcompval=$('#hdcomp'+jvals).val();
					    var hdcatval=$('#hdcat'+jvals).val();
						
						var qtyy=$('#quant'+jvals).val();
						var freeqty=$('#freequant'+jvals).val();
						var totprc=$('#totpricc'+jvals).val();
						var spdiscnt=$('#spdisc'+jvals).val();
						var ddiscnt=$('#ddisc'+jvals).val();
						var scdiscnt=$('#scdisc'+jvals).val();
						var taxx=$('#tax'+jvals).val();
						var tottaxx=$('#tottax'+jvals).val();
						var totall=$('#total'+jvals).val();
						 var vendor=$('#hdvendval').val();*/
					 // if(barcd==""){
					  
					  
					      // var vendor=$('#hdvendval').val();
					      // alert(vendor);
					      // if (vendor=="")
					      //{
					       // alert("enter vendor name");
						//return false;
					      // }
					  /*var pronm=$('#hdprod'+jvals).val();
					  var totqt=$('#totquant'+jvals).val();
					  var mrpval=$('#mrp'+jvals).val();
					  var pricval=$('#pric'+jvals).val();
					   var hdcompval=$('#hdcomp'+jvals).val();
					    var hdcatval=$('#hdcat'+jvals).val();
						
						var qtyy=$('#quant'+jvals).val();
						var freeqty=$('#freequant'+jvals).val();
						//var totprc=$('#totpricc'+jvals).val();
						var spdiscnt=$('#spdisc'+jvals).val();
						var ddiscnt=$('#ddisc'+jvals).val();
						var scdiscnt=$('#scdisc'+jvals).val();
						var taxx=$('#tax'+jvals).val();
						//var tottaxx=$('#tottax'+jvals).val();
						//var totall=$('#total'+jvals).val();*/
						/*if(totqt==0)
						{
						 alert("enter quantity field");
						 return false;
					  }
					  else if(mrpval=="")
					  {
					  alert("enter mrp field");
					  return false;
					  }
					  else if(pricval=="")
					  {
					  alert("enter price fields");
					  return false;
					  }
					  else
					  {
					  
					 window.location.href="redirect.php?barcode="+barcd+'&prod='+pronm+'&tot='+totqt+'&mrpp='+mrpval+'&prval='+pricval+'&compvall='+hdcompval+'&catval='+hdcatval+'&quanty='+qtyy+'&free='+freeqty+'&spedisc='+spdiscnt+'&ddiscnt='+ddiscnt+'&scdiscnt='+scdiscnt+'&tx='+taxx+'&vend='+vendor;
					  }
					  
					  //}
					 /* else
					  {
					   if (vendor=="")
					       {
					        alert("enter vendor name");
						    return false;
					       }
						else if(totqt==0)
						{
						 alert("enter quantity field");
						 return false;
					  }
					  else if(mrpval=="")
					  {
					  alert("enter mrp field");
					  return false;
					  }
					  else if(pricval=="")
					  {
					  alert("enter price fields");
					  return false;
					  }
					  else
					  {
						 $.ajax({url:"store.php?codeval="+barcd+'&pid='+pronm+'&totqnt='+totqt+'&mrvl='+mrpval+'&privl='+pricval+'&hdcom='+hdcompval+'&hdcat='+hdcatval+'&tprc='+totprc+'&ven='+vendor+'&totamnt='+totall+'&qt='+qtyy+'&frqt='+freeqty+'&specdiscnt='+spdiscnt+'&dedisc='+ddiscnt+'&scemdisc='+scdiscnt+'&txxval='+taxx+'&ttaxx='+tottaxx,async: false,success:function(result)
						 {
						 }});
						 var msg="succesfully inserted";
						 window.location.href="purchase_order.php?mess="+msg;
						 }
					  }*/
					 //});
					 /* var barcd=$('#barcode'+jvals).val();
					  if(barcd!="")
					  {
					  //$('#chk'+jvals).hide();
					  }*/
					 // });
					  </script>