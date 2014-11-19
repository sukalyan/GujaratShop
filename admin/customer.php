<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{
$getcompany=mysql_query("select * from `area` group by `area`")or die(mysql_error());
while($rescompany=mysql_fetch_array($getcompany))
{
$getemails[] = array(
'value'  =>$rescompany['area'],
'idval' => $rescompany['slno']
	);
}

$getcust=mysql_query("select * from `area`")or die(mysql_error());
while($rescust=mysql_fetch_array($getcust))
{
$getemai[] = array(
'value'  =>$rescust['introducer_id'],
'idval' => $rescust['introducer_name'],
'area' => $rescust['area'],
'slno' => $rescust['slno']
	);
}
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
<!--datepicker start--->
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			
		});
		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%Y-%m-%d"
			
		});
	};
</script>
<!--datepicker end--->
	 <!--autocomplete start-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemails); ?>;
        $('#locatio').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#locatio').val(valshow);
		 $('#hdlocatio').val(ui.item.idval);
        return false;
		}
        });
});
    
     $(function(){
	 jQuery.noConflict();
        var availabledrugs=<?= json_encode($getemai); ?>;
        $('#introducer').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('#introducer').val(valshow);
		 $('#introid').val(ui.item.idval);
		 $('#locatio').val(ui.item.area);
		 $('#hdlocatio').val(ui.item.slno);
        return false;
		}
        });
});
</script>	
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete customer?");
			if(con){
                                    window.location="customerdelete.php?id1="+vals;
                                }
			}
		</script>
		<script>
		function validate()
		{
		var name=document.getElementById('name').value;
		var phonee=document.getElementById('phone').value;
		var emailid=document.getElementById('email').value;
		var fatname=document.getElementById('fatname').value;
		var address=document.getElementById('address').value;
		var introducer=document.getElementById('introducer').value;
		
		var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		if(name=="")
		{
		alert("enter a name");
		return false;
		}
		if(phonee=="")
		{
		alert("enter contact number");
		return false;
		}
		if(phonee.length<10)
	{
	 alert("Enter 10 digit contact number");

			return false;
	}
	if(phonee.length>10)
	{
	 alert("Enter 10 digit contact number");

			return false;
	}
	if(fatname=="")
		{
		alert("enter father name");
		return false;
		}
		if(address=="")
		{
		alert("enter address");
		return false;
		}
		if(introducer=="")
		{
		alert("enter introducer");
		return false;
		}
	/*if(emailid=="")
		{
		alert("enter email");
		return false;
		}
	if(emailid!="" && !emailid.match(format))

	{

	alert("You have entered an wrong email address!"); 
	return false;
    

	}*/
		}
		</script>
  <script  type='text/javascript'>

function numberonly()

{
	var contact=document.getElementById('phone').value;

	if(isNaN(contact)|| contact.indexOf(" ")!=-1)

	{

            alert("Enter numeric value");

			return false;
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
<body>
    <div id="wrapper">
       <div id="header" style="margin-top:20px;">Admin Panel</div>
	   <div id="con">
         <div id="container" style="font-size: 10px;">
            <div id="lcontainer">
                <?php include_once('menu.php');?>
            </div>
            <div id="rcontainer" align="middle"> 
                <div class="content2">
				<h3>Enter customer</h3>
				</div>
				<div class="content3">
				<?php 
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$msg=$_GET['msg']."</span>";
				}
				?>
				    <form name="" action="customer_action.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				    <table class="table" style="margin-top:10px;">
					<tr>
					    <td>Customer Type</td>
					</tr>
					<tr>
					    <td>Customer</td>
					    <td><input type="radio" name="type" value="1" /></td>
					</tr>
					<tr>
					    <td>Distributer</td>
					    <td><input type="radio" name="type" value="2" /></td>
					</tr>
					<tr>
					    <td>Retailer</td>
					    <td><input type="radio" name="type" value="3" /></td>
					</tr>
					<tr>
					    <td>Date</td>
					    <td>
						<input type="text" name="date" id="inputField" class="text"/>
						</td>
					</tr>
					<tr>
					    <td>Contact</td>
					    <td><input type="text" name="phone" id="phone" onKeyPress="return numbersonly(event)" class="text"/></td>
					</tr>
					<tr>
					<tr>
					    <td>Customer Name</td>
					    <td>
						<input type="text" name="name" id="name" class="text"/>
						</td>
					</tr>
					<tr>
					    <td>Father/Husband Name</td>
					    <td>
						<input type="text" name="fatname" id="fatname" class="text"/>
						</td>
					</tr>
					<tr>
					    <td>DOB</td>
					    <td>Age</td>
					</tr>
					<tr>
					    <td><input type="text" name="dob" id="inputField1" class="text"/></td>
					    <td><input type="text" name="age" id="age" class="text"/></td>
					</tr>
					<tr>
					    <td>Year</td>
					    <td>Sex</td>
					</tr>
					<tr>
					    <td><input type="text" name="year" id="year" class="text"/></td>
					    <td><input type="radio" name="sex" id="sex" class="text" value="m" style="width: 50px;"/>M<input type="radio" name="sex" id="sex" value="f" class="text" style="width: 50px;"/>F</td>
					</tr>
					<tr>
					    <td>Address</td>
					    <td>
						<textarea name="address" id="address" class="text" style="width:177px;"></textarea>
						</td>
					</tr>
					
					<tr>
					    <td>occupation</td>
					    <td>
					      Service Business Student Housewife Professional Others Society Company
					    </td>
					</tr>
					<tr>
					    <td></td>
					    <td>
						<input type="radio" name="occupation" id="occupation" value="service" style="float: left; margin-right: 40px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="business" style="float: left; margin-right: 40px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="student" style="float: left; margin-right: 40px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="housewife" style="float: left; margin-right: 50px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="professional" style="float: left; margin-right: 70px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="others" style="float: left; margin-right: 40px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="society" style="float: left; margin-right: 40px;" class="text"/>
						<input type="radio" name="occupation" id="occupation" value="company" style="float: left; margin-right: 40px;" class="text"/>
					    </td>
					</tr>
					<tr>
					    <td>Introducer Id</td>
					    <td>Introducer Name</td>
					</tr>
					<tr>
					    <td><input type="text" name="introducer" id="introducer" class="text"/></td>
					    <td><input type="text" name="introid" id="introid" class="text"/></td>
					</tr>
					<tr>
					    <td>Location</td>
					    <td>
					     <input type="text" name="location" id="locatio" class="text"/>
						<input type="hidden" name="locat" id="hdlocatio"/>
						</td>
					</tr>
					<tr>
					    <td>Identity Proof</td>
					    <td>Addhar card  Voter card  Driving licence  Others</td>
					</tr>
					<tr>
					 <td></td>
					    <td>
					     <input type="radio" name="iproof" id="iproof" class="text" value="addharcard" style="margin-left: 20px; float: left;"/>
					     <input type="radio" name="iproof" id="iproof" class="text" value="votercard" style="margin-left: 65px; float: left;"/>
					     <input type="radio" name="iproof" id="iproof" class="text" value="dl" style="margin-left: 65px; float: left;"/>
					     <input type="radio" name="iproof" id="iproof" class="text" value="others" style="margin-left: 65px; float: left;"/>
					    </td>
					</tr>
					<!--<tr>
					    <td>Type</td>
					    <td>
						<select name="type" id="type">
						    <option>retailer</option>
						    <option>distributer</option>
						    <option>customer</option>
						</select>
					    </td>
					</tr>-->
					<tr>
					    <td>Email</td>
					    <td><input type="email" name="email" id="email" class="text"/></td>
					</tr>
					<tr>
					    <td>Amount</td>
					    <td><input type="text" name="amount" id="amount" class="text"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn"></td>
					</tr>
				    </table>
				    </form>
				    <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th style="width: 150px;">ID</th>
					    <th>Name</th>
						<th>Contactno</th>
						<th>Type</th>
					    <th colspan="2">Action</th>
					</tr>
					</table>
				    <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				    <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<?php
					$fet=mysql_query("select * from `vendor` where `type`!='0'");
					while($res=mysql_fetch_array($fet))
					{
					    $type=$res['type'];
					    if($type==1){ $cust="customer";}
					    if($type==2){ $cust="Distributer";}
					    if($type==3){ $cust="Retailer";}
					?>
					<tr>
					 <td class="td" style="width: 200px;"><?php echo $res['slno'];?></td>
					    <td class="td" style="width: 200px;"><?php echo $res['name'];?></td>
						 <td class="td" style="width: 200px;"><?php echo $res['phone'];?></td>
						 <td class="td"style="width: 200px;"><?php echo $cust;?></td>
					    <td  class="td"><a href="customeredit.php?id=<?php echo $res['slno'];?>"><img src="image/edit.png" width="60"></a></td>
					    <td onClick="delete_data(<?php echo $res['slno']; ?>)" class="td" style="border-right:1px solid #adadad;"><img src="image/delete.png" width="70"></td>
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
</html> <?php }?>