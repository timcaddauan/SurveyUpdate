-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 08:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cssdbase`
--
CREATE DATABASE IF NOT EXISTS `cssdbase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cssdbase`;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `department_id` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`department_id`, `department`) VALUES
(1, 'IT Department'),
(2, 'HR Department'),
(3, 'Accounting Department'),
(4, 'Social Service'),
(5, 'HIMS Department'),
(6, 'Emergency Room'),
(7, 'Pharmacy'),
(8, 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_area`
--

CREATE TABLE `evaluation_area` (
  `id` int(11) NOT NULL,
  `area_name` text NOT NULL,
  `parent_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation_area`
--

INSERT INTO `evaluation_area` (`id`, `area_name`, `parent_id`) VALUES
(1, 'Citizen\'s Charter', NULL),
(2, 'SQD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-09-084057', 'App\\Database\\Migrations\\FeedbackModelMigration', 'default', 'App', 1728623811, 1),
(2, '2024-10-10-020914', 'App\\Database\\Migrations\\QuestionsModelMigration', 'default', 'App', 1728623811, 1),
(3, '2024-10-10-045309', 'App\\Database\\Migrations\\QuestionsModelMigration', 'default', 'App', 1728623902, 2),
(4, '2024-10-10-045330', 'App\\Database\\Migrations\\UserModelMigration', 'default', 'App', 1728623902, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `respondent_id` int(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `read_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `respondent_id`, `message`, `is_read`, `created_at`, `read_status`) VALUES
(1, 1, 1, 'New response by Juan', 0, '2024-12-12 11:00:43', 0),
(2, 1, 2, 'New response by Betty', 0, '2024-12-12 11:04:31', 0),
(3, 1, 3, 'New response by Luffy', 0, '2024-12-12 11:17:33', 0),
(4, 1, 4, 'New response by Henry Sy', 0, '2024-12-12 11:35:19', 0),
(5, 1, 5, 'New response by TEEMO', 0, '2024-12-12 15:04:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions_tbl`
--

CREATE TABLE `questions_tbl` (
  `id` int(11) NOT NULL,
  `area_id` int(255) NOT NULL,
  `question` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions_tbl`
--

INSERT INTO `questions_tbl` (`id`, `area_id`, `question`, `type`) VALUES
(1, 2, 'Ako ay kuntento sa serbisyo na natanggap?', 'Rate'),
(2, 2, 'Gumugol ako ng makatwirang dami ng oras para sa aking transaction.', 'Rate'),
(3, 2, 'Ang mga hakbang (kabilang ang pagbabayad) na kailangan kong gawin para sa aking transaction ay madali at simple.', 'Rate'),
(4, 2, 'Madali akong nakahanap ng impormasyon tungkol sa aking transaksyon mula sa ospital at website.', 'Rate'),
(5, 2, 'Nagbayad ako ng makatwirang halaga ng mga bayarin.', 'Rate'),
(6, 2, 'Walang naging palakasan sa ospital na ito.', 'Rate'),
(7, 2, 'Magaling at matulungin ang mga tauhan sa ospital na ito.', 'Rate'),
(8, 2, 'Nakuha ko ang kailangan ko. O kung natanggihan ay naipaliwanag ng maayos.', 'Rate');

-- --------------------------------------------------------

--
-- Table structure for table `respondent_tbl`
--

CREATE TABLE `respondent_tbl` (
  `id` int(11) NOT NULL,
  `respondent_name` text NOT NULL,
  `gender` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `region` text DEFAULT NULL,
  `service_feedback` text DEFAULT NULL,
  `client_type` text DEFAULT NULL,
  `area_went` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `respondent_tbl`
--

INSERT INTO `respondent_tbl` (`id`, `respondent_name`, `gender`, `age`, `region`, `service_feedback`, `client_type`, `area_went`, `created_at`) VALUES
(1, 'Juan', 'Male', 30, 'Region 2', 'Maayos ang mga empleyado at matulungin.', 'Citizen', '1', '2024-12-11 19:00:43'),
(2, 'Betty', 'Female', 40, 'Region 2', 'Maayos ang mga empleyado at matulungin.', 'Citizen', '1', '2024-12-11 19:04:31'),
(3, 'Luffy', 'Male', 28, 'Region 2', 'Maayos ang mga empleyado at matulungin.', 'Government', '1', '2024-12-11 19:17:33'),
(4, 'Henry Sy', 'Male', 60, 'Region 2', 'Napaka bagal ng pagbibigay ng serbisyo at napakaingay ng lugar.', 'Business', '1', '2024-12-11 19:35:19'),
(5, 'TEEMO', 'Male', 28, 'Region 2', 'Nakaranas ako ng matagal na pagaantay.', 'Citizen', '1', '2024-12-11 23:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `response_value` varchar(255) NOT NULL,
  `respondent_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `question_id`, `response_value`, `respondent_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(2, 2, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(3, 3, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(4, 4, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(5, 5, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(6, 6, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(7, 7, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(8, 8, 'Strongly Agree', 1, 1, '2024-12-12', NULL),
(9, 1, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(10, 2, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(11, 3, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(12, 4, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(13, 5, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(14, 6, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(15, 7, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(16, 8, 'Strongly Agree', 2, 1, '2024-12-12', NULL),
(17, 1, 'Agree', 3, 1, '2024-12-12', NULL),
(18, 2, 'Agree', 3, 1, '2024-12-12', NULL),
(19, 3, 'Agree', 3, 1, '2024-12-12', NULL),
(20, 4, 'Agree', 3, 1, '2024-12-12', NULL),
(21, 5, 'Agree', 3, 1, '2024-12-12', NULL),
(22, 6, 'Agree', 3, 1, '2024-12-12', NULL),
(23, 7, 'Agree', 3, 1, '2024-12-12', NULL),
(24, 8, 'Agree', 3, 1, '2024-12-12', NULL),
(25, 1, 'Disagree', 4, 1, '2024-12-12', NULL),
(26, 2, 'Disagree', 4, 1, '2024-12-12', NULL),
(27, 3, 'Disagree', 4, 1, '2024-12-12', NULL),
(28, 4, 'Disagree', 4, 1, '2024-12-12', NULL),
(29, 5, 'Disagree', 4, 1, '2024-12-12', NULL),
(30, 6, 'Disagree', 4, 1, '2024-12-12', NULL),
(31, 7, 'Disagree', 4, 1, '2024-12-12', NULL),
(32, 8, 'Disagree', 4, 1, '2024-12-12', NULL),
(33, 1, 'Agree', 5, 1, '2024-12-12', NULL),
(34, 2, 'Neither Agree nor Disagree', 5, 1, '2024-12-12', NULL),
(35, 3, 'Disagree', 5, 1, '2024-12-12', NULL),
(36, 4, 'Neither Agree nor Disagree', 5, 1, '2024-12-12', NULL),
(37, 5, 'Strongly Disagree', 5, 1, '2024-12-12', NULL),
(38, 6, 'Disagree', 5, 1, '2024-12-12', NULL),
(39, 7, 'Strongly Disagree', 5, 1, '2024-12-12', NULL),
(40, 8, 'Disagree', 5, 1, '2024-12-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `satisfaction` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `time_spent` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `process_followed` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `steps_ease` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `info_access` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `payment_value` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `no_favoritism` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `staff_helpfulness` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `needed_info` enum('Strongly_Agree','Agree','Neither_agree_nor_dissatisfied','Disagree','Strongly_Disagree') DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `FullnameofRespondent` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `satisfaction`, `time_spent`, `process_followed`, `steps_ease`, `info_access`, `payment_value`, `no_favoritism`, `staff_helpfulness`, `needed_info`, `department_id`, `FullnameofRespondent`, `created_at`) VALUES
(11, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '', '2024-10-18 06:43:05'),
(12, 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 2, '', '2024-10-16 07:03:35'),
(13, 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', '', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 3, '', '2024-10-16 07:03:49'),
(14, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 4, '', '2024-10-16 07:05:21'),
(15, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 5, '', '2024-10-16 07:48:14'),
(16, 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 6, '', '2024-10-16 07:48:25'),
(17, 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 'Strongly_Disagree', 2, '', '2024-10-16 07:48:38'),
(18, 'Disagree', 'Disagree', 'Disagree', 'Disagree', 'Disagree', 'Disagree', 'Disagree', 'Disagree', 'Disagree', 7, '', '2024-10-16 07:48:48'),
(19, 'Strongly_Agree', 'Strongly_Agree', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', '', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 8, '', '2024-10-17 01:00:33'),
(20, 'Strongly_Agree', 'Strongly_Agree', 'Agree', 'Strongly_Agree', 'Agree', 'Strongly_Agree', 'Agree', 'Strongly_Agree', 'Agree', 1, '', '2024-10-17 06:50:07'),
(21, 'Strongly_Agree', 'Strongly_Agree', 'Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 2, '', '2024-10-17 07:49:03'),
(22, 'Strongly_Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 1, '', '2024-10-17 08:36:11'),
(23, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, 'TIM', '2024-10-18 01:07:42'),
(24, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, 'Armie', '2024-10-18 01:08:45'),
(25, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, 'TIM', '2024-10-18 01:20:51'),
(26, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-18 01:30:02'),
(27, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-18 01:35:58'),
(28, 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 1, 'Baby', '2024-10-18 01:37:12'),
(29, 'Agree', 'Neither_agree_nor_dissatisfied', 'Agree', 'Agree', 'Agree', 'Agree', 'Disagree', 'Agree', 'Agree', 1, '(Optional)', '2024-10-18 01:38:42'),
(30, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 5, '(Optional)', '2024-10-18 03:08:44'),
(31, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, 'BABA', '2024-10-18 03:27:29'),
(32, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-18 03:45:38'),
(33, 'Neither_agree_nor_dissatisfied', 'Neither_agree_nor_dissatisfied', 'Disagree', 'Disagree', '', 'Neither_agree_nor_dissatisfied', 'Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-18 07:22:51'),
(34, 'Agree', 'Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-18 07:59:14'),
(35, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-22 00:48:04'),
(36, 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 1, '(Optional)', '2024-10-23 02:19:50'),
(37, 'Strongly_Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 1, '(Optional)', '2024-10-23 05:45:16'),
(38, 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 'Agree', 1, '(Optional)', '2024-10-23 05:53:58'),
(39, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-23 06:54:04'),
(40, 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 'Strongly_Agree', 1, '(Optional)', '2024-10-28 01:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `survey_results`
--

CREATE TABLE `survey_results` (
  `id` int(11) NOT NULL,
  `satisfaction` varchar(50) DEFAULT NULL,
  `product_quality` varchar(50) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `usage_frequency` varchar(50) DEFAULT NULL,
  `best_experience` text DEFAULT NULL,
  `worst_experience` text DEFAULT NULL,
  `additional_services` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `improvement_suggestions` text DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_results`
--

INSERT INTO `survey_results` (`id`, `satisfaction`, `product_quality`, `product_price`, `usage_frequency`, `best_experience`, `worst_experience`, `additional_services`, `recommendations`, `improvement_suggestions`, `department_id`, `created_at`) VALUES
(12, 'very_satisfied', 'excellent', 'very_high', 'weekly', 'GOOD', 'WALA', 'WALA', 'WALA', 'WALA', 1, '2024-10-11 05:01:32'),
(13, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asdasd', 'asdasd', 'asdasd', 'asdas', 'asdas', 1, '2024-10-11 05:05:36'),
(14, 'very_satisfied', 'excellent', 'very_high', 'daily', 'ds', 'ds', 'ds', 'ds', 'ds', 2, '2024-10-11 05:32:17'),
(15, 'very_satisfied', 'average', 'high', 'weekly', 'asd', 'asd', 'asd', 'asd', 'asd', 3, '2024-10-11 05:45:49'),
(16, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 3, '2024-10-11 05:54:49'),
(17, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 3, '2024-10-11 05:55:21'),
(18, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 4, '2024-10-11 05:55:26'),
(19, 'very_satisfied', 'excellent', 'very_high', 'daily', 'sd', 'asd', 'asd', 'asd', 'asd', 4, '2024-10-11 05:56:11'),
(20, 'very_satisfied', 'excellent', 'high', 'weekly', 'ert', 'wer', 'wer', 'wer', 'wer', 4, '2024-10-11 05:57:29'),
(21, 'very_satisfied', 'good', 'high', 'weekly', 'asd', 'asd', 'asd', 'asd', 'asd', 4, '2024-10-11 06:10:07'),
(22, 'somewhat_dissatisfied', 'excellent', 'reasonable', 'monthly', 'dasdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, '2024-10-11 07:10:15'),
(23, 'very_satisfied', 'excellent', 'high', 'weekly', 'awdasdasd', 'asdasd', 'asdasd', 'asdasd', 'sdas', 1, '2024-10-14 02:35:06'),
(24, 'very_satisfied', 'excellent', 'very_high', 'daily', '123', '123', '123', '123', '123', 1, '2024-10-14 05:35:45'),
(25, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 1, '2024-10-14 05:55:59'),
(26, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 1, '2024-10-14 06:58:48'),
(27, 'very_satisfied', 'excellent', 'very_high', 'daily', 'wer', 'qwe', 'qwe', 'qwe', 'qwe', 2, '2024-10-14 07:07:58'),
(28, 'somewhat_satisfied', 'excellent', 'very_high', 'daily', 'wer', 'qwe', 'qwe', 'qwe', 'qwe', 2, '2024-10-14 07:10:48'),
(29, 'very_satisfied', 'excellent', 'high', 'monthly', 'asd', 'asd', 'asd', 'asd', 'asd', 2, '2024-10-14 07:12:33'),
(30, 'very_satisfied', 'excellent', 'very_high', 'weekly', 'saa', 'asd', 'asd', 'asd', 'asd', 5, '2024-10-14 07:14:19'),
(31, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 5, '2024-10-14 07:15:05'),
(32, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 5, '2024-10-14 07:17:43'),
(33, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 5, '2024-10-14 07:19:54'),
(34, 'very_satisfied', 'excellent', 'very_high', 'weekly', 'asd', 'asd', 'asd', 'asd', 'asd', 5, '2024-10-14 07:23:26'),
(35, 'very_satisfied', 'good', 'very_high', 'weekly', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 5, '2024-10-14 07:28:20'),
(36, 'very_satisfied', 'poor', 'reasonable', 'weekly', 'asd', 'asd', 'asd', 'asd', 'asd', 5, '2024-10-14 07:29:48'),
(37, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 07:32:19'),
(38, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 07:39:14'),
(39, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'hhheheheh', 0, '2024-10-14 07:39:37'),
(40, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 07:42:47'),
(41, 'very_satisfied', 'poor', 'low', 'rarely', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 07:52:48'),
(42, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 08:01:40'),
(43, 'very_satisfied', 'excellent', 'very_high', 'daily', '123', '123', '123', '123', '123', 0, '2024-10-14 08:03:54'),
(44, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-14 08:05:29'),
(45, 'very_satisfied', 'excellent', 'very_high', 'daily', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 0, '2024-10-14 08:23:26'),
(46, 'very_satisfied', 'good', 'very_high', 'monthly', 'asdasd', 'asdasd', 'asd', 'asdasd', 'asd', 0, '2024-10-14 08:43:06'),
(47, 'very_satisfied', 'excellent', 'very_high', 'daily', 'Wala', 'WALA', 'WALA', 'WALA', 'WALA', 0, '2024-10-14 08:49:53'),
(48, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-15 00:27:03'),
(49, 'very_satisfied', 'excellent', 'very_high', 'daily', 'asd', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-15 03:05:59'),
(50, 'very_satisfied', 'excellent', 'reasonable', 'daily', 'as', 'asd', 'asd', 'asd', 'asd', 0, '2024-10-15 03:08:35'),
(51, 'very_satisfied', 'excellent', 'very_high', 'daily', 'OK', 'OK', 'OK', 'OK', 'OK', 0, '2024-10-16 02:09:02'),
(52, 'very_satisfied', 'good', 'very_high', 'daily', 'Marami', 'marami din', 'libreng gamot na', 'maging mabait', 'maging maunawain', 0, '2024-11-04 03:05:47'),
(53, 'very_satisfied', 'good', 'very_high', 'daily', 'Marami', 'marami din', 'libreng gamot na', 'maging mabait', 'maging maunawain', 0, '2024-11-04 03:14:04'),
(54, 'very_satisfied', 'good', 'very_high', 'daily', 'Marami', 'marami din', 'libreng gamot na', 'maging mabait', 'maging maunawain', 0, '2024-11-04 03:14:08'),
(55, 'very_dissatisfied', 'poor', 'low', 'rarely', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 0, '2024-11-05 01:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `profession` text NOT NULL,
  `location` text NOT NULL,
  `website` text NOT NULL,
  `phone` text NOT NULL,
  `roletype` text NOT NULL,
  `profile_image` blob NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `profession`, `location`, `website`, `phone`, `roletype`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'timcaddauan', 'Timothy Kim', 'Caddauan', '$2y$10$WFRUcxiHGZ47yGcsSZxAr.mo2KRv3npQAL/lgRqd1WGQZI9p7mbGy', 'timcaddauan@gmail.com', '', '', '', '', '', '', NULL, NULL),
(2, '', 'Armie', 'Caddauan', '$2y$10$7bT/DdvmSSG15SEck61cd.xLlrn0grQ/362MS6WjkL2XWs8e5mYQC', 'armie@gmail.com', '', '', '', '', '', '', NULL, NULL),
(3, 'lewiscaddauan', 'Andrew Lewis', 'Caddauan', '$2y$10$pNn62ExxMUUxZnO./sM8v.qB9C/phPHDiWBnfiywDqjfQbfVLMZym', 'lewis@gmail.com', '', '', '', '', '', '', NULL, NULL),
(6, '', 'Tim', 'Caddauan', '$2y$10$Ub4mch0YWGIifDTyDbKKHuU0TOFC1a/BQM0ihEm7pkilgseYbf2FG', 'er@gmail.com', '', '', '', '', '', '', NULL, NULL),
(7, '', 'Tim', 'Caddauan', '$2y$10$riRmAm5cd8YsICHlA/0ElufffjsYzYAQywItHnJhNrkjTGEHPnVPS', 'pharmacy@gmail.com', '', '', '', '', '', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `evaluation_area`
--
ALTER TABLE `evaluation_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_tbl`
--
ALTER TABLE `questions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respondent_tbl`
--
ALTER TABLE `respondent_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respondent_id` (`respondent_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_results`
--
ALTER TABLE `survey_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation_area`
--
ALTER TABLE `evaluation_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions_tbl`
--
ALTER TABLE `questions_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `respondent_tbl`
--
ALTER TABLE `respondent_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `survey_results`
--
ALTER TABLE `survey_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`respondent_id`) REFERENCES `respondent_tbl` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"cssdbase\",\"table\":\"responses\"},{\"db\":\"cssdbase\",\"table\":\"notifications\"},{\"db\":\"cssdbase\",\"table\":\"questions_tbl\"},{\"db\":\"cssdbase\",\"table\":\"migrations\"},{\"db\":\"cssdbase\",\"table\":\"respondent_tbl\"},{\"db\":\"cssdbase\",\"table\":\"department_tbl\"},{\"db\":\"cssdbase\",\"table\":\"evaluation_area\"},{\"db\":\"cssdbase\",\"table\":\"survey_results\"},{\"db\":\"cssdbase\",\"table\":\"tbl_user\"},{\"db\":\"cssdbase\",\"table\":\"survey_responses\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('cssdbase', 'notifications', 'message');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cssdbase', 'notifications', '{\"sorted_col\":\"`notifications`.`created_at` DESC\"}', '2024-12-10 07:59:11'),
('root', 'cssdbase', 'respondent_tbl', '{\"sorted_col\":\"`id` DESC\"}', '2024-12-10 07:47:40'),
('root', 'cssdbase', 'responses', '{\"sorted_col\":\"`responses`.`respondent_id` DESC\"}', '2024-12-10 08:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-12-13 07:54:51', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
