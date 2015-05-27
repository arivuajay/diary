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
/*Table structure for table `journal_student_diary` */

DROP TABLE IF EXISTS `journal_student_diary`;

CREATE TABLE `journal_student_diary` (
  `diary_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `diary_user_id` bigint(20) NOT NULL,
  `diary_title` varchar(250) NOT NULL,
  `diary_description` text NOT NULL,
  `diary_class_id` bigint(20) NOT NULL,
  `diary_subject_id` bigint(20) NOT NULL,
  `diary_tags` varchar(250) DEFAULT NULL,
  `diary_current_date` datetime NOT NULL,
  `diary_user_mood_id` bigint(20) NOT NULL,
  `diary_upload` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`diary_id`),
  KEY `FK_journal_diary_user` (`diary_user_id`),
  KEY `FK_journal_diary_category` (`diary_class_id`),
  KEY `FK_journal_diary_mood` (`diary_user_mood_id`),
  KEY `FK_journal_student_diary_subject` (`diary_subject_id`),
  CONSTRAINT `FK_journal_student_diary_mood` FOREIGN KEY (`diary_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`),
  CONSTRAINT `FK_journal_student_diary_class` FOREIGN KEY (`diary_class_id`) REFERENCES `journal_student_diary_class` (`class_id`),
  CONSTRAINT `FK_journal_student_diary_subject` FOREIGN KEY (`diary_subject_id`) REFERENCES `journal_student_diary_subject` (`subject_id`),
  CONSTRAINT `FK_journal_student_diary_user` FOREIGN KEY (`diary_user_id`) REFERENCES `journal_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_student_diary` */

/*Table structure for table `journal_student_diary_class` */

DROP TABLE IF EXISTS `journal_student_diary_class`;

CREATE TABLE `journal_student_diary_class` (
  `class_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '0 => Admin, Otherwise => User id',
  `class_name` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `FK_journal_student_diary_class_user` (`user_id`),
  CONSTRAINT `FK_journal_student_diary_class_user` FOREIGN KEY (`user_id`) REFERENCES `journal_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_student_diary_class` */

/*Table structure for table `journal_student_diary_image` */

DROP TABLE IF EXISTS `journal_student_diary_image`;

CREATE TABLE `journal_student_diary_image` (
  `diary_img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `diary_id` bigint(20) NOT NULL,
  `diary_image` varchar(255) NOT NULL,
  PRIMARY KEY (`diary_img_id`),
  KEY `FK_journal_diary_image_diary` (`diary_id`),
  CONSTRAINT `FK_journal_student_diary_image_diary` FOREIGN KEY (`diary_id`) REFERENCES `journal_student_diary` (`diary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_student_diary_image` */

/*Table structure for table `journal_student_diary_subject` */

DROP TABLE IF EXISTS `journal_student_diary_subject`;

CREATE TABLE `journal_student_diary_subject` (
  `subject_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `subject_name` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `FK_journal_student_diary_subject_user` (`user_id`),
  KEY `FK_journal_student_diary_subject_class` (`class_id`),
  CONSTRAINT `FK_journal_student_diary_subject_class` FOREIGN KEY (`class_id`) REFERENCES `journal_student_diary_class` (`class_id`),
  CONSTRAINT `FK_journal_student_diary_subject_user` FOREIGN KEY (`user_id`) REFERENCES `journal_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journal_student_diary_subject` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
