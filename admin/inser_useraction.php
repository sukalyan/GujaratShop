<?php
include_once('function.php');
if(isset($_POST['submit']))
{
     $name=htmlentities($_REQUEST['user']);
     $pass=htmlentities($_REQUEST['password']);
   
    if($name!="" && $pass!="")
    {
     $fet=mysql_query("select * from `login` where `username`='$name' and `password`='$pass'")or die(mysql_error());
     $res=mysql_numrows($fet);
    if($res==0)
    {
        mysql_query("insert into `login` set `username`='$name',`password`='$pass',`status`='1'") or die(mysql_error());
	$err="sucessfully inserted";
    }
    else{
	 $err="An account already exists with the same username. Login or create an account with another Username.";
	}
    }
    header("location:inser_user.php?msg=$err");
}

?>