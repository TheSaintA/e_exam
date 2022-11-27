-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2022 at 03:15 PM
-- Server version: 8.0.27
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
-- Table structure for table `configuration_tb`
--

DROP TABLE IF EXISTS `configuration_tb`;
CREATE TABLE IF NOT EXISTS `configuration_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `show_quiz_name` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `show_page_title` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `show_logo` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `save_continue_later` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `set_paper_timer` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `paper_time` varchar(255) NOT NULL,
  `set_questions_per_page` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `questions_per_page` bigint NOT NULL,
  `set_exam_schedule` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `from_date` varchar(255) NOT NULL,
  `from_time` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `allow_cut` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `allow_copy` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `allow_paste` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `allow_right_mouse_click` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `allow_print` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'no',
  `set_theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `configuration_tb`
--

INSERT INTO `configuration_tb` (`id`, `page_id`, `page_name`, `show_quiz_name`, `show_page_title`, `show_logo`, `save_continue_later`, `set_paper_timer`, `paper_time`, `set_questions_per_page`, `questions_per_page`, `set_exam_schedule`, `from_date`, `from_time`, `to_date`, `to_time`, `allow_cut`, `allow_copy`, `allow_paste`, `allow_right_mouse_click`, `allow_print`, `set_theme`) VALUES
(2, 3, 'Operating System', 'yes', 'no', 'yes', 'no', 'no', '', 'no', 0, 'no', '', '', '', '', 'no', 'no', 'yes', 'no', 'no', '#5d0476'),
(4, 2, 'Algorithm & Analysis', 'no', 'yes', 'no', 'yes', 'yes', '02:30', 'yes', 1, 'yes', '2022-11-02', '13:30', '2022-11-02', '14:30', 'yes', 'no', 'yes', 'yes', 'yes', '#aaacaa');

-- --------------------------------------------------------

--
-- Table structure for table `grading_tb`
--

DROP TABLE IF EXISTS `grading_tb`;
CREATE TABLE IF NOT EXISTS `grading_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fail_grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `max_percentage` int NOT NULL,
  `pass_grade` varchar(255) NOT NULL,
  `min_percentage` int NOT NULL,
  `page_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grading_tb`
--

INSERT INTO `grading_tb` (`id`, `fail_grade`, `max_percentage`, `pass_grade`, `min_percentage`, `page_id`) VALUES
(1, 'Better Luck Next Time', 33, 'Congratulations', 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `page_tb`
--

DROP TABLE IF EXISTS `page_tb`;
CREATE TABLE IF NOT EXISTS `page_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `semester_class` int NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat',
  `email` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `set_unset` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `page_tb`
--

INSERT INTO `page_tb` (`id`, `page_name`, `semester_class`, `description`, `email`, `create_date`, `set_unset`) VALUES
(1, 'Computer Fundamentals', 4, '1st Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006\r\n', 'waniaariz605@gmail.com', '', 1),
(2, 'Algorithm & Analysis', 1, '1st Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006', 'waniaariz605@gmail.com', '', 0),
(3, 'Operating System', 2, '2nd Semester<br>\r\nDepartment of Computer Sciences<br>\r\nUniversity of Kashmir - 190006', 'waniaariz605@gmail.com', '1665941513', 0),
(7, 'crypto', 3, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', 'mohammadyawar123@gmai.com', '1666872248', 0),
(8, 'Operating System', 2, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', 'mohammadyawar123@gmai.com', '1666872326', 0),
(9, 'Complexity of Time Analysis', 2, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum in molestias ex, quam odio a officiis vel fugiat', 'mohammadyawar123@gmai.com', '1666872334', 0),
(12, 'Networking Communication', 0, '4th Semester <br> Department of Information Technology <br> University of Kashmir - 190006', 'waniaariz605@gmail.com', '1668453436', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank_tb`
--

DROP TABLE IF EXISTS `question_bank_tb`;
CREATE TABLE IF NOT EXISTS `question_bank_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` varchar(255) NOT NULL,
  `answer_3` varchar(255) NOT NULL,
  `answer_4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `page_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question_bank_tb`
--

INSERT INTO `question_bank_tb` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `page_id`) VALUES
(1, 'Which part of CPU is responsible for mathematical calculations?', 'Arithmetic Logic Unit', 'Control Unit', 'Graphics Processing Unit', 'None of the above', 'Arithmetic Logic Unit', 1),
(2, 'What is the worst time complexity of Quick Sort?', 'Log n', 'n^2', 'n^3', 'n log n', 'n^2', 2),
(3, 'What are three primary pixels of computer graphics?', 'RGB', 'YGB', 'WGB', 'CYMK', 'RGB', 1),
(4, 'What is the time complexity of Binary Search?', 'n<sup>2</sup>', 'Logn', 'n<sup>3</sup>', 'None of the above', 'Logn', 2),
(5, 'Which algorithm performs better?', 'Binary Search', 'Quick Sort', 'Bubble Sort', 'None of the above', 'Binary Search', 2),
(6, 'What is best time complexity?', 'O(1)', 'O(logn)', '(n)', 'O(nlogn)', 'O(1)', 2),
(7, 'What is the time complexity of Min_Max Algo?', 'O(b<sup>m</sup>)', 'O(logn)', 'O(nlogn)', 'None of the above', 'O(b<sup>m</sup>)', 2),
(8, 'What is the worst case time complecity among the following?', 'n^2', 'n^3', 'n!', 'None of the above', 'n^3', 2),
(9, 'In Which genenration vacums tubes were replaced by transistors?', '1st Generation', '2nd Generation', '3rd Generation', '4th Generation', '3rd Generation', 3),
(10, 'Which Operating System in used by Apple Inc ?', 'Macantosh', 'Windows', 'Ubuntu', 'Solaris', 'Macantosh', 3),
(11, 'Which one of the following is System Software ?', 'Windows', 'Macantosh', 'Apache2', 'Both A & B', 'Both A & B', 3),
(12, 'What is operating system', 'it is a medium between user and hardware', 'it is app soft', 'hardware', 'non  of the above', 'it is a medium between user and hardware', 8);

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

DROP TABLE IF EXISTS `student_tb`;
CREATE TABLE IF NOT EXISTS `student_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enrollment_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `paper_id` bigint NOT NULL,
  `block_unblock_status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`id`, `name`, `enrollment_no`, `password`, `paper_id`, `block_unblock_status`) VALUES
(20, 'Suhail Ahmad Bhat', '20045110040', 'd40b4edbba0c354197a7aa73fb77b459c1aadad08bba2f3d5b340d4bd5ed0c96bb8c72d5ced2031bfee0d6639ea5dc6eb9f845e963ed35a53f01c5368d38f598zb4Oxgyfl/Wef+NH/MQv+J94VTmlXmDu0VobjBdJqFPBO9yRKVYrHmAQHRSiRikl', 2, 0),
(19, 'Zakir Ahmad Wani', '20045110046', '9d3fa10cf837c2af1b93a679aa7c97ac7274137ebfc5572757a6539afa38ae33b56d2c3035c0429c45ecbebaf9ab5b679e9b1469addc3253bf1010b4916d9c05pYrf8QBZH52cxMlyDqbgJ/i8gggrWGQvSNLJory8lPL8nDsbzWjE8OYLiFT4XpiU', 1, 0),
(21, 'Zoon', '20045110044', 'cc71ee847d7d98fbcec8d094c44a9b3f234b415e853a8a7b61493b4c7b6e5b39db727a5ad917d5813aeeaf1f5702709e70f341f571d337bf5a5e3f8d801846f4dTi0soRiAFA/1Yaw1nqNheQixt4i/0PCuas7nLaCTw9vCm1vwRaLDA5ovzPKSlJb', 1, 0),
(22, 'Zakir Ahmad Wani', '20045110044', 'dc86b8502a7995823391ef11edef9a7c1ea6cadb430189c683587d612d5f5e48a1ae2937e82fdbd207fadc811b253eeab67d750f1677768bd5f76ab1b2351972j5yaWQ0bSkDOv8F/p53qlkbw5otNCc+owWX3KS6K5QHVQ4ruu392fi6Sq5E3vrXH', 2, 1),
(23, 'Yawar Kechfall', '20045110019', 'c13448ae4449576e05251445dcb444ec8a772c4ad138daed1bdf39575649d382b65654fb494d5fb2c889cd520fc06beba59205f1dfbda49a7e11a036dfd22280WZIfw84hgCSlWrxapHG6n1YJHrkkmLY3l0yIJaDnuoy7vuerLECDMWmvGp9d3GOA', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `create_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`first_name`, `last_name`, `email`, `password`, `id`, `create_date`) VALUES
('Aariz', 'Wani', 'waniaariz605@gmail.com', '$2y$10$WAtpop/xnCux7Z4UbQQ.cuNSBlVwsDb83Hy6wHdE9kUHbY6.btJBK', 6, '1665596897'),
('Mohmmad ', 'Yawar', 'mohammadyawar123@gmai.com', '$2y$10$cRAryQNyUpNuEGR0Q2qoT.iVEU1Me2i/YoVMJkN37IS4spjFBgE7i', 7, '1666872108');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
