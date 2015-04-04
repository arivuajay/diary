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

insert  into `journal_admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`admin_status`,`admin_email`,`created_date`,`admin_last_login`,`admin_login_ip`) values (1,'Administrator','admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','1','ptrckstnly@gmail.com','2015-02-14 11:55:45','2015-03-16 13:04:00','::1');

/*Table structure for table `journal_admin_setting` */

DROP TABLE IF EXISTS `journal_admin_setting`;

CREATE TABLE `journal_admin_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(256) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=daily,2=weekly,3=monthly',
  UNIQUE KEY `setting_id` (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `journal_admin_setting` */

insert  into `journal_admin_setting`(`setting_id`,`setting_name`,`status`) values (1,'mood_report_mail',3);

/*Table structure for table `journal_banner` */

DROP TABLE IF EXISTS `journal_banner`;

CREATE TABLE `journal_banner` (
  `banner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_image` text NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `banner_layout_id` bigint(20) NOT NULL,
  `banner_path` varchar(255) NOT NULL,
  `banner_status` enum('0','1') DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `FK_journal_banner_layout` (`banner_layout_id`),
  CONSTRAINT `FK_journal_banner_layout` FOREIGN KEY (`banner_layout_id`) REFERENCES `journal_banner_layout` (`banner_layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `journal_banner` */

insert  into `journal_banner`(`banner_id`,`banner_image`,`banner_title`,`banner_url`,`banner_layout_id`,`banner_path`,`banner_status`,`created`,`modified`) values (1,'1424161748_468x60.gif','banner1','https://www.google.co.in/',1,'user_inner/top/468x60/','1','2015-02-07 11:56:10','2015-02-07 11:56:10'),(2,'1424326625_2.jpg','New Banner','http://demo.arkinfotec.in/portal/dailystatus',2,'home/top/1170x660/','1','2015-02-19 11:47:05','2015-02-19 11:47:05'),(3,'1424326648_2.jpg','New Banner2','http://demo.arkinfotec.in/portal/dailystatus',2,'home/top/1170x660/','1','2015-02-19 11:47:28','2015-02-19 11:47:28'),(4,'1424326659_2.jpg','New Banner','http://demo.arkinfotec.in/portal/dailystatus',2,'home/top/1170x660/','1','2015-02-19 11:47:39','2015-02-19 11:47:39'),(5,'1424326672_2.jpg','New Banner4','http://demo.arkinfotec.in/portal/dailystatus',2,'home/top/1170x660/','1','2015-02-19 11:47:52','2015-02-19 11:47:52');

/*Table structure for table `journal_banner_layout` */

DROP TABLE IF EXISTS `journal_banner_layout`;

CREATE TABLE `journal_banner_layout` (
  `banner_layout_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_layout_name` varchar(255) NOT NULL,
  `banner_layout_page` enum('home','user_inner') NOT NULL,
  `banner_layout_position` enum('top','right','left','bottom') NOT NULL,
  `banner_layout_dimensions` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_layout_id`),
  KEY `FK_journal_banner_layout_page` (`banner_layout_page`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `journal_banner_layout` */

insert  into `journal_banner_layout`(`banner_layout_id`,`banner_layout_name`,`banner_layout_page`,`banner_layout_position`,`banner_layout_dimensions`,`created`,`modified`) values (1,'user page top','user_inner','top','468*60','2015-02-07 11:54:16','2015-02-07 11:54:16'),(2,'Home Page','home','top','1170*660','2015-02-19 11:46:28','2015-02-19 11:46:28');

/*Table structure for table `journal_category` */

DROP TABLE IF EXISTS `journal_category`;

CREATE TABLE `journal_category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '0 => Admin, Otherwise => User id',
  `category_name` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `journal_category` */

insert  into `journal_category`(`category_id`,`user_id`,`category_name`,`created`,`modified`) values (1,0,'cat web edit','2015-01-30 00:00:00','2015-03-07 15:42:56'),(2,0,'cat2',NULL,NULL),(3,0,'cat3',NULL,NULL),(4,0,'new category',NULL,NULL),(5,0,'test cat',NULL,NULL),(6,0,'new cat2',NULL,NULL),(7,11,'New 2','2015-01-30 00:00:00','2015-02-17 12:05:35'),(8,11,'New3','2015-02-17 11:48:50','2015-03-07 15:14:57');

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

insert  into `journal_cms`(`id`,`heading`,`body`,`slug`,`metaTitle`,`metaDescription`,`metaKeywords`,`page_hits`) values (1,'About Us','<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</strong><br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\n<a href=\"http://www.cherrybells.in/E2h/\"><em>Lorem Ipsum</em></a> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n','aboutus','test','test','test',0),(2,'Privacy ',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.<br><br>\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','privacy','Privacy ','meta','privacy key',0);

/*Table structure for table `journal_contact` */

DROP TABLE IF EXISTS `journal_contact`;

CREATE TABLE `journal_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(256) NOT NULL,
  `contact_email` varchar(256) NOT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `contact_message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `journal_contact` */

insert  into `journal_contact`(`contact_id`,`contact_name`,`contact_email`,`contact_phone`,`contact_message`,`created`,`modified`) values (1,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(2,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(3,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(4,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(5,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(6,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(7,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(8,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(9,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(10,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(11,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(12,'lee','ptrckstnly@gmail.com','23434555','testtty',NULL,NULL),(13,'lee','ptrckstnly@gmail.com','23434555','testtty',NULL,NULL),(14,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(15,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(16,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(17,'lee','ptrckstnly@gmail.com','23434555','test...',NULL,NULL),(18,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(19,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(20,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(21,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(22,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(23,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(24,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(25,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(26,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(27,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(28,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL),(29,'lee','ptrckstnly@gmail.com','23434555','test',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `journal_diary` */

insert  into `journal_diary`(`diary_id`,`diary_user_id`,`diary_title`,`diary_description`,`diary_category_id`,`diary_tags`,`diary_current_date`,`diary_user_mood_id`,`diary_upload`,`created`,`modified`) values (15,8,'test title','',1,'tesggguyyyyyy','0000-00-00 00:00:00',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'test title','<p>test</p>\r\n',2,'test','0000-00-00 00:00:00',3,'1421162646_new_motox_default_wallpaper.jpg',NULL,NULL),(18,8,'test 14/1','<p>test</p>\r\n',1,'test','2015-01-14 00:00:00',3,'1421211580_1121.jpg','2015-01-14 10:29:40','2015-01-14 10:29:40'),(19,8,'test title','<p>test test</p>\r\n',1,'test','2015-01-14 00:00:00',1,'1421234882_1121.jpg','2015-01-14 16:58:02','2015-01-14 16:58:02'),(20,11,'test','<p>testuyyy</p>\r\n',1,'test','2015-01-19 00:00:00',1,'1421678868_1121.jpg','2015-01-19 20:17:48','2015-01-19 20:17:48'),(21,11,'test','<p>bjasdasdasd</p>\r\n',2,'test','2015-01-19 03:00:00',1,'1421773225_6748y_vintage-wine-barrel.jpg','2015-01-20 22:30:25','2015-01-20 22:30:25'),(22,16,'test','<p>Happy birthday&nbsp;</p>\r\n',1,'test','2015-01-21 00:00:00',1,'1421828085_img_0585.jpg','2015-01-21 13:44:45','2015-01-21 13:44:45'),(23,16,'test','<p>test</p>\r\n',1,'test','2015-01-21 00:00:00',1,'1421837173_img_0585.jpg','2015-01-21 16:16:13','2015-01-21 16:16:13'),(24,17,'siv','<p>Jaquorrrrrrrrrrr</p>\r\n',3,'sss','2015-01-21 00:00:00',1,'1421840145_1136805407994.jpg','2015-01-21 17:05:45','2015-01-21 17:05:45'),(25,11,'test','dfsfsdf',1,'test','2015-01-30 00:00:00',2,'1422076860_avatar1.jpg','2015-01-24 10:51:00','2015-01-24 10:51:00'),(28,14,'sample title','sample notes',2,'tag text','2015-01-02 03:30:00',2,NULL,NULL,NULL),(29,12,'test title','<p>test</p>',1,'test','2015-01-31 00:00:00',1,NULL,'2015-01-31 11:58:11','2015-01-31 11:58:11'),(30,12,'test title','<p>test</p>',1,'test','2015-02-02 00:00:00',1,NULL,'2015-02-02 12:32:55','2015-02-02 12:32:55'),(31,12,'test 2','<p>test</p>',1,'test','2015-02-02 00:00:00',2,NULL,'2015-02-02 12:33:38','2015-02-02 12:33:38'),(33,11,'test title','<p>test</p>',1,'test','2015-02-03 00:00:00',1,NULL,'2015-02-03 14:04:29','2015-02-03 14:04:29'),(34,11,'test title','<p>hght</p>',1,'nice','2015-02-03 00:00:00',1,NULL,'2015-02-03 14:05:02','2015-02-03 14:05:02'),(35,11,'good day','<p>swd</p>',1,'test','2015-02-04 00:00:00',1,NULL,'2015-02-04 12:30:33','2015-02-04 12:30:33'),(36,11,'test title','<p>test</p>',1,'test','2015-02-04 00:00:00',1,NULL,'2015-02-04 13:37:30','2015-02-04 13:37:30'),(37,11,'test title','<p>test</p>',3,'tesggguyyyyyy','2015-02-04 00:00:00',2,NULL,'2015-02-04 19:35:54','2015-02-04 19:35:54'),(38,11,'test title','<p>test helohela</p>',2,'test','2015-02-04 00:00:00',4,NULL,'2015-02-04 19:36:55','2015-02-05 12:15:45'),(39,11,'test title','<p>test test</p>\r\n',2,'test','2015-02-06 00:00:00',1,NULL,'2015-02-06 19:23:57','2015-02-06 19:23:57'),(40,11,'Test','<p>asdsada sdasdasd</p>\r\n',7,'test','2015-02-17 00:00:00',1,NULL,'2015-02-17 11:30:56','2015-02-17 11:30:56'),(41,11,'test','<p>adsdasd</p>\r\n',8,'sd','2015-02-17 00:00:00',2,NULL,'2015-02-17 11:48:50','2015-02-17 11:48:50'),(42,71,'ersds','<p>asdasdasdasdasd</p>\r\n',1,'asdas','2015-02-02 00:00:00',9,NULL,'2015-02-17 13:45:38','2015-02-17 13:45:38'),(43,71,'asdsd','<p>asdasd</p>\r\n',1,'asdasd','2015-02-01 00:00:00',1,NULL,'2015-02-17 13:51:51','2015-02-17 13:51:51'),(44,71,'asdasdasd','<p>asdasdasdasdasd</p>\r\n',2,'asdsad','2015-02-03 00:00:00',2,NULL,'2015-02-17 13:53:22','2015-02-17 13:53:22'),(45,71,'asdasd','<p>asd asd asd asd</p>\r\n',1,'asdsad','2015-02-04 00:00:00',2,NULL,'2015-02-17 13:59:41','2015-02-17 13:59:41'),(46,71,'test','<p>sdaasdasd asdasd</p>\r\n',3,'test','2015-02-26 00:00:00',2,NULL,'2015-02-17 14:00:31','2015-02-17 14:00:31'),(47,71,'asdasd','<p>asda dasdasdasd</p>\r\n',2,'asdasd','2015-02-17 00:00:00',2,NULL,'2015-02-17 14:05:51','2015-02-17 14:05:51'),(48,11,'today','<p>testtte today</p>\r\n',1,'test','2015-03-28 00:00:00',1,NULL,'2015-03-28 19:17:56','2015-03-28 19:17:56');

/*Table structure for table `journal_diary_image` */

DROP TABLE IF EXISTS `journal_diary_image`;

CREATE TABLE `journal_diary_image` (
  `diary_img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `diary_id` bigint(20) NOT NULL,
  `diary_image` varchar(255) NOT NULL,
  PRIMARY KEY (`diary_img_id`),
  KEY `FK_journal_diary_image_diary` (`diary_id`),
  CONSTRAINT `FK_journal_diary_image_diary` FOREIGN KEY (`diary_id`) REFERENCES `journal_diary` (`diary_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `journal_diary_image` */

insert  into `journal_diary_image`(`diary_img_id`,`diary_id`,`diary_image`) values (6,33,'8115b58521255701544d7b1a5463df23.jpg'),(7,33,'e41556899b47d9d8e2782c39bc48b912.jpg'),(8,33,'1f8ecf938fe2270cec29cbb8e01c8613.jpg'),(9,34,'f17f86b8707ee46d1246bfc0a4e270f1.jpg'),(10,36,'979f1140155ce48541516d2feb835603.jpg'),(11,36,'4b447d20006d5b33a381a5f6bfb57716.jpg'),(12,36,'b6fc9f8956e5abb9493e9f29cf5ec932.jpg'),(13,36,'3458f7f4d3c0f35da11ae06537bee31f.txt'),(14,36,'9eb4882732b91c043c1d03566f6e36ba.jpg'),(15,37,'43bf987374d3733956c5ed282b031707.jpg'),(20,38,'ef0fd1c6f8efd29b22e6c0c0675eded1.png'),(21,39,'2f805bec8705b2ad72dcf961e93bfe04.jpg'),(22,43,'c4692a9305040e6177a5f3c6cb3971e8.jpg'),(23,44,'btn_chat.png_988af368c581195512eeb4ef7f031d66.png'),(24,45,'d515d2d1a772261621ecd7f67969d690_jpg.jpg'),(25,46,'7ea80f0f9aab526bfbdab948da4442c5_2.jpg'),(26,47,'aebcaa47c76a9dae0db38514a9dadbd5_d-link-87715_640.jpg');

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

/*Table structure for table `journal_feedback` */

DROP TABLE IF EXISTS `journal_feedback`;

CREATE TABLE `journal_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_name` varchar(256) NOT NULL,
  `feedback_email` varchar(256) NOT NULL,
  `feedback_phone` varchar(15) DEFAULT NULL,
  `feedback_message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `journal_feedback` */

insert  into `journal_feedback`(`feedback_id`,`feedback_name`,`feedback_email`,`feedback_phone`,`feedback_message`,`created`,`modified`) values (1,'test','ptrckstnly@gmail.com','24354','test',NULL,NULL),(2,'test','ptrckstnly@gmail.com','24354','test\r\n',NULL,NULL),(3,'test','ptrckstnly@gmail.com','24354','testttt',NULL,NULL);

/*Table structure for table `journal_mood_activity` */

DROP TABLE IF EXISTS `journal_mood_activity`;

CREATE TABLE `journal_mood_activity` (
  `mood_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `mood_activity_email` varchar(256) DEFAULT NULL,
  `mood_activity_mood_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  UNIQUE KEY `mood_activity_id` (`mood_activity_id`),
  KEY `FK_journal_mood_activity_mood` (`mood_activity_mood_id`),
  KEY `FK_journal_mood_activity_user_email` (`mood_activity_email`),
  CONSTRAINT `FK_journal_mood_activity_mood` FOREIGN KEY (`mood_activity_mood_id`) REFERENCES `journal_mood_type` (`mood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `journal_mood_activity` */

insert  into `journal_mood_activity`(`mood_activity_id`,`mood_activity_email`,`mood_activity_mood_id`,`created`,`modified`) values (1,'ptrckstnly@gmail.com',1,'2015-02-12 16:09:42','2015-02-12 16:09:42'),(2,'ptrckstnly@gmail.com',3,'2015-02-12 16:09:50','2015-02-12 16:09:50'),(3,'ptrckstnly@gmail.com',1,'2015-02-12 16:09:59','2015-02-12 16:09:59'),(4,'ptrckstnly@gmail.com',2,'2015-02-12 16:10:15','2015-02-12 16:10:15'),(5,'ptrckstnly2@gmail.com',9,'2015-02-12 16:10:30','2015-02-12 16:10:30'),(6,'ptrckstnly2@gmail.com',3,'2015-02-12 16:10:44','2015-02-12 16:10:44'),(7,'ptrckstnly@gmail.com',2,'2015-02-12 16:44:47','2015-02-12 16:44:47'),(8,'stanley.vasu@arkinfotec.com',1,'2015-02-13 17:04:37','2015-02-12 17:04:37'),(9,'ptrckstnly@gmail.com',1,'2015-02-13 11:18:09','2015-02-13 11:18:09'),(10,'ptrckstnly@gmail.com',3,'2015-02-13 11:18:18','2015-02-13 11:18:18'),(12,'ptrckstnly@gmail.com',1,'2015-02-16 16:21:48','2015-02-16 16:21:48'),(13,'ptrckstnly@gmail.com',1,'2015-02-16 16:22:27','2015-02-16 16:22:27'),(14,'ptrckstnly@gmail.com',1,'2015-02-16 16:24:40','2015-02-16 16:24:40'),(15,'ptrckstnly@gmail.com',3,'2015-02-16 19:26:13','2015-02-16 19:26:13'),(16,'ptrckstnly@gmail.com',3,'2015-02-16 19:26:16','2015-02-16 19:26:16'),(17,'ptrckstnly@gmail.com',1,'2015-02-16 19:28:33','2015-02-16 19:28:33'),(18,'prakash.paramanandam@arkinfotec.com',1,'2015-02-18 18:21:28','2015-02-18 18:21:28'),(19,'prakash.paramanandam@arkinfotec.com',3,'2015-02-18 19:19:30','2015-02-18 19:19:30'),(20,'prakash.paramanandam@arkinfotec.com',9,'2015-02-18 19:19:35','2015-02-18 19:19:35'),(21,'prakash.paramanandam@arkinfotec.com',2,'2015-02-18 19:19:40','2015-02-18 19:19:40'),(22,'prakash.paramanandam@arkinfotec.com',2,'2015-02-18 19:19:45','2015-02-18 19:19:45'),(23,'prakash.paramanandam@arkinfotec.com',2,'2015-02-19 10:33:20','2015-02-19 10:33:20');

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

insert  into `journal_mood_type`(`mood_id`,`mood_type`,`mood_image`,`created`,`modified`) values (1,'smile','1422714319_mood_1.png',NULL,NULL),(2,'sad','1422714331_mood_2.png',NULL,NULL),(3,'Excited','1422714414_mood_3.png',NULL,NULL),(4,'angry','1422714432_mood_1.png',NULL,NULL),(9,'laugh','1422714538_mood_3.png',NULL,NULL);

/*Table structure for table `journal_notification` */

DROP TABLE IF EXISTS `journal_notification`;

CREATE TABLE `journal_notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` text,
  `notification_message` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  UNIQUE KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `journal_notification` */

insert  into `journal_notification`(`notification_id`,`notification_title`,`notification_message`,`created`,`modified`) values (1,'notication test','<strong>test message </strong>test message test message test message test message test message test message test messagetest message test message','2015-02-24 19:19:07','2015-02-24 19:19:07'),(2,'notication test2','test message test message test messagetest messagetest messagetest message\r\n','2015-02-24 19:19:31','2015-02-24 19:19:31'),(3,'I m testing','<p>Let&#39;s Check.. How its working?</p>\r\n','2015-02-27 12:40:35','2015-02-27 12:40:35'),(4,'I m testing','I m testing',NULL,NULL),(5,'test','<strong>testte tert sa</strong>dsadsa<em>dasd</em>','2015-02-27 13:46:44','2015-02-27 13:46:44');

/*Table structure for table `journal_notification_log` */

DROP TABLE IF EXISTS `journal_notification_log`;

CREATE TABLE `journal_notification_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_user_id` int(11) NOT NULL,
  `log_notification_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `FK_journal_notification_log_notification` (`log_notification_id`),
  CONSTRAINT `FK_journal_notification_log_notification` FOREIGN KEY (`log_notification_id`) REFERENCES `journal_notification` (`notification_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `journal_notification_log` */

insert  into `journal_notification_log`(`log_id`,`log_user_id`,`log_notification_id`,`created`,`modified`) values (1,71,5,'2015-02-27 15:47:35','2015-02-27 15:47:35'),(2,11,5,'2015-03-05 11:55:29','2015-03-05 11:55:29');

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

/*Table structure for table `journal_todolist` */

DROP TABLE IF EXISTS `journal_todolist`;

CREATE TABLE `journal_todolist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(128) NOT NULL,
  `reminder_time` datetime NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 => Active,2=> Completed',
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_journal_todolist_user` (`user_id`),
  CONSTRAINT `FK_journal_todolist_user` FOREIGN KEY (`user_id`) REFERENCES `journal_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `journal_todolist` */

insert  into `journal_todolist`(`id`,`message`,`reminder_time`,`status`,`user_id`) values (2,'birthdayyy','2015-05-04 00:00:00','1',11),(3,'birthday','2015-05-04 00:00:00','1',11),(4,'friend marriage','2015-03-26 07:00:00','1',11),(5,'birthdayyy','2015-03-26 18:00:00','1',11),(6,'birthdayyy','2015-03-28 12:30:00','1',11),(7,'birthdayyy','2015-03-05 11:27:00','1',11);

/*Table structure for table `journal_user_kid` */

DROP TABLE IF EXISTS `journal_user_kid`;

CREATE TABLE `journal_user_kid` (
  `user_kid_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_kid_spouse` varchar(256) DEFAULT NULL,
  `user_kid_dob` datetime DEFAULT NULL,
  `user_kid_dob_rem` enum('0','1') DEFAULT NULL,
  `user_kid_anniv` datetime DEFAULT NULL,
  `user_kid_anniv_rem` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_user_kid` */

/*Table structure for table `journal_users` */

DROP TABLE IF EXISTS `journal_users`;

CREATE TABLE `journal_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_prof_image` varchar(500) NOT NULL,
  `user_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(250) DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_login_ip` varchar(250) DEFAULT NULL,
  `reset_password_string` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_index` (`user_email`),
  UNIQUE KEY `NewIndex1` (`user_activation_key`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

/*Data for the table `journal_users` */

insert  into `journal_users`(`user_id`,`user_name`,`user_email`,`user_password`,`user_prof_image`,`user_status`,`user_activation_key`,`user_last_login`,`user_login_ip`,`reset_password_string`,`created`,`modified`) values (8,'aaaa','aaaa@gmail.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','','1','nwBiCBv8n','2015-01-14 05:02:20','122.174.109.49',NULL,NULL,NULL),(9,'Prakash','pamds9@gmail.com','c9efd9d1ad468c0d9e0e2422f2bd37133129eb15dc122197d3bce6ea9bc7507dd2bbc055deecaac99d6f9e8ac5ffed9af5aacd7ee88286e119f8364bc10b2760','','2',NULL,'2015-01-17 20:17:41','122.174.154.218',NULL,'2015-01-17 08:17:21','2015-01-17 08:17:21'),(10,'marudhupandiyan14','marudhupandiyan14@gmail.com','01a6bbf049717baedfc3b1c338699f406c2501864ada4f2008b1cf39cf0631dd89e5c015a5c2c53d78acccca59b093c6eb145933d0ed2fcc6feae24ea49cc4c0','','2','LpGY6lOiX',NULL,'122.174.74.39',NULL,'2015-01-19 06:55:51','2015-01-19 06:55:51'),(11,'lee','ptrckstnly@gmail.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','1425707494_11_10458851_527211937425061_8312835538950525217_n.jpg','2','S0uLeZaan','2015-03-30 11:47:14','::1','BG6XHwxniTQFuxilryYg2cApN','2015-01-19 08:17:48','2015-02-07 20:03:35'),(12,'udhyakumar','udhyakumarm@gmail.com','daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991','','1','PsRxSDv2C','2015-01-21 11:45:57','61.3.110.73',NULL,'2015-01-20 10:28:53','2015-01-20 10:28:53'),(13,'Marudhu','marudhukarthick_1985@yahoo.co.in','95ca56f4ea26bd5ec0209359b44746ca5f8f7256c23584730c19d64008c3ec30546e9a96a24484c2279fec38c9f7eec620167fe5a8bbb7a023ab32147c229126','','1',NULL,'2015-01-21 17:18:16','122.174.120.242',NULL,'2015-01-21 11:40:33','2015-01-21 11:40:33'),(14,'Rajendran','ceo@arkinfotec.com','e26c78fe5b9cf7a025cdaf9717bb2486fd9104796a462d20ad784d565be037c71556acb353bba6794696e751acaafa5f2e5fee722849591e6a36366d3f4e1d25','','1','MHbLZBG6m','2015-01-21 11:46:51','122.174.121.0',NULL,'2015-01-21 11:46:16','2015-01-21 11:46:16'),(15,'e2h','e2h@gmail.com','68e4264f2e7f6298d94fe4d11e5bb63f61c464fe1581a09fe443fa85f26fd9053e9ec1c3700cb246464a079da67482a71e19a6b37522147dc3421e6be65e5af4','','0','aHPEZCRxk',NULL,'122.174.120.242',NULL,'2015-01-21 01:44:03','2015-01-21 01:44:03'),(16,'marudhubangalore','marudhubangalore@gmail.com','ba94db91ba9096ce1f98a1ceddbaa0b5bfa400002c1e4f90a281b5557a550a342c41f0cd1a240e0e2df9723edce1bd148851c76f324853643286e53b12744496','','1','8PBHGMDWS','2015-01-21 18:45:09','122.174.120.242',NULL,'2015-01-21 01:44:45','2015-01-21 01:44:45'),(17,'sivaji','marudhu.murugesan@arkinfotec.com','dd737930f7e5fa9ac7056e3d43048e772adfb58a46e5c48f3795b57cbf54515b0592d1692b99eb1c8984aa1d36f62dc2e0e9ec951cff38d46b1ba0d4ba045768','','1','wZZNOn8u6','2015-01-21 17:13:08','122.174.120.242',NULL,'2015-01-21 04:54:35','2015-01-21 04:54:35'),(43,'testinomor','testinomor@gmail.com','455df601ba52e06011427dc1cc70812f18671edb29591b8aa854a3591db5403d4f52a2c15fcfcbd1aa928cd9cc295ecc14b90ddf78e46435a796d558d97b9e80','','0','TRH6mXbEO',NULL,'122.174.120.242',NULL,'2015-01-21 06:42:34','2015-01-21 06:42:34'),(44,'Arivu Ajay','arivcsdfazhagan.pandi@arkinfotec.com','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db','','1','ne4LWaDN1','2015-01-26 17:16:57','::1',NULL,'2015-01-26 09:32:31','2015-01-26 09:32:31'),(70,'lee','stanley.vasu@arkinfotec.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','','1','YjFhkMEkz','2015-03-16 13:05:49','::1','bMwhyAtVbjW2ENJN4wD8nmiOf','2015-02-07 19:15:04','2015-02-07 19:56:11'),(71,'prakash','prakash.paramanandam@arkinfotec.com','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','','1','IZebpya7D','2015-02-27 15:55:13','127.0.0.1','','2015-02-17 12:07:03','2015-02-27 12:46:29');

/*Table structure for table `journal_users_details` */

DROP TABLE IF EXISTS `journal_users_details`;

CREATE TABLE `journal_users_details` (
  `user_detail_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_prefix` varchar(10) DEFAULT NULL,
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_middle_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_dob` varchar(50) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_country` varchar(25) DEFAULT NULL,
  `user_sec_email` varchar(100) DEFAULT NULL,
  `user_landline` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_martial_status` enum('0','1') DEFAULT NULL COMMENT '0= unmarried,1=married',
  `user_address` text,
  `user_parent` varchar(256) DEFAULT NULL,
  `user_spouse` varchar(256) DEFAULT NULL,
  `user_kids` varchar(256) DEFAULT NULL,
  `user_education` varchar(256) DEFAULT NULL,
  `user_area_of_int` text,
  `user_sports_activity` text,
  `user_adventure_activity` text,
  `user_fav_color` varchar(256) DEFAULT NULL,
  `user_fav_place` varchar(256) DEFAULT NULL,
  `user_no_best_friend` int(11) DEFAULT NULL,
  `user_no_friend` int(11) DEFAULT NULL,
  `user_hangout` enum('1','2','3') DEFAULT NULL,
  `user_like_travel` enum('1','2','3','4','5','6') DEFAULT NULL,
  `user_stress_buster` text,
  `user_free_time` text,
  `user_desc_urself` text,
  `user_personality` text,
  `user_fav_animal` varchar(256) DEFAULT NULL,
  `user_fav_friut` varchar(256) DEFAULT NULL,
  `user_anniversary` datetime DEFAULT NULL,
  `user_anniversary_rem` enum('0','1') DEFAULT NULL,
  `user_spouse_name` varchar(256) DEFAULT NULL,
  `user_spouse_dob` datetime DEFAULT NULL,
  `user_spouse_dob_rem` enum('0','1') DEFAULT NULL,
  `user_father_name` varchar(256) DEFAULT NULL,
  `user_mother_name` varchar(256) DEFAULT NULL,
  `user_father_bod` datetime DEFAULT NULL,
  `user_father_bod_rem` enum('0','1') DEFAULT NULL,
  `user_mother_dob` datetime DEFAULT NULL,
  `user_mother_dob_rem` enum('0','1') DEFAULT NULL,
  `user_parent_anniversary` datetime DEFAULT NULL,
  `user_parent_anniversary_rem` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_users_details` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
