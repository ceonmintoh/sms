-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2018 at 03:09 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quadibkq_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_title`
--

CREATE TABLE IF NOT EXISTS `account_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_title` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_title`
--

INSERT INTO `account_title` (`id`, `account_title`, `category`, `description`) VALUES
(1, 'Rent', 'Expense', ''),
(2, 'Student Fee', 'Income', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_exam`
--

CREATE TABLE IF NOT EXISTS `add_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(5) NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `class_id` int(11) NOT NULL,
  `total_time` varchar(10) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `final` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `add_exam`
--

INSERT INTO `add_exam` (`id`, `year`, `exam_title`, `start_date`, `class_id`, `total_time`, `publish`, `final`, `status`) VALUES
(4, 2018, 'Test Exam 1', '09/06/2018', 1, '1 Hour 30 ', 'Publish', 'NoFinal', 'NoResult'),
(5, 2018, 'FInal Exam', '08/10/2018', 3, '30 Minute', 'Not Publish', 'Final', 'NoResult');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `isbn_no` varchar(20) NOT NULL,
  `book_no` int(11) NOT NULL,
  `books_title` varchar(100) NOT NULL,
  `authore` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL,
  `language` varchar(30) NOT NULL,
  `uploderTitle` varchar(100) NOT NULL,
  `books_amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `issu_date` int(11) NOT NULL,
  `due_date` int(11) NOT NULL,
  `issu_member_no` int(11) NOT NULL,
  `cover_photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `date`, `isbn_no`, `book_no`, `books_title`, `authore`, `category`, `edition`, `pages`, `language`, `uploderTitle`, `books_amount`, `status`, `issu_date`, `due_date`, `issu_member_no`, `cover_photo`) VALUES
(1, 1464559200, '978-3-16-148410-0', 20161, 'Book Test 1', 'Author Test 1', 'English', '16 th', 1500, 'English', 'Headmaster', 1, 'Not Available', 1475245412, 1475186400, 1, 'f7cebda75f3c1c09ef31e2e525db8805.gif'),
(2, 1464559200, '978-3-16-148410-1', 20162, 'Book Test 2', 'Author Test 2', 'Bangla ', '16 th', 1500, 'Bangla', 'Headmaster', 2, 'Available', 0, 0, 0, 'eee468e20c7387d459487dafda58709d.gif'),
(3, 1464559200, '978-3-16-148410-2', 20163, 'Book Test 3', 'Author Test 3', 'English', '16 th', 522, 'English', 'Headmaster', 3, 'Available', 0, 0, 0, '6583655141ea7c33d3981bbd7332c586.gif'),
(4, 1464559200, '978-3-16-148410-3', 20164, 'Book Test 4', 'Author Test 4', 'Bangla ', '16 th', 520, 'Bangla', 'Headmaster', 4, 'Available', 0, 0, 0, 'ceabf75a2a7dead8862b7821d3fd3bd4.gif'),
(5, 1464559200, '978-3-16-148410-4', 20165, 'Book Test 5', 'Author Test 5', 'Bangla ', '14 th', 711, 'Bangla', 'Headmaster', 5, 'Available', 0, 0, 0, '9d4b20f013a24ebc882c84b0b344e526.gif'),
(6, 1464559200, '978-3-16-148410-5', 20166, 'Book Test 6', 'Author Test 6', 'English', '10 th', 485, 'English', 'Headmaster', 6, 'Available', 0, 0, 0, '1d28dd98b150b33ad4a708a95031408a.gif'),
(7, 1464559200, '978-3-16-148410-6', 20167, 'Book Test 7', 'Author Test 77', 'English', '9 th', 485, 'English', 'Headmaster', 7, 'Available', 0, 0, 0, '036337321c644b23bd7916f3e4b3eca4.gif'),
(8, 1464559200, '978-3-16-148410-7', 20168, 'Book Test 8', 'Author Test 8', 'English', '14 th', 950, 'English', 'Headmaster', 8, 'Available', 0, 0, 0, '3b174671512c28eaf95be33657e2af69.gif');

-- --------------------------------------------------------

--
-- Table structure for table `books_category`
--

CREATE TABLE IF NOT EXISTS `books_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_creator` varchar(100) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `parent_category` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `books_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `books_category`
--

INSERT INTO `books_category` (`id`, `category_creator`, `category_title`, `parent_category`, `description`, `books_amount`) VALUES
(1, 'Headmaster', 'English', '', '', 0),
(2, 'Headmaster', 'Story ', 'English', '', 0),
(3, 'Headmaster', 'Bangla ', '', '', 0),
(4, 'Headmaster', 'Story', 'Bangla ', '', 0),
(5, 'Headmaster', 'poem', 'English', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `calender_events`
--

CREATE TABLE IF NOT EXISTS `calender_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `url` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `calender_events`
--

INSERT INTO `calender_events` (`id`, `title`, `start_date`, `end_date`, `color`, `url`, `user_id`) VALUES
(1, 'test', '05-05-2016', '06-05-2016', 'red', 'test.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_title` varchar(50) NOT NULL,
  `class_group` varchar(150) NOT NULL,
  `section` varchar(100) NOT NULL,
  `section_student_capacity` varchar(5) NOT NULL,
  `classCode` int(11) NOT NULL,
  `student_amount` int(11) NOT NULL,
  `attendance_percentices_daily` int(11) NOT NULL,
  `attend_percentise_yearly` int(11) NOT NULL,
  `month_fee` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_title`, `class_group`, `section`, `section_student_capacity`, `classCode`, `student_amount`, `attendance_percentices_daily`, `attend_percentise_yearly`, `month_fee`) VALUES
(1, 'Class 1', '', '', '40', 1, 6, 67, 67, 'September'),
(2, 'Class 2', '', '', '40', 2, 6, 100, 100, 'September'),
(3, 'Class 3', '', '', '40', 3, 4, 75, 75, ''),
(4, 'Class 4', '', '', '50', 4, 4, 100, 100, ''),
(5, 'Class 5', '', 'Section A,Section B', '50', 5, 5, 60, 60, ''),
(6, 'Class 6', '', 'Section A,Section B', '50', 6, 5, 80, 80, ''),
(7, 'Class 7', '', 'Section A,Section B', '50', 7, 6, 0, 0, ''),
(8, 'Class 8', '', 'Section A,Section B', '50', 8, 5, 0, 0, ''),
(9, 'Class 9', 'Science,Business Study,Arts', 'Section A,Section B,Section C,Section D', '50', 9, 2, 0, 0, ''),
(10, 'Class 10', 'Science,Business Study,Arts', 'Section A,Section B,Section C,Section D', '50', 10, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `day_title` varchar(50) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `subject_teacher` varchar(200) NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`id`, `class_id`, `section`, `day_title`, `subject`, `subject_teacher`, `start_time`, `end_time`, `room_number`) VALUES
(1, 1, '', 'Sunday', 'AMAR BANGLA BOI', 'Willie B. Quint', '9.00am', '9.30', '101'),
(2, 1, '', 'Sunday', 'ENGLISH FOR TODAY', 'Fredrick V. Keyes', '9.31am', '10.00am', '101'),
(3, 1, '', 'Sunday', 'PRIMARY MATHEMATICS', 'mumar abboud', '10.01am', '10.30am', '101'),
(4, 1, '', 'Sunday', 'PRIMARY MATHEMATICS', 'mumar abboud', '10.01am', '10.30am', '101'),
(5, 2, '', 'Sunday', 'AMAR BANGLA BOI', 'Inayah Asfour', '9.00am', '9.30am', '102'),
(6, 2, '', 'Sunday', 'ENGLISH FOR TODAY', 'mumar abboud', '9.31am', '10.00am', '102'),
(7, 2, '', 'Sunday', 'PRIMARY MATHEMATICS', 'Fredrick V. Keyes', '10.01am', '10.30am', '102'),
(8, 3, '', 'Sunday', 'AMAR BANGLA BOI', 'Willie B. Quint', '9.00am', '9.30am', '103'),
(9, 3, '', 'Sunday', 'ENGLISH FOR TODAY', 'Fredrick V. Keyes', '9.31am', '10.00am', '103'),
(10, 3, '', 'Sunday', 'PRIMARY MATHEMATICS', 'mumar abboud', '10.01am', '10.30am', '103'),
(11, 3, '', 'Sunday', 'BANGLADESH AND GLOBAL STUDIES', 'Inayah Asfour', '10.30am', '11.00am', '103'),
(12, 3, '', 'Monday', 'ENGLISH FOR TODAY', 'Fredrick V. Keyes', '9.00am', '9.30', '103'),
(13, 3, '', 'Monday', 'PRIMARY MATHEMATICS', 'mumar abboud', '9.31am', '10.00am', '103');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE IF NOT EXISTS `class_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `student_id` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_title` varchar(50) NOT NULL,
  `section` varchar(150) NOT NULL,
  `student_title` varchar(100) NOT NULL,
  `attendance_percentices_daily` int(11) NOT NULL,
  `optional_sub` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `year`, `user_id`, `roll_number`, `student_id`, `class_id`, `class_title`, `section`, `student_title`, `attendance_percentices_daily`, `optional_sub`) VALUES
(1, 2018, 4, 1, '201601001', 1, 'Class 1', 'Section A,Section B,Section C,Section D', 'Benjamin D. Lampe', 100, ''),
(2, 2018, 12, 2, '201601002', 1, 'Class 1', 'Section A,Section B,Section C,Section D', 'Rahim Hasan', 100, ''),
(3, 2018, 13, 3, '201601003', 1, 'Class 1', 'Section A,Section B,Section C,Section D', 'Junayed Hak', 100, ''),
(4, 2018, 16, 4, '201601004', 1, 'Class 1', '', 'Razia Akture', 0, ''),
(5, 2018, 17, 1, '201602001', 2, 'Class 2', '', 'Abdullah  hossain', 100, ''),
(6, 2018, 18, 2, '201602002', 2, 'Class 2', '', 'Sujana Ahmed', 100, ''),
(7, 2018, 19, 3, '201602003', 2, 'Class 2', '', 'Mahmud Hasan', 100, ''),
(8, 2018, 20, 4, '201602004', 2, 'Class 2', '', 'Mahbuba Akter', 100, ''),
(9, 2018, 21, 5, '201602005', 2, 'Class 2', '', 'Irfan Hossain', 100, ''),
(10, 2018, 22, 6, '201602006', 2, 'Class 2', '', 'Imran Hasan', 100, ''),
(11, 2018, 23, 5, '201601005', 1, 'Class 1', '', 'Polash Sarder', 100, ''),
(12, 2018, 24, 6, '201601006', 1, 'Class 1', '', 'Sumon Akon', 0, ''),
(13, 2018, 25, 1, '201603001', 3, 'Class 3', '', 'Farjana Akter', 0, ''),
(14, 2018, 26, 2, '201603002', 3, 'Class 3', '', 'Akram Hossain', 100, ''),
(15, 2018, 27, 3, '201603003', 3, 'Class 3', '', 'Alamin Saeder', 100, ''),
(16, 2018, 28, 4, '201603004', 3, 'Class 3', '', 'Sabina Sumi', 100, ''),
(17, 2018, 29, 1, '201604001', 4, 'Class 4', '', 'Sanjida Hossain', 100, ''),
(18, 2018, 30, 2, '201604002', 4, 'Class 4', '', 'Kawser  Shikder', 100, ''),
(19, 2018, 31, 3, '201604003', 4, 'Class 4', '', 'Shohana Akter', 100, ''),
(20, 2018, 32, 4, '201604004', 4, 'Class 4', '', 'Juthi Khanam', 100, ''),
(21, 2018, 33, 1, '201605001', 5, 'Class 5', '', 'Tanjila Akter', 100, ''),
(22, 2018, 34, 2, '201605002', 5, 'Class 5', '', 'Nusrat Jahan', 100, ''),
(23, 2018, 35, 3, '201605003', 5, 'Class 5', '', 'Amina Akter', 100, ''),
(24, 2018, 36, 4, '201605004', 5, 'Class 5', '', 'Ebrahim Khondokar', 0, ''),
(25, 2018, 37, 5, '201605005', 5, 'Class 5', '', 'Mintu  Fokir', 0, ''),
(26, 2018, 38, 1, '201606001', 6, 'Class 6', 'Section A', 'Shohid Islam', 100, ''),
(27, 2018, 39, 2, '201606002', 6, 'Class 6', 'Section B', 'Khadija Akter', 100, ''),
(28, 2018, 40, 3, '201606003', 6, 'Class 6', 'Section A', 'Maruf Hossain', 100, ''),
(29, 2018, 41, 4, '201606004', 6, 'Class 6', 'Section B', 'Mitu  Akter', 100, ''),
(30, 2018, 42, 5, '201606005', 6, 'Class 6', 'Section A', 'Rayhan  Kebria', 0, ''),
(32, 2016, 44, 2, '201607002', 7, 'Class 7', 'Section A,Section B,Section C,Section D', 'Airin Akter', 0, ''),
(33, 2016, 45, 3, '201607003', 7, 'Class 7', '', 'Hemel Hossain', 0, ''),
(34, 2016, 46, 4, '201607004', 7, 'Class 7', '', 'Mou Akter', 0, ''),
(35, 2016, 47, 5, '201607005', 7, 'Class 7', '', 'Dedar  Hossain', 0, ''),
(36, 2016, 48, 6, '201607006', 7, 'Class 7', '', 'Samia Akter', 0, ''),
(37, 2016, 49, 1, '201608001', 8, 'Class 8', '', 'Al Mamun', 0, ''),
(38, 2016, 50, 2, '201608002', 8, 'Class 8', '', 'Jiniya Hoq', 0, ''),
(39, 2016, 51, 3, '201608003', 8, 'Class 8', '', 'Junayed Ahmed', 0, ''),
(40, 2016, 52, 4, '201608004', 8, 'Class 8', '', 'Priya Ahmed', 0, ''),
(41, 2016, 53, 5, '201608005', 8, 'Class 8', '', 'Mithu Khondokar', 0, ''),
(42, 2016, 54, 1, '201609001', 9, 'Class 9', '', 'Rasel Hossain', 0, ''),
(43, 2016, 56, 2, '201609002', 9, 'Class 9', '', 'Test Name', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE IF NOT EXISTS `class_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `subject_teacher` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `optional` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `year`, `class_id`, `subject_title`, `group`, `subject_teacher`, `edition`, `writer_name`, `optional`) VALUES
(1, 2018, 1, 'AMAR BANGLA BOI', '', 'Willie B. Quint', '2016', 'NCTB', 0),
(2, 2018, 1, 'ENGLISH FOR TODAY', '', 'Fredrick V. Keyes', '2016', 'NCTB', 0),
(3, 2018, 1, 'PRIMARY MATHEMATICS', '', 'mumar abboud', '2016', 'NCTB', 0),
(4, 2018, 2, 'AMAR BANGLA BOI', '', 'Inayah Asfour', '2016', 'NCTB', 0),
(5, 2018, 2, 'ENGLISH FOR TODAY', '', 'mumar abboud', '2016', 'NCTB', 0),
(6, 2018, 2, 'PRIMARY MATHEMATICS', '', 'Fredrick V. Keyes', '2016', 'NCTB', 0),
(7, 2018, 2, 'PRIMARY MATHEMATICS', '', 'Fredrick V. Keyes', '2016', 'NCTB', 0),
(8, 2018, 3, 'AMAR BANGLA BOI', '', 'Willie B. Quint', '2016', 'NCTB', 0),
(9, 2018, 3, 'ENGLISH FOR TODAY', '', 'Fredrick V. Keyes', '2016', 'NCTB', 0),
(10, 2018, 3, 'PRIMARY MATHEMATICS', '', 'mumar abboud', '2016', 'NCTB', 0),
(11, 2018, 3, 'BANGLADESH AND GLOBAL STUDIES', '', 'Inayah Asfour', '2016', 'NCTB', 0),
(12, 2018, 3, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(13, 2018, 3, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(14, 2018, 3, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(15, 2018, 3, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(16, 2018, 3, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(17, 2018, 4, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(18, 2018, 4, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(19, 2018, 4, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(20, 2018, 4, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(21, 2018, 4, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(22, 2018, 4, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(23, 2018, 4, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(24, 2018, 4, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(25, 2018, 4, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(26, 2018, 5, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(27, 2018, 5, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(28, 2018, 5, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(29, 2018, 5, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(30, 2018, 5, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(31, 2016, 5, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(32, 2016, 5, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(33, 2016, 5, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(34, 2016, 5, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(35, 2016, 6, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(36, 2016, 6, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(37, 2016, 6, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(38, 2016, 6, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(39, 2016, 6, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(40, 2016, 6, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(41, 2016, 6, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(42, 2016, 6, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(43, 2016, 6, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(44, 2016, 7, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(45, 2016, 7, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(46, 2016, 7, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(47, 2016, 7, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(48, 2016, 7, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(49, 2016, 7, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(50, 2016, 7, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(51, 2016, 7, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(52, 2016, 7, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(53, 2016, 8, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(54, 2016, 8, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(55, 2016, 8, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(56, 2016, 8, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(57, 2016, 8, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(58, 2016, 8, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(59, 2016, 8, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(60, 2016, 8, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(61, 2016, 8, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(62, 2016, 9, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(63, 2016, 9, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(64, 2016, 9, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(65, 2016, 9, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(66, 2016, 9, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(67, 2016, 9, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(68, 2016, 9, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(69, 2016, 9, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(70, 2016, 9, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(71, 2016, 10, 'AMAR BANGLA BOI', '', '', '2016', 'NCTB', 0),
(72, 2016, 10, 'ENGLISH FOR TODAY', '', '', '2016', 'NCTB', 0),
(73, 2016, 10, 'PRIMARY MATHEMATICS', '', '', '2016', 'NCTB', 0),
(74, 2016, 10, 'BANGLADESH AND GLOBAL STUDIES', '', '', '2016', 'NCTB', 0),
(75, 2016, 10, 'ISLAM AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(76, 2016, 10, 'HINDU RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(77, 2016, 10, 'BUDDIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(78, 2016, 10, 'CHRIST RELIGION AND MORAL EDUCATION', '', '', '2016', 'NCTB', 0),
(79, 2016, 10, 'PRIMARY SCIENCE', '', '', '2016', 'NCTB', 0),
(80, 2016, 9, 'AGRICULTURE STUDIES', '', '', '2016', 'NCTB', 1),
(81, 2016, 10, 'AGRICULTURE STUDIES', '', '', '2016', 'NCTB', 1),
(82, 2016, 10, 'ARTS & CRAFTS', '', '', '2016', 'NCTB', 1),
(83, 2016, 10, 'ARTS & CRAFTS', '', '', '2016', 'NCTB', 1),
(84, 2016, 9, 'MUSIC', '', '', '2016', 'NCTB', 1),
(85, 2016, 10, 'MUSIC', '', '', '2016', 'NCTB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `time_zone` varchar(150) NOT NULL,
  `school_name` varchar(150) NOT NULL,
  `starting_year` varchar(50) NOT NULL,
  `headmaster_name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `currenct` varchar(50) NOT NULL,
  `country` varchar(150) NOT NULL,
  `language` text NOT NULL,
  `msg_apai_email` varchar(100) NOT NULL,
  `msg_hash_number` varchar(100) NOT NULL,
  `msg_sender_title` varchar(100) NOT NULL,
  `countryPhonCode` varchar(5) NOT NULL,
  `t_a_s_p` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `logo`, `time_zone`, `school_name`, `starting_year`, `headmaster_name`, `address`, `phone`, `email`, `currenct`, `country`, `language`, `msg_apai_email`, `msg_hash_number`, `msg_sender_title`, `countryPhonCode`, `t_a_s_p`) VALUES
(1, '', 'UP5', 'Goila Model High School', '12/12/1883', 'Mr. Jahirul Huque', 'Goila, Aghoiljhara, Barisal', '0123456789', 'info@goila.com', 'fa fa-money', 'Bangladesh', '', '', '', '', '', 'abcd123');

-- --------------------------------------------------------

--
-- Table structure for table `config_week_day`
--

CREATE TABLE IF NOT EXISTS `config_week_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `config_week_day`
--

INSERT INTO `config_week_day` (`id`, `day_name`, `status`) VALUES
(1, 'Sunday', 'Open'),
(2, 'Monday', 'Open'),
(3, 'Tuesday', 'Open'),
(4, 'Wednesday', 'Open'),
(5, 'Thursday', 'Open'),
(6, 'Friday', 'Holyday'),
(7, 'Saturday', 'Holyday');

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendance`
--

CREATE TABLE IF NOT EXISTS `daily_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `student_id` varchar(150) NOT NULL,
  `class_title` varchar(30) NOT NULL,
  `section` varchar(100) NOT NULL,
  `days_amount` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `present_or_absent` varchar(2) NOT NULL,
  `student_title` varchar(100) NOT NULL,
  `class_amount_monthly` int(11) NOT NULL,
  `class_amount_yearly` int(11) NOT NULL,
  `attend_amount_monthly` int(11) NOT NULL,
  `attend_amount_yearly` int(11) NOT NULL,
  `percentise_month` int(11) NOT NULL,
  `percentise_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `daily_attendance`
--

INSERT INTO `daily_attendance` (`id`, `date`, `user_id`, `student_id`, `class_title`, `section`, `days_amount`, `roll_no`, `present_or_absent`, `student_title`, `class_amount_monthly`, `class_amount_yearly`, `attend_amount_monthly`, `attend_amount_yearly`, `percentise_month`, `percentise_year`) VALUES
(1, '1464991200', '4', '201601001', 'Class 1', 'Section A,Section B,Section C,Section D', '', 1, 'P', 'Benjamin D. Lampe', 1, 1, 1, 1, 100, 100),
(2, '1464991200', '12', '201601002', 'Class 1', 'Section A,Section B,Section C,Section D', '', 2, 'P', 'Rahim Hasan', 1, 1, 1, 1, 100, 100),
(3, '1464991200', '13', '201601003', 'Class 1', 'Section A,Section B,Section C,Section D', '', 3, 'P', 'Junayed Hak', 1, 1, 1, 1, 100, 100),
(4, '1464991200', '16', '201601004', 'Class 1', '', '', 4, 'A', 'Razia Akture', 1, 1, 0, 0, 0, 0),
(5, '1464991200', '23', '201601005', 'Class 1', '', '', 5, 'P', 'Polash Sarder', 1, 1, 1, 1, 100, 100),
(6, '1464991200', '24', '201601006', 'Class 1', '', '', 6, 'A', 'Sumon Akon', 1, 1, 0, 0, 0, 0),
(7, '1464991200', '17', '201602001', 'Class 2', '', '', 1, 'P', 'Abdullah  hossain', 1, 1, 1, 1, 100, 100),
(8, '1464991200', '18', '201602002', 'Class 2', '', '', 2, 'P', 'Sujana Ahmed', 1, 1, 1, 1, 100, 100),
(9, '1464991200', '19', '201602003', 'Class 2', '', '', 3, 'P', 'Mahmud Hasan', 1, 1, 1, 1, 100, 100),
(10, '1464991200', '20', '201602004', 'Class 2', '', '', 4, 'P', 'Mahbuba Akter', 1, 1, 1, 1, 100, 100),
(11, '1464991200', '21', '201602005', 'Class 2', '', '', 5, 'P', 'Irfan Hossain', 1, 1, 1, 1, 100, 100),
(12, '1464991200', '22', '201602006', 'Class 2', '', '', 6, 'P', 'Imran Hasan', 1, 1, 1, 1, 100, 100),
(13, '1464991200', '25', '201603001', 'Class 3', '', '', 1, 'A', 'Farjana Akter', 1, 1, 0, 0, 0, 0),
(14, '1464991200', '26', '201603002', 'Class 3', '', '', 2, 'P', 'Akram Hossain', 1, 1, 1, 1, 100, 100),
(15, '1464991200', '27', '201603003', 'Class 3', '', '', 3, 'P', 'Alamin Saeder', 1, 1, 1, 1, 100, 100),
(16, '1464991200', '28', '201603004', 'Class 3', '', '', 4, 'P', 'Sabina Sumi', 1, 1, 1, 1, 100, 100),
(17, '1464991200', '29', '201604001', 'Class 4', '', '', 1, 'P', 'Sanjida Hossain', 1, 1, 1, 1, 100, 100),
(18, '1464991200', '30', '201604002', 'Class 4', '', '', 2, 'P', 'Kawser  Shikder', 1, 1, 1, 1, 100, 100),
(19, '1464991200', '31', '201604003', 'Class 4', '', '', 3, 'P', 'Shohana Akter', 1, 1, 1, 1, 100, 100),
(20, '1464991200', '32', '201604004', 'Class 4', '', '', 4, 'P', 'Juthi Khanam', 1, 1, 1, 1, 100, 100),
(21, '1464991200', '33', '201605001', 'Class 5', '', '', 1, 'P', 'Tanjila Akter', 1, 1, 1, 1, 100, 100),
(22, '1464991200', '34', '201605002', 'Class 5', '', '', 2, 'P', 'Nusrat Jahan', 1, 1, 1, 1, 100, 100),
(23, '1464991200', '35', '201605003', 'Class 5', '', '', 3, 'P', 'Amina Akter', 1, 1, 1, 1, 100, 100),
(24, '1464991200', '36', '201605004', 'Class 5', '', '', 4, 'A', 'Ebrahim Khondokar', 1, 1, 0, 0, 0, 0),
(25, '1464991200', '37', '201605005', 'Class 5', '', '', 5, 'A', 'Mintu  Fokir', 1, 1, 0, 0, 0, 0),
(26, '1464991200', '38', '201606001', 'Class 6', 'Section A', '', 1, 'P', 'Shohid Islam', 1, 1, 1, 1, 100, 100),
(27, '1464991200', '39', '201606002', 'Class 6', 'Section B', '', 2, 'P', 'Khadija Akter', 1, 1, 1, 1, 100, 100),
(28, '1464991200', '40', '201606003', 'Class 6', 'Section A', '', 3, 'P', 'Maruf Hossain', 1, 1, 1, 1, 100, 100),
(29, '1464991200', '41', '201606004', 'Class 6', 'Section B', '', 4, 'P', 'Mitu  Akter', 1, 1, 1, 1, 100, 100),
(30, '1464991200', '42', '201606005', 'Class 6', 'Section A', '', 5, 'A', 'Rayhan  Kebria', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dormitory_name` varchar(100) NOT NULL,
  `dormitory_for` varchar(100) NOT NULL,
  `room_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dormitory`
--

INSERT INTO `dormitory` (`id`, `dormitory_name`, `dormitory_for`, `room_amount`) VALUES
(1, 'Boys Hostel', 'Only for male', 125),
(2, 'Girls Hostel', 'Only for female', 40),
(3, 'Teachers Dormitory', 'Only for teachers (Male Teacher)', 10);

-- --------------------------------------------------------

--
-- Table structure for table `dormitory_bed`
--

CREATE TABLE IF NOT EXISTS `dormitory_bed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_name` varchar(100) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `bed_number` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `roll_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `dormitory_bed`
--

INSERT INTO `dormitory_bed` (`id`, `dormitory_id`, `dormitory_name`, `room_number`, `bed_number`, `student_id`, `student_name`, `class`, `roll_number`) VALUES
(1, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 1', 201601001, 'Benjamin D. Lampe', '1', 1),
(2, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 2', 0, '', '', 0),
(3, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 3', 0, '', '', 0),
(4, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 4', 0, '', '', 0),
(5, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 5', 0, '', '', 0),
(6, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 6', 0, '', '', 0),
(7, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 7', 0, '', '', 0),
(8, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 8', 0, '', '', 0),
(9, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 9', 0, '', '', 0),
(10, 1, 'Boys Hostel', 'Room No: 1', 'Seat No: 10', 0, '', '', 0),
(11, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 1', 0, '', '', 0),
(12, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 2', 0, '', '', 0),
(13, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 3', 0, '', '', 0),
(14, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 4', 0, '', '', 0),
(15, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 5', 0, '', '', 0),
(16, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 6', 0, '', '', 0),
(17, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 7', 0, '', '', 0),
(18, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 8', 0, '', '', 0),
(19, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 9', 0, '', '', 0),
(20, 1, 'Boys Hostel', 'Room No: 2', 'Seat No: 10', 0, '', '', 0),
(21, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 1', 0, '', '', 0),
(22, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 2', 0, '', '', 0),
(23, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 3', 0, '', '', 0),
(24, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 4', 0, '', '', 0),
(25, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 5', 0, '', '', 0),
(26, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 6', 0, '', '', 0),
(27, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 7', 0, '', '', 0),
(28, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 8', 0, '', '', 0),
(29, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 9', 0, '', '', 0),
(30, 2, 'Girls Hostel', 'Room No: 1', 'Seat No: 10', 0, '', '', 0),
(31, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 1', 0, '', '', 0),
(32, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 2', 0, '', '', 0),
(33, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 3', 0, '', '', 0),
(34, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 4', 0, '', '', 0),
(35, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 5', 0, '', '', 0),
(36, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 6', 0, '', '', 0),
(37, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 7', 0, '', '', 0),
(38, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 8', 0, '', '', 0),
(39, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 9', 0, '', '', 0),
(40, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 10', 0, '', '', 0),
(41, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 1', 0, '', '', 0),
(42, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 2', 0, '', '', 0),
(43, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 3', 0, '', '', 0),
(44, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 4', 0, '', '', 0),
(45, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 5', 0, '', '', 0),
(46, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 6', 0, '', '', 0),
(47, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 7', 0, '', '', 0),
(48, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 8', 0, '', '', 0),
(49, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 9', 0, '', '', 0),
(50, 2, 'Girls Hostel', 'Room No: 2', 'Seat No: 10', 0, '', '', 0),
(51, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 1', 0, '', '', 0),
(52, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 2', 0, '', '', 0),
(53, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 3', 0, '', '', 0),
(54, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 4', 0, '', '', 0),
(55, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 5', 0, '', '', 0),
(56, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 6', 0, '', '', 0),
(57, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 7', 0, '', '', 0),
(58, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 8', 0, '', '', 0),
(59, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 9', 0, '', '', 0),
(60, 2, 'Girls Hostel', 'Room No: 3', 'Seat No: 10', 0, '', '', 0),
(61, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 1', 0, '', '', 0),
(62, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 2', 0, '', '', 0),
(63, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 3', 0, '', '', 0),
(64, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 4', 0, '', '', 0),
(65, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 5', 0, '', '', 0),
(66, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 6', 0, '', '', 0),
(67, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 7', 0, '', '', 0),
(68, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 8', 0, '', '', 0),
(69, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 9', 0, '', '', 0),
(70, 3, 'Teachers Dormitory', 'Room No: 1', 'Seat No: 10', 0, '', '', 0),
(71, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 1', 0, '', '', 0),
(72, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 2', 0, '', '', 0),
(73, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 3', 0, '', '', 0),
(74, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 4', 0, '', '', 0),
(75, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 5', 0, '', '', 0),
(76, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 6', 0, '', '', 0),
(77, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 7', 0, '', '', 0),
(78, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 8', 0, '', '', 0),
(79, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 9', 0, '', '', 0),
(80, 3, 'Teachers Dormitory', 'Room No: 2', 'Seat No: 10', 0, '', '', 0),
(81, 1, 'Boys Hostel', 'Room No: 7', 'Seat No: 1', 201602001, 'Abdullah  hossain', '2', 1),
(82, 1, 'Boys Hostel', 'Room No: 7', 'Seat No: 2', 0, '', '', 0),
(83, 1, 'Boys Hostel', 'Room No: 7', 'Seat No: 3', 0, '', '', 0),
(84, 1, 'Boys Hostel', 'Room No: 7', 'Seat No: 4', 0, '', '', 0),
(85, 1, 'Boys Hostel', 'Room No: 7', 'Seat No: 5', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dormitory_room`
--

CREATE TABLE IF NOT EXISTS `dormitory_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_name` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `bed_amount` int(11) NOT NULL,
  `free_seat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `dormitory_room`
--

INSERT INTO `dormitory_room` (`id`, `dormitory_id`, `dormitory_name`, `room`, `bed_amount`, `free_seat`) VALUES
(1, 1, 'Boys Hostel', 'Room No: 1', 10, 10),
(2, 1, 'Boys Hostel', 'Room No: 2', 10, 10),
(3, 1, 'Boys Hostel', 'Room No: 3', 0, 0),
(4, 1, 'Boys Hostel', 'Room No: 4', 0, 0),
(5, 1, 'Boys Hostel', 'Room No: 5', 0, 0),
(6, 1, 'Boys Hostel', 'Room No: 6', 0, 0),
(7, 1, 'Boys Hostel', 'Room No: 7', 5, 5),
(8, 1, 'Boys Hostel', 'Room No: 8', 0, 0),
(9, 1, 'Boys Hostel', 'Room No: 9', 0, 0),
(10, 1, 'Boys Hostel', 'Room No: 10', 0, 0),
(11, 1, 'Boys Hostel', 'Room No: 11', 0, 0),
(12, 1, 'Boys Hostel', 'Room No: 12', 0, 0),
(13, 1, 'Boys Hostel', 'Room No: 13', 0, 0),
(14, 1, 'Boys Hostel', 'Room No: 14', 0, 0),
(15, 1, 'Boys Hostel', 'Room No: 15', 0, 0),
(16, 1, 'Boys Hostel', 'Room No: 16', 0, 0),
(17, 1, 'Boys Hostel', 'Room No: 17', 0, 0),
(18, 1, 'Boys Hostel', 'Room No: 18', 0, 0),
(19, 1, 'Boys Hostel', 'Room No: 19', 0, 0),
(20, 1, 'Boys Hostel', 'Room No: 20', 0, 0),
(21, 1, 'Boys Hostel', 'Room No: 21', 0, 0),
(22, 1, 'Boys Hostel', 'Room No: 22', 0, 0),
(23, 1, 'Boys Hostel', 'Room No: 23', 0, 0),
(24, 1, 'Boys Hostel', 'Room No: 24', 0, 0),
(25, 1, 'Boys Hostel', 'Room No: 25', 0, 0),
(26, 1, 'Boys Hostel', 'Room No: 26', 0, 0),
(27, 1, 'Boys Hostel', 'Room No: 27', 0, 0),
(28, 1, 'Boys Hostel', 'Room No: 28', 0, 0),
(29, 1, 'Boys Hostel', 'Room No: 29', 0, 0),
(30, 1, 'Boys Hostel', 'Room No: 30', 0, 0),
(31, 1, 'Boys Hostel', 'Room No: 31', 0, 0),
(32, 1, 'Boys Hostel', 'Room No: 32', 0, 0),
(33, 1, 'Boys Hostel', 'Room No: 33', 0, 0),
(34, 1, 'Boys Hostel', 'Room No: 34', 0, 0),
(35, 1, 'Boys Hostel', 'Room No: 35', 0, 0),
(36, 1, 'Boys Hostel', 'Room No: 36', 0, 0),
(37, 1, 'Boys Hostel', 'Room No: 37', 0, 0),
(38, 1, 'Boys Hostel', 'Room No: 38', 0, 0),
(39, 1, 'Boys Hostel', 'Room No: 39', 0, 0),
(40, 1, 'Boys Hostel', 'Room No: 40', 0, 0),
(41, 1, 'Boys Hostel', 'Room No: 41', 0, 0),
(42, 1, 'Boys Hostel', 'Room No: 42', 0, 0),
(43, 1, 'Boys Hostel', 'Room No: 43', 0, 0),
(44, 1, 'Boys Hostel', 'Room No: 44', 0, 0),
(45, 1, 'Boys Hostel', 'Room No: 45', 0, 0),
(46, 1, 'Boys Hostel', 'Room No: 46', 0, 0),
(47, 1, 'Boys Hostel', 'Room No: 47', 0, 0),
(48, 1, 'Boys Hostel', 'Room No: 48', 0, 0),
(49, 1, 'Boys Hostel', 'Room No: 49', 0, 0),
(50, 1, 'Boys Hostel', 'Room No: 50', 0, 0),
(51, 1, 'Boys Hostel', 'Room No: 51', 0, 0),
(52, 1, 'Boys Hostel', 'Room No: 52', 0, 0),
(53, 1, 'Boys Hostel', 'Room No: 53', 0, 0),
(54, 1, 'Boys Hostel', 'Room No: 54', 0, 0),
(55, 1, 'Boys Hostel', 'Room No: 55', 0, 0),
(56, 1, 'Boys Hostel', 'Room No: 56', 0, 0),
(57, 1, 'Boys Hostel', 'Room No: 57', 0, 0),
(58, 1, 'Boys Hostel', 'Room No: 58', 0, 0),
(59, 1, 'Boys Hostel', 'Room No: 59', 0, 0),
(60, 1, 'Boys Hostel', 'Room No: 60', 0, 0),
(61, 1, 'Boys Hostel', 'Room No: 61', 0, 0),
(62, 1, 'Boys Hostel', 'Room No: 62', 0, 0),
(63, 1, 'Boys Hostel', 'Room No: 63', 0, 0),
(64, 1, 'Boys Hostel', 'Room No: 64', 0, 0),
(65, 1, 'Boys Hostel', 'Room No: 65', 0, 0),
(66, 1, 'Boys Hostel', 'Room No: 66', 0, 0),
(67, 1, 'Boys Hostel', 'Room No: 67', 0, 0),
(68, 1, 'Boys Hostel', 'Room No: 68', 0, 0),
(69, 1, 'Boys Hostel', 'Room No: 69', 0, 0),
(70, 1, 'Boys Hostel', 'Room No: 70', 0, 0),
(71, 1, 'Boys Hostel', 'Room No: 71', 0, 0),
(72, 1, 'Boys Hostel', 'Room No: 72', 0, 0),
(73, 1, 'Boys Hostel', 'Room No: 73', 0, 0),
(74, 1, 'Boys Hostel', 'Room No: 74', 0, 0),
(75, 1, 'Boys Hostel', 'Room No: 75', 0, 0),
(76, 1, 'Boys Hostel', 'Room No: 76', 0, 0),
(77, 1, 'Boys Hostel', 'Room No: 77', 0, 0),
(78, 1, 'Boys Hostel', 'Room No: 78', 0, 0),
(79, 1, 'Boys Hostel', 'Room No: 79', 0, 0),
(80, 1, 'Boys Hostel', 'Room No: 80', 0, 0),
(81, 1, 'Boys Hostel', 'Room No: 81', 0, 0),
(82, 1, 'Boys Hostel', 'Room No: 82', 0, 0),
(83, 1, 'Boys Hostel', 'Room No: 83', 0, 0),
(84, 1, 'Boys Hostel', 'Room No: 84', 0, 0),
(85, 1, 'Boys Hostel', 'Room No: 85', 0, 0),
(86, 1, 'Boys Hostel', 'Room No: 86', 0, 0),
(87, 1, 'Boys Hostel', 'Room No: 87', 0, 0),
(88, 1, 'Boys Hostel', 'Room No: 88', 0, 0),
(89, 1, 'Boys Hostel', 'Room No: 89', 0, 0),
(90, 1, 'Boys Hostel', 'Room No: 90', 0, 0),
(91, 1, 'Boys Hostel', 'Room No: 91', 0, 0),
(92, 1, 'Boys Hostel', 'Room No: 92', 0, 0),
(93, 1, 'Boys Hostel', 'Room No: 93', 0, 0),
(94, 1, 'Boys Hostel', 'Room No: 94', 0, 0),
(95, 1, 'Boys Hostel', 'Room No: 95', 0, 0),
(96, 1, 'Boys Hostel', 'Room No: 96', 0, 0),
(97, 1, 'Boys Hostel', 'Room No: 97', 0, 0),
(98, 1, 'Boys Hostel', 'Room No: 98', 0, 0),
(99, 1, 'Boys Hostel', 'Room No: 99', 0, 0),
(100, 1, 'Boys Hostel', 'Room No: 100', 0, 0),
(101, 1, 'Boys Hostel', 'Room No: 101', 0, 0),
(102, 1, 'Boys Hostel', 'Room No: 102', 0, 0),
(103, 1, 'Boys Hostel', 'Room No: 103', 0, 0),
(104, 1, 'Boys Hostel', 'Room No: 104', 0, 0),
(105, 1, 'Boys Hostel', 'Room No: 105', 0, 0),
(106, 1, 'Boys Hostel', 'Room No: 106', 0, 0),
(107, 1, 'Boys Hostel', 'Room No: 107', 0, 0),
(108, 1, 'Boys Hostel', 'Room No: 108', 0, 0),
(109, 1, 'Boys Hostel', 'Room No: 109', 0, 0),
(110, 1, 'Boys Hostel', 'Room No: 110', 0, 0),
(111, 1, 'Boys Hostel', 'Room No: 111', 0, 0),
(112, 1, 'Boys Hostel', 'Room No: 112', 0, 0),
(113, 1, 'Boys Hostel', 'Room No: 113', 0, 0),
(114, 1, 'Boys Hostel', 'Room No: 114', 0, 0),
(115, 1, 'Boys Hostel', 'Room No: 115', 0, 0),
(116, 1, 'Boys Hostel', 'Room No: 116', 0, 0),
(117, 1, 'Boys Hostel', 'Room No: 117', 0, 0),
(118, 1, 'Boys Hostel', 'Room No: 118', 0, 0),
(119, 1, 'Boys Hostel', 'Room No: 119', 0, 0),
(120, 1, 'Boys Hostel', 'Room No: 120', 0, 0),
(121, 1, 'Boys Hostel', 'Room No: 121', 0, 0),
(122, 1, 'Boys Hostel', 'Room No: 122', 0, 0),
(123, 1, 'Boys Hostel', 'Room No: 123', 0, 0),
(124, 1, 'Boys Hostel', 'Room No: 124', 0, 0),
(125, 1, 'Boys Hostel', 'Room No: 125', 0, 0),
(126, 2, 'Girls Hostel', 'Room No: 1', 10, 10),
(127, 2, 'Girls Hostel', 'Room No: 2', 10, 10),
(128, 2, 'Girls Hostel', 'Room No: 3', 10, 10),
(129, 2, 'Girls Hostel', 'Room No: 4', 0, 0),
(130, 2, 'Girls Hostel', 'Room No: 5', 0, 0),
(131, 2, 'Girls Hostel', 'Room No: 6', 0, 0),
(132, 2, 'Girls Hostel', 'Room No: 7', 0, 0),
(133, 2, 'Girls Hostel', 'Room No: 8', 0, 0),
(134, 2, 'Girls Hostel', 'Room No: 9', 0, 0),
(135, 2, 'Girls Hostel', 'Room No: 10', 0, 0),
(136, 2, 'Girls Hostel', 'Room No: 11', 0, 0),
(137, 2, 'Girls Hostel', 'Room No: 12', 0, 0),
(138, 2, 'Girls Hostel', 'Room No: 13', 0, 0),
(139, 2, 'Girls Hostel', 'Room No: 14', 0, 0),
(140, 2, 'Girls Hostel', 'Room No: 15', 0, 0),
(141, 2, 'Girls Hostel', 'Room No: 16', 0, 0),
(142, 2, 'Girls Hostel', 'Room No: 17', 0, 0),
(143, 2, 'Girls Hostel', 'Room No: 18', 0, 0),
(144, 2, 'Girls Hostel', 'Room No: 19', 0, 0),
(145, 2, 'Girls Hostel', 'Room No: 20', 0, 0),
(146, 2, 'Girls Hostel', 'Room No: 21', 0, 0),
(147, 2, 'Girls Hostel', 'Room No: 22', 0, 0),
(148, 2, 'Girls Hostel', 'Room No: 23', 0, 0),
(149, 2, 'Girls Hostel', 'Room No: 24', 0, 0),
(150, 2, 'Girls Hostel', 'Room No: 25', 0, 0),
(151, 2, 'Girls Hostel', 'Room No: 26', 0, 0),
(152, 2, 'Girls Hostel', 'Room No: 27', 0, 0),
(153, 2, 'Girls Hostel', 'Room No: 28', 0, 0),
(154, 2, 'Girls Hostel', 'Room No: 29', 0, 0),
(155, 2, 'Girls Hostel', 'Room No: 30', 0, 0),
(156, 2, 'Girls Hostel', 'Room No: 31', 0, 0),
(157, 2, 'Girls Hostel', 'Room No: 32', 0, 0),
(158, 2, 'Girls Hostel', 'Room No: 33', 0, 0),
(159, 2, 'Girls Hostel', 'Room No: 34', 0, 0),
(160, 2, 'Girls Hostel', 'Room No: 35', 0, 0),
(161, 2, 'Girls Hostel', 'Room No: 36', 0, 0),
(162, 2, 'Girls Hostel', 'Room No: 37', 0, 0),
(163, 2, 'Girls Hostel', 'Room No: 38', 0, 0),
(164, 2, 'Girls Hostel', 'Room No: 39', 0, 0),
(165, 2, 'Girls Hostel', 'Room No: 40', 0, 0),
(166, 3, 'Teachers Dormitory', 'Room No: 1', 10, 10),
(167, 3, 'Teachers Dormitory', 'Room No: 2', 10, 10),
(168, 3, 'Teachers Dormitory', 'Room No: 3', 0, 0),
(169, 3, 'Teachers Dormitory', 'Room No: 4', 0, 0),
(170, 3, 'Teachers Dormitory', 'Room No: 5', 0, 0),
(171, 3, 'Teachers Dormitory', 'Room No: 6', 0, 0),
(172, 3, 'Teachers Dormitory', 'Room No: 7', 0, 0),
(173, 3, 'Teachers Dormitory', 'Room No: 8', 0, 0),
(174, 3, 'Teachers Dormitory', 'Room No: 9', 0, 0),
(175, 3, 'Teachers Dormitory', 'Room No: 10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `present_address` varchar(150) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `job_title_post` varchar(100) NOT NULL,
  `working_hour` varchar(20) NOT NULL,
  `salary_amount` varchar(100) NOT NULL,
  `educational_qualifation_1` varchar(300) NOT NULL,
  `educational_qualifation_2` varchar(300) NOT NULL,
  `educational_qualifation_3` varchar(300) NOT NULL,
  `educational_qualifation_4` varchar(300) NOT NULL,
  `educational_qualifation_5` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendanc`
--

CREATE TABLE IF NOT EXISTS `exam_attendanc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_title` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `roll_no` varchar(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `exam_title` varchar(150) NOT NULL,
  `exam_subject` varchar(100) NOT NULL,
  `attendance` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `exam_attendanc`
--

INSERT INTO `exam_attendanc` (`id`, `date`, `user_id`, `student_id`, `student_title`, `class_id`, `roll_no`, `section`, `exam_title`, `exam_subject`, `attendance`) VALUES
(1, '10/06/2016', 4, '201601001', 'Benjamin D. Lampe', 1, '1', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(2, '10/06/2016', 12, '201601002', 'Rahim Hasan', 1, '2', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(3, '10/06/2016', 13, '201601003', 'Junayed Hak', 1, '3', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(4, '10/06/2016', 16, '201601004', 'Razia Akture', 1, '4', '', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(5, '10/06/2016', 23, '201601005', 'Polash Sarder', 1, '5', '', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(6, '10/06/2016', 24, '201601006', 'Sumon Akon', 1, '6', '', 'Test Exam 1', 'AMAR BANGLA BOI', 'P'),
(7, '10/06/2016', 4, '201601001', 'Benjamin D. Lampe', 1, '1', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(8, '10/06/2016', 12, '201601002', 'Rahim Hasan', 1, '2', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(9, '10/06/2016', 13, '201601003', 'Junayed Hak', 1, '3', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(10, '10/06/2016', 16, '201601004', 'Razia Akture', 1, '4', '', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(11, '10/06/2016', 23, '201601005', 'Polash Sarder', 1, '5', '', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(12, '10/06/2016', 24, '201601006', 'Sumon Akon', 1, '6', '', 'Test Exam 1', 'ENGLISH FOR TODAY', 'P'),
(13, '10/06/2016', 4, '201601001', 'Benjamin D. Lampe', 1, '1', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(14, '10/06/2016', 12, '201601002', 'Rahim Hasan', 1, '2', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(15, '10/06/2016', 13, '201601003', 'Junayed Hak', 1, '3', 'Section A,Section B,Section C,Section D', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(16, '10/06/2016', 16, '201601004', 'Razia Akture', 1, '4', '', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(17, '10/06/2016', 23, '201601005', 'Polash Sarder', 1, '5', '', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(18, '10/06/2016', 24, '201601006', 'Sumon Akon', 1, '6', '', 'Test Exam 1', 'PRIMARY MATHEMATICS', 'P'),
(19, '08/10/2016', 25, '201603001', 'Farjana Akter', 3, '1', '', 'FInal Exam', 'AMAR BANGLA BOI', 'P'),
(20, '08/10/2016', 26, '201603002', 'Akram Hossain', 3, '2', '', 'FInal Exam', 'AMAR BANGLA BOI', 'P'),
(21, '08/10/2016', 27, '201603003', 'Alamin Saeder', 3, '3', '', 'FInal Exam', 'AMAR BANGLA BOI', 'P'),
(22, '08/10/2016', 28, '201603004', 'Sabina Sumi', 3, '4', '', 'FInal Exam', 'AMAR BANGLA BOI', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `exam_grade`
--

CREATE TABLE IF NOT EXISTS `exam_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(30) NOT NULL,
  `point` varchar(4) NOT NULL,
  `number_form` varchar(5) NOT NULL,
  `number_to` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `exam_grade`
--

INSERT INTO `exam_grade` (`id`, `grade_name`, `point`, `number_form`, `number_to`) VALUES
(1, 'F', '0', '0', '32'),
(2, 'D', '1', '33', '39'),
(3, 'C', '2', '40', '49'),
(4, 'B', '3', '50', '59'),
(5, 'A-', '3.5', '60', '69'),
(6, 'A', '4', '70', '79'),
(7, 'A+', '5', '80', '100');

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine`
--

CREATE TABLE IF NOT EXISTS `exam_routine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `exam_date` varchar(30) NOT NULL,
  `exam_subject` varchar(100) NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  `rome_number` varchar(10) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `exam_shift` varchar(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exam_routine`
--

INSERT INTO `exam_routine` (`id`, `exam_id`, `exam_date`, `exam_subject`, `subject_code`, `rome_number`, `start_time`, `end_time`, `exam_shift`, `status`) VALUES
(1, 4, '9/06/2018', 'AMAR BANGLA BOI', '101', '101', '09.00am', '10.30am', 'Morning shift', 'Result'),
(2, 4, '10/06/2018', 'ENGLISH FOR TODAY', '102', '101', '09.00am', '10.30am', 'Morning shift', 'Result'),
(3, 4, '11/06/2018', 'PRIMARY MATHEMATICS', '103', '101', '09.00am', '10.30am', 'Morning shift', 'Result'),
(4, 5, '08/10/2018', 'AMAR BANGLA BOI', '101', '101', '10.30am', '11.00am', 'Morning shift', 'Result');

-- --------------------------------------------------------

--
-- Table structure for table `fee_item`
--

CREATE TABLE IF NOT EXISTS `fee_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fee_item`
--

INSERT INTO `fee_item` (`id`, `year`, `class_id`, `title`, `amount`) VALUES
(1, 2018, 1, 'test', 100),
(2, 2018, 2, 'aaa', 500),
(3, 2018, 1, 'aaa', 100),
(4, 2018, 3, 'Exam Fee', 300);

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE IF NOT EXISTS `final_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `total_mark` varchar(100) NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  `maride_list` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `point` varchar(11) NOT NULL,
  `fail_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`id`, `class_id`, `section`, `exam_id`, `exam_title`, `student_id`, `student_name`, `total_mark`, `final_grade`, `maride_list`, `status`, `point`, `fail_amount`) VALUES
(1, 1, '', 4, 'Test Exam 1', '201601001', 'Benjamin D. Lampe', '249', 'A', '', 'Pass', '4.67', 0),
(2, 1, '', 4, 'Test Exam 1', '201601002', 'Rahim Hasan', '241', 'A', '', 'Pass', '4.33', 0),
(3, 1, '', 4, 'Test Exam 1', '201601003', 'Junayed Hak', '254', 'A', '', 'Pass', '4.67', 0),
(4, 1, '', 4, 'Test Exam 1', '201601004', 'Razia Akture', '239', 'A', '', 'Pass', '4.67', 0),
(5, 1, '', 4, 'Test Exam 1', '201601005', 'Polash Sarder', '230', 'A', '', 'Pass', '4.5', 0),
(6, 1, '', 4, 'Test Exam 1', '201601006', 'Sumon Akon', '234', 'A', '', 'Pass', '4.67', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(3, 'student', 'This user is student''s groups member.'),
(4, 'teacher', 'This user is teacher''s groups member.'),
(5, 'parents', 'This user is parent''s groups member.'),
(6, 'accountant', 'This user is accountent''s groups member.'),
(7, 'library_man', 'The library man can manage library and library''s account information'),
(8, '4th_class_employ', ''),
(9, 'driver', '');

-- --------------------------------------------------------

--
-- Table structure for table `inven_category`
--

CREATE TABLE IF NOT EXISTS `inven_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `details` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inven_category`
--

INSERT INTO `inven_category` (`id`, `category_name`, `details`) VALUES
(1, 'Furniture', ''),
(2, 'Khata', ''),
(3, 'Book', '');

-- --------------------------------------------------------

--
-- Table structure for table `inve_item`
--

CREATE TABLE IF NOT EXISTS `inve_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inve_item`
--

INSERT INTO `inve_item` (`id`, `vendor_id`, `category`, `item`, `quantity`, `rate`, `discount`, `total_rate`) VALUES
(1, 1, '1', 'Chair', 40, 110, 0, 5500),
(2, 2, '1', 'Table', 20, 750, 0, 15000),
(3, 1, '2', 'Whit Khata', 1000, 15, 0, 15000),
(4, 2, '2', 'Pen', 2000, 5, 0, 9000),
(5, 1, '3', 'Story Book', 50, 220, 0, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `issu_item`
--

CREATE TABLE IF NOT EXISTS `issu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `issu_item`
--

INSERT INTO `issu_item` (`id`, `date`, `user_type`, `user_id`, `item_id`, `quantity`, `rate`, `total_price`, `status`) VALUES
(1, 1464818400, 'Employee', 2, 1, 10, 110, 1100, 'Due');

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE IF NOT EXISTS `leave_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_title` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `jobtype` text NOT NULL,
  `leave_start` int(11) NOT NULL,
  `leave_end` int(11) NOT NULL,
  `application_date` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `cheack_by` varchar(150) NOT NULL,
  `status` text NOT NULL,
  `cheack_statuse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `library_member`
--

CREATE TABLE IF NOT EXISTS `library_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `fine` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `library_member`
--

INSERT INTO `library_member` (`id`, `user_id`, `title`, `fine`) VALUES
(1, 4, 'Benjamin D. Lampe', 0),
(2, 4, 'Benjamin D. Lampe', 0),
(3, 12, 'Rahim Hasan', 0),
(4, 13, 'Junayed Hak', 0),
(5, 1, 'Headmaster', 0),
(6, 2, 'Helen K Helton', 0),
(7, 6, 'Robert D. Franco', 0),
(8, 7, 'Michael R. Kemp', 0),
(9, 8, 'Willie B. Quint', 0),
(10, 9, 'Fredrick V. Keyes', 0),
(11, 10, 'mumar abboud', 0),
(12, 11, 'Inayah Asfour', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE IF NOT EXISTS `massage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `read_unread` int(1) NOT NULL,
  `date` int(11) NOT NULL,
  `sender_delete` int(11) NOT NULL,
  `receiver_delete` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `sender_id`, `receiver_id`, `message`, `subject`, `read_unread`, `date`, `sender_delete`, `receiver_delete`, `class`) VALUES
(1, 1, '4', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(2, 1, '12', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(3, 1, '13', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(4, 1, '16', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(5, 1, '23', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(6, 1, '24', '<p>This is test Message for all students in class 1. This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.This is test Message for all students in class 1.</p>\\r\\n', 'This is test Message.', 0, 1465806801, 1, 1, ''),
(7, 1, '4', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, ''),
(8, 1, '12', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, ''),
(9, 1, '13', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, ''),
(10, 1, '16', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, ''),
(11, 1, '23', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, ''),
(12, 1, '24', '<p >This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.This is test Message.</p>\\r\\n', 'This is test Message.', 0, 1465807087, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE IF NOT EXISTS `notice_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `notice` varchar(1000) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `date`, `sender`, `subject`, `notice`, `receiver`) VALUES
(1, '13/06/2016', 'Headmaster', 'Test notice for all users. Test notice for all users. Test notice for all users.', '<p><span style=\\"font-size:14px\\">This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. This is test notice. </span></p>\\r\\n', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `parents_info`
--

CREATE TABLE IF NOT EXISTS `parents_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parents_name` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `parents_info`
--

INSERT INTO `parents_info` (`id`, `user_id`, `class_id`, `student_id`, `parents_name`, `relation`, `email`, `phone`) VALUES
(1, 14, 1, 201601001, 'John E. Williams  Deidra D. Shaw ', 'Parents', 'parents@parents.com', '+8801245852315'),
(2, 15, 1, 201601002, 'Jafor Uddin Julakha Begum', 'Parents', 'Jafor@Jafor.com', '+8801245852315');

-- --------------------------------------------------------

--
-- Table structure for table `result_action`
--

CREATE TABLE IF NOT EXISTS `result_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `publish` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `result_action`
--

INSERT INTO `result_action` (`id`, `class_id`, `exam_id`, `exam_title`, `status`, `publish`) VALUES
(1, 1, 4, 'Test Exam 1', 'Complete', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `result_shit`
--

CREATE TABLE IF NOT EXISTS `result_shit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_title` varchar(100) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `exam_subject` varchar(100) NOT NULL,
  `mark` varchar(10) NOT NULL,
  `point` varchar(5) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `result` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `result_shit`
--

INSERT INTO `result_shit` (`id`, `exam_title`, `exam_id`, `class_id`, `section`, `student_name`, `student_id`, `exam_subject`, `mark`, `point`, `grade`, `roll_number`, `result`) VALUES
(1, 'Test Exam 1', 4, 1, '', 'Benjamin D. Lampe', '201601001', 'AMAR BANGLA BOI', '87', '5', 'A+', 1, 'Pass'),
(2, 'Test Exam 1', 4, 1, '', 'Rahim Hasan', '201601002', 'AMAR BANGLA BOI', '78', '4', 'A', 2, 'Pass'),
(3, 'Test Exam 1', 4, 1, '', 'Junayed Hak', '201601003', 'AMAR BANGLA BOI', '89', '5', 'A+', 3, 'Pass'),
(4, 'Test Exam 1', 4, 1, '', 'Razia Akture', '201601004', 'AMAR BANGLA BOI', '82', '5', 'A+', 4, 'Pass'),
(5, 'Test Exam 1', 4, 1, '', 'Polash Sarder', '201601005', 'AMAR BANGLA BOI', '81', '5', 'A+', 5, 'Pass'),
(6, 'Test Exam 1', 4, 1, '', 'Sumon Akon', '201601006', 'AMAR BANGLA BOI', '80', '5', 'A+', 6, 'Pass'),
(7, 'Test Exam 1', 4, 1, '', 'Benjamin D. Lampe', '201601001', 'ENGLISH FOR TODAY', '75', '4', 'A', 1, 'Pass'),
(8, 'Test Exam 1', 4, 1, '', 'Rahim Hasan', '201601002', 'ENGLISH FOR TODAY', '85', '5', 'A+', 2, 'Pass'),
(9, 'Test Exam 1', 4, 1, '', 'Junayed Hak', '201601003', 'ENGLISH FOR TODAY', '76', '4', 'A', 3, 'Pass'),
(10, 'Test Exam 1', 4, 1, '', 'Razia Akture', '201601004', 'ENGLISH FOR TODAY', '82', '5', 'A+', 4, 'Pass'),
(11, 'Test Exam 1', 4, 1, '', 'Polash Sarder', '201601005', 'ENGLISH FOR TODAY', '81', '5', 'A+', 5, 'Pass'),
(12, 'Test Exam 1', 4, 1, '', 'Sumon Akon', '201601006', 'ENGLISH FOR TODAY', '74', '4', 'A', 6, 'Pass'),
(13, 'Test Exam 1', 4, 1, '', 'Benjamin D. Lampe', '201601001', 'PRIMARY MATHEMATICS', '87', '5', 'A+', 1, 'Pass'),
(14, 'Test Exam 1', 4, 1, '', 'Rahim Hasan', '201601002', 'PRIMARY MATHEMATICS', '78', '4', 'A', 2, 'Pass'),
(15, 'Test Exam 1', 4, 1, '', 'Junayed Hak', '201601003', 'PRIMARY MATHEMATICS', '89', '5', 'A+', 3, 'Pass'),
(16, 'Test Exam 1', 4, 1, '', 'Razia Akture', '201601004', 'PRIMARY MATHEMATICS', '75', '4', 'A', 4, 'Pass'),
(17, 'Test Exam 1', 4, 1, '', 'Polash Sarder', '201601005', 'PRIMARY MATHEMATICS', '68', '3.5', 'A-', 5, 'Pass'),
(18, 'Test Exam 1', 4, 1, '', 'Sumon Akon', '201601006', 'PRIMARY MATHEMATICS', '80', '5', 'A+', 6, 'Pass'),
(19, 'FInal Exam', 5, 3, '', 'Farjana Akter', '201603001', 'AMAR BANGLA BOI', '84', '5', 'A+', 1, 'Pass'),
(20, 'FInal Exam', 5, 3, '', 'Akram Hossain', '201603002', 'AMAR BANGLA BOI', '75', '4', 'A', 2, 'Pass'),
(21, 'FInal Exam', 5, 3, '', 'Alamin Saeder', '201603003', 'AMAR BANGLA BOI', '66', '3', 'B', 3, 'Pass'),
(22, 'FInal Exam', 5, 3, '', 'Sabina Sumi', '201603004', 'AMAR BANGLA BOI', '68', '3', 'B', 4, 'Pass'),
(23, 'FInal Exam', 5, 3, '', 'Farjana Akter', '201603001', 'AMAR BANGLA BOI', '84', '5', 'A+', 1, 'Pass'),
(24, 'FInal Exam', 5, 3, '', 'Akram Hossain', '201603002', 'AMAR BANGLA BOI', '75', '4', 'A', 2, 'Pass'),
(25, 'FInal Exam', 5, 3, '', 'Alamin Saeder', '201603003', 'AMAR BANGLA BOI', '66', '3', 'B', 3, 'Pass'),
(26, 'FInal Exam', 5, 3, '', 'Sabina Sumi', '201603004', 'AMAR BANGLA BOI', '68', '3', 'B', 4, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `result_submition_info`
--

CREATE TABLE IF NOT EXISTS `result_submition_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `exam_title` varchar(150) NOT NULL,
  `date` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `submited` varchar(50) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `exam_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `result_submition_info`
--

INSERT INTO `result_submition_info` (`id`, `class_id`, `section`, `exam_title`, `date`, `subject`, `submited`, `teacher`, `exam_id`) VALUES
(1, 1, '', 'Test Exam 1', '10/06/2016', 'AMAR BANGLA BOI', '1', 'Willie B. Quint', 4),
(2, 1, '', 'Test Exam 1', '10/06/2016', 'ENGLISH FOR TODAY', '1', 'Fredrick V. Keyes', 4),
(3, 1, '', 'Test Exam 1', '11/06/2016', 'PRIMARY MATHEMATICS', '1', 'Willie B. Quint', 4),
(4, 3, '', 'FInal Exam', '08/10/2016', 'AMAR BANGLA BOI', '1', 'Headmaster', 5),
(5, 3, '', 'FInal Exam', '08/10/2016', 'AMAR BANGLA BOI', '1', 'Headmaster', 5);

-- --------------------------------------------------------

--
-- Table structure for table `role_based_access`
--

CREATE TABLE IF NOT EXISTS `role_based_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(1) NOT NULL,
  `das_top_info` int(1) NOT NULL,
  `das_grab_chart` int(1) NOT NULL,
  `das_class_info` int(1) NOT NULL,
  `das_message` int(1) NOT NULL,
  `das_employ_attend` int(1) NOT NULL,
  `das_notice` int(1) NOT NULL,
  `das_calender` int(1) NOT NULL,
  `admission` int(1) NOT NULL,
  `all_student_info` int(1) NOT NULL,
  `stud_edit_delete` int(1) NOT NULL,
  `stu_own_info` int(1) NOT NULL,
  `teacher_info` int(1) NOT NULL,
  `add_teacher` int(1) NOT NULL,
  `teacher_details` int(1) NOT NULL,
  `teacher_edit_delete` int(1) NOT NULL,
  `all_parents_info` int(1) NOT NULL,
  `own_parents_info` int(1) NOT NULL,
  `make_parents_id` int(1) NOT NULL,
  `parents_edit_dlete` int(1) NOT NULL,
  `add_employee` int(1) NOT NULL,
  `employee_list` int(1) NOT NULL,
  `employ_attendance` int(1) NOT NULL,
  `empl_atte_view` int(1) NOT NULL,
  `add_new_class` int(1) NOT NULL,
  `all_class_info` int(1) NOT NULL,
  `class_details` int(1) NOT NULL,
  `class_delete` int(1) NOT NULL,
  `class_promotion` int(1) NOT NULL,
  `add_class_routine` int(1) NOT NULL,
  `own_class_routine` int(1) NOT NULL,
  `all_class_routine` int(1) NOT NULL,
  `rutin_edit_delete` int(1) NOT NULL,
  `attendance_preview` int(1) NOT NULL,
  `take_studence_atten` int(1) NOT NULL,
  `edit_student_atten` int(1) NOT NULL,
  `add_subject` int(1) NOT NULL,
  `all_subject` int(1) NOT NULL,
  `assin_optio_sub` int(1) NOT NULL,
  `make_suggestion` int(1) NOT NULL,
  `all_suggestion` int(1) NOT NULL,
  `own_suggestion` int(1) NOT NULL,
  `add_exam_gread` int(1) NOT NULL,
  `exam_gread` int(1) NOT NULL,
  `gread_edit_dele` int(1) NOT NULL,
  `add_exam_routin` int(1) NOT NULL,
  `all_exam_routine` int(1) NOT NULL,
  `own_exam_routine` int(1) NOT NULL,
  `exam_attend_preview` int(1) NOT NULL,
  `approve_result` int(1) NOT NULL,
  `view_result` int(1) NOT NULL,
  `all_mark_sheet` int(1) NOT NULL,
  `own_mark_sheet` int(1) NOT NULL,
  `take_exam_attend` int(1) NOT NULL,
  `change_exam_attendance` int(1) NOT NULL,
  `make_result` int(1) NOT NULL,
  `add_category` int(1) NOT NULL,
  `all_category` int(1) NOT NULL,
  `edit_delete_category` int(1) NOT NULL,
  `add_books` int(1) NOT NULL,
  `all_books` int(1) NOT NULL,
  `edit_delete_books` int(1) NOT NULL,
  `add_library_mem` int(1) NOT NULL,
  `memb_list` int(1) NOT NULL,
  `issu_return` int(1) NOT NULL,
  `add_dormitories` int(1) NOT NULL,
  `add_set_dormi` int(1) NOT NULL,
  `set_member_bed` int(1) NOT NULL,
  `dormi_report` int(1) NOT NULL,
  `add_transport` int(1) NOT NULL,
  `all_transport` int(1) NOT NULL,
  `transport_edit_dele` int(1) NOT NULL,
  `add_account_title` int(1) NOT NULL,
  `edit_dele_acco` int(1) NOT NULL,
  `trensection` int(1) NOT NULL,
  `fee_collection` int(1) NOT NULL,
  `all_slips` int(1) NOT NULL,
  `own_slip` int(1) NOT NULL,
  `slip_edit_delete` int(1) NOT NULL,
  `pay_salary` int(1) NOT NULL,
  `creat_notice` int(1) NOT NULL,
  `send_message` int(1) NOT NULL,
  `vendor` int(1) NOT NULL,
  `delet_vendor` int(1) NOT NULL,
  `add_inv_cat` int(1) NOT NULL,
  `inve_item` int(1) NOT NULL,
  `delete_inve_ite` int(1) NOT NULL,
  `delete_inv_cat` int(1) NOT NULL,
  `inve_issu` int(1) NOT NULL,
  `delete_inven_issu` int(1) NOT NULL,
  `check_leav_appli` int(1) NOT NULL,
  `setting_accounts` int(1) NOT NULL,
  `other_setting` int(1) NOT NULL,
  `front_setings` int(1) NOT NULL,
  `set_optional` int(1) NOT NULL,
  `setting_manage_user` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `role_based_access`
--

INSERT INTO `role_based_access` (`id`, `user_id`, `group_id`, `das_top_info`, `das_grab_chart`, `das_class_info`, `das_message`, `das_employ_attend`, `das_notice`, `das_calender`, `admission`, `all_student_info`, `stud_edit_delete`, `stu_own_info`, `teacher_info`, `add_teacher`, `teacher_details`, `teacher_edit_delete`, `all_parents_info`, `own_parents_info`, `make_parents_id`, `parents_edit_dlete`, `add_employee`, `employee_list`, `employ_attendance`, `empl_atte_view`, `add_new_class`, `all_class_info`, `class_details`, `class_delete`, `class_promotion`, `add_class_routine`, `own_class_routine`, `all_class_routine`, `rutin_edit_delete`, `attendance_preview`, `take_studence_atten`, `edit_student_atten`, `add_subject`, `all_subject`, `assin_optio_sub`, `make_suggestion`, `all_suggestion`, `own_suggestion`, `add_exam_gread`, `exam_gread`, `gread_edit_dele`, `add_exam_routin`, `all_exam_routine`, `own_exam_routine`, `exam_attend_preview`, `approve_result`, `view_result`, `all_mark_sheet`, `own_mark_sheet`, `take_exam_attend`, `change_exam_attendance`, `make_result`, `add_category`, `all_category`, `edit_delete_category`, `add_books`, `all_books`, `edit_delete_books`, `add_library_mem`, `memb_list`, `issu_return`, `add_dormitories`, `add_set_dormi`, `set_member_bed`, `dormi_report`, `add_transport`, `all_transport`, `transport_edit_dele`, `add_account_title`, `edit_dele_acco`, `trensection`, `fee_collection`, `all_slips`, `own_slip`, `slip_edit_delete`, `pay_salary`, `creat_notice`, `send_message`, `vendor`, `delet_vendor`, `add_inv_cat`, `inve_item`, `delete_inve_ite`, `delete_inv_cat`, `inve_issu`, `delete_inven_issu`, `check_leav_appli`, `setting_accounts`, `other_setting`, `front_setings`, `set_optional`, `setting_manage_user`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 6, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(3, 4, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 6, 7, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 7, 8, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 8, 4, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 9, 4, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 10, 4, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 11, 4, 1, 0, 1, 1, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 12, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 13, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 14, 5, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 15, 5, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 16, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 17, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 18, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 19, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 20, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 21, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 22, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 23, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 24, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 25, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 26, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 27, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 28, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 29, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 30, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 31, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 32, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 33, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 34, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 35, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 36, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 37, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 38, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 39, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 40, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 41, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 42, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 43, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 44, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 45, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 46, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 47, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 48, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 49, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 50, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 51, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 52, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 53, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 54, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 56, 3, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employ_title` varchar(100) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `method` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `set_salary`
--

CREATE TABLE IF NOT EXISTS `set_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(5) NOT NULL,
  `employ_user_id` int(11) NOT NULL,
  `employe_title` varchar(100) NOT NULL,
  `job_post` varchar(50) NOT NULL,
  `basic` int(11) NOT NULL,
  `treatment` int(11) NOT NULL,
  `increased` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `month` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `set_salary`
--

INSERT INTO `set_salary` (`id`, `year`, `employ_user_id`, `employe_title`, `job_post`, `basic`, `treatment`, `increased`, `others`, `total`, `month`) VALUES
(1, 2018, 1, 'Headmaster', 'Headmaster', 15000, 2000, 0, 500, 17500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE IF NOT EXISTS `slip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `date` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `dues` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `edit_by` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `mathod` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `slip`
--

INSERT INTO `slip` (`id`, `year`, `month`, `date`, `class_id`, `student_id`, `item_id`, `amount`, `dues`, `advance`, `total`, `paid`, `balance`, `edit_by`, `status`, `mathod`) VALUES
(1, 2016, 'September', 0, 1, 201601001, '1,3', 200, 0, 0, 200, 0, 0, '', 'Unpaid', ''),
(2, 2016, 'September', 0, 1, 201601002, '1,3', 200, 100, 0, 200, 100, 0, '', 'Not Clear', 'Card'),
(3, 2016, 'September', 0, 1, 201601003, '1,3', 200, 0, 0, 200, 0, 0, '', 'Unpaid', ''),
(4, 2016, 'September', 0, 1, 201601004, '1,3', 200, 0, 0, 200, 0, 0, '', 'Unpaid', ''),
(5, 2016, 'September', 0, 1, 201601005, '1,3', 200, 0, 0, 200, 0, 0, '', 'Unpaid', ''),
(6, 2016, 'September', 0, 1, 201601006, '1,3', 200, 0, 0, 200, 0, 0, '', 'Unpaid', ''),
(7, 2016, 'September', 0, 2, 201602001, '2', 500, 0, 0, 500, 2000, 1500, '', 'Paid', 'Cash'),
(8, 2016, 'September', 0, 2, 201602002, '2', 500, 0, 0, 500, 1200, 700, '', 'Paid', 'Card'),
(9, 2016, 'September', 0, 2, 201602003, '2', 500, 300, 0, 500, 200, 0, '', 'Not Clear', 'Cash'),
(10, 2016, 'September', 0, 2, 201602004, '2', 500, 0, 0, 500, 500, 0, '', 'Paid', 'Cash'),
(11, 2016, 'September', 0, 2, 201602005, '2', 500, 0, 0, 500, 500, 0, '', 'Paid', 'Cash'),
(12, 2016, 'September', 0, 2, 201602006, '2', 500, 0, 0, 500, 500, 0, '', 'Paid', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_nam` varchar(100) NOT NULL,
  `farther_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `present_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `father_occupation` varchar(150) NOT NULL,
  `father_incom_range` varchar(100) NOT NULL,
  `mother_occupation` varchar(100) NOT NULL,
  `student_photo` varchar(200) NOT NULL,
  `last_class_certificate` text NOT NULL,
  `t_c` text NOT NULL,
  `national_birth_certificate` text NOT NULL,
  `academic_transcription` text NOT NULL,
  `testimonial` text NOT NULL,
  `documents_info` varchar(500) NOT NULL,
  `starting_year` int(11) NOT NULL,
  `transfer_year` int(11) NOT NULL,
  `transfer_to` text NOT NULL,
  `transfer_reason` text NOT NULL,
  `tc_appli_approved_by` text NOT NULL,
  `passing_year` int(11) NOT NULL,
  `compleat_level` text NOT NULL,
  `registration_number` text NOT NULL,
  `certificates_status` text NOT NULL,
  `admission_year` int(11) NOT NULL,
  `admission_class` varchar(100) NOT NULL,
  `admission_roll` int(5) NOT NULL,
  `admission_form_no` int(11) NOT NULL,
  `admission_test_result` int(11) NOT NULL,
  `tc_form` varchar(150) NOT NULL,
  `blood` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `year`, `user_id`, `student_id`, `roll_number`, `class_id`, `student_nam`, `farther_name`, `mother_name`, `birth_date`, `sex`, `present_address`, `permanent_address`, `phone`, `father_occupation`, `father_incom_range`, `mother_occupation`, `student_photo`, `last_class_certificate`, `t_c`, `national_birth_certificate`, `academic_transcription`, `testimonial`, `documents_info`, `starting_year`, `transfer_year`, `transfer_to`, `transfer_reason`, `tc_appli_approved_by`, `passing_year`, `compleat_level`, `registration_number`, `certificates_status`, `admission_year`, `admission_class`, `admission_roll`, `admission_form_no`, `admission_test_result`, `tc_form`, `blood`) VALUES
(2, 2018, 4, '201601001', 1, 1, 'Benjamin D. Lampe', 'John E. Williams', 'Deidra D. Shaw', '11/02/2010', 'Male', ' 1110 Hillcrest Circle\\\\nPlymouth, MN 55441 ', '1110 Hillcrest Circle\\\\nPlymouth, MN 55441', '763496-3372', 'Business', '1250', 'Housewife', 'f1829afa3cdbed1c643b000b1ea6ab02.jpg', '', '', 'submited', '', '', 'File No - 2016 (01)', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(3, 2018, 12, '201601002', 2, 1, 'Rahim Hasan', 'Jafor Uddin', 'Julakha Begum', '20/11/2010', 'Male', ' Test address     ', ' Test address', '+8801245852315', 'Business', '20000', 'Housewife', '21e39ae6c4f966a8657d11d36084b8fc.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+'),
(4, 2018, 13, '201601003', 3, 1, 'Junayed Hak', 'Raise Hak', 'Lima Khatun', '20/12/2011', 'Male', ' Test address ', ' Test address', '+8801245852315', 'Business', '20000', 'Housewife', '7667367fd4bded46db7e2ee3010f987f.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+'),
(5, 2018, 16, '201601004', 4, 1, 'Razia Akture', 'Karim Khan', 'Kole Begum', '11/05/2007', 'Female', ' Test address', ' Test address', '+8801245852315', 'Business', '20150', 'Housewife', 'f4498b9e3c9d2f933e4026cb0801105c.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(6, 2018, 17, '201602001', 1, 2, 'Abdullah  hossain', 'Lutfor Rahman', 'Amina begum', '11/06/2008', 'Male', 'test address', 'test address', '+88012458523546', 'Business', '20000', 'Housewife', '2408f2dc2b3af87133555dab5815f027.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(7, 2018, 18, '201602002', 2, 2, 'Sujana Ahmed', 'Josim Sarder', 'Lima Khatun', '09/10/2008', 'Female', ' test address', 'test address', '+88012458523546', 'Teachers', '20150', 'Housewife', 'c2b15925a33cddc0ca58a2c504c66bff.jpg', '', '', '', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+'),
(8, 2018, 19, '201602003', 3, 2, 'Mahmud Hasan', 'Razzak Hasan', 'Kohinur khatun', '12/07/2008', 'Male', ' test address', 'test address', '+880+8801245852', 'Banker', '2050', 'Housewife', '10dd794d22c7c0ca38b89508c2febc41.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(9, 2018, 20, '201602004', 4, 2, 'Mahbuba Akter', 'Salim Morshed', 'Julakha Begum', '06/03/2008', 'Female', ' test address', 'test address', '+8801245852354', 'Business', '2150', 'Housewife', 'aa3fab97275a0a85652bfe7fbfa91666.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(10, 2018, 21, '201602005', 5, 2, 'Irfan Hossain', 'Momin Hossain', 'Nargis Begum', '22/11/2008', 'Male', ' test address', 'test address', '+88012458578945', 'Car Driver', '20000', 'Housewife', '50875054077eb4436e78b8f2796761a8.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B-'),
(11, 2018, 22, '201602006', 6, 2, 'Imran Hasan', 'Oliuil Hasan', 'Marufa Begum', '25/09/2008', 'Male', ' test address', 'test address', '+8801245854521', 'Business', '2100', 'Housewife', '9e01047b759770110ed29b254db908d7.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(12, 2018, 23, '201601005', 5, 1, 'Polash Sarder', 'Khalil Sarder', 'Jhorna Begum', '22/05/2007', 'Male', ' test address', 'test address', '+88012458529632', 'Business', '2080', 'Housewife', '41e56e4c5efe83fa80966da3ea23c98f.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(13, 2018, 24, '201601006', 6, 1, 'Sumon Akon', 'Julhash Akon', 'Moyna Begum', '09/08/2007', 'Male', ' test address', 'test address', '+8801245852385', 'Banker', '2090', 'Housewife', '8337f3befe383f4770df79b1c01cc8ae.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O-'),
(14, 2018, 25, '201603001', 1, 3, 'Farjana Akter', 'samsul Haq', 'lota begum', '02/06/2009', 'Female', ' test address', 'test address', '+88012458527412', 'Employer', '2000', 'Housewife', 'c2da4f488e8b188bf8cc3bf1a2049b2f.png', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(15, 2018, 26, '201603002', 2, 3, 'Akram Hossain', 'Manik Hossain', 'Aliya Begum', '07/11/2009', 'Male', ' test address', 'test address', '+88012458529632', 'Car Driver', '1900', 'Housewife', '58b17c784b9f7eca12209969b01bc0a9.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(16, 2018, 27, '201603003', 3, 3, 'Alamin Saeder', 'Hemel Sarder', 'Aliya Begum', '09/12/2009', 'Male', ' test address', 'test address', '+880+8801245852', 'Employer', '2100', 'Housewife', '1fa9258bf0ffdc9ebe01d17154c25e56.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(17, 2018, 28, '201603004', 4, 3, 'Sabina Sumi', 'Jafor Uddin', 'Mala Kahtun', '20/05/2005', 'Female', 'Test Address', 'Test Address', '+88012458523546', 'Business', '52412', 'Housewife', 'e0237b45f347083352f7cd500286914f.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(18, 2018, 29, '201604001', 1, 4, 'Sanjida Hossain', 'Mahbub Hossain', 'Nilima Begum', '11/02/2009', 'Female', ' test address', 'test address', '+8801245852354', 'Business', '21220', 'Housewife', 'e2cee6b429e9423c627d8a34027ca44c.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(19, 2018, 30, '201604002', 2, 4, 'Kawser  Shikder', 'Moslem Shikder', 'Selina begum', '15/12/2009', 'Male', ' test address', 'test address', '+88012458578452', 'Business', '2100', 'Housewife', 'e63eb2b5e250aa6b773c795054dea21a.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O-'),
(20, 2018, 31, '201604003', 3, 4, 'Shohana Akter', 'Aslam Hossain', 'Rahima Begum', '10/03/2009', 'Female', ' test address', 'test address', '+88012458523532', 'Employer', '2150', 'Housewife', '9e8641a879671c2b4a31e77c197a9d3f.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(21, 2018, 32, '201604004', 4, 4, 'Juthi Khanam', 'Iqbal hossen', 'Aysha Begum', '04/11/2009', 'Female', ' test address', 'test address', '+88012458578478', 'Banker', '20000', 'Housewife', '5c99d031c2aaa455c46b467194ebe04f.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(22, 2018, 33, '201605001', 1, 5, 'Tanjila Akter', 'Mojammel Hossain', 'Afia Begum', '10/12/2010', 'Female', ' test address', 'test address', '+88012458524521', 'Employer', '2180', 'Housewife', '88b05c84d9940f9827b4f020bffb46df.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(23, 2018, 34, '201605002', 2, 5, 'Nusrat Jahan', 'Altaf Hossain', 'Nurjahan Akter', '17/02/2010', 'Female', ' test address', 'test address', '+88012458527452', 'Car Driver', '20000', 'Housewife', 'ea1e8ed789f4d1f4a5780a31a075e9a8.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(24, 2018, 35, '201605003', 3, 5, 'Amina Akter', 'Mostofa Sarder', 'Rokaya Begum', '05/10/2010', 'Female', ' terst address', 'test address', '+88012458523652', 'Banker', '2160', 'Housewife', 'bf45f3417020caab83136fc790a837a4.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(25, 2018, 36, '201605004', 4, 5, 'Ebrahim Khondokar', 'Julhash Khondokar', 'Lija Akter', '03/11/2010', 'Male', ' test address', 'test address', '+88012458451397', 'Business', '20000', 'Housewife', 'd1ccdd70ebb675f762aa6de55ecc5927.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+'),
(26, 2018, 37, '201605005', 5, 5, 'Mintu  Fokir', 'Sultan Fokir', 'Julakha Begum', '12/04/2010', 'Male', ' test address', 'test address', '+880+8801245789', 'Teachers', '2080', 'Housewife', 'efae644abc3a8621ba3703b861c5117d.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B-'),
(27, 2018, 38, '201606001', 1, 6, 'Shohid Islam', 'Lotif Sharker', 'Jhumur Begum', '11/01/2010', 'Male', ' test address', 'test address', '+88012458529632', 'Employer', '2080', 'Housewife', '840aa12c41963600fd7993e55aa7d7ab.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(28, 2018, 39, '201606002', 2, 6, 'Khadija Akter', 'Salman Hossain', 'Nuri Begum', '30/05/2010', 'Female', ' test address', 'test address', '+88012458578478', 'Employer', '2150', 'Housewife', '2d0f6d650516b7d5f2c958ed73c88a22.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB-'),
(29, 2018, 40, '201606003', 3, 6, 'Maruf Hossain', 'Mokhles sarder', 'Najma Begum', '22/10/2010', 'Male', ' test address', 'test address', '+88012458523546', 'Employer', '2150', 'Housewife', '5149696a702583dfa0f89ab3e77e4057.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(30, 2018, 41, '201606004', 4, 6, 'Mitu  Akter', 'Karim Khan', 'Rukan Habeeba', '10/02/2010', 'Female', ' test address', 'test address', '+880+8801245789', 'Employer', '2080', 'Housewife', 'c71ff3b9a9436344ffd8dc8bc5b57856.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(31, 2018, 42, '201606005', 5, 6, 'Rayhan  Kebria', 'Kabir Hossen', 'Munmun Khanam', '01/11/2010', 'Male', ' test address', 'test address', '+880+8801245789', 'Business', '2150', 'Housewife', '6cd5fd41b32dd2cffaa1a397bfeb8fd1.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B-'),
(32, 2016, 43, '201607001', 1, 7, 'Hemel Hossain', 'Liakot Hossain', 'Jhumur Begum', '10/02/2011', 'Male', ' test address', 'test address', '+880+8801245789', 'Business', '2100', 'Housewife', 'c3a19c6dfbb930525400d7bcdb9867cf.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(33, 2016, 44, '201607002', 2, 0, 'Airin Akter', 'Harun Shikder', 'Aliya Begum', '22/05/2011', 'Female', ' test address ', 'rest address', '+880+8801245452', 'Banker', '2155', 'Housewife', '4196bf4c30a4f94165fd82bfa98980d4.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'O+'),
(34, 2016, 45, '201607003', 3, 7, 'Hemel Hossain', 'samsul Haq', 'Jhumur Begum', '10/02/2011', 'Male', ' test address', 'test address', '+8801245852354', 'Employer', '2150', 'Housewife', '855cfe1befcd31038add98bb6605c227.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(35, 2016, 46, '201607004', 4, 7, 'Mou Akter', 'Salim Ahmed', 'Selina begum', '14/06/2011', 'Female', 'test address', 'trest  address', '+880+8801245752', 'Business', '2150', 'Housewife', '551bcf2eddf4aa49d629cadf543d7e33.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+'),
(36, 2016, 47, '201607005', 5, 7, 'Dedar  Hossain', 'Mujammel Hossain', 'Fatima Begum', '12/08/2011', 'Male', ' test address', 'test address', '+880+8801247821', 'Teachers', '2100', 'Housewife', 'd8d9124d3a3f01e59538995a499a600a.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(37, 2016, 48, '201607006', 6, 7, 'Samia Akter', ' Osman Hossen', 'Rina Begum', '13/10/2011', 'Female', ' test address', 'test address', '+880+8801241020', 'Car Driver', '20000', 'Housewife', '992d1504661e0f1a6fb7f1b87da0b8be.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(38, 2016, 49, '201608001', 1, 8, 'Al Mamun', 'Mnowar Hossen', 'Munia Begum', '11/08/2012', 'Male', ' test address', 'test address', '+880+8801245854', 'Employer', '2080', 'Housewife', '637e0e2d01bf463d9791cc77cac00485.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(39, 2016, 50, '201608002', 2, 8, 'Jiniya Hoq', 'Arman Hossain', 'Habiba Begum', '14/07/2012', 'Female', ' test address', 'test address', '+8801245852354', 'Employer', '2015', 'Housewife', '4e211b4b8cedfa67d84414d5ae412c48.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB-'),
(40, 2016, 51, '201608003', 3, 8, 'Junayed Ahmed', 'Obaydul Hossain', 'Kole Begum', '22/12/2011', 'Male', ' test address', 'test address', '+880+8801245852', 'Car Driver', '2100', 'Housewife', '8d37adbd2454c51222d14936cbb3f125.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'AB+'),
(41, 2016, 52, '201608004', 4, 8, 'Priya Ahmed', 'Liakot Hossain', 'Najma Begum', '11/03/2011', 'Female', ' test address', 'test address', '+880+8801245852', 'Business', '20000', 'Housewife', 'e7b45f5e5a62e632ba6bb7d504d25299.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B-'),
(42, 2016, 53, '201608005', 5, 8, 'Mithu Khondokar', 'Jalal Khondokar', 'Bokul Begum', '21/04/2012', 'Male', ' test address', 'test address', '+8801245852354', 'Teachers', '2100', 'Housewife', 'e3bc44fb33852bf16b2387800debd943.jpg', '', '', '', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'B+'),
(43, 2016, 54, '201609001', 1, 9, 'Rasel Hossain', 'Abdul Hakim', 'Rabaya Begum', '15/05/2012', 'Male', ' test address', 'test address', '+880+8801245852', 'Banker', '2015', 'Housewife', '061d3b9631a8a0d7acddae6efa0106ae.jpg', '', '', 'submited', '', '', 'Student 2016', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A-'),
(44, 2016, 56, '201609002', 2, 9, 'Test Name', 'sdfsd', 'sdfsdf', '22/09/2016', 'Male', ' szdas', ' sdfsdf', '+88001245885', 'Employer', '20000', 'Business', '48f0d67ff796756b0efa6109727eb2fc.jpg', '', '', '', '', '', 'cv', 2016, 0, '', '', '', 0, '', '', '', 0, '', 0, 0, 0, '', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_mark`
--

CREATE TABLE IF NOT EXISTS `subjects_mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_title` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `statud` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `class` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `suggestion_title` varchar(150) NOT NULL,
  `suggestion` varchar(2500) NOT NULL,
  `date` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `author_id`, `author_name`, `class`, `subject`, `suggestion_title`, `suggestion`, `date`) VALUES
(2, 8, 'Willie B. Quint', 'Class 1', '', 'This is test suggestion.', '<p>This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.This is test suggestion.</p>\\r\\n', 1466152654);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_info`
--

CREATE TABLE IF NOT EXISTS `teachers_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `farther_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `birth_date` varchar(150) NOT NULL,
  `sex` varchar(30) NOT NULL,
  `present_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `position` varchar(150) NOT NULL,
  `working_hour` varchar(50) NOT NULL,
  `educational_qualification_1` varchar(500) NOT NULL,
  `educational_qualification_2` varchar(500) NOT NULL,
  `educational_qualification_3` varchar(500) NOT NULL,
  `educational_qualification_4` varchar(500) NOT NULL,
  `educational_qualification_5` varchar(500) NOT NULL,
  `teachers_photo` varchar(200) NOT NULL,
  `cv` varchar(30) NOT NULL,
  `educational_certificat` varchar(30) NOT NULL,
  `exprieance_certificatte` varchar(30) NOT NULL,
  `files_info` varchar(500) NOT NULL,
  `index_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teachers_info`
--

INSERT INTO `teachers_info` (`id`, `user_id`, `fullname`, `farther_name`, `mother_name`, `birth_date`, `sex`, `present_address`, `permanent_address`, `phone`, `subject`, `position`, `working_hour`, `educational_qualification_1`, `educational_qualification_2`, `educational_qualification_3`, `educational_qualification_4`, `educational_qualification_5`, `teachers_photo`, `cv`, `educational_certificat`, `exprieance_certificatte`, `files_info`, `index_no`) VALUES
(1, '8', 'Willie B. Quint', 'Kevin A. Robledo', 'Mary T. McQuay', '12/05/1956', 'Male', '3133 Pointe Lane\\r\\nHollywood, FL 33020', '3133 Pointe Lane\\r\\nHollywood, FL 33020', '+8801245852315', 'English', 'Assistant Headmaster', 'Full time', 'SSC,Test School,A+,1978', 'HSC,Test College,A+,1980', 'Graduation ( Test ),Test University,A,1984', 'Masters Degree,Test University,A,1986', '', 'ac197cff181d9c58027800912c3e0855.png', 'submited', 'submited', 'submited', 'Teacher 2016', '12004'),
(2, '9', 'Fredrick V. Keyes', 'Anthony T. Andrews', 'Mary J. Dahl', '20/12/1970', 'Male', '712 Beechwood Drive\\r\\nChurchville, MD 21028 ', '712 Beechwood Drive\\r\\nChurchville, MD 21028 ', '+8801245852315', 'Mathematics', 'Senior Teacher', 'Full time', 'SSC,Test School,A+,1988', 'HSC,Test College,A,1990', 'Graduation ( Test ),Test University,A,1994', 'Masters Degree,Test University,A,1996', '', '0f8649af98ca9c0e85957db7e9778191.png', 'submited', 'submited', 'submited', 'Teacher 2016', '12006'),
(3, '10', 'mumar abboud', 'Hadi Shakir Essa', 'Yamha Dhakiyah Mikhail', '11/11/1980', 'Male', '71 City Walls Rd\\\\\\\\r\\\\\\\\nCLOCK FACE\\\\\\\\r\\\\\\\\nWA9 6BG', '71 City Walls Rd\\\\\\\\r\\\\\\\\nCLOCK FACE\\\\\\\\r\\\\\\\\nWA9 6BG', '+8801245852315', 'Bangla ', 'Teacher', 'Full time', 'SSC,Test School,A+,1998', 'HSC,Test College,A,2000', 'Graduation ( Test ),Test University,A,2004', 'Masters Degree,Test University,B,2006', '', '3566d34fc7ce565ba8841d0eaf537b28.png', 'submited', 'submited', 'submited', 'Teacher 2016', '12051'),
(4, '11', 'Inayah Asfour', 'Fatin Husayn', 'Rukan Habeeba', '12/12/1980', 'Female', '31 Clasper Way\\r\\nHEST BANK\\r\\nLA2 2HF ', '31 Clasper Way\\r\\nHEST BANK\\r\\nLA2 2HF ', '+8801245852315', 'Science', 'Teacher', 'Full time', 'SSC,Test School,A+,1998', 'HSC,Test College,A+,2000', 'Graduation ( Test ),Test University,A,2004', 'Masters Degree,Test University,A,2006', '', 'f342f5b3412a5c4be681878ff0462e09.png', 'submited', 'submited', 'submited', 'Teacher 2016', '12056');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE IF NOT EXISTS `teacher_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `employ_id` int(11) NOT NULL,
  `employ_title` varchar(150) NOT NULL,
  `present_or_absent` text NOT NULL,
  `attend_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `year`, `date`, `employ_id`, `employ_title`, `present_or_absent`, `attend_time`) VALUES
(1, 2018, 1464991200, 1, 'Headmaster', 'Present', '02:33 pm'),
(2, 2018, 1464991200, 2, 'Helen K Helton', 'Present', '02:34 pm'),
(3, 2018, 1464991200, 6, 'Robert D. Franco', 'Present', '02:34 pm'),
(4, 2018, 1464991200, 7, 'Michael R. Kemp', 'Present', '02:34 pm'),
(5, 2018, 1464991200, 8, 'Willie B. Quint', 'Absent', ''),
(6, 2018, 1464991200, 9, 'Fredrick V. Keyes', 'Present', '02:34 pm'),
(7, 2018, 1464991200, 10, 'mumar abboud', 'Absent', ''),
(8, 2018, 1464991200, 11, 'Inayah Asfour', 'Present', '02:34 pm'),
(9, 2018, 1466287200, 1, 'Headmaster', 'Present', '11:46 pm'),
(10, 2018, 1466287200, 2, 'Helen K Helton', 'Absent', ''),
(11, 2018, 1466287200, 6, 'Robert D. Franco', 'Present', '11:47 pm'),
(12, 2018, 1466287200, 7, 'Michael R. Kemp', 'Present', '11:47 pm'),
(13, 2018, 1466287200, 8, 'Willie B. Quint', 'Absent', ''),
(14, 2018, 1466287200, 9, 'Fredrick V. Keyes', 'Present', '11:47 pm'),
(15, 2018, 1466287200, 10, 'mumar abboud', 'Absent', ''),
(16, 2018, 1466287200, 11, 'Inayah Asfour', 'Present', '11:47 pm'),
(17, 2018, 1472767200, 1, 'Headmaster', 'Absent', ''),
(18, 2018, 1472767200, 2, 'Helen K Helton', 'Absent', ''),
(19, 2018, 1472767200, 6, 'Robert D. Franco', 'Absent', ''),
(20, 2018, 1472767200, 7, 'Michael R. Kemp', 'Absent', ''),
(21, 2018, 1472767200, 8, 'Willie B. Quint', 'Absent', ''),
(22, 2018, 1472767200, 9, 'Fredrick V. Keyes', 'Absent', ''),
(23, 2018, 1472767200, 10, 'mumar abboud', 'Absent', ''),
(24, 2018, 1472767200, 11, 'Inayah Asfour', 'Absent', '');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE IF NOT EXISTS `transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `acco_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`id`, `date`, `acco_id`, `category`, `amount`, `balance`) VALUES
(1, 1463025600, 1, 'Expense', 16200, 6200),
(2, 1475186400, 2, 'Income', 34000, 30200),
(3, 1475186400, 1, 'Expense', 10000, 10200);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rout_title` varchar(200) NOT NULL,
  `start_end` varchar(300) NOT NULL,
  `vicles_amount` varchar(20) NOT NULL,
  `descriptions` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `farther_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `birth_date` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `working_hour` varchar(30) NOT NULL,
  `educational_qualification_1` varchar(200) NOT NULL,
  `educational_qualification_2` varchar(200) NOT NULL,
  `educational_qualification_3` varchar(200) NOT NULL,
  `educational_qualification_4` varchar(200) NOT NULL,
  `educational_qualification_5` varchar(200) NOT NULL,
  `users_photo` varchar(200) NOT NULL,
  `cv` varchar(30) NOT NULL,
  `educational_certificat` varchar(30) NOT NULL,
  `exprieance_certificatte` varchar(30) NOT NULL,
  `files_info` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_id`, `group_id`, `full_name`, `farther_name`, `mother_name`, `birth_date`, `sex`, `present_address`, `permanent_address`, `working_hour`, `educational_qualification_1`, `educational_qualification_2`, `educational_qualification_3`, `educational_qualification_4`, `educational_qualification_5`, `users_photo`, `cv`, `educational_certificat`, `exprieance_certificatte`, `files_info`, `phone`) VALUES
(1, 2, 0, 'Helen K Helton', 'Chris R. Darling', 'Stephanie T. Hinson', '31/12/1978', 'Female', '3129 Eastland Avenue\\\\\\\\nHattiesburg, MS 39402 ', '3129 Eastland Avenue\\\\\\\\nHattiesburg, MS 39402 ', 'Full time', 'SSC,Test International School,5,1998', 'HSC,Test International College,4,2000', 'BBA,Test International University,3,2004', '', '', '6e2a86d6a6645f4f52d8c92976084147.png', 'submited', 'submited', 'on', 'Employe File 2010', '6013745038'),
(2, 6, 7, 'Robert D. Franco', 'Daniel T. Rodriguez', 'Sandra A. Foster', '27/05/2016', 'Male', '384 Rogers Street\\r\\nCincinnati, OH 45202 ', '384 Rogers Street\\r\\nCincinnati, OH 45202 ', 'Full time', 'SSC,Test School,A,2010', 'HSC,Test College,A,2012', '', '', '', '6e6fb5f286e6aef4cf0d711d591dab77.png', 'submited', 'submited', 'submited', 'Employee 2016', '+88012458523546'),
(3, 7, 8, 'Michael R. Kemp', 'Brian F. Massey', 'Barbara S. Williams', '10/01/1997', 'Male', '1329 Dovetail Drive\\r\\nSchaumburg, IL 60173 ', '1329 Dovetail Drive\\r\\nSchaumburg, IL 60173 ', 'Full time', 'SSC,Test School,A,2006', 'HSC,Test College,A,2008', '', '', '', 'bd6459ab36d89b61f3b59fbec7a6546a.png', 'submited', 'submited', 'submited', 'Employee 2016', '+88012458523546');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile_image` varchar(100) NOT NULL,
  `user_status` text NOT NULL,
  `leave_status` varchar(15) NOT NULL,
  `leave_start` int(11) NOT NULL,
  `leave_end` int(11) NOT NULL,
  `salary` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `profile_image`, `user_status`, `leave_status`, `leave_start`, `leave_end`, `salary`) VALUES
(1, '127.0.0.1', 'Headmaster', '$2y$08$qBQ/MzJzXyil0yuVM.s1XewJerIMCntwxez/Jfs3x/xwxFnkKWo2y', NULL, 'admin@admin.com', NULL, 'HBj4C30st5pOHbjpHojzGu4667ad49e75655b131', 1420113369, 'IcD7gVAwU5DDX4jTuWOVXe', 1268889823, 1504672163, 1, 'Kermit J.', 'Jackson', '123456789', 'admin.png', 'Employee', 'Available', 1447196400, 1449874800, 1),
(2, '103.19.253.234', 'Helen K Helton', '$2y$08$j3.kB7ltD9xEbzmFjOS9LOoRwixDO9QLAQyEL4Q.Z0yFzR5Y3.REu', NULL, 'accountent@accountent.com', NULL, NULL, NULL, NULL, 1460832200, 1476551706, 1, 'Helen K', 'Helton', '6013745038', '6e2a86d6a6645f4f52d8c92976084147.png', 'Employee', 'Available', 0, 0, 0),
(4, '163.53.151.114', 'Benjamin D. Lampe', '$2y$08$UZqFCNVao6U131G8hTKF1.uKWDqdJa8A/4N15r3K9zXDNRBK0SPLa', NULL, 'student@student.com', NULL, NULL, NULL, NULL, 1462440816, 1504672150, 1, 'Benjamin', 'D. Lampe', '763496-3372', 'f1829afa3cdbed1c643b000b1ea6ab02.jpg', '', '', 0, 0, 0),
(6, '::1', 'Robert D. Franco', '$2y$08$PD.O8yAOswzTdh.wKKCkw.Y4NOCo2krRPsBWjDjKUXTqdJwcYFHIG', NULL, 'librayan@librayan.com', NULL, NULL, NULL, NULL, 1464371447, 1476255999, 1, 'Robert D.', 'Franco', '+88012458523546', '6e6fb5f286e6aef4cf0d711d591dab77.png', 'Employee', 'Available', 0, 0, 0),
(7, '::1', 'Michael R. Kemp', '$2y$08$aAQPoEqM.PtL/x2XGdx8H.N7Fi0nnet8oNWFbMlQ4RA6Zi6SyGLfC', NULL, 'driver@driver.com', NULL, NULL, NULL, NULL, 1464410002, 1464410002, 1, 'Michael R.', 'Kemp', '+88012458523546', 'bd6459ab36d89b61f3b59fbec7a6546a.png', 'Employee', 'Available', 0, 0, 0),
(8, '::1', 'Willie B. Quint', '$2y$08$bUa9ENO.Q3mH08h27L1O..McEUh8Avvw1HHOgwUTqGuam8H6ew4RC', NULL, 'teacher@teacher.com', NULL, NULL, NULL, NULL, 1464418997, 1504672138, 1, 'Willie B.', 'Quint', '+8801245852315', 'ac197cff181d9c58027800912c3e0855.png', 'Employee', 'Available', 0, 0, 0),
(9, '::1', 'Fredrick V. Keyes', '$2y$08$L9r7/FCRlUzu9utQNUMBdOQLdmhd1zru9dmIh9TQKgxkkLhvuLQwS', NULL, 'fredrickvkeyes@inbound.plus', NULL, NULL, NULL, NULL, 1464419454, 1465590774, 1, 'Fredrick V.', 'Keyes', '+8801245852315', '0f8649af98ca9c0e85957db7e9778191.png', 'Employee', 'Available', 0, 0, 0),
(10, '::1', 'mumar abboud', '$2y$08$VNNakNjro8sKwpMpd5yoiOAkYMirUZR3Ijhg68Pbi/vl5wRr/zaAW', NULL, 'abboud@inbound.com', NULL, NULL, NULL, NULL, 1464421270, 1464421270, 1, 'Mumar', 'Abboud', '+8801245852315', '3566d34fc7ce565ba8841d0eaf537b28.png', 'Employee', 'Available', 0, 0, 0),
(11, '::1', 'Inayah Asfour', '$2y$08$O380.SilocgqTwOUGrp3oe1prnf2Y3SI9yMjWkGtp6kzRfTi6dnH.', NULL, 'asfour@inbound.com', NULL, NULL, NULL, NULL, 1464421485, 1464421485, 1, 'Inayah', 'Asfour', '+8801245852315', 'f342f5b3412a5c4be681878ff0462e09.png', 'Employee', 'Available', 0, 0, 0),
(12, '::1', 'Rahim Hasan', '$2y$08$wzEhfWmcCIHnZncAqgGqm.7Own9JW5nJ3bm4zOwAziW2nLf/6zFq2', NULL, 'rahim@rahim.com', NULL, NULL, NULL, NULL, 1464523831, 1464523831, 1, 'Rahim', 'Hasan', '+8801245852315', '21e39ae6c4f966a8657d11d36084b8fc.jpg', '', '', 0, 0, 0),
(13, '::1', 'Junayed Hak', '$2y$08$Rn2z8QDqcPHSUqdOK5qAlu.6f.9TklC2iAVrcaL/yRsuAZ4ra/vMu', NULL, 'junayed@junayed.com', NULL, NULL, NULL, NULL, 1464524017, 1464524017, 1, 'Junayed', 'Hak', '+8801245852315', '7667367fd4bded46db7e2ee3010f987f.jpg', '', '', 0, 0, 0),
(14, '::1', 'John E. Williams  Deidra D. Shaw ', '$2y$08$PILzSWooOdWWMwuVZNGzlePvMbAPCypnCKC1nwLKqP2f9AW8Tfiym', NULL, 'parents@parents.com', NULL, NULL, NULL, NULL, 1464543329, 1476249922, 1, 'John E. Williams ', 'Deidra D. Shaw ', '+8801245852315', '381700c24030d799489320dd5b734c3a.png', '', '', 0, 0, 0),
(15, '::1', 'Jafor Uddin Julakha Begum', '$2y$08$u5gaDPimVAF0JRswU5nvP.6iRYNNyJbyoJhiKVq4.DaSM3GW/i/2W', NULL, 'jafor@jafor.com', NULL, NULL, NULL, NULL, 1464543517, 1464543517, 1, 'Jafor Uddin', 'Julakha Begum', '+8801245852315', '96d721209bf9c71dc6c6cb3902c12b89.png', '', '', 0, 0, 0),
(16, '::1', 'Razia Akture', '$2y$08$n0btDbZk997d8XQKJAAiKuoYkB664EauFFJIjsMbH1NLTFX5Xwmjy', NULL, 'razia@razia.com', NULL, NULL, NULL, NULL, 1464845013, 1464845013, 1, 'Razia', 'Akture', '+8801245852315', 'f4498b9e3c9d2f933e4026cb0801105c.jpg', '', '', 0, 0, 0),
(17, '::1', 'Abdullah  hossain', '$2y$08$147fSivwLuSVNNGgiITlTuacM4V.RVngX3UjFNQ5GrvIz1nj9/hQq', NULL, 'abdullah@abdullah.com', NULL, NULL, NULL, NULL, 1464845456, 1464845456, 1, 'Abdullah', ' hossain', '+88012458523546', '2408f2dc2b3af87133555dab5815f027.jpg', '', '', 0, 0, 0),
(18, '::1', 'Sujana Ahmed', '$2y$08$0PAP.9sHSfIACVAIsrOC3exvtkLXK3xV0M.H1OUrBOYx8SAAsqU3u', NULL, 'sujana@sujana.com', NULL, NULL, NULL, NULL, 1464845853, 1464845853, 1, 'Sujana', 'Ahmed', '+88012458523546', 'c2b15925a33cddc0ca58a2c504c66bff.jpg', '', '', 0, 0, 0),
(19, '::1', 'Mahmud Hasan', '$2y$08$DwVTieM9nUBqfa52zTiJL.n36eb.adxZ9dUTpNhZwqIjRJjJZffze', NULL, 'mahmud@mahmud.com', NULL, NULL, NULL, NULL, 1464846116, 1464846116, 1, 'Mahmud', 'Hasan', '+880+880124585231', '10dd794d22c7c0ca38b89508c2febc41.jpg', '', '', 0, 0, 0),
(20, '::1', 'Mahbuba Akter', '$2y$08$gyI/8LRrr4EO8CuZP16K.uoTTj0MaUnZ3IfUrXEqu/funYC3Fxm3G', NULL, 'mahbuba@mahbuba.com', NULL, NULL, NULL, NULL, 1464846366, 1464846366, 1, 'Mahbuba', 'Akter', '+8801245852354', 'aa3fab97275a0a85652bfe7fbfa91666.jpg', '', '', 0, 0, 0),
(21, '::1', 'Irfan Hossain', '$2y$08$1kM0mGEaaGtyPG2V7AdB9eUz1PUniNbNp.zAf8DgWYiblteRTj8OC', NULL, 'irfan@irfan.com', NULL, NULL, NULL, NULL, 1464846640, 1464846640, 1, 'Irfan', 'Hossain', '+88012458578945', '50875054077eb4436e78b8f2796761a8.jpg', '', '', 0, 0, 0),
(22, '::1', 'Imran Hasan', '$2y$08$DGE9z7S3rBe9xERGEGXMGOtmTdhJxq7t4PLHBW79OlKTYMf0EUwOa', NULL, 'imran@imran.com', NULL, NULL, NULL, NULL, 1464847183, 1464847183, 1, 'Imran', 'Hasan', '+8801245854521', '9e01047b759770110ed29b254db908d7.jpg', '', '', 0, 0, 0),
(23, '::1', 'Polash Sarder', '$2y$08$kv6XLhcRJt/CYCm9FAv.YeVukijbEE89EE2GDoVN6bwIPGnA/vAR.', NULL, 'polash@polash.com', NULL, NULL, NULL, NULL, 1464847571, 1464847571, 1, 'Polash', 'Sarder', '+88012458529632', '41e56e4c5efe83fa80966da3ea23c98f.jpg', '', '', 0, 0, 0),
(24, '::1', 'Sumon Akon', '$2y$08$Q7ip./kPwq3Lq2IZlvjgw.kNOLjQptLMTFSObrfvckzYFE9RvoiXC', NULL, 'julhash@julhash.com', NULL, NULL, NULL, NULL, 1464848198, 1464848198, 1, 'Sumon', 'Akon', '+8801245852385', '8337f3befe383f4770df79b1c01cc8ae.jpg', '', '', 0, 0, 0),
(25, '::1', 'Farjana Akter', '$2y$08$7kfUaE9rgSWVXWTgu9eDceTqXhAhPhcgse4bjgoz/NKS5lAmXalWO', NULL, 'farjana@farjana.com', NULL, NULL, NULL, NULL, 1464848494, 1464848494, 1, 'Farjana', 'Akter', '+88012458527412', 'c2da4f488e8b188bf8cc3bf1a2049b2f.png', '', '', 0, 0, 0),
(26, '::1', 'Akram Hossain', '$2y$08$Zh7ycj5rxqwXQroYDArGkeGXYGuYAI4WRLPkSJJ1icjz0QdQq.h9q', NULL, 'akram@akramn.com', NULL, NULL, NULL, NULL, 1464849008, 1464849008, 1, 'Akram', 'Hossain', '+88012458529632', '58b17c784b9f7eca12209969b01bc0a9.jpg', '', '', 0, 0, 0),
(27, '::1', 'Alamin Saeder', '$2y$08$G.uY4OQzAmysV7E5Efj9/u.Yp5U7s9rjifjYYpqqeyij8R/jEr7Aq', NULL, 'alamin@alamin.com', NULL, NULL, NULL, NULL, 1464849538, 1464849538, 1, 'Alamin', 'Saeder', '+880+880124585231', '1fa9258bf0ffdc9ebe01d17154c25e56.jpg', '', '', 0, 0, 0),
(28, '::1', 'Sabina Sumi', '$2y$08$es7XiUiPiPORCL2TZy6etOXOEWsADSNmKMe1QZjrKo/SBwkyrn74a', NULL, 'sabina@sabina.com', NULL, NULL, NULL, NULL, 1464850013, 1464850013, 1, 'Sabina', 'Sumi', '+88012458523546', 'e0237b45f347083352f7cd500286914f.jpg', '', '', 0, 0, 0),
(29, '::1', 'Sanjida Hossain', '$2y$08$GZ14P2ZiZZsn95oqJjYyVeYobTl4wPIBW80o./VxP9VuRiibKoJS2', NULL, 'sanjida@sanjida.com', NULL, NULL, NULL, NULL, 1464850675, 1464850675, 1, 'Sanjida', 'Hossain', '+8801245852354', 'e2cee6b429e9423c627d8a34027ca44c.jpg', '', '', 0, 0, 0),
(30, '::1', 'Kawser  Shikder', '$2y$08$PlTRvMrvbtdYPJ7YfBdsS.nsx6Ret6fyb3UWYMzQ2KVHo3ysAA3g2', NULL, 'kawser@kawser.com', NULL, NULL, NULL, NULL, 1464851021, 1464851021, 1, 'Kawser', ' Shikder', '+880124585784521', 'e63eb2b5e250aa6b773c795054dea21a.jpg', '', '', 0, 0, 0),
(31, '::1', 'Shohana Akter', '$2y$08$Mc46am1HSrpmzhyo5a6bo.K4/ShuiJC2Ub0yLBpMHtITDGsBECcAG', NULL, 'shohana@shohana.com', NULL, NULL, NULL, NULL, 1464851240, 1464851240, 1, 'Shohana', 'Akter', '+88012458523532', '9e8641a879671c2b4a31e77c197a9d3f.jpg', '', '', 0, 0, 0),
(32, '::1', 'Juthi Khanam', '$2y$08$QneLBSPZAKN/U3HuDfVaWOYAEARd5A0tg2TblW.v1zCperCZdXvEK', NULL, 'juthi@juthi.com', NULL, NULL, NULL, NULL, 1464851435, 1464851435, 1, 'Juthi', 'Khanam', '+88012458578478541', '5c99d031c2aaa455c46b467194ebe04f.jpg', '', '', 0, 0, 0),
(33, '::1', 'Tanjila Akter', '$2y$08$BLnthpFLflyaPNBNWfjseOiK3x6wO2tuotSI5d8dz2SOm4QfJBfYe', NULL, 'tanjila@tanjila.com', NULL, NULL, NULL, NULL, 1464875715, 1464875715, 1, 'Tanjila', 'Akter', '+88012458524521', '88b05c84d9940f9827b4f020bffb46df.jpg', '', '', 0, 0, 0),
(34, '::1', 'Nusrat Jahan', '$2y$08$7NK58SXiWYJqYYXZ07zLkO8O3b/RM4B.vIAKW82MD07t7sUFffaPS', NULL, 'nusrat@nusrat.com', NULL, NULL, NULL, NULL, 1464875957, 1464875957, 1, 'Nusrat', 'Jahan', '+88012458527452', 'ea1e8ed789f4d1f4a5780a31a075e9a8.jpg', '', '', 0, 0, 0),
(35, '::1', 'Amina Akter', '$2y$08$UZupiBsejH37dLxkYpXv4OEF1mJaGTvSxZ6tf.XigdzjJwZ3U6/H2', NULL, 'amina@amina.com', NULL, NULL, NULL, NULL, 1464877185, 1464877185, 1, 'Amina', 'Akter', '+880124585236521', 'bf45f3417020caab83136fc790a837a4.jpg', '', '', 0, 0, 0),
(36, '::1', 'Ebrahim Khondokar', '$2y$08$xgtkYt4lMgpXXFOOlajcRebiI5EAkJWUy6IBLtZIZgZwAzwjtF3xe', NULL, 'ebrahim@ebrahim.com', NULL, NULL, NULL, NULL, 1464877671, 1464877671, 1, 'Ebrahim', 'Khondokar', '+88012458451397', 'd1ccdd70ebb675f762aa6de55ecc5927.jpg', '', '', 0, 0, 0),
(37, '::1', 'Mintu  Fokir', '$2y$08$b3TqIITatEpTZkCbdpprQeSdTx3CttfFrdDqZYktkrSk/DnIflJLu', NULL, 'mintu@mintu.com', NULL, NULL, NULL, NULL, 1464877919, 1464877919, 1, 'Mintu ', 'Fokir', '+880+8801245789', 'efae644abc3a8621ba3703b861c5117d.jpg', '', '', 0, 0, 0),
(38, '::1', 'Shohid Islam', '$2y$08$zbtQsdM7dkj3947YVvge9.bI.8Lqy19lcGAdFZjxN9NtgPxCsUrka', NULL, 'shohid@shohid.com', NULL, NULL, NULL, NULL, 1464879564, 1464879564, 1, 'Shohid', 'Islam', '+88012458529632', '840aa12c41963600fd7993e55aa7d7ab.jpg', '', '', 0, 0, 0),
(39, '::1', 'Khadija Akter', '$2y$08$7hmmafAM8gcBt9wkqxSbueCRPrHO/mUPJOt.WaGKo7Ync6WeMJ2Eq', NULL, 'khadija@khadija.com', NULL, NULL, NULL, NULL, 1464879732, 1464879732, 1, 'Khadija', 'Akter', '+88012458578478541', '2d0f6d650516b7d5f2c958ed73c88a22.jpg', '', '', 0, 0, 0),
(40, '::1', 'Maruf Hossain', '$2y$08$EwLh2n9Cop2M547YQTvtQOlt3xPEcRLYov16rGyJAxzGpNrsqu.fu', NULL, 'maruf@maruf.com', NULL, NULL, NULL, NULL, 1464880270, 1464880270, 1, 'Maruf', 'Hossain', '+88012458523546', '5149696a702583dfa0f89ab3e77e4057.jpg', '', '', 0, 0, 0),
(41, '::1', 'Mitu  Akter', '$2y$08$01.eZKT4HgziWSYp2arNbuO5lv0mmt3ySROXk/GP4lTMLTbI3BZhe', NULL, 'mitu@mitu.com', NULL, NULL, NULL, NULL, 1464880835, 1464880835, 1, 'Mitu ', 'Akter', '+880+8801245789', 'c71ff3b9a9436344ffd8dc8bc5b57856.jpg', '', '', 0, 0, 0),
(42, '::1', 'Rayhan  Kebria', '$2y$08$lY5fbvbsrcRmHRRFGAULju7.Bv5CizGDnSoFyk7/G40EF4.Ssg.hy', NULL, 'rayhan@rayhan.com', NULL, NULL, NULL, NULL, 1464881271, 1464881271, 1, 'Rayhan ', 'Kebria', '+880+8801245789', '6cd5fd41b32dd2cffaa1a397bfeb8fd1.jpg', '', '', 0, 0, 0),
(44, '::1', 'Airin Akter', '$2y$08$vwOLZ3iDXgLMd8h/5nol5eRVXsffnChVvr2svpW9M3FSekFTQhEKO', NULL, 'airin@airin.com', NULL, NULL, NULL, NULL, 1465232118, 1465232118, 1, 'Airin', 'Akter', '+880+88012454521', '4196bf4c30a4f94165fd82bfa98980d4.jpg', '', '', 0, 0, 0),
(45, '::1', 'Hemel Hossain', '$2y$08$WEeMR9DUWabbl.OsMj/IhOFHz/97zHB/9ChTi7/Q8NyYg3psS6pdy', NULL, 'hemel@hemel.com', NULL, NULL, NULL, NULL, 1465232452, 1465232452, 1, 'Hemel', 'Hossain', '+8801245852354', '855cfe1befcd31038add98bb6605c227.jpg', '', '', 0, 0, 0),
(46, '::1', 'Mou Akter', '$2y$08$HazDgna9I.Oko0yy39DDVu8K8dW04X22gMdKGBoyk5HFli9fgYM0.', NULL, 'mou@mou.com', NULL, NULL, NULL, NULL, 1465232764, 1465232764, 1, 'Mou', 'Akter', '+880+88012457521', '551bcf2eddf4aa49d629cadf543d7e33.jpg', '', '', 0, 0, 0),
(47, '::1', 'Dedar  Hossain', '$2y$08$Roieo2U7BvS879vVJ26LsOUxWan/mqulrGCjGR9QwnY7HhOOTQzQ2', NULL, 'dedar@dedar.com', NULL, NULL, NULL, NULL, 1465232995, 1465232995, 1, 'Dedar ', 'Hossain', '+880+88012478214', 'd8d9124d3a3f01e59538995a499a600a.jpg', '', '', 0, 0, 0),
(48, '::1', 'Samia Akter', '$2y$08$LXMgXm9JUcDLuMjNWKJB8ORNhABddQ4/NOUZa5SLQbd8gVSkGEeC2', NULL, 'samia@samia.com', NULL, NULL, NULL, NULL, 1465233355, 1465233355, 1, 'Samia', 'Akter', '+880+8801241020', '992d1504661e0f1a6fb7f1b87da0b8be.jpg', '', '', 0, 0, 0),
(49, '::1', 'Al Mamun', '$2y$08$rkBs.snMZ/zDUed8Pt1LgeRt4GRYJE3c6SCE1qBJtfuiFjO5JygR.', NULL, 'mamun@mamun.com', NULL, NULL, NULL, NULL, 1465233538, 1465233538, 1, 'Al', 'Mamun', '+880+8801245854210', '637e0e2d01bf463d9791cc77cac00485.jpg', '', '', 0, 0, 0),
(50, '::1', 'Jiniya Hoq', '$2y$08$Z1JAJ.CnEnt1XM.7aNW3YeUHuMH5TLGW0nDVnCJ5bmVvh/nPIjgh6', NULL, 'jiniya@jiniya.com', NULL, NULL, NULL, NULL, 1465233738, 1465233738, 1, 'Jiniya', 'Hoq', '+8801245852354', '4e211b4b8cedfa67d84414d5ae412c48.jpg', '', '', 0, 0, 0),
(51, '::1', 'Junayed Ahmed', '$2y$08$nBhsj/9wBPdBFbP1g2VhxeChN2jB7ixs3Q9ULn9p1mi1nkQ4ChfU6', NULL, 'junayed@junayed09.com', NULL, NULL, NULL, NULL, 1465235475, 1465235475, 1, 'Junayed', 'Ahmed', '+880+880124585231', '8d37adbd2454c51222d14936cbb3f125.jpg', '', '', 0, 0, 0),
(52, '::1', 'Priya Ahmed', '$2y$08$7Z95o70V64sKc/8EQ/ZskOA2Fx/wO0nSfKSlcZwRJ6K8UzhnrWorS', NULL, 'priya@priya.com', NULL, NULL, NULL, NULL, 1465235730, 1465235730, 1, 'Priya', 'Ahmed', '+880+8801245852541', 'e7b45f5e5a62e632ba6bb7d504d25299.jpg', '', '', 0, 0, 0),
(53, '::1', 'Mithu Khondokar', '$2y$08$95cLc.PFzQI61Z/OpHbLg.KT0XcIg4MEY9HhXi1wzo7ixHNjp/a1y', NULL, 'mithu@mithu.com', NULL, NULL, NULL, NULL, 1465236023, 1465236023, 1, 'Mithu', 'Khondokar', '+8801245852354', 'e3bc44fb33852bf16b2387800debd943.jpg', '', '', 0, 0, 0),
(54, '::1', 'Rasel Hossain', '$2y$08$/VLCV2D3DgBptLsJ6PCufOYn1ZEuv8fEJ1NyStRvLCG4PJyMAHjfO', NULL, 'rasel@rasel.com', NULL, NULL, NULL, NULL, 1465236257, 1465236257, 1, 'Rasel', 'Hossain', '+880+88012458527854', '061d3b9631a8a0d7acddae6efa0106ae.jpg', '', '', 0, 0, 0),
(55, '::1', 'Test Name', '$2y$08$IKl/v5tDDJHFnn7rWrSsCOHMX6J5oTf9cw8yKeZa2i1wJoqnHbLOi', NULL, 'abc@abc.com', NULL, NULL, NULL, NULL, 1475243042, 1475243042, 1, 'Test', 'Name', '+88001245885', '874c4c955d8043a1205ccb2d388b927f.png', '', '', 0, 0, 0),
(56, '::1', 'Test Name1', '$2y$08$Bhzm5MF0BXB4HvIgmqRa/O2lgxAW8Pgua65dk9ejkdwdQ91ZL8lEy', NULL, 'abcd@abcd.com', NULL, NULL, NULL, NULL, 1475910937, 1475910937, 1, 'Test', 'Name', '+88001245885', '48f0d67ff796756b0efa6109727eb2fc.jpg', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 6),
(4, 4, 3),
(6, 6, 7),
(7, 7, 8),
(8, 8, 4),
(9, 9, 4),
(10, 10, 4),
(11, 11, 4),
(12, 12, 3),
(13, 13, 3),
(14, 14, 5),
(15, 15, 5),
(16, 16, 3),
(17, 17, 3),
(18, 18, 3),
(19, 19, 3),
(20, 20, 3),
(21, 21, 3),
(22, 22, 3),
(23, 23, 3),
(24, 24, 3),
(25, 25, 3),
(26, 26, 3),
(27, 27, 3),
(28, 28, 3),
(29, 29, 3),
(30, 30, 3),
(31, 31, 3),
(32, 32, 3),
(33, 33, 3),
(34, 34, 3),
(35, 35, 3),
(36, 36, 3),
(37, 37, 3),
(38, 38, 3),
(39, 39, 3),
(40, 40, 3),
(41, 41, 3),
(42, 42, 3),
(44, 44, 3),
(45, 45, 3),
(46, 46, 3),
(47, 47, 3),
(48, 48, 3),
(49, 49, 3),
(50, 50, 3),
(51, 51, 3),
(52, 52, 3),
(53, 53, 3),
(54, 54, 3),
(55, 55, 3),
(56, 56, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) NOT NULL,
  `company_phone` varchar(15) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cp_name` varchar(150) NOT NULL,
  `cp_address` varchar(200) NOT NULL,
  `cp_phone` varchar(15) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `branch_name` varchar(15) NOT NULL,
  `account_no` varchar(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `company_name`, `company_phone`, `company_email`, `country`, `state`, `city`, `cp_name`, `cp_address`, `cp_phone`, `bank_name`, `branch_name`, `account_no`, `ifsc_code`) VALUES
(1, 'Roize Ltd.', '01245367', 'test@gmail.com', 'Bangladesh', '', 'Dhaka', 'Roize Uddin', 'Contact,person,test address', '11223344556', 'DBBL LTD.', 'Gulshan1', '123456789425214', ''),
(2, 'Moin Group Ltd.', '01245367', 'moin@gmail.com', 'Bangladesh', '', 'Dhaka', 'Moin Mia', 'Contact,person,test address', '11223344556', 'DBBL LTD.', 'Gulshan1', '123456789425214', ''),
(3, 'Abu Daout', '01245367', 'daout@gmail.com', 'Bangladesh', '', 'Dhaka', 'Moin Mia', 'Contact,person,test address', '11223344556', 'DBBL LTD.', 'Gulshan1', '123456789425214', ''),
(4, 'Bablu Furniture Ltd.', '012453671425', 'bablu@gmail.com', 'Bangladesh', '', 'Dhaka', 'Babul', 'Contact,person,test address', '11223344556', 'DBBL LTD.', 'Gulshan1', '123456789425214', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
