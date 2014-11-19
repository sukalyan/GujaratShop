<?php
include_once('function.php');
 if(isset($_POST['sub']))
    {
        $n=htmlentities($_REQUEST['user']);
        $p=htmlentities($_REQUEST['pass']);
	//echo "select * from `login` where `username`='$n' and `password`='$p'";
       $res=mysql_fetch_array(mysql_query("select * from `login` where `username`='$n' and `password`='$p' and `status`='0'"));
      $name=$res['username'];
      $pass=$res['password'];
      
      $res1=mysql_fetch_array(mysql_query("select * from `login` where `username`='$n' and `password`='$p' and `status`='1'"));
      $name1=$res1['username'];
      $pass1=$res1['password'];
       if($pass==$p && $name==$n)
       {
	$_SESSION['user']=$n;
       header("location:admin/vendor.php");
       }
       elseif($pass1==$p && $name1==$n)
       {
	$_SESSION['user']=$n;
       header("location:admin/usersell.php");
       }
       else
       {
	 $msg=" Username password not found";
	header("location:index.php?msg=$msg");
       }
       
    }
?>