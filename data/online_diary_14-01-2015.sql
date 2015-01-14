/*
SQLyog Ultimate v8.55 
MySQL - 5.5.36 : Database - online_diary
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

insert  into `journal_admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`admin_status`,`admin_email`,`created_date`,`admin_last_login`,`admin_login_ip`) values (1,'Administrator','admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','1','arivu@creativert.com','2015-01-10 19:35:03','2015-01-12 14:13:03','::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `journal_category` */

insert  into `journal_category`(`category_id`,`category_name`,`created`,`modified`) values (1,'cat1',NULL,NULL),(2,'cat2',NULL,NULL),(3,'cat3',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `journal_cms` */

insert  into `journal_cms`(`id`,`heading`,`body`,`slug`,`metaTitle`,`metaDescription`,`metaKeywords`,`page_hits`) values (1,'About Us','Test Match','about-us','Meta Title','Meta Desc','Meta Key',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `journal_diary` */

insert  into `journal_diary`(`diary_id`,`diary_user_id`,`diary_title`,`diary_description`,`diary_category_id`,`diary_tags`,`diary_current_date`,`diary_user_mood_id`,`diary_upload`,`created`,`modified`) values (15,8,'test title','',1,'tesggguyyyyyy','0000-00-00 00:00:00',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'test title','<p>test</p>\r\n',2,'test','0000-00-00 00:00:00',3,'1421162646_new_motox_default_wallpaper.jpg',NULL,NULL),(18,8,'test 14/1','<p>test</p>\r\n',1,'test','2015-01-14 00:00:00',3,'1421211580_1121.jpg','2015-01-14 10:29:40','2015-01-14 10:29:40');

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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`mood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `journal_mood_type` */

insert  into `journal_mood_type`(`mood_id`,`mood_type`,`created`,`modified`) values (1,'smile',NULL,NULL),(2,'sad',NULL,NULL),(3,'cheeky',NULL,NULL);

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
  CONSTRAINT `FK_journal_tmp_diary_act_key` FOREIGN KEY (`temp_activation_key`) REFERENCES `journal_users` (`user_activation_key`),
  CONSTRAINT `FK_journal_tmp_diary_mood` FOREIGN KEY (`temp_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_tmp_diary` */

/*Table structure for table `journal_users` */

DROP TABLE IF EXISTS `journal_users`;

CREATE TABLE `journal_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(250) DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_login_ip` varchar(250) DEFAULT NULL,
  `reset_password_string` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `NewIndex1` (`user_activation_key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `journal_users` */

insert  into `journal_users`(`user_id`,`user_name`,`user_email`,`user_password`,`user_status`,`user_activation_key`,`user_last_login`,`user_login_ip`,`reset_password_string`,`created`,`modified`) values (1,'','test','test','0','12345','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'stanley','testfe@gmail.com','123','0',NULL,NULL,NULL,NULL,NULL,NULL),(8,'stanley','ptrckstnly@gmail.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','1','nwBiCBv8n','2015-01-14 10:15:28','::1',NULL,NULL,NULL),(9,'prakash','prakash.paramanandam@arkinfotec.com','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62','1','JDGfQKXcu','2015-01-14 13:20:40','127.0.0.1','','2015-01-14 11:31:18','2015-01-14 13:21:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
