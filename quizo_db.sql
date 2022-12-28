-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2022 at 04:45 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
CREATE TABLE IF NOT EXISTS `admin_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `name`, `username`, `password`, `create_date`) VALUES
(6, 'Admin', 'Admin', '$2y$10$XhZJFtY3AkK8YvVvEf1Kz.M.vEWiDPb42X6iVBwRINO9kfSiTUBMe', '1672152318');

-- --------------------------------------------------------

--
-- Table structure for table `configuration_tb`
--

DROP TABLE IF EXISTS `configuration_tb`;
CREATE TABLE IF NOT EXISTS `configuration_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_quiz_name` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `show_page_title` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `show_logo` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `allow_cut` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `allow_copy` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `allow_paste` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `allow_right_mouse_click` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `allow_print` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `set_theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configuration_tb`
--

INSERT INTO `configuration_tb` (`id`, `page_id`, `page_name`, `show_quiz_name`, `show_page_title`, `show_logo`, `allow_cut`, `allow_copy`, `allow_paste`, `allow_right_mouse_click`, `allow_print`, `set_theme`) VALUES
(2, 3, 'Operating System', '', '', '', '', '', '', '', '', '#20211f'),
(4, 2, 'Algorithm & Analysis', '', '', '', '', '', '', '', '', '#aaacaa'),
(7, 1, 'Computer Fundamentals', '', '', '', '', '', '', 'on', '', '#000000'),
(10, 16, 'Machine Learning', 'on', 'on', 'on', '', 'on', '', 'on', 'on', ''),
(11, 15, 'Artificial Intelligence', '', '', '', 'on', 'on', '', '', 'on', '#800080'),
(12, 17, 'Artificial intelegence', '', '', '', '', 'on', 'on', 'on', '', '#808040'),
(13, 19, '', '', '', '', 'on', 'on', 'on', 'on', 'on', '#047623');

-- --------------------------------------------------------

--
-- Table structure for table `grading_tb`
--

DROP TABLE IF EXISTS `grading_tb`;
CREATE TABLE IF NOT EXISTS `grading_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fail_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_percentage` int(11) NOT NULL,
  `pass_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_percentage` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grading_tb`
--

INSERT INTO `grading_tb` (`id`, `fail_grade`, `max_percentage`, `pass_grade`, `min_percentage`, `page_id`) VALUES
(1, 'Better Luck Next Time', 33, 'Congratulations', 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notice_tb`
--

DROP TABLE IF EXISTS `notice_tb`;
CREATE TABLE IF NOT EXISTS `notice_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_tb`
--

INSERT INTO `notice_tb` (`id`, `notice`, `email`, `create_date`) VALUES
(3, 'All the students have to submit their project report on 26th of december, 2022.', '', '1671994432'),
(2, '4th semester students of batch 2020 are informed that their viva is scheduled on 30th of Dec, 2022.', '', '1671993080'),
(4, 'All the students of 1st semester of Physics, University of Kashmir are informed that their examination will held at 2:00 PM instead of 11:00 AM', 'waniaariz605@gmail.com', '1672025931');

-- --------------------------------------------------------

--
-- Table structure for table `page_tb`
--

DROP TABLE IF EXISTS `page_tb`;
CREATE TABLE IF NOT EXISTS `page_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_class` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat',
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `set_unset` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_tb`
--

INSERT INTO `page_tb` (`id`, `page_name`, `semester_class`, `description`, `start_date`, `end_date`, `start_time`, `end_time`, `email`, `create_date`, `set_unset`) VALUES
(1, 'Computer Fundamentals', 1, '1st Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006\r\n', '1671408000', '1672531200', '1672228800', '1672244880', 'waniaariz605@gmail.com', '1672224983', 1),
(2, 'Algorithm & Analysis', 1, '1st Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006', '1671408000', '1672099200', '1672142040', '1672163100', 'waniaariz605@gmail.com', '1672142430', 1),
(3, 'Operating System', 1, '2nd Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006', '1671408000', '1672185600', '1672040940', '1672099080', 'waniaariz605@gmail.com', '1672077094', 1),
(7, 'crypto', 3, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', '1671408000', '1671408000', '453453645', '45345354365', 'mohammadyawar123@gmai.com', '1666872248', 0),
(8, 'Operating System', 2, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', '1671408000', '1671408000', '453464654', '645646456', 'mohammadyawar123@gmai.com', '1666872326', 0),
(9, 'Complexity of Time Analysis', 2, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', '1671408000', '1671408000', '3456354646', '5434684565', 'mohammadyawar123@gmai.com', '1666872334', 0),
(12, 'Networking Communication', 0, '4th Semester <br> Department of Information Technology <br> University of Kashmir - 190006', '1671408000', '1671408000', '544654554', '544242453', 'waniaariz605@gmail.com', '1668453436', 0),
(15, 'Artificial Intelligence', 1, 'University of Delhi', '1671408000', '1671408000', '1671448320', '1671412320', 'waniaariz605@gmail.com', '1671449642', 0),
(16, 'Machine Learning', 1, 'Departmrnt of Electronics, University of Jammu', '1671667200', '1671667200', '1671703920', '1671707520', 'yawar@gmail.com', '1671714417', 0),
(17, 'Artificial intelegence', 1, 'AI paper\r\n', '1672012800', '1672099200', '1672135200', '1672142280', 'yawar123@gmail.com', '1672119891', 1),
(18, 'urdu', 1, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', '1671840000', '1672531200', '1672165500', '1672167600', 'urdu@gmail.com', '1672145658', 0),
(19, 'Education', 1, 'Department of Education\r\n<br>\r\nUniversity of Kashmir', '1672185600', '1672444800', '1672221600', '1672200000', 'waniaariz605@gmail.com', '1672214815', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank_tb`
--

DROP TABLE IF EXISTS `question_bank_tb`;
CREATE TABLE IF NOT EXISTS `question_bank_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_bank_tb`
--

INSERT INTO `question_bank_tb` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `page_id`) VALUES
(1, 'Which part of CPU is responsible for mathematical calculations?', 'Arithmetic Logic Unit', 'Control Unit', 'Graphics Processing Unit', 'None of the above', 'Arithmetic Logic Unit', 1),
(3, 'What are three primary pixels of computer graphics?', 'RGB', 'YGB', 'WGB', 'CYMK', 'RGB', 1),
(4, 'What is the time complexity of Binary Search?', 'n<sup>2</sup>', 'Logn', 'n<sup>3</sup>', 'None of the above', 'Logn', 2),
(5, 'Which algorithm performs better?', 'Binary Search', 'Quick Sort', 'Bubble Sort', 'None of the above', 'Binary Search', 2),
(7, 'What is the time complexity of Min_Max Algo?', 'O(b<sup>m</sup>)', 'O(logn)', 'O(nlogn)', 'None of the above', 'O(b<sup>m</sup>)', 2),
(8, 'What is the worst case time complecity among the following?', 'n^2', 'n^3', 'n!', 'None of the above', 'n^3', 2),
(9, 'In Which genenration vacums tubes were replaced by transistors?', '1st Generation', '2nd Generation', '3rd Generation', '4th Generation', '3rd Generation', 3),
(10, 'Which Operating System in used by Apple Inc ?', 'Macantosh', 'Windows', 'Ubuntu', 'Solaris', 'Macantosh', 3),
(12, 'What is operating system', 'it is a medium between user and hardware', 'it is app soft', 'hardware', 'non  of the above', 'it is a medium between user and hardware', 8),
(13, 'Which of the following is output device?', 'Monitor', 'Mouse', 'Keyboard', 'Microphone', 'Monitor', 1),
(14, 'Random Forest is type of ________________ type of algorithm?', 'Linear Regression', 'Supervised Learning', 'Unsupervised Learning', 'None of the Above', 'Unsupervised Learning', 16),
(15, 'Following is/are the types of Artificial Intelligence?', 'Machine Learning', 'Deep Learning', 'Both A & B', 'None of the above', 'Both A & B', 16),
(16, 'Who is the first AI Bot that received a citizenship of a country?', 'Sophia', 'Anna', 'Zara', 'Maya', 'Sophia', 16),
(17, 'Which among the following is better algorithm for performance?', 'Binary Search', 'Linear Search', 'Quick Sort Algorithm', 'None of the above', 'Binary Search', 2),
(20, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(21, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(23, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(24, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(25, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(26, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(28, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(29, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(30, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(31, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(32, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(33, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(34, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 8),
(35, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(36, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(37, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(39, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(40, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(41, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(43, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(44, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(45, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(46, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(47, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(48, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(49, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(50, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 8),
(51, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(52, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(53, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(54, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(55, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(56, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(57, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(58, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(59, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(60, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(61, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(62, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(63, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(64, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(65, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(66, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 8),
(67, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(68, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(69, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(70, 'Which among the following is an input device?', 'Mouse', 'Speaker', 'Display', 'None of the above', 'Mouse', 1),
(71, 'Father of AI', 'Alan Turing', 'John McCarthy', 'charles babage', 'none', 'John McCarthy', 17),
(72, 'the preposition symbols in AI are', 'true and false', 'ture', 'false ', 'non', 'true and false', 17),
(73, 'which of the following are informed search methods', 'best first search', 'A* search', 'only one', 'both ', 'both ', 17),
(74, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(75, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(76, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(77, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(78, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(79, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(80, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(81, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(82, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(83, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2),
(84, 'What is Algorithm?', 'Step by step process', 'Pictorial Representation', 'Flow o data', 'None of the above', 'Step by step process', 2);

-- --------------------------------------------------------

--
-- Table structure for table `record_tb`
--

DROP TABLE IF EXISTS `record_tb`;
CREATE TABLE IF NOT EXISTS `record_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `record_tb`
--

INSERT INTO `record_tb` (`id`, `paper_id`, `student_id`, `question_id`, `result`) VALUES
(143, 17, 48, 73, 'correct'),
(142, 17, 48, 72, 'correct'),
(141, 17, 48, 71, 'correct'),
(131, 1, 50, 33, 'correct'),
(130, 1, 50, 32, 'wrong'),
(129, 1, 50, 31, 'wrong'),
(128, 1, 50, 30, 'wrong'),
(127, 1, 50, 29, 'correct'),
(126, 1, 50, 28, 'correct'),
(125, 1, 50, 26, 'wrong'),
(124, 1, 50, 25, 'wrong'),
(123, 1, 50, 24, 'wrong'),
(122, 1, 50, 23, 'wrong'),
(121, 1, 50, 21, 'wrong'),
(120, 1, 50, 20, 'correct'),
(119, 1, 50, 13, 'wrong'),
(118, 1, 50, 3, 'correct'),
(117, 1, 50, 1, 'wrong'),
(116, 3, 30, 10, 'wrong'),
(115, 3, 30, 9, 'correct'),
(144, 1, 19, 31, 'wrong'),
(145, 1, 19, 45, 'wrong'),
(146, 1, 19, 20, 'correct'),
(147, 1, 19, 54, 'correct'),
(148, 1, 19, 24, 'correct'),
(149, 1, 19, 70, 'wrong');

-- --------------------------------------------------------

--
-- Table structure for table `response_tb`
--

DROP TABLE IF EXISTS `response_tb`;
CREATE TABLE IF NOT EXISTS `response_tb` (
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `response_tb`
--

INSERT INTO `response_tb` (`user_id`, `id`, `paper_id`, `student_id`, `question_id`, `answer`, `result`) VALUES
(0, 112, 3, 30, 9, '3rd Generation', 'correct'),
(0, 140, 17, 48, 73, 'both ', 'correct'),
(0, 139, 17, 48, 72, 'true and false', 'correct'),
(0, 138, 17, 48, 71, 'John McCarthy', 'correct'),
(0, 128, 1, 50, 33, 'Mouse', 'correct'),
(0, 127, 1, 50, 32, 'None of the above', 'wrong'),
(0, 126, 1, 50, 31, 'None of the above', 'wrong'),
(0, 125, 1, 50, 30, 'Display', 'wrong'),
(0, 124, 1, 50, 29, 'Mouse', 'correct'),
(0, 123, 1, 50, 28, 'Mouse', 'correct'),
(0, 122, 1, 50, 26, 'Speaker', 'wrong'),
(0, 121, 1, 50, 25, 'Display', 'wrong'),
(0, 120, 1, 50, 24, 'None of the above', 'wrong'),
(0, 119, 1, 50, 23, 'Display', 'wrong'),
(0, 118, 1, 50, 21, 'Speaker', 'wrong'),
(0, 117, 1, 50, 20, 'Mouse', 'correct'),
(0, 116, 1, 50, 13, 'Keyboard', 'wrong'),
(0, 115, 1, 50, 3, 'RGB', 'correct'),
(0, 114, 1, 50, 1, 'Control Unit', 'wrong'),
(0, 113, 3, 30, 10, 'Ubuntu', 'wrong'),
(0, 141, 1, 19, 31, 'Display', 'wrong'),
(0, 142, 1, 19, 45, 'Speaker', 'wrong'),
(0, 143, 1, 19, 20, 'Mouse', 'correct'),
(0, 144, 1, 19, 54, 'Mouse', 'correct'),
(0, 145, 1, 19, 24, 'Mouse', 'correct'),
(0, 146, 1, 19, 70, 'None of the above', 'wrong');

-- --------------------------------------------------------

--
-- Table structure for table `result_tb`
--

DROP TABLE IF EXISTS `result_tb`;
CREATE TABLE IF NOT EXISTS `result_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `wrong_answers` int(11) NOT NULL,
  `percentage` double NOT NULL,
  `paper_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_tb`
--

INSERT INTO `result_tb` (`id`, `student_id`, `student_name`, `enrollment_no`, `correct_answers`, `wrong_answers`, `percentage`, `paper_id`) VALUES
(32, 50, 'Mohammad Yawar', '20045110019', 5, 42, 10.64, 1),
(17, 26, 'Zakir Ahmad Wani', '20045110044', 1, 0, 100, 3),
(40, 19, 'Zakir Ahmad Wanii', '20045110046', 3, 44, 6.38, 1),
(16, 32, 'Jhoota', '2558878451', 1, 2, 33.33, 16),
(31, 30, 'Mohammad Yawar', '119', 1, 1, 50, 3),
(37, 48, 'Mohammad Yawar', '20045110019', 3, 0, 100, 17);

-- --------------------------------------------------------

--
-- Table structure for table `school_info_tb`
--

DROP TABLE IF EXISTS `school_info_tb`;
CREATE TABLE IF NOT EXISTS `school_info_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_info_tb`
--

INSERT INTO `school_info_tb` (`id`, `school_name`, `school_description`, `email`, `create_date`) VALUES
(1, 'Department of Computer Science', 'University of Kashmir, Jammu & Kashmir, India', 'waniaariz605@gmail.com', '1671539524'),
(2, 'Department of Education', 'Department of Education , University of Kashmir', 'yawar@gmail.com', '1671702453');

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

DROP TABLE IF EXISTS `student_tb`;
CREATE TABLE IF NOT EXISTS `student_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_id` bigint(20) NOT NULL,
  `block_unblock_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`id`, `name`, `enrollment_no`, `password`, `paper_id`, `block_unblock_status`) VALUES
(20, 'Suhail Ahmad Bhat', '20045110040', 'd40b4edbba0c354197a7aa73fb77b459c1aadad08bba2f3d5b340d4bd5ed0c96bb8c72d5ced2031bfee0d6639ea5dc6eb9f845e963ed35a53f01c5368d38f598zb4Oxgyfl/Wef+NH/MQv+J94VTmlXmDu0VobjBdJqFPBO9yRKVYrHmAQHRSiRikl', 2, 0),
(19, 'Zakir Ahmad Wanii', '20045110046', 'c850c447d62c402174ab55a647e31c6c72ca69f265d4f96b64ef2f04df14a9ce2bf857b6eb40dbc24f0b8a9ce114106a606d7c1ea6f7d7dcbc6f76034eca9f14/jmp/k3uSgHotLjpHX+RPfZFILtvrbet5FAwhFo2j7rc8u/iy6/GkMsBRqPs44sx', 1, 0),
(21, 'Zoon', '20045110044', 'cc71ee847d7d98fbcec8d094c44a9b3f234b415e853a8a7b61493b4c7b6e5b39db727a5ad917d5813aeeaf1f5702709e70f341f571d337bf5a5e3f8d801846f4dTi0soRiAFA/1Yaw1nqNheQixt4i/0PCuas7nLaCTw9vCm1vwRaLDA5ovzPKSlJb', 1, 0),
(22, 'Zakir Ahmad Wani', '20045110044', 'dc86b8502a7995823391ef11edef9a7c1ea6cadb430189c683587d612d5f5e48a1ae2937e82fdbd207fadc811b253eeab67d750f1677768bd5f76ab1b2351972j5yaWQ0bSkDOv8F/p53qlkbw5otNCc+owWX3KS6K5QHVQ4ruu392fi6Sq5E3vrXH', 2, 0),
(33, 'muzamil', '885', '362ea68b28b0e5a37ed1ae8fa485c44eef1e6cb92ae08b5e9888d9e819cb8802ab95f16e2fa5fddc7159a95f8cecf4f0a77ac402ce8e433a9732b8e9b55dd77f8PUCuGmRUEVYlF3kdGIHVk6WICI95fNIN8baqII+coU=', 3, 1),
(34, 'zakir ahmad wani', '20045112258', '6779020fc4d4076ba133f807db01b15daf7bd8aa404d0c67f4dfafa60afc7498357e2e67667368fed7edb785955f812d0c1d16dd3d6e722bd3073df1b3f11e8aXg9CGYQk9a2Wg0OyGt5IS936nt9UGdoFZJWQzp3H07wvSJ4vK6r0/8HktjnY9IvM', 3, 0),
(35, 'junaid', '20045112278', '555fb5c7d2b7bf040ee21902be1b6c5500e5f9cc0a16b48f3dedae38942a5db5cefdb82ded4364dc7618bf437ca4eef3254bfb8f68c3da418e3dfdba19342d40pihfXmdC0LVse0NdFgPZMXwarnPFg8OYMeyjBwD+x8289rX+Mx67TOWo+niMNA4q', 3, 0),
(26, 'Zakir Ahmad Wani', '20045110044', '3f90afd11b0e8cff5dfd0380ed4b9fd8943e8ec1ed0e1fff4f74c637abe382df494709f3d02c6722166ba761acca883dfc56caec5738abb55250daffbbb4a01aitd0g9wjo1MXtwDbdRysqWSTzJYeXDHsLbJKrsiut+MFEXt6TDfcksgLIwBwPb3s', 3, 0),
(27, 'Zoon Wani', '20045110045', '846a72662a79716cb3df739caaee078bcd16430dd0f64bf4dc3eba4c982470721721af9c0a3855b57dfdab582abec2821a34b5d26631b90ed931d7b081d6cdcb2bXgM82o8EbvEV2SaY2wknz/Oa5Xzsb3tJpJsnU+x4ANIYLH6XRl53VospkZajzA', 3, 0),
(30, 'Mohammad Yawar', '119', '79cb757ace6de1e7a10717a628c488dc629bdd78c8535088476515f39570e3e6b07c75de7a664252ad415b310006ce8c053bb025fe0fc773d8dd66d74838244cO9H2B0Z8yuTNIQ7+szzeAN8n0vtmFXrYCoDbKmUaMvA=', 3, 0),
(31, 'Junaid Beig', '120', '3e7807c2c6615033165fe8cb0601a0b5fc4da8665050079a83662b9eb1c868256f48ee49ba0a9f12f3409e9f065bd32566af58281a5c8d75c11254bd99e0218fyNs895ZHHbmOBIVyEehamKTkmZZ0ctpAbTbfE1YqQ2Y=', 3, 0),
(32, 'Jhoota', '2558878451', '5f909f37e61301be4e4baa9b1f8ff54d2ac9517138f80887a3809f3ed9c9348d52b364974cad8766ecb48d57f5bb3f7048e5703875a72c0aea5a239814cee8e3WTwSq9lS1kJ5mtfDntDRfacck83RmS6b73yt5ROgNB95BtW+LXvYXloXmqmnjl9g', 16, 0),
(36, 'muzamil', '20045112298', '79e13cbccd6a698678b720faf6fd048e7bb6dfc33bcf9e4a80dfb118a6b3edba141e76f8ecbe15345fcb30485425d6df536ad4174920b804b6115b9a3805168aEnsflM1uAdFGD8BJq314AGgPGTKEM/ISzkfXffg6yiY9TeeGpTrSzzjoLVQ+U89S', 3, 0),
(37, 'nabeel', '20045112318', 'e5d25207816c5a304771530ce8330e4ea9626cdc5863e299c732dd908eb75f02198a7021be88663b3d83d93dccbcecff69fd63efe4714db3db6405e4e4a277159u2Rufxot3SY874OgiMlYhBSDOAiyXJ6e2Jp0DToEjApLDqIP+SXyBQW2LR647ri', 3, 0),
(38, 'altaaf', '20045112338', '4ad7b6f826f002127035b36ef4e6634993c21a2a1593e06153f7b75d5933d4d406ee383a6ed56221ea7db2a5cdc9f32c5101eac72f82d2d60706db1e71407657IC3Le9ZVilU1nAFYxvPYC0odaFJYCsg9gyuy2IRXIMKsjVnW1+UwqM8qZkvZmuhf', 3, 0),
(39, 'amir', '20045112358', 'f152254a731a1c1f639b3aafd2d031d90a7be6135bdde0565411361b8e5d2ce6de1f85fdcf21d9cc45ec53b86947f54e30b6ccd0221bf5fdbff09825412eedbcwmBN0He5MH+46/GTOj5t74AKnzXkjCWhOOOajNaYUUszwRXRRCZyzIeOhnmB2OX1', 3, 0),
(40, 'yawar', '20045112378', 'ad9e05f46b4a459506cba132818e4c5bc39d24dd4b628eb52ff9024974ee94312a9041d2db076466d6f459113ba76d9640066f4daa23c9fcb5bdc1a4a50bb3f5cEtiLp2mmpCf/aR1ty/TNjkpEVvZBY4YGqoNAb0yXLDmnitRSk/tpUKruWtonzw1', 3, 0),
(41, 'power', '20045112398', '8d794ba90819c067bc1fa02d25d6bf1d8ca82bb899e5589c428a4bd8750d96e581e13771535a8e6adc6082678965f55f79acb4584fba730546a193de71b6db8bqvQfXrK2KjEO7PUpHHgBod0Xwlb1NzdvkavR8YyjwaxzvJCA9+Jl6rulG2B+Mmtb', 3, 0),
(42, 'zakir ahmad wani', '20045112418', '2610c2f7b3bd4b9fc9cf835ca971677939d570a98bf06627c34c8d8e1e9ebdde844839304b4871512d42f3bdc3e3f61bcf1bcebaf9644763893337442042884fsy55vLutxUmDEanuzk5PdUMKYrBvuVYf7ekYH/ukUzJlY3aIFWQXPMddbZyE+xO4', 3, 0),
(43, 'yawar', '20045112438', '2c34d416a262e782bb122e65db9084007cc7b78d582d5877a41bdadd21e5fd96dc948a9f281ff15ed63535f9025c843013b9bc0770b32abcbf8226c882be2f2062Bfu0qHU1KlyhL6XTfZMsCxLffBuDC/yKgNJguMdcH+pMqh2E+U6d2y+dSl3N0V', 3, 0),
(44, 'zakir ahmad wani', '20045112458', '97926db57234bc54772429a0cc12f632a826bf31d79f656c741df5b2ad67053d7bbd032504699786d0aaba519455ae0f9b09c141721432afc870f2577e68ac4baKYpwV9wdbcIhspsAZMt7N1RDKaAAuGM2gKp9pBVU5fV/Db/Q6GkxEOI2h4FqKfH', 3, 0),
(45, 'yawar', '20045112478', 'e35f1cce4c6ed1816cb30d78956d31c6a6100975d990f690782b8d3c40e0f9f4ddd8fc2c45541efe230972a90635ba6d381b1267adb920f61da9757b0e531984Y2lu/AbdkVV59CHcSPMXGKn28KWD46KcHyClKkDloa+15exZYOHtrHPIzbWkMkWs', 3, 0),
(46, 'zakir ahmad wani', '20045112498', 'c8d45aed7071196d23edb16d2c563a72b3bbb4dc8e498ee8302d2d1aefc9fa0476389903e96e1eb9635dd78484056226b40d83b3213d66860185916e9816d116e8/eKT9yhbQRcSInsMXMmfoJ2P2v6eE8drAR8vFnBJiv4u9/to0t1JaTPRut59cn', 3, 0),
(47, 'Zakir Ahmad Wani', '20045110044', '9482f5ddb2fc19ea5b398a5f8f612d1d74f1629817125456547421c8998e10aa0041f6bfe44d2fb4ac1782583fb63cf51f59a51bfb6bcc4d64a5170853784599rBYXFVO925RD2QLPZb9rcsB5WVWoUji9YkpQ+6DZKng04ARdp4HMGlRYqXXog4bw', 17, 0),
(48, 'Mohammad Yawar', '20045110019', 'd99270db2251ead73f7e125c070bd22574729a60f3c7129929af852aeaf8daf311957a24cd5b09cac39039596ae75d6bb4dfbbdf22966a1ffe2f2d753eb340e6RBj1vRXdQK9qxp8NcetbOPeVGTxVvBu7tIIzBkbykhHfnwvNWai9D+8ZHvQABF27', 17, 0),
(49, 'Juniad Ahmad Beigh', '20045110007', '5f30dde9de3fe8e528c7afe522c85c6b3159e8ab62bda0c429bf791e80d660f806d49cb34ba47c8ecedbd182e9bb6631a8c942ecf7db2991e6b129573beec1382CEI+decGPmZ8aKzzfJ5SXvLdXGFc75Ce9PIeclPL+OuKVyq2xcvixD8m5P0SLsG', 17, 0),
(50, 'Mohammad Yawar', '20045110019', '2ef33af9055393e8e353a6631f31b1f5fd161a59dd4962847fd73ed53f474fd388b732b9eee86d860e288cbfc895ae30b35c550e9a8243e242fcd92eb5aab9c5ilCN0aPNUepa2vc/0HT6A6AQur0N8GwtfS+GTJ4VTlAf97HuiwvwaJipgfpCz1pU', 1, 0),
(52, 'Aarif Ahmad', '20045110001', 'c5867fa05707cb57e5b89efe1400c59612cd5f7023d5c44f48e5a9c30213e16da352a466c4da09f1bf6d92aae6b5af3c83d1b53dd960d42ff61636d56bf21025pqF+8jL+tqkx0B730evGXu35oBRz7Z/+/NzYhCVO54lVAMYTIA1dUgkCl3a1t+Oo', 18, 0),
(53, 'Altaf Ahmad', '20045110002', '4d4245846245730bb50b3f529e61b23a6344acb701e4b4495247e59742ca98ce7b0b0a6603899e013da27f6aa15cb7d705e9a237745ad46b5e35fef841c38960C+gxt7FjT/XFyPFrkk4gJANXP6/KNLD2Kuh5zaYd6UYv8B3Y/zpeO8Bzsy7YjwOI', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`first_name`, `last_name`, `email`, `password`, `id`, `dept_name`, `create_date`, `status`) VALUES
('Aariz', 'Wani', 'waniaariz605@gmail.com', '$2y$10$/BXmjQfkD2r3OlrRUEXAy.VB9sNBYYaTdVeHVLN30U85FAjYJ2Xbu', 6, 'Computer Sciene', '1665596897', '1'),
('Mohmmad ', 'Yawar', 'mohammadyawar123@gmai.com', '$2y$10$cRAryQNyUpNuEGR0Q2qoT.iVEU1Me2i/YoVMJkN37IS4spjFBgE7i', 7, 'Education', '1666872108', '0'),
('nabil', 'akbar', 'nabil@gmail.com', '$2y$10$xd8Ww/vbUoN28MEqtuTiPuYxCoCTDYyBEaulyYfOdzXfxrNc74nC.', 11, 'MCA', '1671970942', '0'),
('Mohammad ', 'yawar ', 'yawar123@gmail.com', '$2y$10$fpcdGLvniyTEDGLf1fxx/.v/k1hqke3EfkB7S0hUfPzGp2SbOaEyq', 12, 'MCA', '1672029762', '0'),
('Dr', 'Shugufta', 'urdu@gmail.com', '$2y$10$mp3cTLG.5QpUoCTbWdCwgup92/PRRxyR1M53MiJnF8tWqB/Og1IDq', 13, 'Department of Urdu ', '1672145353', '1'),
('Prof Ishrat ', 'nazir', 'Admin@English.com', '$2y$10$2xRwpUHO38CT32q6sir.4O82c7QkvmhKMKgWMnNVoyY1LcABZLoTS', 14, 'Department of English', '1672152267', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
