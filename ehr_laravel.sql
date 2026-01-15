-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 07:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehr_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `ward_id`, `occupied`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 1, 1, '2023-06-14 19:05:22', '2023-06-20 20:11:36', 10),
(2, 1, 0, '2023-06-14 19:05:22', '2023-06-14 19:55:15', 45),
(3, 1, 1, '2023-06-14 19:05:22', '2023-06-20 20:25:25', 9),
(4, 2, 1, '2023-06-14 19:05:22', '2023-06-20 17:58:08', 37),
(5, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(6, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(7, 3, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(8, 5, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(9, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(10, 1, 1, '2023-06-14 19:05:22', '2023-06-20 20:24:47', 14),
(11, 3, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(12, 1, 1, '2023-06-14 19:05:22', '2023-06-20 17:58:48', 15),
(13, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(14, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(15, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(16, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(17, 5, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(18, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(19, 3, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(20, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(21, 3, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(22, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(23, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(24, 2, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(25, 4, 0, '2023-06-14 19:05:22', '2023-06-14 19:05:22', NULL),
(26, 2, 1, '2023-06-20 17:00:16', '2023-06-20 17:00:16', 5),
(27, 1, 0, '2023-06-20 18:29:28', '2023-06-20 18:29:28', NULL),
(28, 1, 0, '2023-06-20 18:30:28', '2023-06-20 18:30:28', NULL),
(29, 3, 0, '2023-06-20 18:33:39', '2023-06-20 18:33:39', NULL),
(30, 3, 0, '2023-06-20 18:33:49', '2023-06-20 18:33:49', NULL),
(31, 4, 1, '2023-06-20 18:34:16', '2023-06-22 18:13:17', 61);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `hospital_id`, `created_at`, `updated_at`, `first_name`, `last_name`, `date_of_birth`, `email`) VALUES
(1, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Junior', 'Corkery', '1987-07-27', 'dasia.hand@example.com'),
(2, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Athena', 'Mraz', '1992-12-20', 'ecrona@example.net'),
(3, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Dayton', 'Denesik', '2021-11-16', 'monahan.paul@example.net'),
(4, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Gisselle', 'Koelpin', '2011-08-10', 'shyann.pfeffer@example.net'),
(5, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Mallory', 'Wintheiser', '2020-07-16', 'vern.simonis@example.org'),
(6, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Norval', 'Bechtelar', '1976-11-11', 'lang.sigmund@example.com'),
(7, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Gerry', 'Baumbach', '1988-01-24', 'bkovacek@example.com'),
(8, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Cordia', 'Streich', '2004-07-30', 'charley.quitzon@example.net'),
(9, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Brandon', 'Gutkowski', '1974-12-06', 'barton15@example.org'),
(10, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Quinten', 'Sporer', '1984-12-08', 'thompson.deonte@example.net'),
(11, 1, '2023-06-20 18:20:53', '2023-06-20 18:20:53', 'Jazlynn', 'Webb', '2022-02-16', 'Web234@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_patient`
--

CREATE TABLE `doctor_patient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `disease` varchar(255) NOT NULL,
  `date_assigned` date NOT NULL,
  `date_unassigned` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_patient`
--

INSERT INTO `doctor_patient` (`id`, `doctor_id`, `patient_id`, `active`, `disease`, `date_assigned`, `date_unassigned`, `created_at`, `updated_at`) VALUES
(2, 9, 1, 0, 'Flu', '2023-06-14', NULL, '2023-06-14 18:01:24', '2023-06-14 18:01:24'),
(3, 7, 3, 1, 'Alzheimer\'s disease', '2023-06-14', NULL, '2023-06-14 18:01:24', '2023-06-14 18:01:24'),
(4, 5, 2, 0, 'Acute myeloid leukaemia: Children', '2023-06-14', NULL, '2023-06-14 18:01:24', '2023-06-14 18:01:24'),
(5, 10, 4, 1, 'Stillbirth', '2023-06-14', NULL, '2023-06-14 18:01:24', '2023-06-14 18:01:24'),
(6, 1, 5, 0, 'Liver disease', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(7, 8, 6, 0, 'Womb (uterus) cancer', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(8, 5, 7, 0, 'Coeliac disease', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(9, 10, 8, 0, '', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(10, 6, 9, 0, 'Inherited heart conditions', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(11, 3, 10, 0, '', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(12, 7, 11, 0, 'Coeliac disease', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(13, 3, 12, 1, '', '2023-06-14', '2023-06-20', '2023-06-14 18:22:36', '2023-06-20 19:21:58'),
(14, 4, 13, 0, 'Rare tumors', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(15, 7, 14, 0, 'Ganglion cyst', '2023-06-14', NULL, '2023-06-14 18:22:36', '2023-06-14 18:22:36'),
(16, 7, 15, 1, 'Urinary tract infection (UTI)', '2023-06-16', NULL, '2023-06-16 19:03:13', '2023-06-16 19:03:13'),
(17, 5, 14, 1, 'Underactive thyroid', '2023-06-19', NULL, '2023-06-19 23:44:47', '2023-06-19 23:44:47'),
(18, 5, 5, 1, 'Binge eating', '2023-06-19', NULL, '2023-06-20 22:22:01', '2023-06-20 22:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hyatt, O\'Hara and Hilpert Hospital', '2023-06-14 19:05:22', '2023-06-14 19:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_12_211045_create_hospitals_table', 1),
(6, '2023_06_12_211046_create_wards_table', 1),
(7, '2023_06_12_211047_create_beds_table', 1),
(8, '2023_06_12_211057_create_doctors_table', 1),
(9, '2023_06_12_211102_create_nurses_table', 1),
(10, '2023_06_12_211108_create_patients_table', 1),
(11, '2023_06_12_215726_create_doctor_patient_table', 1),
(12, '2023_06_12_215727_create_nurse_patient_table', 1),
(13, '2023_06_12_222424_create_patient_records_table', 1),
(14, '2023_06_14_150424_add_patient_id_to_beds_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `hospital_id`, `created_at`, `updated_at`, `first_name`, `last_name`, `date_of_birth`, `email`) VALUES
(1, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Agustina', 'O\'Keefe', '1981-08-26', 'gkilback@example.com'),
(2, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Ernest', 'Smith', '2001-09-22', 'blabadie@example.net'),
(3, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Furman', 'Schuster', '2017-02-20', 'bogisich.josianne@example.com'),
(4, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Renee', 'Mann', '1998-07-08', 'oconnell.urban@example.com'),
(5, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Sigmund', 'Wyman', '1992-07-20', 'cleuschke@example.net'),
(6, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jordyn', 'Stiedemann', '1978-12-05', 'velda80@example.com'),
(7, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Aurelie', 'Ankunding', '1986-06-28', 'nolan.sheila@example.org'),
(8, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Molly', 'Gaylord', '1990-04-20', 'tlabadie@example.org'),
(9, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Ova', 'Leffler', '2016-12-11', 'ferdman@example.net'),
(10, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jordane', 'Kiehn', '1977-06-14', 'ron33@example.org'),
(11, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Katrina', 'Howe', '2000-08-29', 'marietta31@example.com'),
(12, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Liana', 'Dicki', '2014-04-10', 'gay71@example.org'),
(13, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Sherman', 'Hegmann', '1975-07-04', 'dalton.daugherty@example.com'),
(14, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Khalid', 'Cummings', '1993-05-02', 'jones.arnaldo@example.org'),
(15, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Elisa', 'Nicolas', '1976-08-04', 'lehner.shanna@example.com'),
(16, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Golda', 'Ernser', '1974-07-14', 'vilma.abernathy@example.com'),
(17, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Dannie', 'Harris', '2010-12-11', 'dokeefe@example.net'),
(18, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Daren', 'Swaniawski', '2019-12-07', 'lilliana.williamson@example.org'),
(19, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Aurore', 'Hill', '1993-08-25', 'ehauck@example.net'),
(20, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Eulalia', 'Douglas', '1982-11-15', 'tiana50@example.com'),
(21, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Webster', 'Heidenreich', '2013-07-17', 'skoelpin@example.com'),
(22, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Garrick', 'Bode', '2007-10-25', 'clarabelle.labadie@example.com'),
(23, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Josue', 'Rempel', '2016-09-24', 'kraig.jast@example.com'),
(24, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Brice', 'Witting', '1977-10-16', 'johann30@example.net'),
(25, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Camron', 'Predovic', '1997-11-06', 'tyrel.bogisich@example.com'),
(26, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Keith', 'Baumbach', '2013-10-30', 'kreiger.marcus@example.com'),
(27, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Sherman', 'Mertz', '2013-06-21', 'gkassulke@example.net'),
(28, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Karlie', 'Dooley', '1995-02-25', 'flavie62@example.org'),
(29, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Solon', 'Langosh', '1990-10-30', 'thea79@example.org'),
(30, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Ethelyn', 'Sporer', '2000-08-30', 'ivy28@example.org'),
(31, 1, '2023-06-20 18:25:05', '2023-06-20 18:25:05', 'Liam', 'Drakes', '2003-10-25', 'Liamdreake23@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_patient`
--

CREATE TABLE `nurse_patient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurse_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `date_assigned` date NOT NULL,
  `date_unassigned` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurse_patient`
--

INSERT INTO `nurse_patient` (`id`, `nurse_id`, `patient_id`, `active`, `date_assigned`, `date_unassigned`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 1, '2023-06-16', NULL, '2023-06-16 19:02:17', '2023-06-16 19:02:17'),
(2, 1, 1, 1, '2023-06-19', '2023-06-20', '2023-06-19 23:05:33', '2023-06-20 19:37:00'),
(3, 6, 5, 1, '2023-06-19', NULL, '2023-06-19 23:26:25', '2023-06-19 23:26:25'),
(4, 6, 5, 1, '2023-06-19', NULL, '2023-06-19 23:26:25', '2023-06-19 23:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `hospital_id`, `created_at`, `updated_at`, `first_name`, `last_name`, `date_of_birth`, `email`) VALUES
(1, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Asha', 'Harber', '1978-09-25', 'lelia73@example.org'),
(2, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Benton', 'Altenwerth', '1974-04-08', 'kroberts@example.org'),
(3, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Nya', 'Kutch', '1973-01-15', 'stark.aletha@example.net'),
(4, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Delfina', 'Ortiz', '2002-11-14', 'cordelia39@example.org'),
(5, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Gerda', 'Spencer', '1975-11-01', 'baron.gleason@example.com'),
(6, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Leonel', 'Batz', '1986-05-13', 'marcos05@example.com'),
(7, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Chase', 'Cassin', '2001-11-26', 'susanna.hoeger@example.net'),
(8, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jarrell', 'Zemlak', '2008-09-09', 'dbalistreri@example.com'),
(9, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Willow', 'Gorczany', '1997-01-12', 'warren.block@example.com'),
(10, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Karina', 'Farrell', '2001-07-08', 'elton.weber@example.com'),
(11, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Daphnee', 'Jacobson', '1986-08-12', 'nash.buckridge@example.com'),
(12, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Chauncey', 'Huel', '2022-12-01', 'mcclure.elliot@example.net'),
(13, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Merl', 'O\'Hara', '1989-10-29', 'callie30@example.com'),
(14, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jaquan', 'Morar', '2018-06-10', 'mwaters@example.net'),
(15, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Carlee', 'Swift', '1982-06-09', 'ernestine01@example.com'),
(16, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Davon', 'Brown', '1979-10-16', 'vhayes@example.net'),
(17, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Savanah', 'McGlynn', '1998-07-06', 'swaniawski.jeffrey@example.com'),
(18, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Aurelio', 'Moore', '1970-07-16', 'juvenal.schimmel@example.org'),
(19, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Rachael', 'Howe', '1977-01-27', 'lola.willms@example.net'),
(20, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Oswaldo', 'Zieme', '2009-01-14', 'armand09@example.org'),
(21, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Julie', 'Lehner', '1990-10-21', 'hildegard55@example.net'),
(22, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jillian', 'Rippin', '1974-02-18', 'jerrell.rowe@example.org'),
(23, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Filomena', 'Keebler', '1991-11-16', 'blanda.camylle@example.net'),
(24, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Diego', 'Grimes', '1979-12-17', 'henriette01@example.org'),
(25, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jasper', 'Rodriguez', '2019-04-13', 'hintz.charlie@example.net'),
(26, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Mossie', 'Beer', '1988-06-26', 'gislason.ella@example.org'),
(27, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Elyse', 'Mann', '1983-12-30', 'uhayes@example.net'),
(28, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Lura', 'Lesch', '2013-03-07', 'sadye64@example.org'),
(29, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Genevieve', 'Kub', '2008-02-05', 'clind@example.com'),
(30, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Madelynn', 'Bechtelar', '2009-04-11', 'corwin.ardith@example.org'),
(31, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Chester', 'Bauch', '1983-03-20', 'rritchie@example.org'),
(32, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Lorine', 'Pfannerstill', '1999-12-25', 'cnolan@example.com'),
(33, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Reggie', 'Emmerich', '1970-11-02', 'trussel@example.com'),
(34, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Earlene', 'Ryan', '2013-07-27', 'qpacocha@example.net'),
(35, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Halle', 'Reichert', '1985-08-14', 'david.hartmann@example.net'),
(36, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Arnoldo', 'Walsh', '1995-04-25', 'schneider.golda@example.net'),
(37, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Milo', 'Dare', '1988-10-24', 'noemy06@example.org'),
(38, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Lavern', 'Rippin', '1996-10-10', 'claire.anderson@example.com'),
(39, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Katheryn', 'Homenick', '2017-04-02', 'stephan06@example.com'),
(40, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Lloyd', 'Haag', '1990-11-09', 'mclaughlin.angeline@example.org'),
(41, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Bobbie', 'Aufderhar', '2018-07-13', 'maritza.rice@example.org'),
(42, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Kareem', 'Lebsack', '1992-09-23', 'eankunding@example.org'),
(43, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jovani', 'Muller', '1986-12-22', 'mable.boyer@example.org'),
(44, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Samson', 'Eichmann', '1996-06-16', 'bartoletti.vella@example.com'),
(45, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Katlyn', 'Gleichner', '2006-09-04', 'aurelie79@example.com'),
(46, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Stewart', 'Mann', '2016-05-06', 'bemard@example.org'),
(47, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Rubie', 'Johnston', '1983-10-30', 'alison.lueilwitz@example.org'),
(48, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Zachariah', 'Ullrich', '2009-09-19', 'ylittle@example.net'),
(49, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Isabell', 'Shields', '2010-10-05', 'charlotte84@example.com'),
(50, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Colten', 'Wunsch', '2018-10-28', 'elmira.vonrueden@example.net'),
(51, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Jeramy', 'Nikolaus', '2019-06-05', 'alberta74@example.com'),
(52, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Dion', 'Pollich', '2000-08-21', 'vbotsford@example.org'),
(53, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Gabriel', 'Grant', '2003-06-27', 'jeremie.gerlach@example.net'),
(54, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Gonzalo', 'Feest', '1993-10-19', 'ivon@example.net'),
(55, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Doris', 'Botsford', '1980-08-22', 'margarita98@example.org'),
(56, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Neva', 'Stehr', '1986-11-06', 'mosciski.elijah@example.net'),
(57, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Rodolfo', 'Collins', '2007-09-17', 'brooklyn36@example.com'),
(58, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Ressie', 'Raynor', '2022-03-08', 'leanna54@example.net'),
(59, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Rosemarie', 'Schaden', '2015-03-10', 'kristian.kshlerin@example.org'),
(60, 1, '2023-06-14 19:05:22', '2023-06-14 19:05:22', 'Lottie', 'Schinner', '1978-10-24', 'bruen.itzel@example.com'),
(61, 1, '2023-06-20 18:08:45', '2023-06-20 18:08:45', 'Jazlynn', 'Fox', '1952-09-18', 'JazlynnFox@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `bed_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_admission` date NOT NULL,
  `date_of_release` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`id`, `hospital_id`, `patient_id`, `bed_id`, `date_of_admission`, `date_of_release`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 24, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(2, 1, 2, 11, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(3, 1, 3, 3, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(4, 1, 4, 25, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(5, 1, 5, 23, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(6, 1, 6, 18, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(7, 1, 7, 1, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(8, 1, 8, 2, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(9, 1, 9, 2, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(10, 1, 10, 22, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(11, 1, 11, 23, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(12, 1, 12, 14, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(13, 1, 13, 22, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(14, 1, 14, 2, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(15, 1, 15, 13, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(16, 1, 16, 10, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(17, 1, 17, 10, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(18, 1, 18, 4, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(19, 1, 19, 22, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(20, 1, 20, 16, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(21, 1, 21, 20, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(22, 1, 22, 8, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(23, 1, 23, 23, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(24, 1, 24, 2, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(25, 1, 25, 9, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(26, 1, 26, 15, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(27, 1, 27, 24, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(28, 1, 28, 19, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(29, 1, 29, 22, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(30, 1, 30, 24, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(31, 1, 31, 12, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(32, 1, 32, 17, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(33, 1, 33, 25, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(34, 1, 34, 14, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(35, 1, 35, 21, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(36, 1, 36, 6, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(37, 1, 37, 13, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(38, 1, 38, 4, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(39, 1, 39, 24, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(40, 1, 40, 24, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(41, 1, 41, 18, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(42, 1, 42, 21, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(43, 1, 43, 8, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(44, 1, 44, 5, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(45, 1, 45, 11, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(46, 1, 46, 14, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(47, 1, 47, 25, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(48, 1, 48, 7, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(49, 1, 49, 13, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(50, 1, 50, 8, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(51, 1, 51, 17, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(52, 1, 52, 4, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(53, 1, 53, 19, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(54, 1, 54, 22, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(55, 1, 55, 14, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(56, 1, 56, 7, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(57, 1, 57, 20, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(58, 1, 58, 15, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(59, 1, 59, 23, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22'),
(60, 1, 60, 20, '2023-06-14', NULL, '2023-06-14 19:05:22', '2023-06-14 19:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `hospital_id`, `created_at`, `updated_at`, `name`) VALUES
(1, 1, NULL, NULL, 'Pediatrics'),
(2, 1, NULL, NULL, 'Delivery'),
(3, 1, NULL, NULL, 'Intensive Care'),
(4, 1, NULL, NULL, 'Psych'),
(5, 1, NULL, NULL, 'Orthopedics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_ward_id_foreign` (`ward_id`),
  ADD KEY `beds_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_patient_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_patient_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nurses_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `nurse_patient`
--
ALTER TABLE `nurse_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nurse_patient_nurse_id_foreign` (`nurse_id`),
  ADD KEY `nurse_patient_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_records_hospital_id_foreign` (`hospital_id`),
  ADD KEY `patient_records_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_records_bed_id_foreign` (`bed_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_hospital_id_foreign` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nurse_patient`
--
ALTER TABLE `nurse_patient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `beds_ward_id_foreign` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD CONSTRAINT `doctor_patient_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_patient_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `nurses_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `nurse_patient`
--
ALTER TABLE `nurse_patient`
  ADD CONSTRAINT `nurse_patient_nurse_id_foreign` FOREIGN KEY (`nurse_id`) REFERENCES `nurses` (`id`),
  ADD CONSTRAINT `nurse_patient_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD CONSTRAINT `patient_records_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`),
  ADD CONSTRAINT `patient_records_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`),
  ADD CONSTRAINT `patient_records_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
