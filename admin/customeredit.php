<?php
include_once('function.php');
//if(!$_SESSION['user'])
//{ header("location:../index.php");}else{
$id=$_GET['id'];
$getcompany=mysql_query("select * from `area`")or die(mysql_error());
while($rescompany=mysql_fetch_array($getcompany))
{
$getemails[] = array(
'value'  =>$rescompany['area'],
'idval' => $rescompany['slno']
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
</script>
	<script>
		function validate()
		{
		var name=document.getElementById('name').value;
		var phonee=document.getElementById('phone').value;
		var emailid=document.getElementById('email').value;
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
	/*if(emailid!="" && !emailid.match(format))

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
                <div style="width:760px; height:auto; float:left; font-family:arial; font-size:14px; margin-top:10px;">
				<h3>Edit Customer</h3>
				</div>
				<div style="width:auto; height:auto; float:left; margin-left:140px;">
				    <form name="" action="customeredit_action.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				    <table class="table">
					<?php
					$fetch=mysql_query("select * from `vendor` where `slno`='$id'");
					$res=mysql_fetch_array($fetch);
					
					//$fetchl=mysql_query("select * from `area` where `slno`='$res[location]'");
					//$resl=mysql_fetch_array($fetchl);
					?>
							<tr>
							    <td>Contact</td>
							    <td><input type="text" name="phone" id="phone" value="<?php echo $res['phone'];?>" onKeyPress="return numbersonly(event)" class="text"/></td>
							</tr>
							<tr>
							<tr>
							    <td>Customer Name</td>
							    <td>
								<input type="text" name="name" id="name" value="<?php echo $res['name'];?>" class="text"/>
								</td>
							</tr>
							<tr>
							    <td>Father/Husband Name</td>
							    <td>
								<input type="text" name="fatname" id="fatname" value="<?php echo $res['father'];?>" class="text"/>
								</td>
							</tr>
							<tr>
							    <td>DOB</td>
							    <td>Age</td>
							</tr>
							<tr>
							    <td><input type="text" name="dob" id="inputField" class="text" value="<?php echo $res['dob'];?>"/></td>
							    <td><input type="text" name="age" id="age" class="text" value="<?php echo $res['age'];?>"/></td>
							</tr>
							<tr>
							    <td>Year</td>
							    <td>Sex</td>
							</tr>
							<tr>
							    <td><input type="text" name="year" id="year" class="text" value="<?php echo $res['year'];?>"/></td>
							    <td>
								<?php if($res['sex']=="m"){?><input type="radio" name="sex" id="sex" class="text" value="m" checked="checked" style="width: 50px;"/>
								<?php }else{?><input type="radio" name="sex" id="sex" class="text" value="m" style="width: 50px;"/><?php }?>M
								<?php if($res['sex']=="f"){?><input type="radio" name="sex" id="sex" value="f" checked="checked" class="text" style="width: 50px;"/>
								<?php }else{?><input type="radio" name="sex" id="sex" value="f" class="text" style="width: 50px;"/><?php }?>F
							    </td>
							</tr>
							<tr>
							    <td>Address</td>
							    <td>
								<textarea name="address" id="address" class="text" style="width:177px;"><?php echo $res['address'];?></textarea>
								</td>
							</tr>
							<tr>
							    <td>Location</td>
							    <td>
							     <input type="text" name="location" id="locatio" class="text" value="<?php echo $res['location'];?>"/>
								<input type="hidden" name="loc" id="hdlocatio" value="<?php echo $res['location'];?>"/>
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
								
								<?php if($res['occupation']=="service"){?><input type="radio" name="occupation" id="occupation" value="service" checked="checked" style="float: left; margin-right: 40px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="service"  style="float: left; margin-right: 40px;" class="text"/><?php }?>
								<?php if($res['occupation']=="business"){?><input type="radio" name="occupation" id="occupation" value="business" checked="checked"  style="float: left; margin-right: 40px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="business"  style="float: left; margin-right: 40px;" class="text"/><?php }?>
								<?php if($res['occupation']=="student"){?><input type="radio" name="occupation" id="occupation" value="student" checked="checked" style="float: left; margin-right: 40px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="student" style="float: left; margin-right: 40px;" class="text"/><?php }?>
								<?php if($res['occupation']=="housewife"){?><input type="radio" name="occupation" id="occupation" value="housewife" checked="checked" style="float: left; margin-right: 50px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="housewife" style="float: left; margin-right: 50px;" class="text"/><?php }?>
								<?php if($res['occupation']=="professional"){?><input type="radio" name="occupation" id="occupation" value="professional" checked="checked" style="float: left; margin-right: 70px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="professional" style="float: left; margin-right: 70px;" class="text"/><?php }?>
								<?php if($res['occupation']=="others"){?><input type="radio" name="occupation" id="occupation" value="others" checked="checked"  style="float: left; margin-right: 40px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="others" style="float: left; margin-right: 40px;" class="text"/><?php }?>
								<?php if($res['occupation']=="society"){?><input type="radio" name="occupation" id="occupation" value="society" checked="checked"  style="float: left; margin-right: 20px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="society" style="float: left; margin-right: 20px;" class="text"/><?php }?>
								<?php if($res['occupation']=="company"){?><input type="radio" name="occupation" id="occupation" value="company" checked="checked"  style="float: left; margin-right: 20px;" class="text"/>
								<?php }else{?><input type="radio" name="occupation" id="occupation" value="company" style="float: left; margin-right: 20px;" class="text"/><?php }?>
							    </td>
							</tr>
							<tr>
							    <td>Introducer name</td>
							    <td>Introducer Id</td>
							</tr>
							<tr>
							    <td><input type="text" name="introducer" id="introducer" class="text" value="<?php echo $res['introducer'];?>" readonly/></td>
							    <td><input type="text" name="introid" id="introid" class="text" value="<?php echo $res['introid'];?>" readonly/></td>
							</tr>
							<tr>
							    <td>Identity Proof</td>
							    <td>Addhar card  Voter card  Driving licence  Others</td>
							</tr>
							<tr>
							 <td></td>
							    <td>
							     <?php if($res['identity']=="addharcard"){?><input type="radio" name="iproof" id="iproof" class="text" value="addharcard" checked="checked" style="margin-left: 20px; float: left;"/>
							     <?php }else{?><input type="radio" name="iproof" id="iproof" class="text" value="addharcard" style="margin-left: 20px; float: left;"/><?php }?>
							     <?php if($res['identity']=="votercard"){?><input type="radio" name="iproof" id="iproof" class="text" value="votercard" checked="checked" style="margin-left: 65px; float: left;"/>
							     <?php }else{?><input type="radio" name="iproof" id="iproof" class="text" value="votercard" style="margin-left: 65px; float: left;"/><?php }?>
							     <?php if($res['identity']=="dl"){?><input type="radio" name="iproof" id="iproof" checked="checked" class="text" value="dl" style="margin-left: 65px; float: left;"/>
							     <?php }else{?><input type="radio" name="iproof" id="iproof" class="text" value="dl" style="margin-left: 65px; float: left;"/><?php }?>
							     <?php if($res['identity']=="others"){?><input type="radio" name="iproof" id="iproof" checked="checked" class="text" value="others" style="margin-left: 65px; float: left;"/>
							     <?php }else{?><input type="radio" name="iproof" id="iproof" class="text" value="others" style="margin-left: 65px; float: left;"/><?php }?>
							    </td>
							</tr>
		
							<tr>
							    <td>Email</td>
							    <td><input type="email" name="email" id="email" value="<?php echo $res['email'];?>" class="text"/></td>
							    <input type="hidden" name="slno" id="slno" value="<?php echo $res['slno'];?>"/>
							</tr>
							<tr>
						<td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="update" class="btn"></td>
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
</html> <?php //}?>