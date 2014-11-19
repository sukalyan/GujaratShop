<?php
include_once('function.php');
if(isset($_POST['submit']))
{
    $slno=htmlentities($_REQUEST['hdvendval']);
    $password=htmlentities($_REQUEST['password']);
   
    if($slno!="" && $password!="")
    {
	mysql_query("update `login` set `password`='$password' where `slno`='$slno'");
	$err="sucessfully updated";
    }
    header("location:change_password.php?msg=$err");
}
?>