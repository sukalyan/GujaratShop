DROP TABLE `area`;

CREATE TABLE `area` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `area` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `introducer_name` varchar(200) NOT NULL,
  `introducer_id` int(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fatname` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `iproof` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `area` VALUES("1","bhadrak","bhadrak","ricky","10000","789456321","ricky123","2014-11-05","29","2.14","m","professional","dl","ricky@gmail.com","bhadrak");



DROP TABLE `barcode`;

CREATE TABLE `barcode` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `category` VALUES("1","chokolate");



DROP TABLE `comment`;

CREATE TABLE `comment` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `company` VALUES("1","nesle");



DROP TABLE `final`;

CREATE TABLE `final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `final` VALUES("2","2","0","5.79","2014-11-14");
INSERT INTO `final` VALUES("5","1","0","9.62","2014-11-14");
INSERT INTO `final` VALUES("9","1","0","9.72","2014-11-15");
INSERT INTO `final` VALUES("11","2","1","5.91","2014-11-15");
INSERT INTO `final` VALUES("12","1","9","9.82","2014-11-15");



DROP TABLE `freestock`;

CREATE TABLE `freestock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `slno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;




DROP TABLE `login`;

CREATE TABLE `login` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `login` VALUES("1","admin","admin","0");
INSERT INTO `login` VALUES("2","user","user","1");
INSERT INTO `login` VALUES("3","somya","somya","1");
INSERT INTO `login` VALUES("4","sam","sam","1");
INSERT INTO `login` VALUES("5","SALAM","933733","1");
INSERT INTO `login` VALUES("6","samsad","123456","1");



DROP TABLE `percent`;

CREATE TABLE `percent` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `retailer` varchar(200) NOT NULL,
  `distributer` varchar(200) NOT NULL,
  `customer` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `percent` VALUES("1","70","80","90");



DROP TABLE `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(300) NOT NULL,
  `category` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `minimum` varchar(200) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `retailer` float(10,2) NOT NULL,
  `distributer` float(10,2) NOT NULL,
  `customer` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `product` VALUES("1","kitkat","1","1","1","1","0.00","0.00","0.00");
INSERT INTO `product` VALUES("2","parle","1","1","1","2","0.00","0.00","0.00");



DROP TABLE `purchase`;

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `freequantity` varchar(200) NOT NULL,
  `totalquantity` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `totalprice` varchar(200) NOT NULL,
  `specialdiscount` varchar(200) NOT NULL,
  `dealerdiscount` varchar(200) NOT NULL,
  `schemediscount` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `totaltax` varchar(200) NOT NULL,
  `totalamount` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `bar` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `company` varchar(10) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `purchase` VALUES("1","1","1","10","2","12","10","8","80","","","","2","1.6","81.60","2014-11-14","1","1","1","5466368f4d461","546636d6cf732");
INSERT INTO `purchase` VALUES("2","1","2","4","2","6","6","5","50","","","","2","1","51.00","2014-11-14","2","1","1","546636b365019","546636d6cf732");
INSERT INTO `purchase` VALUES("3","1","2","5","2","7","11","9","90","","","","2","1.8","91.80","2014-11-14","2","1","1","546648f002250","546649131352a");



DROP TABLE `readystock`;

CREATE TABLE `readystock` (
  `bar` varchar(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `product` varchar(200) NOT NULL,
  `product_name` varchar(11) NOT NULL,
  `costprice` float(10,2) NOT NULL,
  `distributer` float(10,2) NOT NULL,
  `retailer` float(10,2) NOT NULL,
  `mrp` float(10,2) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE `rest`;

CREATE TABLE `rest` (
  `slno` int(20) NOT NULL AUTO_INCREMENT,
  `custid` int(20) NOT NULL,
  `rest` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`),
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE `return`;

CREATE TABLE `return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `freequantity` varchar(200) NOT NULL,
  `totalquantity` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `totalprice` varchar(200) NOT NULL,
  `specialdiscount` varchar(200) NOT NULL,
  `dealerdiscount` varchar(200) NOT NULL,
  `schemediscount` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `totaltax` varchar(200) NOT NULL,
  `totalamount` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `bar` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `company` varchar(10) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE `sell`;

CREATE TABLE `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billid` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  `totprice` float(10,2) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `uniqueid` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `checked` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `sell` VALUES("1","1415985316","2","1","1","9.62","9.62","1","bhadrak","5466368f4d461","2014-11-14","");
INSERT INTO `sell` VALUES("2","1415985316","2","2","1","5.79","5.79","2","bhadrak","546636b365019","2014-11-14","");
INSERT INTO `sell` VALUES("3","1415989739","2","1","1","9.82","9.82","1","bhadrak","5466368f4d461","2014-11-14","");
INSERT INTO `sell` VALUES("4","1415989739","2","2","1","5.91","5.91","2","bhadrak","546636b365019","2014-11-14","");
INSERT INTO `sell` VALUES("5","1415989928","2","1","1","9.62","9.62","1","bhadrak","5466368f4d461","2014-11-14","");
INSERT INTO `sell` VALUES("6","1415989928","2","2","1","5.91","5.91","2","bhadrak","546636b365019","2014-11-14","");
INSERT INTO `sell` VALUES("7","1415990403","2","1","1","9.82","9.82","1","bhadrak","5466368f4d461","2014-11-14","");
INSERT INTO `sell` VALUES("8","1415990403","2","2","1","5.91","5.91","2","bhadrak","546636b365019","2014-11-14","");
INSERT INTO `sell` VALUES("9","1416027309","2","1","1","9.72","9.72","1","bhadrak","5466368f4d461","2014-11-15","");
INSERT INTO `sell` VALUES("10","1416027309","2","2","1","5.91","5.91","2","bhadrak","546636b365019","2014-11-15","");
INSERT INTO `sell` VALUES("11","1416029327","2","2","1","5.91","5.91","2","bhadrak","546636b365019","2014-11-15","");
INSERT INTO `sell` VALUES("12","1416029327","2","1","1","9.82","9.82","1","bhadrak","5466368f4d461","2014-11-15","");



DROP TABLE `stock`;

CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(300) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  `retailer_price` float(10,2) NOT NULL,
  `distributer_price` float(10,2) NOT NULL,
  `totprice` varchar(200) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `uniqueid` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `cat` varchar(200) NOT NULL,
  `comp` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `stock` VALUES("1","1","12","9.82","9.45","9.63","","1","5466368f4d461","2014-11-14","1","1","546636d6cf732");
INSERT INTO `stock` VALUES("2","2","6","5.91","5.73","5.82","","2","546636b365019","2014-11-14","1","1","546636d6cf732");
INSERT INTO `stock` VALUES("3","2","7","10.82","10.45","10.64","","2","546648f002250","2014-11-14","1","1","546649131352a");



DROP TABLE `tempuid`;

CREATE TABLE `tempuid` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`),
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tempuid` VALUES("3","546648f002250");



DROP TABLE `transaction`;

CREATE TABLE `transaction` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `billid` varchar(300) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `transaction` VALUES("1","1","132.6","","","2014-11-14");
INSERT INTO `transaction` VALUES("2","","9.6236","1415985316","5466368f4d461","2014-11-14");
INSERT INTO `transaction` VALUES("3","","5.7918","1415985316","546636b365019","2014-11-14");
INSERT INTO `transaction` VALUES("4","1","91.8","","","2014-11-14");
INSERT INTO `transaction` VALUES("5","","9.82","1415989739","5466368f4d461","2014-11-14");
INSERT INTO `transaction` VALUES("6","","5.91","1415989739","546636b365019","2014-11-14");
INSERT INTO `transaction` VALUES("7","","9.6236","1415989928","5466368f4d461","2014-11-14");
INSERT INTO `transaction` VALUES("8","","5.91","1415989928","546636b365019","2014-11-14");
INSERT INTO `transaction` VALUES("9","","9.82","1415990403","5466368f4d461","2014-11-14");
INSERT INTO `transaction` VALUES("10","","5.91","1415990403","546636b365019","2014-11-14");
INSERT INTO `transaction` VALUES("11","","9.7218","1416027309","5466368f4d461","2014-11-15");
INSERT INTO `transaction` VALUES("12","","5.91","1416027309","546636b365019","2014-11-15");
INSERT INTO `transaction` VALUES("13","","5.91","1416029327","546636b365019","2014-11-15");
INSERT INTO `transaction` VALUES("14","","9.82","1416029327","5466368f4d461","2014-11-15");



DROP TABLE `vendor`;

CREATE TABLE `vendor` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` int(10) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `father` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `introducer` varchar(200) NOT NULL,
  `introid` varchar(200) NOT NULL,
  `identity` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `vendor` VALUES("1","SALAM ","4561238970","bhadrak","samsad.matrix@gmail.com","0","0.00","","0000-00-00","","0000-00-00","","","","","","","");
INSERT INTO `vendor` VALUES("2","khan","1234567895","bhadrak","k@gmail.com","1","428.65","bhadrak","2014-11-14","khan123","2014-11-07","27","2014","m","others","10000","ricky","dl");



