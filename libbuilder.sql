-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2021 at 05:07 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

--
-- libbuilder Db
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `libbuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `profile_pic` varchar(30) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `first_name`, `last_name`, `password`, `profile_pic`, `role`) VALUES
('www.pacheko.inc@gmai', 'Duncan', 'Nyongesa', '677777', 'CIA (2).png', 'Admin'),
('mulongodancan25@gmai', 'Duncan', 'Nyongesa', '@Dun0714757251', 'duncan.png', 'admin'),
('Libratoz@gmail.com', 'Duncan', 'Nyongesa', '@Dun0714757251', 'Duncan1.png', 'admin'),
('mulongodancan95@gmai', 'Mark', 'Masoni', '@Dun0714757251', 'CIA.png', 'SuperAdmin'),
('www.pacheko.inc@gm', 'Malaba', 'Boniface', '@Dun0714757251', 'duncan.png', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `count_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_published` date DEFAULT NULL,
  `profile_pic` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `source_name` varchar(15) NOT NULL,
  `written_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(15) NOT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`count_id`, `article_id`, `title`, `subject`, `description`, `date_published`, `profile_pic`, `status`, `source_name`, `written_at`, `likes`) VALUES
(2, 'P0087', 'test1', 'complain', 'Describe your project', '2021-04-11', 'Screenshot (2).png', 'finished', 'test.txt', '2021-04-11 22:05:50', 0),
(3, 'P0087', 'test1', 'complain', 'Describe your project', '2021-04-11', 'Screenshot (2).png', 'finished', 'test.txt', '2021-04-11 22:08:01', 0),
(5, 'P0087', 'Emmanuel', 'testing', 'Describe your project', '2021-04-15', 'Screenshot (2).png', 'finished', 'test.txt', '2021-04-15 17:31:56', 0),
(10, 'P0087', 'test1', 'complain', 'Describe your project', '2021-04-23', 'libhome.png', 'finished', 'test.txt', '2021-04-23 14:36:56', 0),
(11, 'P0087', 'test1', 'TESTING', 'Describe your Article', '2021-04-23', 'Screenshot (2).png', 'finished', 'test.txt', '2021-04-23 14:47:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `count_id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=495 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`count_id`, `comment_id`, `subject`, `description`, `email_address`, `phone_number`, `first_name`, `last_name`, `commented_at`, `status`) VALUES
(450, 'NC109C', '', '', '', '', '', '', '2021-04-29 11:03:29', ''),
(449, 'NC108C', '', '', '', '', '', '', '2021-04-29 11:02:32', ''),
(448, 'NC107C', '', '', '', '', '', '', '2021-04-29 11:02:15', ''),
(446, 'NC105C', '', '', '', '', '', '', '2021-04-29 11:00:32', ''),
(447, 'NC106C', '', '', '', '', '', '', '2021-04-29 11:01:07', ''),
(444, 'NC103C', '', '', '', '', '', '', '2021-04-29 10:53:17', ''),
(445, 'NC104C', '', '', '', '', '', '', '2021-04-29 10:56:13', ''),
(443, 'NC102C', '', '', '', '', '', '', '2021-04-29 10:41:02', ''),
(441, 'NC100C', '', '', '', '', '', '', '2021-04-29 10:40:27', ''),
(442, 'NC101C', 'TESTING', '899', 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', '2021-04-29 10:40:49', ''),
(440, 'NC99C', 'TESTING', 'Lorem ipsum dolor si', 'mulongodancan25@gmai', '5667', 'Duncan', 'Dans', '2021-04-29 09:40:22', ''),
(439, 'NC98C', 'TESTING', '788', 'mulongodancan25@gmai', '6778', 'Duncan', 'Nyongesa', '2021-04-29 09:38:38', ''),
(438, 'NC97C', 'TESTING', '677', 'mulongodancan95@gmai', '6777', 'Malaba', 'Dans', '2021-04-29 09:37:08', ''),
(437, 'NC96C', 'TESTING', '677', 'mulongodancan95@gmai', '6777', 'Malaba', 'Dans', '2021-04-29 09:35:49', ''),
(436, 'NC95C', '', '', '', '', '', '', '2021-04-29 09:34:20', ''),
(435, 'NC94C', '', '', '', '', '', '', '2021-04-29 09:33:52', ''),
(434, 'NC93C', '', '', '', '', '', '', '2021-04-29 09:33:46', ''),
(433, 'NC92C', 'Test', 'tyuioytjrkj', 'mulongodancan25@gmai', '677', 'Duncan', 'Nyongesa', '2021-04-29 09:33:36', ''),
(432, 'NC91C', 'Test', 'tyuioytjrkj', 'mulongodancan25@gmai', '677', 'Duncan', 'Nyongesa', '2021-04-29 09:33:07', ''),
(431, 'NC90C', '', '', '', '', '', '', '2021-04-29 09:32:47', ''),
(430, 'NC89C', '', '', '', '', '', '', '2021-04-29 09:29:25', ''),
(429, 'NC88C', '', '', '', '', '', '', '2021-04-29 09:29:01', ''),
(428, 'NC87C', '', '', '', '', '', '', '2021-04-29 09:28:53', ''),
(427, 'NC86C', '', '', '', '', '', '', '2021-04-29 09:28:20', ''),
(426, 'NC85C', '78899', '6788', 'mulongodancan25@gmai', '899000', 'Duncan', 'Nyongesa', '2021-04-29 09:26:31', ''),
(425, 'NC84C', '', '', '', '', '', '', '2021-04-29 09:22:54', ''),
(424, 'NC83C', '', '', '', '', '', '', '2021-04-29 09:21:10', ''),
(423, 'NC82C', '', '', '', '', '', '', '2021-04-29 09:18:30', ''),
(422, 'NC81C', '', '', '', '', '', '', '2021-04-29 09:14:17', ''),
(421, 'NC80C', '', '', '', '', '', '', '2021-04-29 09:13:49', ''),
(420, 'NC79C', '', '', '', '', '', '', '2021-04-29 09:10:30', ''),
(419, 'NC78C', '', '', '', '', '', '', '2021-04-29 09:09:48', ''),
(418, 'NC77C', '', '', '', '', '', '', '2021-04-29 09:06:39', ''),
(417, 'NC76C', '', '', '', '', '', '', '2021-04-29 09:04:55', ''),
(416, 'NC75C', '', '', '', '', '', '', '2021-04-29 09:03:45', ''),
(415, 'NC74C', '', '', '', '', '', '', '2021-04-29 09:03:13', ''),
(414, 'NC73C', '', '', '', '', '', '', '2021-04-29 09:02:40', ''),
(413, 'NC72C', '', '', '', '', '', '', '2021-04-29 08:54:06', ''),
(411, 'NC70C', '', '', '', '', '', '', '2021-04-29 08:45:37', ''),
(412, 'NC71C', '', '', '', '', '', '', '2021-04-29 08:46:25', ''),
(409, 'NC68C', '', '', '', '', '', '', '2021-04-29 00:17:01', ''),
(410, 'NC69C', '', '', '', '', '', '', '2021-04-29 00:17:05', ''),
(408, 'NC67C', '', '', '', '', '', '', '2021-04-29 00:15:44', ''),
(407, 'NC66C', '', '', '', '', '', '', '2021-04-29 00:15:39', ''),
(406, 'NC65C', '', '', '', '', '', '', '2021-04-29 00:15:27', ''),
(405, 'NC64C', '', '', '', '', '', '', '2021-04-29 00:15:23', ''),
(404, 'NC63C', '', '', '', '', '', '', '2021-04-29 00:15:15', ''),
(403, 'NC62C', '', '', '', '', '', '', '2021-04-29 00:15:11', ''),
(402, 'NC61C', '', '', '', '', '', '', '2021-04-29 00:14:40', ''),
(401, 'NC60C', '', '', '', '', '', '', '2021-04-29 00:14:36', ''),
(400, 'NC59C', '', '', '', '', '', '', '2021-04-29 00:14:11', ''),
(399, 'NC58C', '', '', '', '', '', '', '2021-04-29 00:14:06', ''),
(398, 'NC57C', '', '', '', '', '', '', '2021-04-29 00:13:44', ''),
(397, 'NC56C', '', '', '', '', '', '', '2021-04-29 00:13:40', ''),
(396, 'NC55C', '', '', '', '', '', '', '2021-04-29 00:13:19', ''),
(395, 'NC54C', '', '', '', '', '', '', '2021-04-29 00:13:15', ''),
(394, 'NC53C', '', '', '', '', '', '', '2021-04-29 00:12:47', ''),
(393, 'NC52C', '', '', '', '', '', '', '2021-04-29 00:12:43', ''),
(392, 'NC51C', '', '', '', '', '', '', '2021-04-29 00:12:10', ''),
(391, 'NC50C', '', '', '', '', '', '', '2021-04-29 00:12:06', ''),
(390, 'NC49C', '', '', '', '', '', '', '2021-04-29 00:11:38', ''),
(389, 'NC48C', '', '', '', '', '', '', '2021-04-29 00:11:34', ''),
(388, 'NC47C', '', '', '', '', '', '', '2021-04-29 00:11:19', ''),
(387, 'NC46C', '', '', '', '', '', '', '2021-04-29 00:11:15', ''),
(386, 'NC45C', '', '', '', '', '', '', '2021-04-29 00:10:37', ''),
(385, 'NC44C', '', '', '', '', '', '', '2021-04-29 00:10:33', ''),
(384, 'NC43C', '', '', '', '', '', '', '2021-04-29 00:09:25', ''),
(383, 'NC42C', '', '', '', '', '', '', '2021-04-29 00:09:20', ''),
(382, 'NC41C', '', '', '', '', '', '', '2021-04-29 00:07:20', ''),
(381, 'NC40C', '', '', '', '', '', '', '2021-04-29 00:07:15', ''),
(380, 'NC39C', '', '', '', '', '', '', '2021-04-29 00:06:54', ''),
(379, 'NC38C', '', '', '', '', '', '', '2021-04-29 00:06:50', ''),
(378, 'NC37C', '', '', '', '', '', '', '2021-04-29 00:02:53', ''),
(377, 'NC36C', '', '', '', '', '', '', '2021-04-29 00:02:48', ''),
(376, 'NC35C', '', '', '', '', '', '', '2021-04-29 00:02:41', ''),
(375, 'NC34C', '', '', '', '', '', '', '2021-04-29 00:02:36', ''),
(374, 'NC33C', '', '', '', '', '', '', '2021-04-29 00:00:30', ''),
(373, 'NC32C', '', '', '', '', '', '', '2021-04-29 00:00:26', ''),
(372, 'NC31C', '', '', '', '', '', '', '2021-04-28 23:59:38', ''),
(371, 'NC30C', '', '', '', '', '', '', '2021-04-28 23:59:34', ''),
(370, 'NC29C', '', '', '', '', '', '', '2021-04-28 23:57:36', ''),
(369, 'NC28C', '', '', '', '', '', '', '2021-04-28 23:57:32', ''),
(368, 'NC27C', '', '', '', '', '', '', '2021-04-28 23:57:04', ''),
(367, 'NC26C', '', '', '', '', '', '', '2021-04-28 23:56:59', ''),
(366, 'NC25C', '', '', '', '', '', '', '2021-04-28 23:56:29', ''),
(365, 'NC24C', '', '', '', '', '', '', '2021-04-28 23:56:24', ''),
(364, 'NC23C', '', '', '', '', '', '', '2021-04-28 23:55:52', ''),
(363, 'NC22C', '', '', '', '', '', '', '2021-04-28 23:55:48', ''),
(362, 'NC21C', '', '', '', '', '', '', '2021-04-28 23:50:02', ''),
(361, 'NC20C', '', '', '', '', '', '', '2021-04-28 23:49:58', ''),
(360, 'NC19C', '', '', '', '', '', '', '2021-04-28 23:49:00', ''),
(356, 'NC15C', '', '', '', '', '', '', '2021-04-28 23:42:36', ''),
(357, 'NC16C', '', '', '', '', '', '', '2021-04-28 23:46:25', ''),
(358, 'NC17C', '', '', '', '', '', '', '2021-04-28 23:46:29', ''),
(359, 'NC18C', '', '', '', '', '', '', '2021-04-28 23:48:56', ''),
(355, 'NC14C', '', '', '', '', '', '', '2021-04-28 23:42:32', ''),
(354, 'NC13C', '', '', '', '', '', '', '2021-04-28 18:36:39', 'READ'),
(353, 'NC12C', '', '', '', '', '', '', '2021-04-27 23:28:07', 'READ'),
(352, 'NC11C', '', '', '', '', '', '', '2021-04-27 23:28:00', 'READ'),
(351, 'NC10C', '', '', '', '', '', '', '2021-04-27 23:26:45', 'READ'),
(350, 'NC9C', '', '', '', '', '', '', '2021-04-27 23:25:58', 'READ'),
(349, 'NC8C', '', '', '', '', '', '', '2021-04-27 23:25:37', 'READ'),
(348, 'NC7C', '', '', '', '', '', '', '2021-04-27 23:24:46', 'READ'),
(347, 'NC6C', '', '', '', '', '', '', '2021-04-27 23:24:42', 'READ'),
(346, 'NC5C', '', '', '', '', '', '', '2021-04-27 13:02:26', 'READ'),
(345, 'NC4C', '', '', '', '', '', '', '2021-04-27 12:42:58', 'READ'),
(344, 'NC3C', '', '', '', '', '', '', '2021-04-27 12:29:19', 'READ'),
(343, '999', 'TESTING', 'dadadas', 'mulongodancan25@gmai', '323223232', 'Duncan', 'Nyongesa', '2021-04-27 12:26:08', 'READ'),
(342, '999', '2323232', '2dddada', 'mulongodancan25@gmai', '912101121', 'Duncan', 'Nyongesa', '2021-04-27 12:25:03', 'READ'),
(451, 'NC110C', '', '', '', '', '', '', '2021-04-29 11:08:10', ''),
(452, 'NC111C', '', '', '', '', '', '', '2021-04-29 11:08:13', ''),
(453, 'NC112C', '', '', '', '', '', '', '2021-04-29 11:08:52', ''),
(454, 'NC113C', '', '', '', '', '', '', '2021-04-29 11:13:42', ''),
(455, 'NC114C', '', '', '', '', '', '', '2021-04-29 11:13:49', ''),
(456, 'NC115C', '', '', '', '', '', '', '2021-04-29 11:14:18', ''),
(457, 'NC116C', '', '', '', '', '', '', '2021-04-29 11:17:05', ''),
(458, 'NC117C', '', '', '', '', '', '', '2021-04-29 11:18:05', ''),
(459, 'NC118C', '', '', '', '', '', '', '2021-04-29 11:18:43', ''),
(460, 'NC119C', '', '', '', '', '', '', '2021-04-29 11:20:43', ''),
(461, 'NC120C', '', '', '', '', '', '', '2021-04-29 11:22:08', ''),
(462, 'NC121C', '', '', '', '', '', '', '2021-04-29 11:22:57', ''),
(463, 'NC122C', '', '', '', '', '', '', '2021-04-29 11:23:05', ''),
(464, 'NC123C', '', '', '', '', '', '', '2021-04-29 11:23:47', ''),
(465, 'NC124C', '', '', '', '', '', '', '2021-04-29 11:23:52', ''),
(466, 'NC125C', '', '', '', '', '', '', '2021-04-29 11:26:09', ''),
(467, 'NC126C', '', '', '', '', '', '', '2021-04-29 11:26:21', ''),
(468, 'NC127C', '', '', '', '', '', '', '2021-04-29 11:27:56', ''),
(469, 'NC128C', '', '', '', '', '', '', '2021-04-29 11:29:09', ''),
(470, 'NC129C', '', '', '', '', '', '', '2021-04-29 11:29:25', ''),
(471, 'NC130C', '', '', '', '', '', '', '2021-04-29 11:30:10', ''),
(472, 'NC131C', '', '', '', '', '', '', '2021-04-29 11:30:17', ''),
(473, 'NC132C', '', '', '', '', '', '', '2021-04-29 11:30:21', ''),
(474, 'NC133C', '', '', '', '', '', '', '2021-04-29 11:30:58', ''),
(475, 'NC134C', '', '', '', '', '', '', '2021-04-29 11:32:01', ''),
(476, 'NC135C', '', '', '', '', '', '', '2021-04-29 11:32:06', ''),
(477, 'NC136C', '', '', '', '', '', '', '2021-04-29 11:32:19', ''),
(478, 'NC137C', '', '', '', '', '', '', '2021-04-29 11:32:23', ''),
(479, 'NC138C', '', '', '', '', '', '', '2021-04-29 11:32:27', ''),
(480, 'NC139C', '', '', '', '', '', '', '2021-04-29 11:32:54', ''),
(481, 'NC140C', '', '', '', '', '', '', '2021-04-29 11:33:56', ''),
(482, 'NC141C', '', '', '', '', '', '', '2021-04-29 11:35:19', ''),
(483, 'NC142C', '', '', '', '', '', '', '2021-04-29 11:35:35', ''),
(484, 'NC143C', '', '', '', '', '', '', '2021-04-29 11:35:43', ''),
(485, 'NC144C', '', '', '', '', '', '', '2021-04-29 11:35:47', ''),
(486, 'NC145C', '', '', '', '', '', '', '2021-04-29 11:36:45', ''),
(487, 'NC146C', '', '', '', '', '', '', '2021-04-29 11:36:49', ''),
(488, 'NC147C', '', '', '', '', '', '', '2021-04-30 14:18:48', ''),
(489, 'NC148C', '', '', '', '', '', '', '2021-04-30 17:00:53', ''),
(490, 'NC149C', '', '', '', '', '', '', '2021-04-30 17:01:37', ''),
(491, 'NC150C', '', '', '', '', '', '', '2021-04-30 22:25:51', ''),
(492, 'NC151C', '', '', '', '', '', '', '2021-04-30 22:26:28', ''),
(493, 'NC152C', '', '', '', '', '', '', '2021-05-01 08:00:18', ''),
(494, 'NC153C', '', '', '', '', '', '', '2021-05-01 08:00:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `rawcust_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_address` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `physical_address` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rawcust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`rawcust_id`, `email_address`, `phone_number`, `first_name`, `last_name`, `physical_address`, `latitude`, `longitude`, `created_at`) VALUES
(1, 'mulongodancan25@gmai', '+254 0714757251', 'Duncan', 'Nyongesa', '', 0, 0, '0000-00-00 00:00:00'),
(3, 'pyrummanyali@gmail.c', '+254 0714757251', 'Pyrum', 'Nyongesa', '', 0, 0, '0000-00-00 00:00:00'),
(4, 'mulongodancan25@gmai', '788900', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(5, 'mulongodancan25@gmai', '3434343', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(6, 'mulongodancan25@gmai', '3434343', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(7, 'mulongodancan25@gmai', '3434343', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(9, 'mulongodancan25@gmai', '2323232', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(10, 'mulongodancan25@gmai', '2323232', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(11, 'mulongodancan25@gmai', '2323232', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(12, 'mulongodancan25@gmai', '727282', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(13, 'mulongodancan25@gmai', '434', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(14, 'mulongodancan25@gmai', '3434343', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(15, 'mulongodancan25@gmai', '3333', 'Duncan', 'Nyongesa', 'kitale', -7.27278822, -1.53633883, '0000-00-00 00:00:00'),
(16, 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(17, 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(18, 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(19, 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(20, 'mulongodancan25@gmai', '67788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(21, 'mulongodancan25@gmai', '788999', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(22, 'manu@gmail.com', '0714757251', 'Immanuel', 'Masoni', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(23, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(24, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(25, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(26, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(27, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(28, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(29, 'mulongodancan25@gmai', '', 'Malaba', 'Masoni', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(30, 'mulongodancan25@gmai', '', 'Malaba', 'Masoni', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(31, 'mulongodancan25@gmai', '', 'Malaba', 'Masoni', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(32, 'mulongodancan25@gmai', '', 'Duncan', 'Boniface', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(33, 'mulongodancan25@gmai', '', 'Duncan', 'Boniface', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(34, 'mulongodancan25@gmai', '', 'Malaba', 'Masoni', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(35, 'mulongodancan25@gmai', '', 'Malaba', 'Masoni', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(36, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(37, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(38, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(39, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(40, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(41, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(42, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(43, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(44, 'mulongodancan25@gmai', '', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(45, 'mulongodancan25@gmai', '677888', 'Duncan', 'Boniface', 'kitale', 0, 0, '0000-00-00 00:00:00'),
(50, 'mulongodancan25@gmai', '45555666', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '0000-00-00 00:00:00'),
(47, 'mulongodancan25@gmai', '071466727272', 'Duncan', 'Nyongesa', 'kitale', 7.8999, 7.8999, '0000-00-00 00:00:00'),
(48, 'mulongodancan25@gmai', '677889999', 'Mulongo', 'Duncan', 'kitale', 7.8999, 5.78999, '0000-00-00 00:00:00'),
(49, 'mulongodancan25@gmail.com', '72727272', 'Mulongo', 'Nyongesa', 'kitale', 78.9, 8.09888888, '2021-04-19 18:54:34'),
(51, 'mulongodancan05@gmail.com', '838939', 'Duncan', 'Nyongesa', 'Mombasa', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(52, 'mulongodancan05@gmail.com', '677888889', 'Mulongo', 'Nyongesa', '3243423', 8.9000009009, 5.78999, '2021-04-20 13:32:51'),
(53, 'mulongodancan25@gmail.com', '07145626', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(54, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(55, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(56, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(57, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-19 18:54:34'),
(58, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-21 15:32:36'),
(59, 'mulongodancan28@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-21 15:32:50'),
(60, 'mulongodancan85@gmail.com', '07123344', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-21 15:33:34'),
(61, 'mulongodancan25@gmail.com', '3737383', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:10:26'),
(62, 'mulongodancan25@gmail.com', '3737383', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:11:42'),
(63, 'mulongodancan25@gmail.com', '677', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:12:16'),
(64, 'mulongodancan25@gmail.com', '900000', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:15:30'),
(65, 'mulongodancan25@gmail.com', '900000', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:15:54'),
(66, 'mulongodancan25@gmail.com', '8990', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:19:11'),
(67, 'mulongodancan25@gmail.com', '5678', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:39:36'),
(68, 'mulongodancan25@gmail.com', '788899', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:40:23'),
(69, 'mulongodancan25@gmail.com', '78889', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 11:53:20'),
(70, 'mulongodancan25@gmail.com', '8', 'Duncan', 'Nyongesa', 'Mombasa', 1.0190848, 35.0060544, '2021-04-22 11:54:10'),
(71, 'mulongodancan55@gmail.com', '7888999', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:17:01'),
(72, 'mulongodancan25@gmail.com', '0998888', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:20:38'),
(73, 'mulongodancan95@gmail.com', '0998888', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:23:02'),
(74, 'mulongodancan85@gmail.com', '0998888', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:25:25'),
(75, 'mulongodancan45@gmail.com', '0998888', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:29:56'),
(76, 'mulongodancan15@gmail.com', '0998888', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-22 21:32:39'),
(77, 'mulongodancan25@gmail.com', '0743457788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-23 18:16:31'),
(78, 'mulongodancan25@gmail.com', '787899', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-24 20:25:56'),
(79, 'mulongodancan25@gmail.com', '89900', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-27 07:19:58'),
(80, 'mulongodancan85@gmail.com', '7888999', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-27 07:59:36'),
(81, 'mulongodancan25@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 11:41:37'),
(82, 'mulongodancan25@gmail.com', '099000', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 11:51:15'),
(83, 'mulongodancan25@gmail.com', '929202102', 'Duncan', 'Nyongesa', 'kitale', 1.016899, 35.009047, '2021-04-27 12:30:07'),
(84, 'mulongodancan25@gmail.com', '490000', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 12:43:44'),
(85, 'mulongodancan25@gmail.com', '900', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 12:50:24'),
(86, 'mulongodancan25@gmail.com', '900', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 12:52:07'),
(87, 'mulongodancan25@gmail.com', '900', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 12:57:16'),
(88, 'mulongodancan25@gmail.com', '8999', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 12:58:28'),
(89, 'mulongodancan25@gmail.com', '8', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 13:01:01'),
(90, 'mulongodancan25@gmail.com', '789', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0093312, '2021-04-27 13:02:55'),
(91, 'mulongodancan25@gmail.com', '000', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 35.0060544, '2021-04-29 10:29:36'),
(92, 'mulongodancan25@gmail.com', '7788', 'Duncan', 'Nyongesa', 'kitale', 1.0190848, 0, '2021-04-29 11:06:42'),
(93, 'mulongodancan95@gmail.com', '56', 'Dominic', 'Dans', 'kitale', 0, 0, '2021-04-29 18:44:48'),
(94, 'mulongodancan85@gmail.com', '0714757251', 'Duncan', 'Nyongesa', 'kitale', 0, 0, '2021-04-30 17:01:33'),
(95, 'mulongodancan875@gmail.com', '889', 'Duncan', 'Nyongesa', 'kitale', -1.2877824, 36.8345088, '2021-04-30 22:26:23'),
(96, 'mulongodancan25@gmail.com', '88999', 'Duncan', 'Nyongesa', 'kitale', -1.2877824, 36.8345088, '2021-04-30 22:27:24'),
(97, 'manu@gmail.com', '8899', 'Duncan', 'Nyongesa', 'kitale', -1.2877824, 36.8345088, '2021-04-30 22:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `rawequ_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipment_id` varchar(30) NOT NULL,
  `equipment_name` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `unit_price` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `profile_pic` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rawequ_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`rawequ_id`, `equipment_id`, `equipment_name`, `quantity`, `unit_price`, `category_id`, `profile_pic`, `description`, `created_at`) VALUES
(33, 'P0087', '787', '1', '678', '7', 'admin design.png', 'Describe your projec', '2021-04-27 22:36:42'),
(32, 'P0087', '787', '1', '678', '7', 'admin design.png', 'Describe your projec', '2021-04-27 22:36:16'),
(29, 'P0087', '787', '678', '898', '1', 'big construction.jpg', 'Í have described it', '2021-04-05 21:52:00'),
(30, 'P0087', 'Tractor', '56', '676', '7', 'Screenshot (1).png', 'Describe your projec', '2021-04-05 22:49:11'),
(34, 'P0087', '3ew', '7', '788', '7', 'admin design.png', 'Describe your projec', '2021-04-27 22:39:11'),
(26, 'P0087', 'Tractor', '56', '676', '7', 'wheel tractor.jpg', 'Describe your projec', '2021-04-05 21:50:51'),
(25, 'P0087', 'Mixer', '434', '343', '1', 'bulldozer.jpg', 'Describe your projec', '2021-04-05 16:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE IF NOT EXISTS `equipment_type` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`category_id`, `category`) VALUES
(1, 'vehicle'),
(7, 'roller');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE IF NOT EXISTS `hire` (
  `rawhir_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rawcust_id` varchar(30) NOT NULL,
  `hire_id` varchar(30) NOT NULL,
  `rawequ_id` varchar(30) NOT NULL,
  `hire_number` varchar(30) NOT NULL,
  `total_price` varchar(30) NOT NULL,
  `date_hired` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `hired_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rawhir_id`),
  KEY `rawequ_id` (`rawequ_id`),
  KEY `rawcust_id` (`rawcust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`rawhir_id`, `rawcust_id`, `hire_id`, `rawequ_id`, `hire_number`, `total_price`, `date_hired`, `deadline`, `status`, `hired_at`) VALUES
(4, 'mulongodancan25@gmai', '232021 /_48502', '30', 'N_232021 /2', '676', '2021-04-23', '2021-04-09', 'complete', '2021-04-23 18:16:31'),
(3, 'mulongodancan25@gmai', '192021 /_50501', '29', 'N_192021 /1', '60166', '2021-04-20', '2021-04-20', 'complete', '2021-04-19 16:31:56'),
(5, 'mulongodancan25@gmai', '242021 /_12683', '26', 'N_242021 /3', '4056', '2021-04-24', '2021-04-22', 'complete', '2021-04-24 20:25:56'),
(7, 'mulongodancan25@gmail.com', '302021 /_57694', '33', 'N_302021 /4', '6033522', '2021-04-30', '2021-04-16', 'incomplete', '2021-04-30 22:27:24'),
(8, 'manu@gmail.com', '302021 /_39175', '33', 'N_302021 /5', '527484', '2021-04-30', '2021-04-30', 'incomplete', '2021-04-30 22:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `location_address` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `name`, `location_address`, `longitude`, `latitude`, `type`, `created_at`) VALUES
(7, 'Single Origin Roasters', '60-64 Reservoir Stre', '151.209656', '-33.881123', 'restaurant', '2021-04-26 10:47:05'),
(4, 'The Potting Shed', '7A, 2 Huntley Street', '151.194168', '-33.910751', 'bar', '2021-03-26 10:47:05'),
(5, 'Nomad', '16 Foster Street, Su', '151.210449', '-33.879917', 'bar', '2021-03-26 10:47:05'),
(6, 'Three Blue Ducks', '43 Macpherson Street', '151.263763', '-33.906357', 'restaurant', '2021-03-26 10:47:05'),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 ', '151.207474', '-33.840282', 'bar', '2021-03-26 10:47:05'),
(2, 'Young Henrys', '76 Wilford Street, N', '151.174469', '-128.66363636', 'bar', '2021-04-26 10:47:05'),
(11, 'Love.Fish', '580 Darling Street, ', '151.171936', '-33.861034', 'restaurant', '2021-03-26 10:47:05'),
(8, 'Red Lantern', '60 Riley Street, Dar', '151.215530', '-33.874737', 'restaurant', '2021-03-26 10:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `rawmat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `material_name` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `unit_price` varchar(35) NOT NULL,
  `profile_pic` varchar(30) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rawmat_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`rawmat_id`, `material_id`, `category_id`, `material_name`, `quantity`, `unit_price`, `profile_pic`, `status`, `description`, `registered_at`) VALUES
(18, 'P0087', '5', 'cement', '261', '3343', 'Screenshot (2).png', 'active', 'Describe your projec', '2021-04-04 09:50:03'),
(17, 'P0087', '7', 'metal', '63', '3434', 'room2.jpeg', 'active', 'Describe your projec', '2021-04-04 09:49:46'),
(16, 'P0087', '7', 'sand', '6205', '343', 'colored houses.jpg', '', 'Describe your projec', '2021-04-04 09:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE IF NOT EXISTS `material_type` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`category_id`, `category`) VALUES
(5, 'finished3'),
(7, 'ongoing2');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE IF NOT EXISTS `myorder` (
  `raword_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_address` varchar(30) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `rawmat_id` varchar(30) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `order_date` date DEFAULT NULL,
  `quantity` int(30) NOT NULL,
  `total_price` varchar(30) NOT NULL,
  `paid` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`raword_id`),
  KEY `rawcust_id` (`email_address`),
  KEY `rawmat_id` (`rawmat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`raword_id`, `email_address`, `order_id`, `rawmat_id`, `order_number`, `order_date`, `quantity`, `total_price`, `paid`, `status`, `ordered_at`) VALUES
(55, 'mulongodancan25@gmail.com', '27202182081', '18', 'N2720211', '2021-04-27', 10000, '20058', '60174', 'complete', '2021-04-27 13:02:55'),
(57, 'mulongodancan85@gmail.com', '30202191042', '16', 'N3020212', '2021-04-30', 6, '2058', '2058', 'complete', '2021-04-30 17:01:33'),
(58, 'mulongodancan875@gmail.com', '30202154373', '17', 'N3020213', '2021-04-30', 78, '267852', '', 'incomplete', '2021-04-30 22:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `count_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `profile_pic` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`count_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`count_id`, `project_id`, `category_id`, `project_name`, `start_date`, `end_date`, `status`, `profile_pic`, `description`, `created_at`) VALUES
(22, 'P0087', '8', 'duncan', '2021-04-28', '2021-04-28', 'ongoing', 'houe.jpg', 'Describe your project', '2021-04-04 09:16:11'),
(21, 'P0087', '7', 'test', '2021-04-28', '2021-05-05', 'ongoing', 'compete.jpg', 'Describe your project', '2021-04-04 09:15:35'),
(20, 'P0087', '8', 'duncan', '2021-04-28', '2021-04-29', 'Active', 'big construction.jpg', 'Describe your project', '2021-04-04 09:15:04'),
(18, 'P0087', '7', 'hoising', '2021-04-07', '2021-04-07', '', 'bech houe.jpg', 'Describe your project', '2021-04-04 09:13:03'),
(19, 'P0087', '7', 'hoising', '2021-04-07', '2021-04-07', 'Active', 'bech houe.jpg', 'Describe your project', '2021-04-04 09:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE IF NOT EXISTS `project_type` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`category_id`, `category`) VALUES
(1, ''),
(5, 'finished'),
(7, 'ongoing'),
(8, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `rawtra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `rawcust_id` varchar(30) NOT NULL,
  `rawmat_id` varchar(30) NOT NULL,
  `transaction_number` varchar(30) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `quantity` int(30) NOT NULL,
  `total_price` varchar(30) NOT NULL,
  `balance` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `transacted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rawtra_id`),
  KEY `rawmat_id` (`rawmat_id`),
  KEY `rawcust_id` (`rawcust_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`rawtra_id`, `transaction_id`, `rawcust_id`, `rawmat_id`, `transaction_number`, `transaction_date`, `quantity`, `total_price`, `balance`, `status`, `transacted_at`) VALUES
(153, '22202134496', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-30', 0, '34', '-10', 'complete', '2021-04-22 10:14:24'),
(154, '22202118626', 'mulongodancan05@gmail.com', '18', 'N2220216', '2021-04-14', 0, '10000000', '-9549744', 'complete', '2021-04-22 10:24:07'),
(155, '22202185916', 'mulongodancan85@gmail.com', '18', 'N2220216', '2021-04-14', 0, '10000000', '-9993314', 'complete', '2021-04-22 10:25:14'),
(156, '22202173926', 'mulongodancan85@gmail.com', '18', 'N2220216', '2021-04-14', 0, '10000000', '-9993314', 'complete', '2021-04-22 10:27:33'),
(157, '22202155513', 'mulongodancan25@gmail.com', '16', 'N2220213', '2021-04-14', 0, '79', '-1', 'complete', '2021-04-22 10:33:58'),
(158, '22202158552', 'mulongodancan05@gmail.com', '18', 'N2220212', '2021-04-14', 0, '473256', '-473256', 'complete', '2021-04-22 10:54:22'),
(152, '22202146506', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1234242', '-1232527', 'complete', '2021-04-22 10:09:32'),
(151, '22202135926', 'mulongodancan05@gmail.com', '18', 'N2220216', '2021-04-14', 0, '4000000', '-3849945', 'complete', '2021-04-22 10:03:25'),
(150, '22202151536', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-14', 0, '10000000', '-9998285', 'incomplete', '2021-04-22 10:01:28'),
(149, '22202194546', 'mulongodancan05@gmail.com', '18', 'N2220216', '2021-04-14', 0, '190', '149865', 'complete', '2021-04-22 09:59:33'),
(148, '22202113366', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1000', '715', 'incomplete', '2021-04-22 09:50:20'),
(147, '22202170856', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1000', '715', 'incomplete', '2021-04-22 09:42:01'),
(146, '22202133496', 'mulongodancan25@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1000', '715', 'incomplete', '2021-04-22 09:40:56'),
(145, '22202146486', 'mulongodancan05@gmail.com', '18', 'N2220216', '2021-04-14', 0, '1000', '149055', 'complete', '2021-04-22 09:38:38'),
(144, '22202171076', 'mulongodancan05@gmail.com', '18', 'N2220216', '2021-04-14', 0, '1000', '149055', 'complete', '2021-04-22 09:37:17'),
(143, '22202158996', 'mulongodancan28@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1000', '715', 'complete', '2021-04-22 09:35:57'),
(142, '22202159886', 'mulongodancan28@gmail.com', '16', 'N2220216', '2021-04-14', 0, '1715', '0', 'complete', '2021-04-22 09:35:28'),
(165, '23202154307', 'mulongodancan55@gmail.com', '16', 'N2320217', '2021-04-14', 0, '343', '0', 'complete', '2021-04-23 21:43:17'),
(160, '22202139843', 'mulongodancan25@gmail.com', '18', 'N2220213', '2021-04-14', 0, '23401', '-1500', 'complete', '2021-04-22 11:48:38'),
(161, '22202138812', 'mulongodancan25@gmail.com', '16', 'N2220212', '2021-04-14', 0, '1000', '-285', 'complete', '2021-04-22 11:51:29'),
(162, '22202134903', 'mulongodancan25@gmail.com', '16', 'N2220213', '2021-04-14', 0, '10000', '-9084', 'complete', '2021-04-22 12:10:52'),
(163, '22202163232', 'mulongodancan25@gmail.com', '17', 'N2220212', '2021-04-14', 0, '27472', '-400', 'complete', '2021-04-22 12:16:42'),
(164, '22202185502', '', '29', 'N2220212', '2021-04-14', 0, '60166', '', 'complete', '2021-04-22 12:40:48'),
(166, '23202121496', 'mulongodancan25@gmail.com', '17', 'N2320216', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 21:54:02'),
(167, '23202148685', 'mulongodancan15@gmail.com', '17', 'N2320215', '2021-04-14', 0, '17170', '0', 'complete', '2021-04-23 21:57:18'),
(168, '23202122965', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:06:16'),
(169, '23202114525', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:11:37'),
(170, '23202198975', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:12:14'),
(171, '23202129335', 'mulongodancan85@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '-10000', 'complete', '2021-04-23 22:12:58'),
(172, '23202181445', 'mulongodancan15@gmail.com', '17', 'N2320215', '2021-04-15', 0, '17170', '-10000', 'complete', '2021-04-23 22:13:32'),
(173, '23202156445', 'mulongodancan45@gmail.com', '17', 'N2320215', '2021-04-14', 0, '17170', '0', 'complete', '2021-04-23 22:18:55'),
(174, '23202147015', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:19:22'),
(175, '23202188865', 'mulongodancan45@gmail.com', '17', 'N2320215', '2021-04-14', 0, '17170', '0', 'complete', '2021-04-23 22:19:52'),
(176, '23202187865', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:22:08'),
(177, '23202120665', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:22:33'),
(178, '23202118815', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:22:45'),
(179, '23202141735', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '7272772', '-7248734', 'complete', '2021-04-23 22:23:20'),
(180, '23202150585', 'mulongodancan95@gmail.com', '17', 'N2320215', '2021-04-14', 0, '24038', '0', 'complete', '2021-04-23 22:26:07'),
(181, '23202190875', 'mulongodancan85@gmail.com', '17', 'N2320215', '2021-04-14', 0, '90000', '-75962', 'complete', '2021-04-23 22:26:35'),
(182, '23202117225', 'mulongodancan45@gmail.com', '17', 'N2320215', '2021-04-14', 0, '17170', '-1000', 'complete', '2021-04-23 22:26:50'),
(183, '24202164135', 'mulongodancan45@gmail.com', '17', 'N2420215', '2021-04-14', 0, '17170', '-18170', 'complete', '2021-04-24 14:06:56'),
(184, '24202177525', 'mulongodancan45@gmail.com', '17', 'N2420215', '2021-04-14', 0, '17170', '-35340', 'complete', '2021-04-24 14:10:18'),
(185, '24202187073', '', '30', 'N2420213', '2021-04-14', 0, '676', '', 'complete', '2021-04-24 14:28:47'),
(186, '25202125495', 'mulongodancan15@gmail.com', '17', 'N2520215', '2021-04-14', 0, '17170', '-10000', 'complete', '2021-04-25 17:13:19'),
(187, '25202147215', 'mulongodancan15@gmail.com', '17', 'N2520215', '2021-04-14', 0, '17170', '-27170', 'complete', '2021-04-25 23:14:02'),
(188, '25202179245', 'mulongodancan15@gmail.com', '17', 'N2520215', '2021-04-25', 0, '17170', '-44340', 'complete', '2021-04-25 23:16:37'),
(189, '27202189054', '', '30', 'N2720214', '2021-04-14', 0, '676', '', 'complete', '2021-04-27 23:21:33'),
(190, '27202118952', 'mulongodancan25@gmail.com', '18', 'N2720212', '2021-04-27', 0, '20058', '0', 'complete', '2021-04-27 23:21:58'),
(191, '27202135694', '', '26', 'N2720214', '2021-04-14', 0, '4056', '', 'complete', '2021-04-27 23:23:09'),
(192, '28202145462', 'mulongodancan25@gmail.com', '18', 'N2820212', '2021-04-28', 0, '20058', '-20058', 'complete', '2021-04-28 21:43:35'),
(193, '292021985751', 'mulongodancan95@gmail.com', '18', 'N29202151', '2021-04-29', 0, '16715', '', 'complete', '2021-04-29 18:44:48'),
(194, '30202139702', 'mulongodancan25@gmail.com', '18', 'N3020212', '2021-04-30', 10000, '20058', '-40116', 'complete', '2021-04-30 16:59:37'),
(195, '30202140213', 'mulongodancan85@gmail.com', '16', 'N3020213', '2021-04-30', 6, '2058', '0', 'complete', '2021-04-30 17:02:00');
