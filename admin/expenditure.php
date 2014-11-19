<?php
include_once('function.php');
if(!$_SESSION['user'])
{ header("location:../index.php");}
else
{
?>
<html>
<head>
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
				<h3>Trade</h3>
				</div>
				<div class="content3">
                                    <?php if(isset($_GET['msg'])){echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";} ?>
                    <form name="" action="sellaction.php" method="post">
                        <table class="table" align="center">
			    <tr>
				<td colspan="2"></br>
				    <input type="text" name="cust" id="cust" class="text">
				</td>
				<td>Name<input type="text" name="custname" id="custname" class="text" readonly="true"></td>
                            </tr>
			    <tr>
				<td colspan="2">Customer Id</br>
				    <input type="text" name="cust" id="cust" class="text" onBlur="return focs();">
				</td>
				<td>Name<input type="text" name="custname" id="custname" class="text" readonly="true"></td>
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
