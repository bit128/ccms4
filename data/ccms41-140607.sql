-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ccms41
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
INSERT INTO `t_admin` VALUES ('5261333babe59','admin','202cb962ac59075b964b07152d234b70',127,1);
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
INSERT INTO `t_channel` VALUES ('1','0','站点信息内容管理','网站根目录','',1358303465,1,1),('530029c52bcf6','530029a70dd5f','公司新闻','','',1392519621,1,1),('52f6fa53a0520','536d95c6cf841','产品应用','','/index.php/home/solution',1391917651,3,1),('5339320ab4640','52f6fa53a0520','职场服饰篇','','',1396257290,1,1),('5339320c4ed7b','52f6fa53a0520','旅游服饰篇','','',1396257292,2,1),('5339320cd2472','52f6fa53a0520','聚会服饰篇','','',1396257292,4,1),('530029a70dd5f','536d95c6cf841','新闻信息','','/index.php/home/content/0/news/530029c52bcf6',1392519591,4,1),('530029d5db453','530029a70dd5f','产品动态','','',1392519637,2,1),('530029e02da06','530029a70dd5f','公司介绍','','',1392519648,3,1),('530029faed1a5','536d95c6cf841','购买合作','','/index.php/home/content/0/support/53002a0996b76',1392519674,5,1),('53002a0996b76','530029faed1a5','常见问答','','',1392519689,1,1),('53002a182620e','530029faed1a5','支付相关','','',1392519704,2,1),('53002a273d223','530029faed1a5','加盟合作','','',1392519719,3,1),('532e44796a9ef','536d92e793d76','首页幻灯','','',1395541113,1,1),('532e4affc0ed9','536d95c6cf841','关于我们','','/index.php/home/about',1395542783,6,1),('534a60c33f1c8','533a6bf49ed03','女装','','/index.php/home/product/0/5289d472a8c75/0',1397383363,1,1),('533a6bf49ed03','1','主线产品目录','','',1396337652,7,1),('534a60d4b9781','533a6bf49ed03','运动户外','','/index.php/home/product/0/528b605272647/0',1397383380,4,1),('534a60dea5e0a','533a6bf49ed03','男装','','/index.php/home/product/0/5289d47688b06/0',1397383390,3,1),('534a60ec15091','533a6bf49ed03','童装','','/index.php/home/product/0/53814f5d862d9/0',1397383404,5,1),('534a60f7a1959','533a6bf49ed03','内衣配饰','','/index.php/home/product/0/53814f751411b/0',1397383415,6,1),('534a657df2a0e','1','便捷链接','','',1397384573,8,1),('534a6586b738c','534a657df2a0e','新闻信息','','/index.php/home/content/0/news/530029c52bcf6',1397384582,3,1),('534a65a5cba13','534a657df2a0e','购买合作','','/index.php/home/content/0/support/53002a0996b76',1397384613,4,1),('53833b9955b4c','534a657df2a0e','产品应用','','/index.php/home/solution',1401109401,2,1),('536d92e793d76','1','网站设置','','',1399689959,9,1),('536d930de0cea','536d92e793d76','网站logo','','',1399689997,2,1),('536d95c6cf841','1','导航栏目','','',1399690694,6,1),('536d95d174f43','536d95c6cf841','首页','','/',1399690705,1,1),('536d95e3b7014','536d95c6cf841','产品中心','','/index.php/home/product/0/0/0',1399690723,2,1),('536d963048b26','536d95c6cf841','联系我们','','/index.php/home/contact',1399690800,8,1),('536e034add95a','536d92e793d76','网站名称','','',1399718730,3,1),('537dad592ae39','536d92e793d76','页脚信息','','',1400745305,4,1),('53815dea6da5b','52f6fa53a0520','约会服饰篇','','',1400987114,3,1),('53833a091238f','534a657df2a0e','产品中心','','/index.php/home/product/0/0/0',1401109001,1,1),('53833a97f422f','534a657df2a0e','联系我们','','/index.php/home/contact',1401109143,7,1);
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
INSERT INTO `t_channel_sc` VALUES ('532e44796a9ef','首页幻灯',2);
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
INSERT INTO `t_content` VALUES ('536d93a25c2d1','536d930de0cea','网站logo设置','','536d933ee507d.png','您可以修改，但请不要直接删除！ 最佳尺寸125px × 44px，透明背景png格式  ','',1399690477,1),('534a66e2cedd4','532e4affc0ed9','联系信息','','','','<p>\n邮件: <a rel=\"tooltip\" href=\"mailto:info@ct880.com\" data-original-title=\"欢迎您联系我 !\">info@ct880.com</a> <br>\n\n电话: +86 123456789<br>\n\n</p>\n\n            <p>公司地址 <br>\n\n<a rel=\"tooltip\" href=\"http://newsite.local/index.php/home/contact#\" data-original-title=\"地址\">青阳县中天鑫城九子大道2-02号 <span id=\"pastemarkerend\">&nbsp;</span></a><br>\n\n             <a rel=\"tooltip\" href=\"http://newsite.local/index.php/home/contact#\" data-original-title=\"工作时间\">周一至周五: 早上09:00 - 下午18:00</a><span id=\"pastemarkerend\"></span></a>\n</p>',1400739535,1),('533a6c9e112b8','533a6bf49ed03','文玩字画','','','','<p>这里是文玩字画的内容</p>\n',1396337822,1),('533a6cb024845','533a6bf49ed03','工艺品','','','','<p>这里是工艺品的内容</p>\n',1396337840,1),('533a6cc7312e6','533a6bf49ed03','山珍特产','','','','<p>这里是山珍特产的内容</p>\n',1396337863,1),('533a6cdadb7a3','533a6bf49ed03','茶叶','','','','<p>这里是茶叶的内容</p>\n',1396337882,1),('533a6d1541591','533a6bf49ed03','佛珠佛具','','','','<p>这里是佛珠佛具的详细内容</p>\n',1396337941,1),('533932a2ba30c','5339320c4ed7b','旅游服饰篇','','5339329e0c05f.jpg','','<p>出游是最好的也是大众最爱的选择，出游难免会给自己精心打扮一番，留下自己最开心最美的瞬间。所以这个服装搭配最好以舒适搭配为宜，当然不能落下美感。<br>彩网服饰就在这里为您推荐如何搭配才能达到如此的效果吧。</p>',1401098941,2),('533932d168ca6','5339320cd2472','聚会服饰篇','','533932cc936af.jpg','','<p>新年聚会,公司年会,同学聚会什么样的搭配才能更加出众呢?想满足面子又不能放弃实用的我们,下面就随彩网小编一起来看看这一季即实用用能打造流行时尚感的最佳搭配吧! </p>',1401099063,2),('533a5a9f1d9a2','5339320c4ed7b','这里是栏目二的展示内容2','','','','<p>这里是展示内容</p>\n',1396333215,1),('533a5318625f4','5339320ab4640','彰显气质的职业装扮','','','','<h1>彰显气质的职业装扮</h1>\n\n\n<p style=\"float:left\">2013-01-22 10:25:27  来源:本站原创  已有<span style=\"color: #B22222;\">1313</span>人关注  <a href=\"http://www.sdchn.com/info/3594.html#pinglun\">0条评论</a></p>\n\n<p style=\"float:left; margin-left:10px;\">\n    </p>\n<div id=\"bdshare\"><img unselectable=\"on\" src=\"http://bdimg.share.baidu.com/static/images/type-button-1.jpg\">\n\n\n</div>\n\n<p>女性的气质是由内而外散发出来的，内在气质固然重要，但是这个由内而外的“外”同样也不可忽视，彰显气质的职业装扮会令你在职场上大大加分。 </p>\n\n                                           \n<p align=\"center\"><img unselectable=\"on\" alt=\"职业装扮\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012210271814.jpg\" height=\"532\" border=\"0\" width=\"401\"></p>\n\n<p>这款包包皮红色没有了大红色的肆意，菱格纹也没有了鳄鱼纹的张扬，两者结合，再加上柔和的米色，褪去了高贵的质感，散发着小家碧玉的柔和气质。</p>\n\n<p align=\"center\"><img unselectable=\"on\" alt=\"职业装扮\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012210282890.jpg\" height=\"527\" border=\"0\" width=\"416\"></p>\n\n<p>那些明白自己想要什么并且为之努力的女子，值得赞赏。小心翼翼的执着，小心翼翼的追寻。对与错于她而言，就如同身上黑白分明的棉衣，不容掺杂。</p>\n\n<p align=\"center\"><img unselectable=\"on\" alt=\"职业装扮\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012210290385.jpg\" height=\"539\" border=\"0\" width=\"296\"></p>\n\n<p>宝蓝色的气质在于沉稳，是个难以驾驭的色彩，但亮片的加入，融入了光彩熠熠的灵动，也让宝蓝色懂得了变通。曼妙的身材被细致的凸显，肩部的荷叶边在优雅中融入了一丝甜美。</p>\n\n<p align=\"center\"><img unselectable=\"on\" alt=\"职业装扮\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012210294673.jpg\" height=\"531\" border=\"0\" width=\"337\"></p>\n\n<p>用优雅的杏色褪去针织的平凡。双排扣的金属光泽在弧形门襟的衬托下变得柔和，从容不迫的面对着人来人往。</p>\n\n<p align=\"center\"><img unselectable=\"on\" alt=\"职业装扮\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012210302439.jpg\" height=\"527\" border=\"0\" width=\"384\"></p>\n\n<p>简洁的圆领，利落的走线，没有太多的修饰和装点却透露出一股优雅从容。细碎的网纱拼接没有任何的突兀之感，垂坠柔顺的质地，让小香风更加婉约。<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1401102188,1),('533a5330047be','5339320ab4640','办公室春装 不一样的芬芳','','','','<p>办公室里需要一株新鲜的植物，不妨就把自己打扮成那株植物吧，人在职场，心要向着有太阳光的地方生长，前襟胸口上的绣花是新长出来的绿芽，象征你像植物一般鲜活的生命力，裙角飞扬，则是你依然自在从容的步伐。</p>\n\n<p align=\"center\"><img style=\"cursor: default;\" unselectable=\"on\" alt=\"办公室春装\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201303/2013032013172046.jpg\" height=\"546\" border=\"0\" width=\"281\"></p>\n\n<p>学生时代的背带连衣裙，经过大气的剪裁之后，变得利落而俏丽，而且把小肚肚完全遮起来了，即使是上班的白领，不妨也偶尔减龄做活泼亮丽的乖乖女，能让你的人缘直线上升哦。<span id=\"pastemarkerend\">&nbsp;</span></p>',1401102129,1),('533a53487869c','5339320ab4640','优雅大方的职业裙装','','','','<p>我们为您推荐的优雅大方的职业裙装</p>\n\n<p align=\"center\"><img width=\"394\" border=\"0\" height=\"541\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600071510.jpg\" alt=\"职业裙装图片\"></p>\n<p>有些公司避免不了，一件得体端庄而又生动活泼的连衣裙必不可少。修身剪裁加上时尚元素，即打破了职业装的枯燥，又让那股干练干脆散发出来，一举多得不是很好么？</p>\n<p align=\"center\"><img width=\"404\" border=\"0\" height=\"545\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600073897.jpg\" alt=\"职业裙装图片\"></p>\n<p>有时候，优秀需要由表及里，万绿丛中一点红虽然突兀，却真的能显示自己的优势。想要让人印象深刻，第一眼就要突出自己。不规则的色彩拼接，看似随心所欲，却有着耐人寻味的态度。</p>\n<p align=\"center\"><img width=\"407\" border=\"0\" height=\"542\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600080777.jpg\" alt=\"职业裙装图片\"></p>\n<p>想要让别人认可你就首先要挑战自己，更高更难的目标只有实现了才能让你看得清自己的下一个目标。单调的职业套装，可以因为你的强大气场而不那么枯燥，如同极简黑白，有绝佳气质。</p>\n<p align=\"center\"><img width=\"360\" border=\"0\" height=\"481\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600084021.jpg\" alt=\"优雅的职业裙装图片\"></p>\n<p>糖果色的夏天让人无法拒绝，但是工作上的干练敏捷也不能丢。所以有了果绿色和黑色的拼接，当飞扬的青春遇到沉稳的岁月，碰撞出来的不仅仅是色彩的火花，更有无限的活力。</p>\n<p align=\"center\"><img width=\"402\" border=\"0\" height=\"537\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600090586.jpg\" alt=\"优雅大方的职业裙装图片\"></p>\n<p>知性裸色和甜美粉色的中和，晕染出温柔轻巧的色彩，被雪纺轻盈的衬托起来，是笼罩在月光上的一层薄纱，隐隐约约朦朦胧胧。褶皱让不规则更自然，而蝴蝶结让褶皱更多情。</p>\n<p align=\"center\"><img width=\"368\" border=\"0\" height=\"537\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201307/2013071600093471.jpg\" alt=\"优雅大方的职业裙装\"></p>\n<p>优雅的气质当然少不了内心的丰盈美好，但是穿衣打扮也不能懈怠。泡泡袖加蕾丝小翻领，还有不规则的褶皱层叠包臀裙，依然是简洁的白加黑，依然是修身立体的套装，高贵却有了更多俏皮的味道。</p>',1401101462,1),('533a5a8b0488b','5339320c4ed7b','这里是栏目二的展示内容1','','','','<p>这里是展示内容</p>\n',1396333195,1),('533932834c885','5339320ab4640','职场服饰篇','','5339327fc4397.jpg','','<p>职业装就是要大方得体，优雅的职业装更显示出人们在职场之中的典雅与干练，让人不由自主的心生敬佩。<br>\n\n彩网服饰就在这里为您推荐如何搭配才能达到如此的效果吧。</p>\n',1401099911,2),('530030db37e06','530029c52bcf6','热点公司新闻内容标题','','','','<p> 请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，</p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n	<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis  lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium. </p>\n	<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus. </blockquote>\n	<p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>\n    \n    <p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n    \n    <p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>',1401103483,2),('531b00c536335','530029c52bcf6','第二条公司新闻','','','','<p>这里是内容</p>\n',1401103432,1),('531b00de2c855','530029d5db453','新产品发布了','','','','<p>嗯是要发布了</p>\n',1394278622,2),('531b00fc1f30b','530029d5db453','又是一个新产品要发布了','','53757ba5efacb.jpg','','<p>对了，就是这个样子</p>\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://demo.ct880.com/uploads/content/53757b7f85080.jpg\"></p>\n<p><img src=\"http://demo.ct880.com/uploads/content/53757b9b4e1a4.jpg\"></p>\n',1400208314,1),('531b02817b326','53002a0996b76','这里是常见问题的列表支付预览问题','','','','<p> 请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，</p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n	<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis  lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium. </p>\n	<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus. </blockquote>\n	<p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>\n    \n    <p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n    \n    <p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>',1401096257,1),('532e454bc7f69','532e44796a9ef','banner-2','/index.php/home/contact','532e4547ba92c.jpg','','',1401263220,1),('532e4562ec768','532e44796a9ef','banner-3','/index.php/home/item/5382ed5ea9d0b','532e455e99a79.jpg','','',1401263181,1),('532e4b77b35c8','532e4affc0ed9','公司简介','','532e4b4e79f27.jpg','彩网商贸网站系统 Colour Trading System - 着眼于用户角度，我们用心设计页面的每一处布局。跨平台设备和主流浏览器的全兼容测试，则力保网站在每一处都能获得完美的展现。整合的B2B及B2C电商平台的优质应用，带给用户一流且熟悉的操作体验。自主开发，方便易用的后台管理系统，允许企业快捷的发布管理产品内容，信息咨询等。 一切只为用户的满意！ ','<p>彩网网络科技工作室坐落于中国四大佛教名山之一的九华山下，当地景色秀丽，人文淳朴，经济蓬勃发展。在这里我们专注于为企业提供一流的网络应用解决方案。我们的服务范围包括网站设计开发，网络应用程序开发，网站维护管理及重构和移动应用终端APP开发。 内部团队拥有高水平设计人才和实力坚强的网络软件工程师作为保证，核心团队拥有超过5年以上的从业经验。 数年来我们以专一的态度鼎力为国内外各大小企业提供全方位一体化流程的网络服务，广受客户好评。</p>\n\n<p>现在，我们推出的\"CTS彩网商贸系统\"在为个人创业，SHOH族, 中小型生产企业提供着一流的网络应用解决方案，这不仅解决了这一群体对高质量网络应用迫在眉睫的需求，完善的功能，人性化的设计，也同时解决了对获得这样一套系统所需要的数万元的资金问题，因为正在以极低的价格在出售。</p>\n\n<p>彩网商贸网站系统 Colour Trading System- \n着眼于用户角度，我们用心设计页面的每一处布局。跨平台设备和主流浏览器的全兼容测试，则力保网站在每一处都能获得完美的展现。整合的B2B及B2C电商\n平台的优质应用，带给用户一流且熟悉的操作体验。自主开发，方便易用的后台管理系统，允许企业快捷的发布管理产品内容，信息咨询等。 \n一切只为用户的满意！</p>\n<span id=\"pastemarkerend\">&nbsp;</span>',1400982581,1),('532e4f538b530','532e4affc0ed9','员工风采','/index.php/home/content_detail/news/5383238fb2952','532e4f442bbc4.png','','',1401103360,1),('532e4f74e76c2','532e4affc0ed9','工厂参观','/index.php/home/content_detail/news/538323692f1fe','532e4f6a34b81.png','','',1401103325,1),('532e4f90468bc','532e4affc0ed9','公司风貌','/index.php/home/content_detail/news/5383233f599ea','532e4f8cba2bc.png','','',1401103291,1),('532e569d0f2a9','532e4affc0ed9','联系我们','','','','<ul>\n\n	\n\n	<li>电子邮箱: <a href=\"mailto:info@ct880.com\">info@ct880.com</a> </li>\n\n        <li>电话: +86 123456789</li>\n\n	<li>传真: +86 123456789</li>\n\n	<li>业务地址： 安徽省池州市<span id=\"pastemarkerend\">青阳县中天鑫城<br>\n\n</span></li>\n\n	<li>工厂地址： 安徽省九华山柯村新区</li>\n\n	<li><br>\n\n<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&amp;uin=89498726&amp;site=qq&amp;menu=yes\"><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://wpa.qq.com/pa?p=2:89498726:51\" alt=\"欢迎您联系我们\" title=\"欢迎您联系我们\" border=\"0\"></a></li><a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&amp;uin=89498726&amp;site=qq&amp;menu=yes\">\n</a></ul>',1401095527,1),('536e037497e9c','536e034add95a','CTS彩网商贸系统','','','','',1399875965,1),('537dad7fac67f','537dad592ae39','页脚内容','','','','© Copyright © 2014. <a href=\"http://www.ct880.com/\">彩网网络科技工作室</a>  版权所有.&nbsp;',1400746986,1),('53815e08500b1','53815dea6da5b','约会服饰篇','','538319538f61a.jpg','','<p>美好的约会时刻，精心打扮自己是必须的。好看的衣着搭配能够让对方感到惊艳，使约会过程更加浪漫。浪漫季节，就应该来个浪漫的约会。浪漫的约会，需要浪漫的约会搭配。和心爱的他去约会，怎样的约会服装搭配能兼具淑女气质与性感韵味，打造出完美的约会装？备战约会，让自己的魅力指数节节高升！</p>',1401100630,2),('5383088c2e8e8','53002a182620e','支付页相关的问题','','','','<p> 请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，</p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n	<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis  lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium. </p>\n	<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus. </blockquote>\n	<p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>\n    \n    <p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n    \n    <p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>',1401096332,1),('538308bbd3942','53002a273d223','加盟合作页相关的问题','','','','<p> 请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，</p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n	<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis  lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium. </p>\n	<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus. </blockquote>\n	<p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>\n    \n    <p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n    \n    <p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>',1401096379,1),('53831f9696e2a','5339320ab4640','精选职场搭配 做精致白领美女','','','','<p align=\"center\"><img src=\"http://www.sdchn.com/info/UploadFiles_6854/201209/2012092509215691.jpg\" height=\"538\" border=\"0\" width=\"391\"></p>\n\n<p>把裙摆做在腰与臀部相连的位置，下层再来一条修身包臀短裙修饰，各种不理想的臀型都能瞬间变得挺翘。纤细的小蛮腰也一并在散开裙摆的修饰下婀娜呈现。</p>\n\n<p align=\"center\"><img src=\"http://www.sdchn.com/info/UploadFiles_6854/201209/2012092509224377.jpg\" height=\"540\" border=\"0\" width=\"367\"></p>\n\n<p>做好打底工作，不羁的皮衣外套同样可以出席工作场合。最容易上手的方式便是衬衣+牛仔裤。让衬衣的规范感迎合办公情景所需，牛仔裤的过渡以让皮衣的出现自然流畅不突兀。</p>\n\n<p align=\"center\"><img src=\"http://www.sdchn.com/info/UploadFiles_6854/201209/2012092509233194.jpg\" height=\"553\" border=\"0\" width=\"369\"></p>\n\n<p>小脚裤的款式保留了双腿的纤细度，低腰的款式加之将上衣束入裤腰的穿搭方式很容易变成五五身，此时不妨借助裸色高跟鞋来拉长腿部线条，塑造完美好比例。<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1401102230,1),('53831fd7b0392','5339320ab4640','上班一族 知性职业装','','','','<p align=\"center\"><img alt=\"知性职业装\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012209273108.jpg\" height=\"531\" border=\"0\" width=\"375\"></p>\n\n<p>厚重的羽绒服与棉服马上就该放回衣柜开始它们长达10个多月的休假。轻薄一点的外套配上柔软的针织衫，开始在春风里寻觅那个轻盈到想要随风起舞的自己。</p>\n\n<p align=\"center\"><img alt=\"知性职业装\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012209282609.jpg\" height=\"527\" border=\"0\" width=\"419\"></p>\n\n<p>泛着金属色泽的驼色，在优雅与知性之余，还有一股清晰可见的华贵气质，肌肤也被镀上了金属般细腻的光泽。褶皱松紧腰带塑造出玲珑腰线，在秋冬季节也不忘将凹凸曲线呈现。</p>\n\n<p align=\"center\"><img alt=\"知性职业装\" src=\"http://www.sdchn.com/info/UploadFiles_6854/201301/2013012209290018.jpg\" height=\"529\" border=\"0\" width=\"403\"></p>\n\n<p>呈V字型的横向压线有向上提拉身型的效果，避免羽绒服的垂坠臃肿，也能够巧妙地避开横条纹的横向膨胀感。利用黑色点睛，鲜明轮廓与丰富层次便立刻拥有。连帽内里透出的小豹纹，竟然是清新味道。<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1401102295,1),('5383233f599ea','530029e02da06','公司风貌','','','','<p>介绍公司人文，文化，发展</p>\n\n<p>彩网网络科技工作室坐落于中国四大佛教名山之一的九华山下，当地景色秀丽，人文淳朴，经济蓬勃发展。在这里我们专注于为企业提供一流的网络应用解决方案。\n我们的服务范围包括网站设计开发，网络应用程序开发，网站维护管理及重构和移动应用终端APP开发。 \n内部团队拥有高水平设计人才和实力坚强的网络软件工程师作为保证，核心团队拥有超过5年以上的从业经验。 \n数年来我们以专一的态度鼎力为国内外各大小企业提供全方位一体化流程的网络服务，广受客户好评。<span id=\"pastemarkerend\">&nbsp;</span></p>\n',1401103167,1),('538323692f1fe','530029e02da06','工厂参观','','','','<p>展现公司生产，工厂风貌<br>\n</p>\n',1401103209,1),('5383238fb2952','530029e02da06','员工风采','','','','<p>展现员工活动，积极向上。</p>\n',1401103247,1),('538324a372119','530029c52bcf6','热点公司新闻内容标题','','','','<p> 请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，请注意这里的文本都是供您测试预览的看版型的，</p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n	<p>Proin id condimentum sem. Morbi vitae dui in magna vestibulum suscipit vitae vel nunc. Integer ut risus nulla. malesuada tortor, nec scelerisque lorem mattis  lore Aliquam at erat in purus aliquet mollis. Fusce elementum velit vel dolor iaculis egestas nullam vitae neque luctus. Omassa risus eget arcu. Sed ac porta felis. Vivamus dignissim varius augue ut tempor. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo. Proin urna diam ras venenatis, eros id congue pellent esque, risus leo.Donec quam felis, ultricies nec, pellentesque pretium quis, sem. Nulla consequat massa quis enim. Donec pe justo fringilla vel, aliquet nec vulputate eget, arcu enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felisa penelore mollis pretium. </p>\n	<blockquote>Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien rutrum laoreet justo ultrices. In pellentesque lorem condimentum dui conse. Vivamus semper, mi sed congue semper, odio felis tristique neque, ac venenatis mauris augue adipiscing lectus. </blockquote>\n	<p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>\n    \n    <p><img style=\"cursor: default;\" unselectable=\"on\" src=\"/uploads/content/532e455e99a79.jpg\" alt=\"\"></p>\n    \n    <p>Aliquam interdum vehicula nulla et aliquam. Integer ornare euismod risus, vitae tristique leo fringilla in. Maecenas id nunc risus, sit amet sollicitudin odio. Praesent condimentum auctor est, eu euismod magna lobortis sit amet. Duis venenatis ligula id turpis ultrices auctor. Pellentesque viverra neque nisl. Cras pellentesque elit ac libero varius sed mattis lectus consectetur. Nulla eget arcu sit amet mi dignissim ultrices vitae et magna. Etiam accumsan est a nulla placerat egestas. Donec urna enim, aliquet at sodales eu, ultrices sit amet nunc. Aenean convallis facilisis sem, id placerat diam vestibulum phasellus vitae scelerisque.</p>',1401103523,2);
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
INSERT INTO `t_guestbook` VALUES ('5262071e72b4c',0,'title','content','hongbo','123','xs@12.com','xxx',1382156062,0),('5312983a41082',0,'测试用户留言','这里是留言内容','洪波','13700000000','lovef22@126.com','76475892',1393727546,1),('526207619bbf9',0,'title3','content3','hongbo','123','xs@12.com','xxx',1382156129,1),('5262076a8df94',0,'title4','content4','hongbo','123','xs@12.com','xxx',1382156138,0),('5312a8fd0ff29',1,'新款macbook pro','haha','啵啵牛','123123','haha','76475892',1393731837,1),('5371c3cf6dc35',1,'新款macbook pro','555','5454','','54','',1399964623,1),('5371c46180ae7',1,'漂亮的马克杯','2121212','121212','','12121','',1399964769,0),('5387c20ca72f7',0,'0','0','0','0','0','0',1401405964,0);
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
INSERT INTO `t_menu` VALUES ('528b6063b135e','528b605b872f5','西服',1),('5289d472a8c75','0','女装',3),('528b605b872f5','5289d47688b06','上衣',1),('5289d47688b06','0','男装',5),('5382b61b10268','528b605b872f5','风衣',2),('528b605272647','0','运动户外',6),('528b6078215e1','528b6063b135e','休闲西服',2),('528b607ddab66','5289d47688b06','裤子',2),('528b6088a0142','528b607ddab66','休闲裤',1),('53732d7a52fa5','5289d472a8c75','T恤',1),('5382b4a8411e6','5289d472a8c75','针织衫',3),('5382b4af0ea54','5289d472a8c75','雪纺衫',4),('53732db0b0eed','5289d472a8c75','衬衫',2),('53814f5d862d9','0','童装',7),('53814f751411b','0','内衣袜子',8),('5382b4b619a77','5289d472a8c75','连衣裙',5),('5382b550aaf31','5289d472a8c75','半身裙',6),('5382b5611612f','5289d472a8c75','牛仔裤',7),('5382b56628421','5289d472a8c75','休闲裤',8),('5382b58245387','5289d472a8c75','各色外套',9),('5382b5a62ad55','53732d7a52fa5','长袖T恤',1),('5382b5a924e99','53732d7a52fa5','短袖T恤',2),('5382b5afafa32','53732db0b0eed','长袖衬衫',1),('5382b5b3692e8','53732db0b0eed','短袖衬衫',2),('5382b62e40262','528b605b872f5','衬衫',3),('5382b638b9702','528b605b872f5','T恤',4),('5382b64669714','528b6063b135e','商务正装',3),('5382b673f37b6','528b607ddab66','西裤',2),('5382b6770e4f5','528b607ddab66','短裤',3),('5382b70309b1e','528b605272647','冲锋衣',1),('5382b7116d53e','528b605272647','卫衣',2),('5382b71550434','528b605272647','运动裤',3),('5382b757d5f45','53814f5d862d9','男孩',1),('5382b75b876b2','53814f5d862d9','女孩',2),('5382b7624b10c','5382b757d5f45','上衣',1),('5382b765ed946','5382b757d5f45','裤子',2),('5382b7de4547b','5382b75b876b2','上装',1),('5382b7e5b237f','5382b75b876b2','下装',2),('5382b7ee3686e','5382b7e5b237f','裙子',1),('5382b7f3c1bcd','5382b7e5b237f','裤子',2),('5382b80ca42af','5382b7de4547b','衬衫',1),('5382b852afb64','53814f751411b','男内衣裤',1),('5382b8584c8c3','53814f751411b','女内衣裤',2),('5382b860d5d69','53814f751411b','袜品',3),('5382b887aed96','5382b8584c8c3','内裤',1),('5382b88b3c359','5382b8584c8c3','背心',2),('5382b88ed3917','5382b8584c8c3','打底衫',3),('5382b89544760','5382b8584c8c3','保暖内衣',4),('5382b8b8ee11c','5382b860d5d69','男棉袜',1),('5382b8c2f0b76','5382b860d5d69','女棉袜',2),('5382b8db13766','5382b860d5d69','丝袜',3);
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
INSERT INTO `t_order` VALUES ('1403011414522853',80868378,14650.00,2,'留言: 使用精美包装',1393654492,0,1),('1403011459347736',80868378,300.00,3,'留言: 随便什么包装',1393657174,0,1),('1403011500274393',80868378,17581.00,2,'留言: 没有什么可说的',1393657227,0,1),('1404122114518139',80868378,43450.00,1,'留言: ',1397308491,0,1),('1405211953349514',80504863,300.00,1,'留言: 555',1400673214,0,1),('1405211954275273',80504863,0.00,1,'留言: ',1400673267,0,1),('1405242006189590',80868378,19600.00,1,'留言: 测试',1400933178,0,0);
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
INSERT INTO `t_product` VALUES ('528dc651773bf','小清新简约风紫色收腰雪纺连衣裙','mac1024','5382b4b619a77',48,1401090428,1),('5382df48dc7e6','欧美风长袖连衣裙','x0028193','5382b4b619a77',10,1401091614,1),('5382e724400b2','柔软呼吸百搭时尚连裤袜','WAZI002','5382b8db13766',6,1401088014,1),('5382ed5ea9d0b','圆领时尚百搭直筒吊带背心打底雪纺衫','XFSSS123','5382b4af0ea54',17,1401094346,1),('5382f13158727','春夏新装韩版彩糖果色包臀裙 ','123346569','5382b550aaf31',2,1401094318,1),('5382f268b4d6a','新款女式短袖职业衬衣','1104273640','5382b5b3692e8',18,1401094359,1),('5382f4600c009','男式修身短袖衬衫','1256448','5382b62e40262',2,1401091168,1),('5382f631492d0','经典水洗斜纹卡其裤','DASF456','528b6088a0142',7,1401091770,1),('5382f8d313a59','修身提臀抓绒小微喇针织长裤','SDD1233','5382b71550434',4,1401092307,1),('5382fa60aafeb','新款男大童纯棉短袖','DSD2312','5382b7624b10c',3,1401092883,1),('5382ff78ea713','儿童韩版夏装舒适透气套装','DS65','5382b7f3c1bcd',8,1401094056,1);
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
INSERT INTO `t_product_detail` VALUES ('528c4bb81a6c4',0,'<p>这是商品描述4<br>\n</p>\n'),('528d7c4071878',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_02.jpg\"></p>\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_03.jpg\"></p>\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_06.jpg\"></p>\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_08.jpg\"></p>'),('528dc651773bf',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/3/27/__aW1nMDI=__20140327164403_2543-1309445132.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/3/27/__aW1nMDI=__20140327164405_70351245965582.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/3/27/__aW1nMDI=__20140327164409_7595-220526906.jpg\"></p>'),('5382df48dc7e6',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_02.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_03.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_06.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20130930/0596088_08.jpg\"></p>'),('5382e724400b2',0,'<h3>产品描述</h3>\n\n<p>本系列呼吸丝袜采用奇圈编织技术，将丝线编织成如针眼般大小环环相扣的小圈，即使不小心挂坏了丝袜，也不会脱丝；编织细密,穿着时完全看不出有针眼,微细网眼的设计赋予了袜子生命力，尽情呼吸着新鲜空气，为您的时尚美丽大大加分；臀部、腹部、大腿部、小腿部分段压力修身设计，穿后立显修长腿型。腿部贴肤舒适，让您的腿部肌肤光泽丽人。弹性极佳，防勾丝，足尖科学设计，耐穿耐磨。穿着清爽舒适，性感大方，帮您穿出个性。<br>\n\n产品成分：86.7%锦纶，13.3%氨纶<br>\n\n产品尺码：均码，适合体重40kg-70kg 身高：150—170cm 臀围：85—110cm的人士穿着 <br>\n\n</p>\n\n<p><span style=\"color: #a10000;\"><b>温馨提示：袜子不提供试穿服务，非质量问题，不予进行退换货。<span id=\"pastemarkerend\">&nbsp;</span></b></span></p>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/others/2012/2/27/22.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i1.vanclimg.com/others/2012/3/5/-3_02.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i2.vanclimg.com/others/2012/2/27/22222222.jpg\"></p>'),('5382ed5ea9d0b',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img30.360buyimg.com/popWaterMark/g15/M04/18/0E/rBEhWlNVKqwIAAAAAAEHD6IWoY0AAMO0QPCKmYAAQcn260.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img30.360buyimg.com/popWaterMark/g15/M04/18/0E/rBEhWlNVKq0IAAAAAADaBqXIve0AAMO0QP4QJkAANoe889.jpg\"></p>'),('5382f13158727',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img30.360buyimg.com/popWaterMark/g13/M09/13/09/rBEhUlJtLkUIAAAAAAHBlxckRF0AAEqNgGt_vYAAcGv139.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img30.360buyimg.com/popWaterMark/g13/M09/13/09/rBEhUlJtLkcIAAAAAAK2L2wbI5UAAEqNgG5KjoAArZH268.jpg\"></p>\n'),('5382f268b4d6a',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img10.360buyimg.com/imgzone/g14/M07/1C/1D/rBEhV1NM2hgIAAAAAAR0Dqog6iUAAL-nQI4H-UABHQm650.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://img10.360buyimg.com/imgzone/g14/M08/1C/1D/rBEhVlNM2iMIAAAAAAPOltI1Wn8AAL-ngNee1kAA86u593.jpg\"></p>'),('5382f4600c009',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/5/12/__aW1nMDI=__20140512193237_9573.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/5/12/__aW1nMDI=__20140512193312_2001.jpg\"></p>'),('5382f631492d0',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i4.vanclimg.com/cms/20140522/kakqk.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i5.vanclimg.com/cms/20140522/kaqikucp_04.jpg\"></p>\n\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i2.vanclimg.com/cms/20140515/kqk7402_06.jpg\"></p>'),('5382f8d313a59',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i5.vanclimg.com/cms/20131223/0865928_02.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i2.vanclimg.com/cms/20131223/0865928_04.jpg\"></p>\n\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://i3.vanclimg.com/cms/20131223/0865928_05.jpg\"></p>'),('5382fa60aafeb',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2013/5/13/__aW1nMDI=__20130513151140_4359.jpg\"></p>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2013/5/13/__aW1nMDI=__20130513151141_3719.jpg\"></p>\n\n'),('5382ff78ea713',0,'<h3>产品描述</h3>\n\n<p>\"收身的连衣裙版型混合以各种不同工艺的绞花，简洁却不简单。不用费心思搭配，只需穿个打底裤就好。而且上身效果非常好看又不显肉肉。是一款可以一直穿到冬季的连衣裙。</p>\n\n<h3>尺码表</h3>\n\n\n<table class=\"standard-table\">\n\n<tbody>\n\n	<tr>\n\n<th>尺码\n</th>\n\n\n<th>型号\n</th>\n\n\n<th>肩宽\n</th>\n\n\n<th>胸围\n</th>\n\n\n<th>腰围\n</th>\n\n\n<th>臀围\n</th>\n\n\n<th>下摆\n</th>\n\n\n<th>衣长\n</th>\n\n\n<th>袖长\n</th>\n\n\n<th>1/2袖根肥</th>\n\n	</tr>\n\n\n	<tr>\n\n		<td>S</td>\n\n\n		<td>160/80A</td>\n\n\n		<td>32</td>\n\n\n		<td>76</td>\n\n\n		<td>70</td>\n\n\n		<td>78</td>\n\n\n		<td>68</td>\n\n\n		<td>81</td>\n\n\n		<td>59</td>\n\n\n		<td>12.9</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>M</td>\n\n\n		<td>\n<p>165/84A</p>\n\n</td>\n\n\n		<td>33</td>\n\n\n		<td>80</td>\n\n\n		<td>74</td>\n\n\n		<td>82</td>\n\n\n		<td>72</td>\n\n\n		<td>83</td>\n\n\n		<td>60</td>\n\n\n		<td>13.5</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>L</td>\n\n\n		<td>170/88A</td>\n\n\n		<td>34</td>\n\n\n		<td>84</td>\n\n\n		<td>78</td>\n\n\n		<td>86</td>\n\n\n		<td>76</td>\n\n\n		<td>85</td>\n\n\n		<td>61</td>\n\n\n		<td>14.1</td>\n\n	</tr>\n\n\n	<tr>\n\n		<td>XL</td>\n\n\n		<td>175/92A</td>\n\n\n		<td>35</td>\n\n\n		<td>88</td>\n\n\n		<td>82</td>\n\n\n		<td>90</td>\n\n\n		<td>80</td>\n\n\n		<td>86</td>\n\n\n		<td>62</td>\n\n\n		<td>14.7</td>\n\n	</tr>\n\n</tbody>\n\n</table>\n\n            <h3>详情图片</h3>\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/3/22/__aW1nMDI=__20140322132252_1168.jpg\"></p>\n\n\n\n<p><img style=\"cursor: default;\" unselectable=\"on\" src=\"http://images.vjia.com/Others/2014/3/22/__aW1nMDI=__20140322132306_7340.jpg\"></p>');
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
INSERT INTO `t_product_image` VALUES ('5382df5b7b6e6.jpg','5382df48dc7e6',3),('5382df5836034.jpg','5382df48dc7e6',1),('5382dc7cba8de.jpg','528dc651773bf',1),('5382df553ca52.jpg','5382df48dc7e6',4),('5382dc8258fc1.jpg','528dc651773bf',2),('5382df50b110f.jpg','5382df48dc7e6',2),('5382e72ce676b.jpg','5382e724400b2',1),('5382e72f6f8d7.jpg','5382e724400b2',2),('5382e731720c8.jpg','5382e724400b2',3),('5382ed647b42d.jpg','5382ed5ea9d0b',1),('5382ed670fc5f.jpg','5382ed5ea9d0b',2),('5382f1378dda1.jpg','5382f13158727',1),('5382f26ddda8c.jpg','5382f268b4d6a',1),('5382f46775564.jpg','5382f4600c009',1),('5382f469ab74a.jpg','5382f4600c009',2),('5382f6940cc9b.jpg','5382f631492d0',1),('5382f69789dbd.jpg','5382f631492d0',2),('5382f8d9c9978.jpg','5382f8d313a59',1),('5382f8dc4c0b1.jpg','5382f8d313a59',2),('5382fb1880347.jpg','5382fa60aafeb',1),('5382ff80c1a5a.jpg','5382ff78ea713',1),('5382ff83750d1.jpg','5382ff78ea713',2);
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
INSERT INTO `t_shopping_cart` VALUES ('53117abc90168','528d7c4071878','1403011414522853',80868378,'528dbfa8500a2',10,1393654460,2),('53117ac48bcf3','528dc651773bf','1403011414522853',80868378,'528dc70b6ad3e',10,1393654468,2),('53118548688b7','528d7c4071878','1403011459347736',80868378,'528dbfa8500a2',12,1393657160,2),('531185732c5f1','528dc651773bf','1403011500274393',80868378,'528dc70b6ad3e',12,1393657203,2),('531185795f024','528d7c4071878','1403011500274393',80868378,'528dbfa8500a2',12,1393657209,2),('5311cbf39d642','528d7c4071878','1404122114518139',80868378,'528dbfa8500a2',10,1393675251,2),('5311a8adc7bec','528dc651773bf','1404122114518139',80868378,'528dc70b6ad3e',18,1393666221,2),('5311cc0667a81','528dc651773bf','1404122114518139',80868378,'528dc675090f6',12,1393675270,2),('5311cc08cef02','528dc651773bf','',80868378,'528dc675090f6',12,1393675272,1),('537c904b71ea2','528d7c4071878','',80504863,'536d8ae28c679',0,1400672331,1),('537c93b2de697','528d7c4071878','1405211953349514',80504863,'536d8ae28c679',10,1400673202,2),('537c93e9bf4ad','528d7c4071878','1405211954275273',80504863,'536d8ae28c679',50,1400673257,2),('53808b0cacf7e','528dc651773bf','1405242006189590',80868378,'536d8b49f2340',10,1400933132,2),('53808c0e8337c','528d7c4071878','',80868378,'536d8ae28c679',0,1400933390,1),('538151a439f5a','528d7c4071878','',80504863,'53815182024ba',20,1400983972,0),('538151b046181','528d7c4071878','',80504863,'5381513df0a84',30,1400983984,0),('5385da14f0c4a','5382df48dc7e6','',80504863,'5382e618a6a1c',80,1401281044,0),('5385da298c473','5382f268b4d6a','',80504863,'5382f4cd00fe1',20,1401281065,0);
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
INSERT INTO `t_storage` VALUES ('536d8ae28c679','528d7c4071878','景德镇上等白瓷',0,0.00,0.00,1.00,1400983874,0),('536d8af04e8ed','528d7c4071878','官窑钧瓷',0,0.00,0.00,1.00,1400983875,0),('536d8b3cd1612','528dc651773bf','13寸mac64G版',10,1280.00,1680.00,1.00,1401085298,0),('536d8b49f2340','528dc651773bf','13寸mac128G版',8,1560.00,1960.00,1.00,1401085299,0),('536d8b566bbc9','528dc651773bf','11寸64G版',9,860.00,1260.00,1.00,1399689062,0),('5381513df0a84','528d7c4071878','深花灰色 S',0,0.00,0.00,1.00,1400983875,1),('53815157a6b7c','528d7c4071878','深花灰色 M',0,0.00,0.00,1.00,1400983903,1),('5381515d357ef','528d7c4071878','深花灰色 L',0,0.00,0.00,1.00,1400983904,1),('538151736e24c','528d7c4071878','酒红色 S',0,0.00,0.00,1.00,1400983925,1),('5381517bdbb69','528d7c4071878','酒红色 M',0,0.00,0.00,1.00,1400983933,1),('53815182024ba','528d7c4071878','酒红色 L',0,0.00,0.00,1.00,1400983954,1),('5382dd84acd4f','528dc651773bf','紫色均码',0,0.00,0.00,1.00,1401085318,1),('5382e613a4283','5382df48dc7e6','麻灰色M',0,0.00,0.00,1.00,1401087533,1),('5382e618a6a1c','5382df48dc7e6','麻灰色L',0,0.00,0.00,1.00,1401087534,1),('5382e622767e1','5382df48dc7e6','酒红色M',0,0.00,0.00,1.00,1401087534,1),('5382e62a00506','5382df48dc7e6','酒红色L',0,0.00,0.00,1.00,1401087534,1),('5382ed8fb796e','5382ed5ea9d0b','黑白小方格',0,0.00,0.00,1.00,1401089449,1),('5382ed9d30a1b','5382ed5ea9d0b','荧光黄蓝圆点',0,0.00,0.00,1.00,1401089449,1),('5382f4afb2913','5382f4600c009','蓝色L',0,0.00,0.00,1.00,1401091254,1),('5382f4b639f41','5382f4600c009','蓝色S',0,0.00,0.00,1.00,1401091255,1),('5382f4cd00fe1','5382f268b4d6a','白色 各种尺码',0,0.00,0.00,1.00,1401091278,1),('5382f4ee5281e','5382f13158727','黑色均码',0,0.00,0.00,1.00,1401091310,0),('5382f51895377','5382e724400b2','多色均码详细请咨询',0,0.00,0.00,1.00,1401091366,1),('5382f70508dbe','5382f631492d0','卡其色  多尺码可选',0,0.00,0.00,1.00,1401091863,1),('5382f9055f2ba','5382f8d313a59','红色 全码',0,0.00,0.00,1.00,1401092366,1),('5382f90d8fdf6','5382f8d313a59','灰色 全码',0,0.00,0.00,1.00,1401092367,1),('5382fde98b56a','5382fa60aafeb','红色',0,0.00,0.00,1.00,1401093619,1),('5382fdedbed20','5382fa60aafeb','蓝色',0,0.00,0.00,1.00,1401093620,0),('53830027a95ce','5382ff78ea713','黄色',0,0.00,0.00,1.00,1401094185,1);
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
INSERT INTO `t_storage_record` VALUES ('536d8ae28c69d','528d7c4071878','536d8ae28c679',1,'添加库存条目',0,0.00,1399687906,'hongbo'),('536d8af04e90a','528d7c4071878','536d8af04e8ed',1,'添加库存条目',0,0.00,1399687920,'hongbo'),('536d8b3cd162e','528dc651773bf','536d8b3cd1612',1,'添加库存条目',0,0.00,1399687996,'hongbo'),('536d8b49f2362','528dc651773bf','536d8b49f2340',1,'添加库存条目',0,0.00,1399688009,'hongbo'),('536d8b566bbec','528dc651773bf','536d8b566bbc9',1,'添加库存条目',0,0.00,1399688022,'hongbo'),('536d8e0239193','528dc651773bf','536d8b3cd1612',3,'库存采购',10,1280.00,1399688706,'hongbo'),('536d8e2c805c0','528dc651773bf','536d8b49f2340',3,'库存采购',6,1560.00,1399688748,'hongbo'),('536d8eb22c578','528dc651773bf','536d8b566bbc9',3,'库存采购',12,860.00,1399688882,'hongbo'),('536d8eedc8aac','528dc651773bf','536d8b3cd1612',6,'售价变动',0,1680.00,1399688941,'hongbo'),('536d8ef38e53e','528dc651773bf','536d8b49f2340',6,'售价变动',0,1960.00,1399688947,'hongbo'),('536d8ef958040','528dc651773bf','536d8b566bbc9',6,'售价变动',0,1260.00,1399688953,'hongbo'),('536d8f05205d3','528dc651773bf','536d8b3cd1612',4,'常规出库',2,1.00,1399688965,'hongbo'),('536d8f5eec558','528dc651773bf','536d8b49f2340',4,'常规出库',4,1560.00,1399689054,'hongbo'),('536d8f66b91dd','528dc651773bf','536d8b566bbc9',4,'常规出库',3,860.00,1399689062,'hongbo'),('536d8f75a837e','528dc651773bf','536d8b3cd1612',3,'库存采购',2,1280.00,1399689077,'hongbo'),('536d8f7eb8d9b','528dc651773bf','536d8b49f2340',3,'库存采购',6,1560.00,1399689086,'hongbo'),('5381513df0b04','528d7c4071878','5381513df0a84',1,'添加库存条目',0,0.00,1400983869,'hongbo'),('53815157a6bfc','528d7c4071878','53815157a6b7c',1,'添加库存条目',0,0.00,1400983895,'hongbo'),('5381515d35877','528d7c4071878','5381515d357ef',1,'添加库存条目',0,0.00,1400983901,'hongbo'),('538151736e2c8','528d7c4071878','538151736e24c',1,'添加库存条目',0,0.00,1400983923,'hongbo'),('5381517bdbbe8','528d7c4071878','5381517bdbb69',1,'添加库存条目',0,0.00,1400983931,'hongbo'),('5381518202535','528d7c4071878','53815182024ba',1,'添加库存条目',0,0.00,1400983938,'hongbo'),('5382dd84acddb','528dc651773bf','5382dd84acd4f',1,'添加库存条目',0,0.00,1401085316,'hongbo'),('5382e613a4309','5382df48dc7e6','5382e613a4283',1,'添加库存条目',0,0.00,1401087507,'hongbo'),('5382e618a6a9d','5382df48dc7e6','5382e618a6a1c',1,'添加库存条目',0,0.00,1401087512,'hongbo'),('5382e62276861','5382df48dc7e6','5382e622767e1',1,'添加库存条目',0,0.00,1401087522,'hongbo'),('5382e62a00586','5382df48dc7e6','5382e62a00506',1,'添加库存条目',0,0.00,1401087529,'hongbo'),('5382ed8fb79ef','5382ed5ea9d0b','5382ed8fb796e',1,'添加库存条目',0,0.00,1401089423,'hongbo'),('5382ed9d30a97','5382ed5ea9d0b','5382ed9d30a1b',1,'添加库存条目',0,0.00,1401089437,'hongbo'),('5382f4afb298f','5382f4600c009','5382f4afb2913',1,'添加库存条目',0,0.00,1401091247,'hongbo'),('5382f4b639fbf','5382f4600c009','5382f4b639f41',1,'添加库存条目',0,0.00,1401091254,'hongbo'),('5382f4cd01079','5382f268b4d6a','5382f4cd00fe1',1,'添加库存条目',0,0.00,1401091276,'hongbo'),('5382f4ee5289e','5382f13158727','5382f4ee5281e',1,'添加库存条目',0,0.00,1401091310,'hongbo'),('5382f518954ab','5382e724400b2','5382f51895377',1,'添加库存条目',0,0.00,1401091352,'hongbo'),('5382f70508e43','5382f631492d0','5382f70508dbe',1,'添加库存条目',0,0.00,1401091845,'hongbo'),('5382f9055f338','5382f8d313a59','5382f9055f2ba',1,'添加库存条目',0,0.00,1401092357,'hongbo'),('5382f90d8fea2','5382f8d313a59','5382f90d8fdf6',1,'添加库存条目',0,0.00,1401092365,'hongbo'),('5382fde98b5ea','5382fa60aafeb','5382fde98b56a',1,'添加库存条目',0,0.00,1401093609,'hongbo'),('5382fdedbedb6','5382fa60aafeb','5382fdedbed20',1,'添加库存条目',0,0.00,1401093613,'hongbo'),('53830027a9654','5382ff78ea713','53830027a95ce',1,'添加库存条目',0,0.00,1401094183,'hongbo');
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
INSERT INTO `t_target` VALUES ('5382d68d0d1b8','0','面料',1401083533,0),('5382d690519aa','0','颜色',1401083536,0),('5382e82cc9445','5382d690519aa','多色可选',1401088044,1),('5382d7aaa1dca','5382d68d0d1b8','    纯棉',1401083818,15),('5382d9949ec48','5382d68d0d1b8','涤纶',1401084308,5),('5382d99f915b8','5382d68d0d1b8','混纺',1401084319,0),('5382d9b39da45','5382d68d0d1b8','亚麻',1401084339,0),('5382d9bce6cf1','5382d68d0d1b8','牛仔布',1401084348,0),('5382d9c1554d1','5382d68d0d1b8','绸缎',1401084353,0),('5382d9c5a215e','5382d68d0d1b8','真丝',1401084357,0),('5382d9cace760','5382d68d0d1b8','皮革',1401084362,0),('5382d9d1ee5f5','5382d68d0d1b8','羊绒/羊毛',1401084369,0),('5382d9db72b90','5382d68d0d1b8','晴纶',1401084379,0),('5382d9f7a7852','5382d68d0d1b8','毛呢',1401084407,6),('5382d9ffbe408','5382d68d0d1b8','其他',1401084415,1),('5382da17af139','5382d690519aa','白色',1401084439,5),('5382da35f162f','5382d690519aa','黑色',1401084469,2),('5382da3d70816','5382d690519aa','红色',1401084477,0),('5382da3e79b75','5382d690519aa','绿色',1401084478,0),('5382da426cd09','5382d690519aa','蓝色',1401084482,1),('5382da4696a41','5382d690519aa','黄色',1401084486,6),('5382da4b20154','5382d690519aa','紫色',1401084491,3),('5382da4f33cd8','5382d690519aa','花色',1401084495,0),('5382da54128ab','5382d690519aa','灰色',1401084500,4),('5382da5de07e5','5382d690519aa','粉红色',1401084509,0),('5382da64084a8','5382d690519aa','褐色',1401084516,0),('5382da69287c2','5382d690519aa','酒红色',1401084521,2),('5382da6e41b49','5382d690519aa','其他',1401084526,0);
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
INSERT INTO `t_target_index` VALUES ('53815439a03fd','530453d280394','528d7c4071878'),('538300d765428','5382da17af139','5382f268b4d6a'),('5382f17cd7d67','5382da4b20154','528dc651773bf'),('53815439a020f','530453aa0f0d0','528d7c4071878'),('5382f17cd7b27','5382d9949ec48','528dc651773bf'),('5382f61e73030','5382da54128ab','5382df48dc7e6'),('5382f61e72de2','5382d9f7a7852','5382df48dc7e6'),('5382e80ecc9cf','5382da17af139','5382e724400b2'),('5382e80ecc72d','5382d9949ec48','5382e724400b2'),('538300ca6900f','5382d7aaa1dca','5382ed5ea9d0b'),('538300ae10fd9','5382da35f162f','5382f13158727'),('538300ae10d7c','5382d9f7a7852','5382f13158727'),('538300d7651d4','5382d7aaa1dca','5382f268b4d6a'),('5382f4600c5c1','5382d7aaa1dca','5382f4600c009'),('5382f4600c80f','5382da426cd09','5382f4600c009'),('5382f6ba5a67a','5382da4696a41','5382f631492d0'),('5382f6ba5a43c','5382d7aaa1dca','5382f631492d0'),('5382f8d313fb6','5382d7aaa1dca','5382f8d313a59'),('5382f8d31420b','5382e82cc9445','5382f8d313a59'),('5382fb130dde4','5382da69287c2','5382fa60aafeb'),('5382fb130db5b','5382d7aaa1dca','5382fa60aafeb'),('5382ffa87935e','5382da4696a41','5382ff78ea713'),('5382ffa879105','5382d7aaa1dca','5382ff78ea713');
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
INSERT INTO `t_user` VALUES (80868378,'hongerbo@qq.com','202cb962ac59075b964b07152d234b70','啵啵牛','default.jpg',1,0,0,1393140449,1402059999,18,'120.90.161.100',1),(80504863,'89498726@qq.com','202cb962ac59075b964b07152d234b70','jiefei','default.jpg',2,0,0,1399875063,1401281024,10,'120.210.181.139',2);
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

-- Dump completed on 2014-06-07 17:54:04
