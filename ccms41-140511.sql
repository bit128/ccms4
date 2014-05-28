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
INSERT INTO `t_channel` VALUES ('1','0','website','网站根目录','',1358303465,1,1),('530029c52bcf6','530029a70dd5f','公司新闻','','',1392519621,1,1),('52f6fa53a0520','536d95c6cf841','修行养生','','/index.php/home/solution',1391917651,3,1),('5339320ab4640','52f6fa53a0520','这是栏目一','','',1396257290,1,1),('5339320c4ed7b','52f6fa53a0520','这是栏目二','','',1396257292,2,1),('5339320cd2472','52f6fa53a0520','这是栏目三','','',1396257292,3,1),('530029a70dd5f','536d95c6cf841','新闻中心','','/index.php/home/content/0/news/530029c52bcf6',1392519591,4,1),('530029d5db453','530029a70dd5f','产品动态','','',1392519637,2,1),('530029e02da06','530029a70dd5f','公司介绍','','',1392519648,3,1),('530029faed1a5','536d95c6cf841','购买合作','','/index.php/home/content/0/support/53002a0996b76',1392519674,5,1),('53002a0996b76','530029faed1a5','常见问答','','',1392519689,1,1),('53002a182620e','530029faed1a5','支付相关','','',1392519704,2,1),('53002a273d223','530029faed1a5','加盟合作','','',1392519719,3,1),('532e44796a9ef','536d92e793d76','首页幻灯','','',1395541113,1,1),('532e4affc0ed9','536d95c6cf841','关于我们','','/index.php/home/about',1395542783,6,1),('534a60c33f1c8','533a6bf49ed03','佛具佛珠','','#这里是连接',1397383363,1,1),('533a6bf49ed03','1','主线产品目录','','',1396337652,7,1),('534a60d4b9781','533a6bf49ed03','茶叶','','#这里是链接',1397383380,2,1),('534a60dea5e0a','533a6bf49ed03','山珍特产','','#这里是链接',1397383390,3,1),('534a60ec15091','533a6bf49ed03','工艺品','','#这里是链接',1397383404,4,1),('534a60f7a1959','533a6bf49ed03','文玩字画','','#这里是链接',1397383415,5,1),('534a657df2a0e','1','便捷链接','','',1397384573,8,1),('534a6586b738c','534a657df2a0e','新闻中心','','#链接',1397384582,1,1),('534a65a5cba13','534a657df2a0e','购买合作','','#',1397384613,2,1),('534a65c4abc03','534a657df2a0e','联系我们','','#',1397384644,3,1),('534a65ebeba42','534a657df2a0e','关于我们','','#',1397384683,4,1),('536d92e793d76','1','网站设置','','',1399689959,9,1),('536d930de0cea','536d92e793d76','网站logo','','',1399689997,2,1),('536d95c6cf841','1','首页栏目','','',1399690694,6,1),('536d95d174f43','536d95c6cf841','首页','','/',1399690705,1,1),('536d95e3b7014','536d95c6cf841','产品中心','','/index.php/home/product/0/0/0',1399690723,2,1),('536d963048b26','536d95c6cf841','联系我们','','/index.php/home/contact',1399690800,7,1),('536e034add95a','536d92e793d76','网站名称','','',1399718730,3,1);
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
INSERT INTO `t_content` VALUES ('536d93a25c2d1','536d930de0cea','网站logo设置','','536d933ee507d.png','您可以修改，但请不要直接删除！ 最佳尺寸125px × 44px，透明背景png格式  ','',1399690477,1),('534a66e2cedd4','532e4affc0ed9','联系信息','','','','<p>\n邮件: <a rel=\"tooltip\" href=\"http://newsite.local/index.php/home/contact#\" data-original-title=\"欢迎您联系我 !\">Jiangjiefei@outlook.com</a> <br>\n\n电话: +86 0566 5111719<br>\n\n</p>\n\n            <p>公司地址 <br>\n\n <a rel=\"tooltip\" href=\"http://newsite.local/index.php/home/contact#\" data-original-title=\"地址\">安徽省池州市青阳县蓉城镇陵阳路</a><br>\n\n             <a rel=\"tooltip\" href=\"http://newsite.local/index.php/home/contact#\" data-original-title=\"工作时间\">周一至周五: 早上09:00 - 下午18:00</a><span id=\"pastemarkerend\"></span></p>\n',1397384930,1),('533a6c9e112b8','533a6bf49ed03','文玩字画','','','','<p>这里是文玩字画的内容</p>\n',1396337822,1),('533a6cb024845','533a6bf49ed03','工艺品','','','','<p>这里是工艺品的内容</p>\n',1396337840,1),('533a6cc7312e6','533a6bf49ed03','山珍特产','','','','<p>这里是山珍特产的内容</p>\n',1396337863,1),('533a6cdadb7a3','533a6bf49ed03','茶叶','','','','<p>这里是茶叶的内容</p>\n',1396337882,1),('533a6d1541591','533a6bf49ed03','佛珠佛具','','','','<p>这里是佛珠佛具的详细内容</p>\n',1396337941,1),('533932a2ba30c','5339320c4ed7b','这里是栏目二','','5339329e0c05f.jpg','','<p>This is a example of style component for calling extra attention to \nfeatured content or information. This is a example of style component \nfor calling extra attention to featured content or information. This is a\n example of style component for calling extra attention to featured \ncontent or information. This is a example of style component for calling\n extra attention to featured content or information.<span id=\"pastemarkerend\"> 222</span></p>\n',1396332923,2),('533932d168ca6','5339320cd2472','这是栏目三','','533932cc936af.jpg','','<p>This is a example of style component for calling extra attention to \nfeatured content or information. This is a example of style component \nfor calling extra attention to featured content or information. This is a\n example of style component for calling extra attention to featured \ncontent or information. This is a example of style component for calling\n extra attention to featured content or information.<span id=\"pastemarkerend\"> 333</span></p>\n',1396332933,2),('533a5a9f1d9a2','5339320c4ed7b','这里是栏目二的展示内容2','','','','<p>这里是展示内容</p>\n',1396333215,1),('533a5318625f4','5339320ab4640','这是栏目页的展示内容1','','','','<p>内容详情</p>\n',1396331288,1),('533a5330047be','5339320ab4640','这是栏目页的展示内容2','','','','<p>这是内容详情</p>\n',1396331312,1),('533a53487869c','5339320ab4640','这里是栏目页的展示内容3','','','','<p>这里是呢容</p>\n',1396331672,1),('533a5a8b0488b','5339320c4ed7b','这里是栏目二的展示内容1','','','','<p>这里是展示内容</p>\n',1396333195,1),('533932834c885','5339320ab4640','这里是栏目一','','5339327fc4397.jpg','','<p>This is a example of style component for calling extra attention to \nfeatured content or information. This is a example of style component \nfor calling extra attention to featured content or information. This is a\n example of style component for calling extra attention to featured \ncontent or information. This is a example of style component for calling\n extra attention to featured content or information.<span id=\"pastemarkerend\"> 11<br>\n</span></p>\n',1396331922,2),('530030db37e06','530029c52bcf6','公司新闻内容','','','','<p>哈哈</p>\n',1394278554,2),('531b00c536335','530029c52bcf6','第二条公司新闻','','','','<p>这里是内容</p>\n',1394279242,2),('531b00de2c855','530029d5db453','新产品发布了','','','','<p>嗯是要发布了</p>\n',1394278622,2),('531b00fc1f30b','530029d5db453','又是一个新产品要发布了','','','','<p>对了，就是这个样子</p>\n',1394278652,1),('531b02817b326','53002a0996b76','测试','','','','<p>测试的内容</p>\n',1394279041,1),('532e4535a515d','532e44796a9ef','banner-1','#这里是链接','532e452952b98.jpg','','',1395541860,1),('532e454bc7f69','532e44796a9ef','banner-2','#这里是链接','532e4547ba92c.jpg','','',1395541872,1),('532e4562ec768','532e44796a9ef','banner-3','#这里是链接','532e455e99a79.jpg','','',1395541883,1),('532e4b77b35c8','532e4affc0ed9','公司简介','','532e4b4e79f27.jpg','九华阁贸易有限公司地处中国四大佛教名山之一的九华山，当地景色秀丽，人杰地灵，长年受佛家文化熏陶，人文淳朴，一派忠厚景象。每年吸引数百万中外游客来此驻足观光，参禅礼佛，流连忘返。\n我们秉着以诚待客，广结善缘的心态，长期经营批发各色九华山开光佛珠，佛具，手链饰品，品种材质包含檀木、砗磲、玛瑙、水晶、菩提子等。并有九华山当地土特产供君选购，产品有九华佛茶，黄石溪毛峰茶，笋干，九华冰姜，石耳等食品和九华折扇等工艺品。','<p> 九华阁贸易有限公司地处中国四大佛教名山之一的九华山，当地景色秀丽，人杰地灵，长年受佛家文化熏陶，人文淳朴，一派忠厚景象。每年吸引数百万中外游客来此驻足观光，参禅礼佛，流连忘返。</p>\n\n<p>我们秉着以诚待客，广结善缘的心态，长期经营批发各色九华山开光佛珠，佛具，手链饰品，品种材质包含檀木、砗磲、玛瑙、水晶、菩提子等。并有九华山当地土特产供君选购，产品有九华佛茶，黄石溪毛峰茶，笋干，九华冰姜，石耳等食品和九华折扇等工艺品。<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1395542903,1),('532e4f538b530','532e4affc0ed9','员工风采','#这里是链接地址','532e4f442bbc4.png','','',1395543891,1),('532e4f74e76c2','532e4affc0ed9','工厂参观','#这里是链接地址','532e4f6a34b81.png','','',1395543924,1),('532e4f90468bc','532e4affc0ed9','公司风貌','#这里是链接地址','532e4f8cba2bc.png','','',1395543952,1),('532e569d0f2a9','532e4affc0ed9','联系我们','','','','\n<ul>\n\n	<li>电话: +86 056 6511 1719</li>\n\n	<li>电子邮箱: <a href=\"mailto:jiangjiefei@hotmail.com\">jiangjiefei@hotmail.com</a></li>\n\n	<li>传真: +86 056 6511 1719</li>\n\n	<li>业务地址： 安徽省池州市青阳县蓉城镇陵阳路134号</li>\n\n	<li>工厂地址： 安徽省九华山柯村新区<span id=\"pastemarkerend\">&nbsp;</span></li></ul>\n',1395545757,1),('536e037497e9c','536e034add95a','彩网贸易CCMS','','','','',1399718923,1);
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
INSERT INTO `t_order` VALUES ('1403011414522853',80868378,14650.00,2,'留言: 使用精美包装',1393654492,0,1),('1403011459347736',80868378,300.00,3,'留言: 随便什么包装',1393657174,0,0),('1403011500274393',80868378,17581.00,2,'留言: 没有什么可说的',1393657227,0,1),('1404122114518139',80868378,43450.00,1,'留言: ',1397308491,0,1);
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
INSERT INTO `t_product` VALUES ('528dc651773bf','新款macbook pro','mac1024','528b605272647',25,1392869701,1),('528d7c4071878','漂亮的马克杯','x0028193','528b6088a0142',61,1393034106,1);
/*!40000 ALTER TABLE `t_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product_annex`
--

DROP TABLE IF EXISTS `t_product_annex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_product_annex` (
  `pda_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `pda_name` varchar(64) NOT NULL,
  `pda_src` varchar(20) NOT NULL,
  `pda_type` varchar(20) NOT NULL,
  `pda_time` int(11) NOT NULL,
  `pda_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pda_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_annex`
--

LOCK TABLES `t_product_annex` WRITE;
/*!40000 ALTER TABLE `t_product_annex` DISABLE KEYS */;
INSERT INTO `t_product_annex` VALUES ('533274b5504b2','528d7c4071878','资料下载','533274b1dcc1e.pdf','applicatio',1395815605,1),('533274c179e58','528d7c4071878','产品手册','533274bf8b17b.pdf','applicatio',1395815617,1);
/*!40000 ALTER TABLE `t_product_annex` ENABLE KEYS */;
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
-- Table structure for table `t_product_question`
--

DROP TABLE IF EXISTS `t_product_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_product_question` (
  `pdq_id` char(13) NOT NULL,
  `pd_id` char(13) NOT NULL,
  `pdq_question` varchar(255) NOT NULL,
  `pdq_answer` text NOT NULL,
  `pdq_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pdq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_question`
--

LOCK TABLES `t_product_question` WRITE;
/*!40000 ALTER TABLE `t_product_question` DISABLE KEYS */;
INSERT INTO `t_product_question` VALUES ('532edb60b0c53','528d7c4071878','这是第二个嘛','我又不知道了蛮，xixi',0),('532e96b5eabab','528d7c4071878','第二个常见问题2','这里是问题答案2',1);
/*!40000 ALTER TABLE `t_product_question` ENABLE KEYS */;
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
INSERT INTO `t_shopping_cart` VALUES ('53117abc90168','528d7c4071878','1403011414522853',80868378,'528dbfa8500a2',10,1393654460,2),('53117ac48bcf3','528dc651773bf','1403011414522853',80868378,'528dc70b6ad3e',10,1393654468,2),('53118548688b7','528d7c4071878','1403011459347736',80868378,'528dbfa8500a2',12,1393657160,2),('531185732c5f1','528dc651773bf','1403011500274393',80868378,'528dc70b6ad3e',12,1393657203,2),('531185795f024','528d7c4071878','1403011500274393',80868378,'528dbfa8500a2',12,1393657209,2),('5311cbf39d642','528d7c4071878','1404122114518139',80868378,'528dbfa8500a2',10,1393675251,2),('5311a8adc7bec','528dc651773bf','1404122114518139',80868378,'528dc70b6ad3e',18,1393666221,2),('5311cc0667a81','528dc651773bf','1404122114518139',80868378,'528dc675090f6',12,1393675270,2),('5311cc08cef02','528dc651773bf','',80868378,'528dc675090f6',12,1393675272,1);
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
  `st_name` varchar(32) NOT NULL,
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
INSERT INTO `t_storage` VALUES ('536d8ae28c679','528d7c4071878','景德镇上等白瓷',0,0.00,0.00,1.00,1399687906,0),('536d8af04e8ed','528d7c4071878','官窑钧瓷',0,0.00,0.00,1.00,1399687920,0),('536d8b3cd1612','528dc651773bf','13寸mac64G版',10,1280.00,1680.00,1.00,1399689306,1),('536d8b49f2340','528dc651773bf','13寸mac128G版',8,1560.00,1960.00,1.00,1399689307,1),('536d8b566bbc9','528dc651773bf','11寸64G版',9,860.00,1260.00,1.00,1399689062,0);
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
INSERT INTO `t_storage_record` VALUES ('536d8ae28c69d','528d7c4071878','536d8ae28c679',1,'添加库存条目',0,0.00,1399687906,'hongbo'),('536d8af04e90a','528d7c4071878','536d8af04e8ed',1,'添加库存条目',0,0.00,1399687920,'hongbo'),('536d8b3cd162e','528dc651773bf','536d8b3cd1612',1,'添加库存条目',0,0.00,1399687996,'hongbo'),('536d8b49f2362','528dc651773bf','536d8b49f2340',1,'添加库存条目',0,0.00,1399688009,'hongbo'),('536d8b566bbec','528dc651773bf','536d8b566bbc9',1,'添加库存条目',0,0.00,1399688022,'hongbo'),('536d8e0239193','528dc651773bf','536d8b3cd1612',3,'库存采购',10,1280.00,1399688706,'hongbo'),('536d8e2c805c0','528dc651773bf','536d8b49f2340',3,'库存采购',6,1560.00,1399688748,'hongbo'),('536d8eb22c578','528dc651773bf','536d8b566bbc9',3,'库存采购',12,860.00,1399688882,'hongbo'),('536d8eedc8aac','528dc651773bf','536d8b3cd1612',6,'售价变动',0,1680.00,1399688941,'hongbo'),('536d8ef38e53e','528dc651773bf','536d8b49f2340',6,'售价变动',0,1960.00,1399688947,'hongbo'),('536d8ef958040','528dc651773bf','536d8b566bbc9',6,'售价变动',0,1260.00,1399688953,'hongbo'),('536d8f05205d3','528dc651773bf','536d8b3cd1612',4,'常规出库',2,1.00,1399688965,'hongbo'),('536d8f5eec558','528dc651773bf','536d8b49f2340',4,'常规出库',4,1560.00,1399689054,'hongbo'),('536d8f66b91dd','528dc651773bf','536d8b566bbc9',4,'常规出库',3,860.00,1399689062,'hongbo'),('536d8f75a837e','528dc651773bf','536d8b3cd1612',3,'库存采购',2,1280.00,1399689077,'hongbo'),('536d8f7eb8d9b','528dc651773bf','536d8b49f2340',3,'库存采购',6,1560.00,1399689086,'hongbo');
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
INSERT INTO `t_target` VALUES ('53045365388ed','0','按材质分',1392792421,0),('5304537045363','0','按尺寸分',1392792432,0),('53045388da9ac','53045365388ed','小叶紫檀',1392792456,0),('5304539e48f28','53045365388ed','桃木',1392792478,6),('530453aa0f0d0','53045365388ed','玛瑙',1392792490,2),('530453adeb95d','53045365388ed','水晶',1392792493,0),('530453b58044b','53045365388ed','金丝楠',1392792501,0),('530453ca23688','5304537045363','20m',1392792522,2),('530453cd68827','5304537045363','18m',1392792525,1),('530453d280394','5304537045363','6m',1392792530,2),('5313f8686f8f1','0','按用途分',1393817704,0),('5313f8727fb53','5313f8686f8f1','车饰',1393817714,0);
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
INSERT INTO `t_user` VALUES (80868378,'hongerbo@qq.com','202cb962ac59075b964b07152d234b70','啵啵牛','default.jpg',1,0,0,1393140449,1399723178,15,'127.0.0.1',1);
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

-- Dump completed on 2014-05-11 16:52:08
