-- MySQL dump 10.13  Distrib 5.5.33, for osx10.6 (i386)
--
-- Host: localhost    Database: ccms41
-- ------------------------------------------------------
-- Server version	5.5.33-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_admin`
--

DROP TABLE IF EXISTS `t_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_admin` (
  `am_id` char(13) NOT NULL,
  `am_account` varchar(10) NOT NULL,
  `am_password` char(32) NOT NULL,
  `am_role` int(11) NOT NULL,
  `am_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`am_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_admin`
--

LOCK TABLES `t_admin` WRITE;
/*!40000 ALTER TABLE `t_admin` DISABLE KEYS */;
INSERT INTO `t_admin` VALUES ('5261332e10db1','hongbo','202cb962ac59075b964b07152d234b70',127,1),('5261333babe59','admin','202cb962ac59075b964b07152d234b70',81,1);
/*!40000 ALTER TABLE `t_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_channel`
--

DROP TABLE IF EXISTS `t_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_channel` (
  `cn_id` char(13) NOT NULL,
  `cn_fid` char(13) NOT NULL,
  `cn_name` varchar(50) NOT NULL,
  `cn_nick` varchar(50) NOT NULL,
  `cn_url` varchar(255) NOT NULL,
  `cn_ctime` int(11) NOT NULL,
  `cn_order` int(11) NOT NULL,
  `cn_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`cn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_channel`
--

LOCK TABLES `t_channel` WRITE;
/*!40000 ALTER TABLE `t_channel` DISABLE KEYS */;
INSERT INTO `t_channel` VALUES ('1','0','website','网站根目录','',1358303465,1,1),('530029c52bcf6','530029a70dd5f','公司新闻','','',1392519621,1,1),('52f6fa53a0520','1','修行养生','','',1391917651,1,1),('52f720376e833','52f6fa53a0520','解决方案一','','',1391927351,1,1),('52f72044a723b','52f6fa53a0520','解决方案二','','',1391927364,2,1),('52f72045bb5f7','52f6fa53a0520','解决方案三','','',1391927365,3,1),('530029a70dd5f','1','新闻中心','','',1392519591,2,1),('530029d5db453','530029a70dd5f','产品动态','','',1392519637,2,1),('530029e02da06','530029a70dd5f','公司介绍','','',1392519648,3,1),('530029faed1a5','1','购买合作','','',1392519674,3,1),('53002a0996b76','530029faed1a5','常见问答','','',1392519689,1,1),('53002a182620e','530029faed1a5','支付相关','','',1392519704,2,1),('53002a273d223','530029faed1a5','加盟合作','','',1392519719,3,1);
/*!40000 ALTER TABLE `t_channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_channel_sc`
--

DROP TABLE IF EXISTS `t_channel_sc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_channel_sc` (
  `cn_id` char(13) NOT NULL,
  `cns_name` varchar(20) NOT NULL,
  `cns_order` int(11) NOT NULL,
  PRIMARY KEY (`cn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_channel_sc`
--

LOCK TABLES `t_channel_sc` WRITE;
/*!40000 ALTER TABLE `t_channel_sc` DISABLE KEYS */;
INSERT INTO `t_channel_sc` VALUES ('1','website',1);
/*!40000 ALTER TABLE `t_channel_sc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_content`
--

DROP TABLE IF EXISTS `t_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_content` (
  `ct_id` char(13) NOT NULL,
  `cn_id` char(13) NOT NULL,
  `ct_title` varchar(100) NOT NULL,
  `ct_subtitle` varchar(50) NOT NULL,
  `ct_image` varchar(20) NOT NULL,
  `ct_summary` varchar(255) NOT NULL,
  `ct_detail` text NOT NULL,
  `ct_ctime` int(11) NOT NULL,
  `ct_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_content`
--

LOCK TABLES `t_content` WRITE;
/*!40000 ALTER TABLE `t_content` DISABLE KEYS */;
INSERT INTO `t_content` VALUES ('52f73eae2de87','52f720376e833','解决方案一下的内容1','解决方案一下的内容1-副标题','','解决方案一下的内容1-内容摘要','<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium.<br>\n\n<br>\n\nMauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus.<br>\n\nAliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1391935150,1),('52f73f3d0f601','52f720376e833','解决方案一下的内容2','解决方案一下的内容2 - 副标题','','解决方案一下的内容2 - 内容摘要','<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium.<br>\n\n<br>\n\nMauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus.<br>\n\nAliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1391935293,1),('52f745860158e','52f720376e833','111111','','','','<p>111</p>\n',1391936902,1),('52f7458f3115f','52f720376e833','22222','','','','<p>2222</p>\n',1391936911,1),('52f745a6519da','52f720376e833','333333','','','','<p>333333333</p>\n',1391936934,1),('52f745b2b9c5d','52f720376e833','444444','','','','<p>44444</p>\n',1391936946,1),('530030db37e06','530029c52bcf6','公司新闻内容','','','','<p>哈哈</p>\n',1392521435,1);
/*!40000 ALTER TABLE `t_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_guestbook`
--

DROP TABLE IF EXISTS `t_guestbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_guestbook` (
  `gb_id` char(13) NOT NULL,
  `gb_type` tinyint(4) NOT NULL,
  `gb_title` varchar(50) NOT NULL,
  `gb_content` varchar(500) NOT NULL,
  `gb_username` varchar(10) NOT NULL,
  `gb_phone` varchar(15) NOT NULL,
  `gb_email` varchar(50) NOT NULL,
  `gb_contact` varchar(50) NOT NULL,
  `gb_ctime` int(11) NOT NULL,
  `gb_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`gb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_guestbook`
--

LOCK TABLES `t_guestbook` WRITE;
/*!40000 ALTER TABLE `t_guestbook` DISABLE KEYS */;
INSERT INTO `t_guestbook` VALUES ('5262071e72b4c',0,'title','content','hongbo','123','xs@12.com','xxx',1382156062,0),('5312983a41082',0,'测试用户留言','这里是留言内容','洪波','13700000000','lovef22@126.com','76475892',1393727546,0),('526207619bbf9',0,'title3','content3','hongbo','123','xs@12.com','xxx',1382156129,1),('5262076a8df94',0,'title4','content4','hongbo','123','xs@12.com','xxx',1382156138,0),('5312a8fd0ff29',1,'新款macbook pro','haha','啵啵牛','123123','haha','76475892',1393731837,0);
/*!40000 ALTER TABLE `t_guestbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_guestbook_reply`
--

DROP TABLE IF EXISTS `t_guestbook_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_guestbook_reply` (
  `gbr_id` char(13) NOT NULL,
  `gbr_type` tinyint(4) NOT NULL,
  `gb_id` char(13) NOT NULL,
  `gbr_content` varchar(500) NOT NULL,
  `gbr_ctime` int(11) NOT NULL,
  `am_account` varchar(10) NOT NULL,
  PRIMARY KEY (`gbr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_guestbook_reply`
--

LOCK TABLES `t_guestbook_reply` WRITE;
/*!40000 ALTER TABLE `t_guestbook_reply` DISABLE KEYS */;
INSERT INTO `t_guestbook_reply` VALUES ('52628f5e32f83',1,'526207619bbf9','这是直接回复的反馈',1382190942,'hongbo');
/*!40000 ALTER TABLE `t_guestbook_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_menu`
--

DROP TABLE IF EXISTS `t_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_menu` (
  `mu_id` char(13) NOT NULL,
  `mu_fid` char(13) NOT NULL,
  `mu_name` varchar(16) NOT NULL,
  `mu_sort` int(11) NOT NULL,
  PRIMARY KEY (`mu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_menu`
--

LOCK TABLES `t_menu` WRITE;
/*!40000 ALTER TABLE `t_menu` DISABLE KEYS */;
INSERT INTO `t_menu` VALUES ('528b6063b135e','528b605b872f5','s_31',1),('5289d472a8c75','0','first',3),('528b605b872f5','5289d47688b06','s_21',1),('5289d47688b06','0','second2',5),('528b606ebdb84','528b6063b135e','s_41',1),('528b605272647','0','third',6),('528b6078215e1','528b6063b135e','s_42',2),('528b607ddab66','5289d47688b06','s_22',2),('528b6088a0142','528b607ddab66','s22_1',1);
/*!40000 ALTER TABLE `t_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_order`
--

DROP TABLE IF EXISTS `t_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_order` (
  `od_id` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `od_price` float(8,2) NOT NULL,
  `od_send` tinyint(4) NOT NULL,
  `od_remark` varchar(200) NOT NULL,
  `od_ctime` int(11) NOT NULL,
  `od_stime` int(11) NOT NULL,
  `od_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_order`
--

LOCK TABLES `t_order` WRITE;
/*!40000 ALTER TABLE `t_order` DISABLE KEYS */;
INSERT INTO `t_order` VALUES ('1403011414522853',80868378,14650.00,2,'留言: 使用精美包装',1393654492,0,0),('1403011459347736',80868378,300.00,3,'留言: 随便什么包装',1393657174,0,0),('1403011500274393',80868378,17580.00,2,'留言: 没有什么可说的',1393657227,0,0);
/*!40000 ALTER TABLE `t_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product`
--

DROP TABLE IF EXISTS `t_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_product` (
  `pd_id` char(13) NOT NULL,
  `pd_name` varchar(50) NOT NULL,
  `pd_no` varchar(10) NOT NULL,
  `pd_category` char(13) NOT NULL,
  `pd_click` int(11) NOT NULL,
  `pd_utime` int(11) NOT NULL,
  `pd_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product`
--

LOCK TABLES `t_product` WRITE;
/*!40000 ALTER TABLE `t_product` DISABLE KEYS */;
INSERT INTO `t_product` VALUES ('528dc651773bf','新款macbook pro','mac1024','528b605272647',8,1392869701,1),('528d7c4071878','漂亮的马克杯','x0028193','528b6088a0142',32,1393034106,1);
/*!40000 ALTER TABLE `t_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product_detail`
--

DROP TABLE IF EXISTS `t_product_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_product_detail` (
  `pd_id` char(13) NOT NULL,
  `pd_dtype` tinyint(4) NOT NULL,
  `pd_detail` text NOT NULL,
  PRIMARY KEY (`pd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_detail`
--

LOCK TABLES `t_product_detail` WRITE;
/*!40000 ALTER TABLE `t_product_detail` DISABLE KEYS */;
INSERT INTO `t_product_detail` VALUES ('528c4bb81a6c4',0,'<p>这是商品描述4<br>\n</p>\n'),('528d7c4071878',0,'<p>这是烤瓷的哦</p>\n'),('528dc651773bf',0,'<p>哈哈，这个要得<br>\n\n</p>\n');
/*!40000 ALTER TABLE `t_product_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product_image`
--

DROP TABLE IF EXISTS `t_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_product_image` (
  `pdi_name` varchar(20) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `pdi_sort` int(11) NOT NULL,
  PRIMARY KEY (`pdi_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_image`
--

LOCK TABLES `t_product_image` WRITE;
/*!40000 ALTER TABLE `t_product_image` DISABLE KEYS */;
INSERT INTO `t_product_image` VALUES ('53095c9719469.jpg','528d7c4071878',4),('53095c90b2d08.jpg','528d7c4071878',2),('53095cd0bf36f.jpg','528dc651773bf',2),('53095ca63e9e5.jpg','528d7c4071878',3),('53095cce0bc63.jpg','528dc651773bf',1),('53095cd78febb.jpg','528dc651773bf',3);
/*!40000 ALTER TABLE `t_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_shopping_cart`
--

DROP TABLE IF EXISTS `t_shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_shopping_cart` (
  `sp_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `od_id` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `st_id` char(13) NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `sp_time` int(11) NOT NULL,
  `sp_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_shopping_cart`
--

LOCK TABLES `t_shopping_cart` WRITE;
/*!40000 ALTER TABLE `t_shopping_cart` DISABLE KEYS */;
INSERT INTO `t_shopping_cart` VALUES ('53117abc90168','528d7c4071878','1403011414522853',80868378,'528dbfa8500a2',10,1393654460,2),('53117ac48bcf3','528dc651773bf','1403011414522853',80868378,'528dc70b6ad3e',10,1393654468,2),('53118548688b7','528d7c4071878','1403011459347736',80868378,'528dbfa8500a2',12,1393657160,2),('531185732c5f1','528dc651773bf','1403011500274393',80868378,'528dc70b6ad3e',12,1393657203,2),('531185795f024','528d7c4071878','1403011500274393',80868378,'528dbfa8500a2',12,1393657209,2),('5311cbf39d642','528d7c4071878','',80868378,'528dbfa8500a2',10,1393675251,0),('5311a8adc7bec','528dc651773bf','',80868378,'528dc70b6ad3e',18,1393666221,0),('5311cc0667a81','528dc651773bf','',80868378,'528dc675090f6',12,1393675270,0),('5311cc08cef02','528dc651773bf','',80868378,'528dc675090f6',12,1393675272,1);
/*!40000 ALTER TABLE `t_shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_storage`
--

DROP TABLE IF EXISTS `t_storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_storage` (
  `st_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `st_unit` varchar(10) NOT NULL,
  `st_colour` char(8) NOT NULL,
  `st_size` varchar(10) NOT NULL,
  `st_quantity` int(11) NOT NULL,
  `st_inprice` float(8,2) NOT NULL,
  `st_outprice` float(8,2) NOT NULL,
  `st_discount` float(4,2) NOT NULL,
  `st_utime` int(11) NOT NULL,
  `st_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_storage`
--

LOCK TABLES `t_storage` WRITE;
/*!40000 ALTER TABLE `t_storage` DISABLE KEYS */;
INSERT INTO `t_storage` VALUES ('528dbf72c62e6','528d7c4071878','kg','红','12*12',0,0.00,0.00,1.00,1385021298,0),('528dbf9947c3d','528d7c4071878','kg','红','12*12',0,0.00,0.00,1.00,1385021337,0),('528dbfa8500a2','528d7c4071878','kg','红','12*12',120,17.80,25.00,1.00,1385266093,1),('528dc675090f6','528dc651773bf','个','白','13寸',10,1280.00,1440.00,0.98,1385099186,1),('528dc70b6ad3e','528dc651773bf','个','白','11寸',20,1310.00,1440.00,0.75,1385104226,1);
/*!40000 ALTER TABLE `t_storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_storage_record`
--

DROP TABLE IF EXISTS `t_storage_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_storage_record` (
  `sr_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `st_id` char(13) NOT NULL,
  `sr_type` int(11) NOT NULL,
  `sr_detail` varchar(10) NOT NULL,
  `sr_quantity` int(11) NOT NULL,
  `sr_price` float(8,2) NOT NULL,
  `sr_time` int(11) NOT NULL,
  `am_account` varchar(10) NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_storage_record`
--

LOCK TABLES `t_storage_record` WRITE;
/*!40000 ALTER TABLE `t_storage_record` DISABLE KEYS */;
INSERT INTO `t_storage_record` VALUES ('528effb2c2546','528dc651773bf','528effb2c2538',1,'添加库存条目',0,0.00,1385103282,'hongbo'),('528f0017d40dd','528dc651773bf','528effb2c2538',2,'删除库存条目',0,0.00,1385103383,'hongbo'),('528f00e6d35f8','528dc651773bf','528dc70b6ad3e',3,'库存采购',25,1320.00,1385103590,'hongbo'),('528f00f896a77','528dc651773bf','528dc70b6ad3e',4,'常规出库',5,1310.00,1385103608,'hongbo'),('528f0245951b7','528dc651773bf','528dc70b6ad3e',7,'折扣变动',0,0.00,1385103941,'hongbo'),('528f0261ad7ce','528dc651773bf','528dc70b6ad3e',6,'售价变动',0,0.00,1385103969,'hongbo'),('528f0362cdd04','528dc651773bf','528dc70b6ad3e',7,'折扣变动',0,0.75,1385104226,'hongbo'),('52917ba13dd0d','528d7c4071878','528dbfa8500a2',3,'库存采购',120,17.80,1385266081,'hongbo'),('52917bad3e96e','528d7c4071878','528dbfa8500a2',6,'售价变动',0,25.00,1385266093,'hongbo');
/*!40000 ALTER TABLE `t_storage_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_target`
--

DROP TABLE IF EXISTS `t_target`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_target` (
  `tg_id` char(13) NOT NULL,
  `tg_fid` char(13) NOT NULL,
  `tg_name` varchar(32) NOT NULL,
  `tg_ctime` int(11) NOT NULL,
  `tg_count` int(11) NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_target`
--

LOCK TABLES `t_target` WRITE;
/*!40000 ALTER TABLE `t_target` DISABLE KEYS */;
INSERT INTO `t_target` VALUES ('53045365388ed','0','按材质分',1392792421,0),('5304537045363','0','按尺寸分',1392792432,0),('53045388da9ac','53045365388ed','小叶紫檀',1392792456,0),('5304539e48f28','53045365388ed','桃木',1392792478,6),('530453aa0f0d0','53045365388ed','玛瑙',1392792490,2),('530453adeb95d','53045365388ed','水晶',1392792493,0),('530453b58044b','53045365388ed','金丝楠',1392792501,0),('530453ca23688','5304537045363','20m',1392792522,2),('530453cd68827','5304537045363','18m',1392792525,1),('530453d280394','5304537045363','6m',1392792530,2);
/*!40000 ALTER TABLE `t_target` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_target_index`
--

DROP TABLE IF EXISTS `t_target_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_target_index` (
  `tgi_id` char(13) NOT NULL,
  `tg_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  PRIMARY KEY (`tgi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_target_index`
--

LOCK TABLES `t_target_index` WRITE;
/*!40000 ALTER TABLE `t_target_index` DISABLE KEYS */;
INSERT INTO `t_target_index` VALUES ('5308037ad4e29','530453aa0f0d0','528d7c4071878'),('53058145958bd','530453ca23688','528dc651773bf'),('53058145956b6','5304539e48f28','528dc651773bf'),('5308037ad5422','530453d280394','528d7c4071878');
/*!40000 ALTER TABLE `t_target_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(30) NOT NULL,
  `user_password` char(32) NOT NULL,
  `user_nick` varchar(30) NOT NULL,
  `user_avatar` varchar(20) NOT NULL,
  `user_gender` tinyint(4) NOT NULL,
  `user_score` int(11) NOT NULL,
  `user_allscore` int(11) NOT NULL,
  `user_ctime` int(11) NOT NULL,
  `user_utime` int(11) NOT NULL,
  `user_count` int(11) NOT NULL,
  `user_uip` varchar(15) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user`
--

LOCK TABLES `t_user` WRITE;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` VALUES (80868378,'hongerbo@qq.com','202cb962ac59075b964b07152d234b70','啵啵牛','default.jpg',1,0,0,1393140449,1393725822,9,'127.0.0.1',2);
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user_detail`
--

DROP TABLE IF EXISTS `t_user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user_detail` (
  `user_id` int(11) NOT NULL,
  `user_birthday` int(11) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_qq` varchar(30) NOT NULL,
  `user_post` varchar(30) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_introduce` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user_detail`
--

LOCK TABLES `t_user_detail` WRITE;
/*!40000 ALTER TABLE `t_user_detail` DISABLE KEYS */;
INSERT INTO `t_user_detail` VALUES (80868378,557506800,'13780080099','lovef22@126.com','76475892','200000','上海市浦东新区','');
/*!40000 ALTER TABLE `t_user_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-02 19:18:35
