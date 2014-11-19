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

 <script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_product.php?id1="+vals;
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
				<h3>Enter Agent</h3>
				</div>
				<div class="content3">
				<?php
				if(isset($_GET['msg']))
				{
				echo "<span style='color:red; font-size:14px;'>".$_GET['msg']."</span>";
				}
				?>
				    <form name="f" action="area_action.php" method="post" enctype="multipart/form-data">
				    <table class="table">
				     <tr>
				      <td>Agent Name</td>
				      <td><input type="text" name="introducer" required ></td>
				     </tr>
				     <tr>
				      <td>Agent Id</td>
				      <?php
				      $fetintroducerid=mysql_query("select MAX(introducer_id) as id  from `area`");
				      $resintroducerid=mysql_fetch_array($fetintroducerid );
				      $id=$resintroducerid['id'];
				      $nextid=$id+1;
				      ?>
				      <td><input type="text" name="id" value="<?php echo $nextid;?>" readonly></td>
				     </tr>
				     <tr>
				      <td>Area Name</td>
				      <td><input type="text" name="area" required ></td>
				     </tr>
				     <tr>
					    <td>Contact</td>
					    <td><input type="text" name="phone" id="phone" onKeyPress="return numbersonly(event)" class="text"/></td>
					</tr>
					<tr>
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
					    <td><input type="text" name="dob" id="inputField" class="text"/></td>
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
					    <td>Location</td>
					    <td>
					     <input type="text" name="location" id="locatio" class="text"/>
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
					<tr>
					    <td>Email</td>
					    <td><input type="email" name="email" id="email" class="text"/></td>
					</tr>
					<!--<tr>
					    <td>Amount</td>
					    <td><input type="text" name="amount" id="amount" class="text"/></td>
					</tr>
					<tr>-->
						<td>&nbsp;</td>
					    <td><input type="submit" name="submit" value="Insert" class="btn"></td>
					</tr>
				    </table>
				    </form>
				    <table class="table" cellpadding="0" cellspacing="0" style="line-height:2.5;">
					<tr style="background:url(image/yellow.png); color:#fff; height:25px; font-size:12px;">
					    <th>Name</th>
						<th>Area</th>
						<th>Location</th>
					    <th colspan="2">Action</th>
					</tr>
				    </table>
				    <div id="content2" style="height:220px; overflow:auto; overflow-x:hidden; background:none; padding-top:0px; padding-bottom:0px;">
				    <table class="table" cellspacing="0" cellpadding="0" style="line-height:3; margin-top:0px; " >
					<?php
					$fet=mysql_query("select * from `area`");
					while($res=mysql_fetch_array($fet)){
					?>
					<tr>
					    <td style="width: 150px;" class="td"><?php echo $res['introducer_name'];?></td>
					    <td style="width: 150px;" class="td"><?php echo $res['area'];?></td>
					    <td class="td" style="width: 200px;"><?php echo $res['location'];?></td>
					    <td  class="td"><a href="area_edit.php?id=<?php echo $res['slno'];?>"><img src="image/edit.png" width="60"></a></td>
					    <td onClick="delete_data(<?php echo $res['slno']; ?>)" class="td" style="border-right:1px solid #adadad;"><img src="image/delete.png" width="70"></td>
					</tr><?php }?>
				    </table>
				    </div>
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