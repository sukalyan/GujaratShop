<?php
include_once('function.php');
if(!$_SESSION['user'])
{ 
header("location:../index.php");
}
else
{
 ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet"  type="text/css"/>
 <script>
    function check()
    {
	var upass=$("#password").val();
	var user=$("#user").val();
	if (upass=="")
	{
	    alert("Enter password");
	    return false;
	}
	if (user=="")
	{
	    alert("Enter Username");
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
				    <form name="f" action="inser_useraction.php" method="post" onSubmit="return check()" enctype="multipart/form-data">
				    <table class="table">
					<tr>
						<td>user Name</td>
						<td>
						<input type="text" name="user" id="user" class="text" autocomplete="off" class="text"/>
						</td>
					</tr>
					<tr>
					    <td>Password</td>
					    <td>
						<input type="text" name="password" id="password" value="" class="text"/>
					    </td> 
					</tr>
					<tr>
					    <td colspan="2">
						<input type="submit" name="submit" value="insert">
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