/*
SQLyog Ultimate v8.55 
MySQL - 5.6.17 : Database - online_diary
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `journal_admin` */

DROP TABLE IF EXISTS `journal_admin`;

CREATE TABLE `journal_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` enum('0','1') NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_login_ip` varchar(255) NOT NULL,
  UNIQUE KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `journal_admin` */

insert  into `journal_admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`admin_status`,`admin_email`,`created_date`,`admin_last_login`,`admin_login_ip`) values (1,'Administrator','admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','1','arivu@creativert.com','2015-01-10 19:35:03','2015-01-31 10:51:42','::1');

/*Table structure for table `journal_banner` */

DROP TABLE IF EXISTS `journal_banner`;

CREATE TABLE `journal_banner` (
  `banner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_image` text NOT NULL,
  `banner_layout_id` bigint(20) NOT NULL,
  `banner_status` enum('0','1') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `FK_journal_banner_layout` (`banner_layout_id`),
  CONSTRAINT `FK_journal_banner_layout` FOREIGN KEY (`banner_layout_id`) REFERENCES `journal_banner_layout` (`banner_layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_banner` */

/*Table structure for table `journal_banner_layout` */

DROP TABLE IF EXISTS `journal_banner_layout`;

CREATE TABLE `journal_banner_layout` (
  `banner_layout_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_layout_page_id` bigint(20) NOT NULL,
  `banner_layout_position` enum('top','right','left','bottom') DEFAULT NULL,
  `banner_layout_dimensions` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_layout_id`),
  KEY `FK_journal_banner_layout_page` (`banner_layout_page_id`),
  CONSTRAINT `FK_journal_banner_layout_page` FOREIGN KEY (`banner_layout_page_id`) REFERENCES `journal_page` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_banner_layout` */

/*Table structure for table `journal_category` */

DROP TABLE IF EXISTS `journal_category`;

CREATE TABLE `journal_category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `journal_category` */

insert  into `journal_category`(`category_id`,`category_name`,`created`,`modified`) values (1,'cat1_edited','2015-01-30 00:00:00','2015-01-30 00:00:00'),(2,'cat2',NULL,NULL),(3,'cat3',NULL,NULL),(4,'new category',NULL,NULL),(5,'test cat',NULL,NULL),(6,'new cat2',NULL,NULL);

/*Table structure for table `journal_cms` */

DROP TABLE IF EXISTS `journal_cms`;

CREATE TABLE `journal_cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeywords` varchar(255) DEFAULT NULL,
  `page_hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `journal_cms` */

insert  into `journal_cms`(`id`,`heading`,`body`,`slug`,`metaTitle`,`metaDescription`,`metaKeywords`,`page_hits`) values (1,'About Us','<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</strong><br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\n<a href=\"http://www.cherrybells.in/E2h/\"><em>Lorem Ipsum</em></a> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n','about-us','test','test','test',0),(2,'Privacy ',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','privacy','Privacy ','meta','privacy key',0);

/*Table structure for table `journal_diary` */

DROP TABLE IF EXISTS `journal_diary`;

CREATE TABLE `journal_diary` (
  `diary_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `diary_user_id` bigint(20) NOT NULL,
  `diary_title` varchar(250) NOT NULL,
  `diary_description` text NOT NULL,
  `diary_category_id` bigint(20) NOT NULL,
  `diary_tags` varchar(250) DEFAULT NULL,
  `diary_current_date` datetime NOT NULL,
  `diary_user_mood_id` bigint(20) NOT NULL,
  `diary_upload` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`diary_id`),
  KEY `FK_journal_diary_user` (`diary_user_id`),
  KEY `FK_journal_diary_category` (`diary_category_id`),
  KEY `FK_journal_diary_mood` (`diary_user_mood_id`),
  CONSTRAINT `FK_journal_diary_category` FOREIGN KEY (`diary_category_id`) REFERENCES `journal_category` (`category_id`),
  CONSTRAINT `FK_journal_diary_mood` FOREIGN KEY (`diary_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`),
  CONSTRAINT `FK_journal_diary_user` FOREIGN KEY (`diary_user_id`) REFERENCES `journal_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `journal_diary` */

insert  into `journal_diary`(`diary_id`,`diary_user_id`,`diary_title`,`diary_description`,`diary_category_id`,`diary_tags`,`diary_current_date`,`diary_user_mood_id`,`diary_upload`,`created`,`modified`) values (15,8,'test title','',1,'tesggguyyyyyy','0000-00-00 00:00:00',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'test title','<p>test</p>\r\n',2,'test','0000-00-00 00:00:00',3,'1421162646_new_motox_default_wallpaper.jpg',NULL,NULL),(18,8,'test 14/1','<p>test</p>\r\n',1,'test','2015-01-14 00:00:00',3,'1421211580_1121.jpg','2015-01-14 10:29:40','2015-01-14 10:29:40'),(19,8,'test title','<p>test test</p>\r\n',1,'test','2015-01-14 00:00:00',1,'1421234882_1121.jpg','2015-01-14 16:58:02','2015-01-14 16:58:02'),(20,11,'test','<p>testuyyy</p>\r\n',1,'test','2015-01-19 00:00:00',1,'1421678868_1121.jpg','2015-01-19 20:17:48','2015-01-19 20:17:48'),(21,11,'test','<p>bjasdasdasd</p>\r\n',2,'test','2015-01-19 03:00:00',1,'1421773225_6748y_vintage-wine-barrel.jpg','2015-01-20 22:30:25','2015-01-20 22:30:25'),(22,16,'test','<p>Happy birthday&nbsp;</p>\r\n',1,'test','2015-01-21 00:00:00',1,'1421828085_img_0585.jpg','2015-01-21 13:44:45','2015-01-21 13:44:45'),(23,16,'test','<p>test</p>\r\n',1,'test','2015-01-21 00:00:00',1,'1421837173_img_0585.jpg','2015-01-21 16:16:13','2015-01-21 16:16:13'),(24,17,'siv','<p>Jaquorrrrrrrrrrr</p>\r\n',3,'sss','2015-01-21 00:00:00',1,'1421840145_1136805407994.jpg','2015-01-21 17:05:45','2015-01-21 17:05:45'),(25,11,'test','dfsfsdf',1,'test','2015-01-30 00:00:00',2,'1422076860_avatar1.jpg','2015-01-24 10:51:00','2015-01-24 10:51:00'),(28,14,'sample title','sample notes',2,'tag text','2015-01-02 03:30:00',2,NULL,NULL,NULL),(29,12,'test title','<p>test</p>',1,'test','2015-01-31 00:00:00',1,NULL,'2015-01-31 11:58:11','2015-01-31 11:58:11');

/*Table structure for table `journal_diary_image` */

DROP TABLE IF EXISTS `journal_diary_image`;

CREATE TABLE `journal_diary_image` (
  `diary_img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `diary_id` bigint(20) NOT NULL,
  `diary_image` varchar(255) NOT NULL,
  PRIMARY KEY (`diary_img_id`),
  KEY `FK_journal_diary_image_diary` (`diary_id`),
  CONSTRAINT `FK_journal_diary_image_diary` FOREIGN KEY (`diary_id`) REFERENCES `journal_diary` (`diary_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_diary_image` */

/*Table structure for table `journal_faq` */

DROP TABLE IF EXISTS `journal_faq`;

CREATE TABLE `journal_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `journal_faq` */

insert  into `journal_faq`(`id`,`question`,`answer`) values (1,'test1???','test testtest testtest testtest testtest testtest testtest testtest testtest test'),(3,'test_question?','Answer test Answer test Answer test Answer test Answer test Answer test Answer test Answer test Answer test Answer test Answer test ');

/*Table structure for table `journal_mood_report` */

DROP TABLE IF EXISTS `journal_mood_report`;

CREATE TABLE `journal_mood_report` (
  `mood_report_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mood_report_user_id` bigint(20) NOT NULL,
  `mood_report_diary_id` bigint(20) NOT NULL,
  `mood_report_advice_from` enum('counsellor','psychologist') DEFAULT NULL,
  `mood_report_user_name` varchar(250) NOT NULL,
  `mood_report_user_email` varchar(250) NOT NULL,
  `mood_report_user_phone` varchar(50) NOT NULL,
  `mood_report_do_you_want_to_call` enum('yes','no') DEFAULT NULL,
  `mood_report_time_to_call` varchar(250) DEFAULT NULL,
  `mood_report_can_doc_call_now` enum('yes','no') DEFAULT NULL,
  `mood_report_status` enum('0','1') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`mood_report_id`),
  KEY `FK_journal_mood_report_user` (`mood_report_user_id`),
  KEY `FK_journal_mood_report_diary` (`mood_report_diary_id`),
  CONSTRAINT `FK_journal_mood_report_diary` FOREIGN KEY (`mood_report_diary_id`) REFERENCES `journal_diary` (`diary_id`),
  CONSTRAINT `FK_journal_mood_report_user` FOREIGN KEY (`mood_report_user_id`) REFERENCES `journal_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_mood_report` */

/*Table structure for table `journal_mood_type` */

DROP TABLE IF EXISTS `journal_mood_type`;

CREATE TABLE `journal_mood_type` (
  `mood_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mood_type` varchar(250) NOT NULL,
  `mood_image` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`mood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `journal_mood_type` */

insert  into `journal_mood_type`(`mood_id`,`mood_type`,`mood_image`,`created`,`modified`) values (1,'smile','1422704657_mood_1.png',NULL,NULL),(2,'sad','1422704674_mood_2.png',NULL,NULL),(3,'Excited','1422705145_mood_3.png',NULL,NULL),(4,'angry','1422705228_mood_1.png',NULL,NULL),(9,'laugh','1422713647_mood_1.png',NULL,NULL);

/*Table structure for table `journal_tmp_diary` */

DROP TABLE IF EXISTS `journal_tmp_diary`;

CREATE TABLE `journal_tmp_diary` (
  `temp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `temp_activation_key` varchar(250) DEFAULT NULL,
  `temp_title` varchar(250) NOT NULL,
  `temp_description` text NOT NULL,
  `temp_category_id` bigint(20) NOT NULL,
  `temp_tags` varchar(250) DEFAULT NULL,
  `temp_current_date` datetime NOT NULL,
  `temp_user_mood_id` bigint(20) NOT NULL,
  `temp_upload` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`temp_id`),
  KEY `FK_journal_tmp_diary` (`temp_category_id`),
  KEY `FK_journal_tmp_diary_mood` (`temp_user_mood_id`),
  KEY `FK_journal_tmp_diary_act_key` (`temp_activation_key`),
  CONSTRAINT `FK_journal_tmp_diary` FOREIGN KEY (`temp_category_id`) REFERENCES `journal_category` (`category_id`),
  CONSTRAINT `FK_journal_tmp_diary_mood` FOREIGN KEY (`temp_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `journal_tmp_diary` */

insert  into `journal_tmp_diary`(`temp_id`,`temp_activation_key`,`temp_title`,`temp_description`,`temp_category_id`,`temp_tags`,`temp_current_date`,`temp_user_mood_id`,`temp_upload`,`created`,`modified`) values (1,'LpGY6lOiX','title','<p>testing</p>\r\n',1,'tag','2015-01-19 00:00:00',1,'1421673952_p_20141015_175730.jpg','2015-01-19 18:55:52','2015-01-19 18:55:52'),(3,'aHPEZCRxk','sdsd','<p>I meet my cousin&#39;s cute daughter</p>\r\n',1,'ds','2015-01-21 00:00:00',1,'1421828043_img_0585.jpg','2015-01-21 13:44:03','2015-01-21 13:44:03');

/*Table structure for table `journal_users` */

DROP TABLE IF EXISTS `journal_users`;

CREATE TABLE `journal_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(250) DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_login_ip` varchar(250) DEFAULT NULL,
  `reset_password_string` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `NewIndex1` (`user_activation_key`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `journal_users` */

insert  into `journal_users`(`user_id`,`user_name`,`user_email`,`user_password`,`user_status`,`user_activation_key`,`user_last_login`,`user_login_ip`,`reset_password_string`,`created`,`modified`) values (8,'aaaa','aaaa@gmail.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','1','nwBiCBv8n','2015-01-14 05:02:20','122.174.109.49',NULL,NULL,NULL),(9,'Prakash','pamds9@gmail.com','c9efd9d1ad468c0d9e0e2422f2bd37133129eb15dc122197d3bce6ea9bc7507dd2bbc055deecaac99d6f9e8ac5ffed9af5aacd7ee88286e119f8364bc10b2760','2',NULL,'2015-01-17 20:17:41','122.174.154.218',NULL,'2015-01-17 08:17:21','2015-01-17 08:17:21'),(10,'marudhupandiyan14','marudhupandiyan14@gmail.com','01a6bbf049717baedfc3b1c338699f406c2501864ada4f2008b1cf39cf0631dd89e5c015a5c2c53d78acccca59b093c6eb145933d0ed2fcc6feae24ea49cc4c0','2','LpGY6lOiX',NULL,'122.174.74.39',NULL,'2015-01-19 06:55:51','2015-01-19 06:55:51'),(11,'ptrckstnly','ptrckstnly@gmail.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','2','S0uLeZaan','2015-01-30 10:55:19','::1','','2015-01-19 08:17:48','2015-01-21 11:57:39'),(12,'udhyakumar','udhyakumarm@gmail.com','daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991','1','PsRxSDv2C','2015-01-21 11:45:57','61.3.110.73',NULL,'2015-01-20 10:28:53','2015-01-20 10:28:53'),(13,'Marudhu','marudhukarthick_1985@yahoo.co.in','95ca56f4ea26bd5ec0209359b44746ca5f8f7256c23584730c19d64008c3ec30546e9a96a24484c2279fec38c9f7eec620167fe5a8bbb7a023ab32147c229126','1',NULL,'2015-01-21 17:18:16','122.174.120.242',NULL,'2015-01-21 11:40:33','2015-01-21 11:40:33'),(14,'Rajendran','ceo@arkinfotec.com','e26c78fe5b9cf7a025cdaf9717bb2486fd9104796a462d20ad784d565be037c71556acb353bba6794696e751acaafa5f2e5fee722849591e6a36366d3f4e1d25','1','MHbLZBG6m','2015-01-21 11:46:51','122.174.121.0',NULL,'2015-01-21 11:46:16','2015-01-21 11:46:16'),(15,'e2h','e2h@gmail.com','68e4264f2e7f6298d94fe4d11e5bb63f61c464fe1581a09fe443fa85f26fd9053e9ec1c3700cb246464a079da67482a71e19a6b37522147dc3421e6be65e5af4','0','aHPEZCRxk',NULL,'122.174.120.242',NULL,'2015-01-21 01:44:03','2015-01-21 01:44:03'),(16,'marudhubangalore','marudhubangalore@gmail.com','ba94db91ba9096ce1f98a1ceddbaa0b5bfa400002c1e4f90a281b5557a550a342c41f0cd1a240e0e2df9723edce1bd148851c76f324853643286e53b12744496','1','8PBHGMDWS','2015-01-21 18:45:09','122.174.120.242',NULL,'2015-01-21 01:44:45','2015-01-21 01:44:45'),(17,'sivaji','marudhu.murugesan@arkinfotec.com','dd737930f7e5fa9ac7056e3d43048e772adfb58a46e5c48f3795b57cbf54515b0592d1692b99eb1c8984aa1d36f62dc2e0e9ec951cff38d46b1ba0d4ba045768','1','wZZNOn8u6','2015-01-21 17:13:08','122.174.120.242',NULL,'2015-01-21 04:54:35','2015-01-21 04:54:35'),(43,'testinomor','testinomor@gmail.com','455df601ba52e06011427dc1cc70812f18671edb29591b8aa854a3591db5403d4f52a2c15fcfcbd1aa928cd9cc295ecc14b90ddf78e46435a796d558d97b9e80','0','TRH6mXbEO',NULL,'122.174.120.242',NULL,'2015-01-21 06:42:34','2015-01-21 06:42:34'),(44,'Arivu Ajay','arivcsdfazhagan.pandi@arkinfotec.com','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db','1','ne4LWaDN1','2015-01-26 17:16:57','::1',NULL,'2015-01-26 09:32:31','2015-01-26 09:32:31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
