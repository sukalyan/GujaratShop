<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-EN">
<head>
	<link rel="stylesheet" href="styles.css">
     <script src="js/jquery.min.js"></script>
   <script src="script.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Simple JQuery Collapsing menu</title>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
  
</head>
<body>
	
<div id='cssmenu'>
<ul>
   <li><a href='vendor.php'><span>Home</span></a></li>
   
  
   <li class='has-sub'><a href="#">ADD MASTER</a></a>
      <ul>
		     <li><a href="area.php">ADD AGENT</a></li>
      			<li><a href="vendor.php">ADD VANDOR</a></li>
                   <li><a href="customer.php">ADD CUSTOMER</a></li>
                   <li><a href="percentage.php">ADD PRICE PERCENTAGE</a></li>
         		 <li><a href="addcategory.php">ADD CATEGORY NAME</a></li>
                <li><a href="addcompany.php">ADD COMPANY NAME</a></li>
                <li><a href="product.php">ADD PROUDCT NAME</a></li>
                 <li><a href="productbar.php">ADD BARCODE</a></li>
      </ul>
   </li>
  <li class='has-sub'><a href="#">INVENTORY</a></a>
      <ul>
	 <!--<li><a href="addproduct.php">Add Rawmeterial</a></li>
	 <li><a href="readymade.php">Add Readymade Product</a></li>-->
	 <li><a href="barcode_generetor.php">GENERATE BARCODE</a></li>
	 <li><a href="purchase_order.php">METERIAL PURCHASE</a></li>  
	 <li><a href="addstock.php">PRODUCT INTO STOCK</a></li>
	 <li><a href="sell.php">RETAIL INVIOCE</a></li>
	 <li><a href="return.php">RETURN</a></li>
	 
      </ul>
   </li>
  
  
  <li class='has-sub'><a href="#">ACCOUNTS</a></a>
      <ul>
	 <li><a href="payrest.php">DUE AMOUNT RECEIVE</a></li>
	 <li><a href="payment.php">VENDOR PAYMENT</a></li>
      </ul>
  </li>
   
   <li class='has-sub'><a href="#">ALL REPORT</a></a>
      <ul>
	 <li class='has-sub'><a href="" onClick="window.location.href='customer_report.php'"><span>Agent wise customer Report</span></a></li>
         <li class='has-sub'><a href="" onClick="window.location.href='daywisesell.php'"><span>Datewise Sell Report</span></a></li>
	 <li class='has-sub'><a href="" onClick="window.location.href='categorywisesell.php'"><span>Categorywise Sell Report</span></a></li>
	 <li class='has-sub'><a href="" onClick="window.location.href='area_sell_report.php'"><span>Areawise Sell Report</span></a></li>
         <!-- <li class='has-sub'><a href="" onclick="window.location.href='inventory.php'"><span>Inventory Report</span></a></li>-->
          <li class='has-sub'><a href="" onClick="window.location.href='initial_stock.php'"><span>Initial Stock Report</span></a></li>
          <li class='has-sub'><a href="" onClick="window.location.href='final_stock.php'"><span>Final Stock Report</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='final_stockreport.php'"><span>Old Stock Report</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='Rest_stock.php'"><span>Godown Rest Report</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='vendor_report.php'"><span>Purchase Report</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='vendor_reportdatewise.php'"><span>Purchase Report Datewise</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='vendor_credit_report.php'"><span>Vendor Credit Report</span></a></li>
	  <li class='has-sub'><a href="" onClick="window.location.href='transaction_report.php'"><span>Transaction Report</span></a></li>
	   <li class='has-sub'><a href="" onClick="window.location.href='backup.php'"><span>Back Up</span></a></li>
      </ul>
   </li>
   
   <li class='has-sub'><a href="#">SECURITY</a></a>
      <ul>
	 <li><a href="change_password.php">CHANGE PASSWORD</a></li>
	 <li><a href="inser_user.php">INSERT USER</a></li>
      </ul>
  </li>
   <li><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
</body>
</html>

