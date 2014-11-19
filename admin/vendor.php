<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}else{

 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
    <script src="js/jquery.min.js"></script>
	
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete vendor?");
			if(con){
                                    window.location="vendordelete.php?id1="+vals;
                                }
			}
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
	/*if(emailid=="")
		{
		alert("enter email");
		return false;
		}*/
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
				<h3>Enter Vendor</h3>
				</div>
				<div class="content3">
				<?php 
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$msg=$_GET['msg']."</span>";
				}
				?>
				    <form name="" action="vendor_action.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">
				    <table class="table" style="margin-top:10px;">
					<tr>
					    <td>Vendor Name</td>
					    <td>
						<input type="text" name="name" id="name" class="text"/>
						</td>
					</tr>
					<tr>
					    <td>Contact</td>
					    <td><input type="text" name="phone" id="phone" onKeyPress="return numbersonly(event)" class="text"/></td>
					</tr>
					<tr>
					    <td>Address</td>
					    <td>
						<textarea name="address" id="address" class="text" style="width:177px;"></textarea>
						</td>
					</tr>
					<tr>
					    <td>Email</td>
					    <td><input type="email" name="email" id="email" class="text"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Add" class="btn"></td>
					</tr>
				    </table>
				    </form>
				    <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Name</th>
						<th>Contactno</th>
					    <th colspan="2">Action</th>
					</tr>
				    </table>
				    <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				    <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<?php
					$fet=mysql_query("select * from `vendor` where `type`='0'");
					while($res=mysql_fetch_array($fet)){
					?>
					<tr>
					    <td style="width: 200px;" class="td"><?php echo $res['name'];?></td>
					    <td class="td" style="width: 200px;"><?php echo $res['phone'];?></td>
					    <td  class="td"><a href="vendoredit.php?id=<?php echo $res['slno'];?>"><img src="image/edit.png" width="60"></a></td>
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