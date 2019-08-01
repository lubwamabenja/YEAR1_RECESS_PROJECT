-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2019 at 05:56 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recess_political_party`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `adminUsername` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminpassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `agentName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agentUsername` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signatre` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `districtName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agentHead` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wageUnits` int(11) NOT NULL DEFAULT 0,
  `wage_per_unit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agentName`, `agentUsername`, `signatre`, `districtName`, `agentHead`, `wageUnits`, `wage_per_unit`, `created_at`, `updated_at`) VALUES
(2, 'mahad', 'mahad76', 'B', 'Kampala', '1', 14, 2587500, '2019-07-07 13:43:09', '2019-07-07 13:43:09'),
(3, 'lubwama', 'lubwama73', 'E', 'Kampala', '0', 8, 2587500, '2019-07-16 12:49:58', '2019-07-16 12:49:58'),
(4, 'kintu', 'kintu8', 'L', 'Kampala', '0', 8, 2587500, '2019-07-16 13:17:59', '2019-07-16 13:17:59'),
(5, 'kabenge', 'kabenge4', 'C', 'Kampala', '0', 8, 2587500, '2019-07-28 22:46:15', '2019-07-28 22:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `districtName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headAgent` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_members` int(11) NOT NULL,
  `no_of_agents` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `districtName`, `headAgent`, `no_of_members`, `no_of_agents`, `created_at`, `updated_at`) VALUES
(1, 'Kampala', 'mahad76', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donationID` int(10) UNSIGNED NOT NULL,
  `amountdonated` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `donatedBy` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donationID`, `amountdonated`, `month`, `donatedBy`, `created_at`, `updated_at`) VALUES
(1, 2000000, 7, 'kato', NULL, NULL),
(2, 30000000, 7, 'kintu', '2019-07-07 13:05:22', '2019-07-07 13:05:22'),
(3, 6500000, 7, 'kyanzi', '2019-07-08 02:13:08', '2019-07-08 02:13:08'),
(4, 67000000, 7, 'Felix', '2019-07-16 12:49:19', '2019-07-16 12:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `memberName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollmentDate` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberRecommender` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberGender` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrolledBy` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `districtName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommendedMembers` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `memberName`, `memberID`, `enrollmentDate`, `memberRecommender`, `memberGender`, `enrolledBy`, `districtName`, `recommendedMembers`, `created_at`, `updated_at`) VALUES
(1, 'Jacob Olanya', 'Kam00543', '2019-8-17', 'none\n', 'M', 'kintu8\n', 'Kampala\n', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_15_102753_create_donations_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_06_15_100018_create_districts_table', 2),
(5, '2019_06_15_102644_create_agents_table', 2),
(6, '2019_06_15_102727_create_members_table', 2),
(7, '2019_06_15_102844_create_admins_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donationID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
