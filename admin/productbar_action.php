<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	 $productid=htmlentities($_REQUEST['produc']);
	 $bar=htmlentities($_REQUEST['bar']);
	 $null="";
	//echo "select * from `product` where `id`='$productid' and `barcode`='$null'";
	$fetch=mysql_query("select * from `product` where `barcode`='$bar'");
	$res=mysql_numrows($fetch);
	
	$fetch1=mysql_query("select * from `product` where `id`='$productid' and `barcode`='$null'");
	$res1=mysql_numrows($fetch1);
	
	if($productid!="" && $res==0 && $res1>0)
	{
		//echo "update `product` set `barcode`='$bar' where `id`='$productid'";
		mysql_query("update `product` set `barcode`='$bar' where `id`='$productid'");
		$msg="sucessfully updated";
	}else{$msg="Bar code already exist";}
	header("location:productbar.php?msg=$msg");
}
?>