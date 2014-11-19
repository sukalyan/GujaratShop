<?php
include_once('function.php');
//if(!$_SESSION['user'])
//{ header("location:../index.php");}else{
$id=$_GET['id'];
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
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
	if(emailid!="" && !emailid.match(format))

	{

	alert("You have entered an wrong email address!"); 
	return false;
    

	}
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
				<h3>Enter Vendor</h3>
				</div>
				<div style="width:400px; height:auto; float:left; margin-left:160px;">
				    <form name="" action="vendoredit_action.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				    <table class="table">
					<?php
					$fetch=mysql_query("select * from `vendor` where `slno`='$id'");
					$res=mysql_fetch_array($fetch);
					?>
					<tr>
					    <td>Vendor Name</td>
					    <td><input type="text" name="name" id="name" value="<?php echo $res['name'];?>" class="text"/></td>
					    <input type="hidden" name="hid" id="hid" value="<?php echo $id;?>"/>
					</tr>
					<tr>
					    <td>Contact</td>
					    <td><input type="text" name="phone" id="phone" value="<?php echo $res['phone'];?>" onKeyUp="return numberonly();" class="text"/></td>
					</tr>
					<tr>
					    <td>Address</td>
					    <td>
						<textarea name="address" id="address" class="text" style="width:177px;"><?php echo $res['address'];?></textarea>
						</td>
					</tr>
					<tr>
					    <td>Email</td>
					    <td><input type="email" name="email" id="email" value="<?php echo $res['email'];?>" class="text"/></td>
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