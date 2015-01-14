-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 06:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal_admin`
--

CREATE TABLE IF NOT EXISTS `journal_admin` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `journal_admin`
--

INSERT INTO `journal_admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_status`, `admin_email`, `created_date`, `admin_last_login`, `admin_login_ip`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '1', 'arivu@creativert.com', '2015-01-10 14:05:03', '2015-01-10 15:05:36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `journal_banner`
--

CREATE TABLE IF NOT EXISTS `journal_banner` (
  `banner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_image` text NOT NULL,
  `banner_layout_id` bigint(20) NOT NULL,
  `banner_status` enum('0','1') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `FK_journal_banner_layout` (`banner_layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_banner_layout`
--

CREATE TABLE IF NOT EXISTS `journal_banner_layout` (
  `banner_layout_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `banner_layout_page_id` bigint(20) NOT NULL,
  `banner_layout_position` enum('top','right','left','bottom') DEFAULT NULL,
  `banner_layout_dimensions` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_layout_id`),
  KEY `FK_journal_banner_layout_page` (`banner_layout_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_category`
--

CREATE TABLE IF NOT EXISTS `journal_category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_cms`
--

CREATE TABLE IF NOT EXISTS `journal_cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeywords` varchar(255) DEFAULT NULL,
  `page_hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `journal_cms`
--

INSERT INTO `journal_cms` (`id`, `heading`, `body`, `slug`, `metaTitle`, `metaDescription`, `metaKeywords`, `page_hits`) VALUES
(1, 'About Us', 'Test Match', 'about-us', 'Meta Title', 'Meta Desc', 'Meta Key', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal_diary`
--

CREATE TABLE IF NOT EXISTS `journal_diary` (
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
  KEY `FK_journal_diary_mood` (`diary_user_mood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_mood_report`
--

CREATE TABLE IF NOT EXISTS `journal_mood_report` (
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
  KEY `FK_journal_mood_report_diary` (`mood_report_diary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_mood_type`
--

CREATE TABLE IF NOT EXISTS `journal_mood_type` (
  `mood_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mood_type` varchar(250) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`mood_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `journal_mood_type`
--

INSERT INTO `journal_mood_type` (`mood_id`, `mood_type`, `created`, `modified`) VALUES
(1, 'smile', NULL, NULL),
(2, 'sad', NULL, NULL),
(3, 'cheeky', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_tmp_diary`
--

CREATE TABLE IF NOT EXISTS `journal_tmp_diary` (
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
  KEY `FK_journal_tmp_diary_act_key` (`temp_activation_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `journal_users`
--

CREATE TABLE IF NOT EXISTS `journal_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_activation_key` varchar(250) DEFAULT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_login_ip` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `NewIndex1` (`user_activation_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `journal_users`
--

INSERT INTO `journal_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `user_activation_key`, `user_last_login`, `user_login_ip`, `created`, `modified`) VALUES
(1, '', 'test', 'test', '0', '12345', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'stanley', 'testfe@gmail.com', '123', '0', NULL, NULL, NULL, NULL, NULL),
(8, 'stanley', 'ptrckstnly@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '1', 'nwBiCBv8n', '2015-01-12 10:41:49', '::1', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal_banner`
--
ALTER TABLE `journal_banner`
  ADD CONSTRAINT `FK_journal_banner_layout` FOREIGN KEY (`banner_layout_id`) REFERENCES `journal_banner_layout` (`banner_layout_id`);

--
-- Constraints for table `journal_banner_layout`
--
ALTER TABLE `journal_banner_layout`
  ADD CONSTRAINT `FK_journal_banner_layout_page` FOREIGN KEY (`banner_layout_page_id`) REFERENCES `journal_page` (`page_id`);

--
-- Constraints for table `journal_diary`
--
ALTER TABLE `journal_diary`
  ADD CONSTRAINT `FK_journal_diary_category` FOREIGN KEY (`diary_category_id`) REFERENCES `journal_category` (`category_id`),
  ADD CONSTRAINT `FK_journal_diary_mood` FOREIGN KEY (`diary_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`),
  ADD CONSTRAINT `FK_journal_diary_user` FOREIGN KEY (`diary_user_id`) REFERENCES `journal_users` (`user_id`);

--
-- Constraints for table `journal_mood_report`
--
ALTER TABLE `journal_mood_report`
  ADD CONSTRAINT `FK_journal_mood_report_diary` FOREIGN KEY (`mood_report_diary_id`) REFERENCES `journal_diary` (`diary_id`),
  ADD CONSTRAINT `FK_journal_mood_report_user` FOREIGN KEY (`mood_report_user_id`) REFERENCES `journal_users` (`user_id`);

--
-- Constraints for table `journal_tmp_diary`
--
ALTER TABLE `journal_tmp_diary`
  ADD CONSTRAINT `FK_journal_tmp_diary` FOREIGN KEY (`temp_category_id`) REFERENCES `journal_category` (`category_id`),
  ADD CONSTRAINT `FK_journal_tmp_diary_act_key` FOREIGN KEY (`temp_activation_key`) REFERENCES `journal_users` (`user_activation_key`),
  ADD CONSTRAINT `FK_journal_tmp_diary_mood` FOREIGN KEY (`temp_user_mood_id`) REFERENCES `journal_mood_type` (`mood_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
