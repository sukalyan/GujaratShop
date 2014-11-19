<?php
include_once('function.php');
 if(isset($_POST['submit']))
{
	$product=htmlentities($_REQUEST['product']);
	$company=htmlentities($_REQUEST['company']);
	$category=htmlentities($_REQUEST['category']);
	$min=htmlentities($_REQUEST['min']);
	
	$retail=htmlentities($_REQUEST['retailer_pcnt']);
	$distributer=htmlentities($_REQUEST['distributer_pcnt']);
	$customer=htmlentities($_REQUEST['customer_pcnt']);
	
	$fetch=mysql_query("select * from `product` where `prod_name`='$product' and `category`='$category' and`company`='$company' and `minimum`='$min'");
	$res=mysql_numrows($fetch);
	
	if($product!="" && $company!="" && $category!="" && $res==0)
	{
		//echo "insert into `product` set `prod_name`='$product',`category`='$category',`company`='$company', `retailer`='$retail',`distributer`='$distributer',`customer`='$customer'";
		mysql_query("insert into `product` set `prod_name`='$product',`category`='$category',`company`='$company',`minimum`='$min' ,`retailer`='$retail',`distributer`='$distributer',`customer`='$customer'");
		$msg="sucessfully inserted";
		
	//$fetch1=mysql_query("select * from percent");
	//$res1=mysql_num_rows($fetch1);
	//if($res1==0){
	//mysql_query("insert into `percent` set `retailer`='$retail',`distributer`='$distributer',`customer`='$customer'");
	//}else{mysql_query("update `percent` set `retailer`='$retail',`distributer`='$distributer',`customer`='$customer' where `slno`='1'"); }
	
	}else{$msg="Enter different productname";}
	header("location:product.php?msg=$msg");
}
?>