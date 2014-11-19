<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-EN">
<head>
	<link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Simple JQuery Collapsing menu</title>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
   <style>
   #cssmenu ul li a{
   background:#333;
   border-top:0.9px solid #cdcdcd;
   }
   </style>
</head>
<body>
	
<div id='cssmenu' style="background:#333;">
<ul>
   <li><a href="usersell.php" style="background:#333;"><span>Home</span></a></li>
   <li><a href="usersell.php">Trade</a></li>
   <li><a href="logout.php">LOGOUT</a></li>
   <li class='has-sub'><a href="#">REPORT</a></a>
      <ul>
          <li class='has-sub'><a href="" onclick="window.location.href='final_stock1.php'"><span>Final Stock Report</span></a></li>
      </ul>
   </li>
</ul>
</div>
</body>
</html>

