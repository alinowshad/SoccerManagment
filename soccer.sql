-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2020 at 08:45 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_29_140700_create_posts_table', 1),
(4, '2020_01_29_192717_add_user_id_to_posts', 2),
(5, '2020_01_29_212202_add_cover_image_to_posts', 3),
(6, '2020_01_31_073613_Add_User_Type_To_Users', 4),
(7, '2020_01_31_075141_Add_User_Pic_To_Users', 5),
(8, '2020_02_01_071646_create_players_table', 6),
(9, '2020_02_01_072808_create_teams_table', 6),
(10, '2020_02_01_085430_Add_Team_Gender_To_Teams', 7),
(11, '2020_02_01_122006_Add_Team_leader_To_Teams', 8),
(12, '2020_02_01_143912_Add_Player_Email_Address_To_Players', 9),
(13, '2020_02_01_144615_Add_Player_Adderss_To_Players', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `player_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `user_id`, `team_id`, `job`, `player_pic`, `created_at`, `updated_at`, `player_phone_number`, `player_email`, `player_address`) VALUES
(8, 'ahmadreza', 10, '11', 'attacker', 'avatar5_1580892126.png', '2020-02-05 05:12:06', '2020-02-05 05:12:06', '56956452685165', 'alinoshad96.itsu@yahoo.com', '<p>asdsadasdsa</p>'),
(7, 'ahmadreza', 10, '10', 'attacker', 'noimage.jpg', '2020-02-05 05:11:09', '2020-02-05 05:11:09', '09226252703', 'alinoshad96.itsu@yahoo.com', '<p>golestan</p>'),
(6, 'Mr Noshad', 10, '11,10', 'Defence', 'avatar04_1580737504.png', '2020-02-03 10:15:05', '2020-02-03 10:16:17', '09226347450', 'alinoshad96.itsu@yahoo.com', '<p>Good</p>');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(19, 'my name is ali noshad', '<p>gsdfsdjfosmkcsildjfofdsmsdojffmsfisdfls dfsdoisd sdisodfmsdfisdfklmsdikdslmfijosdfkmlisodfklmsfoisdfmklsdifsdkmlfsdfklmisdfjksdfijsdlfisdofdjfdsflsdi</p>', '2020-02-04 09:28:59', '2020-02-04 09:28:59', 8, 'user8-128x128_1580821139.jpg'),
(18, 'Post Tree', '<p>sdfdsfsdfsdfsdfsdfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>', '2020-02-04 09:19:15', '2020-02-04 09:19:15', 8, 'photo1_1580820555.png'),
(20, 'Post Tree', '<p>afsdfsdfsdfsdfsadasdfasfsfdfasdfasfdsafdsfsdfsdfdsfsdffsd</p>', '2020-02-04 09:43:04', '2020-02-04 09:43:04', 8, 'avatar2_1580821984.png'),
(25, 'sersehrserjse', '<p>hshshksdksdjksjdksjdkjd</p>', '2020-02-05 05:07:53', '2020-02-05 05:07:53', 8, 'noimage.jpg'),
(24, 'this my first post', '<p><strong>1. this is our title</strong></p>\r\n\r\n<p>aldsfhkofaljfdsofifkdfosfsdlfjsofisdflsifsdoflsdfisdfjsalfsdfosfkmdsfisodlfdofisfjslfsdifosflsdfsofsdflsfonvdsovailsadsd;fjsdaflsdlfsdlfsdlfsdfksdfisdflsdkfjsofljsdlfijsdofslnsidfsdmlfjsfsadlfsdgsdlfdskjjosigjsdlkfnasdkgbsdglsdjfisdfldskflsdfsdkfsdkgnsfsdfsdjlfsdflsdfsdjfdskfsdjlfsdjlgsdhjsflsdjfsdfj</p>\r\n\r\n<p>In&nbsp;<a href=\"https://en.wikipedia.org/wiki/Publishing\">publishing</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Graphic_design\">graphic design</a>,&nbsp;<em><strong>Lorem ipsum</strong></em>&nbsp;is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Placeholder_text\">placeholder text</a>&nbsp;commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.&nbsp;<em>Lorem ipsum</em>&nbsp;may be used before final&nbsp;<a href=\"https://en.wikipedia.org/wiki/Copy_(written)\">copy</a>&nbsp;is available, but it may also be used to temporarily replace copy in a process called&nbsp;<a href=\"https://en.wikipedia.org/wiki/Greeking\">greeking</a>, which allows designers to consider form without the meaning of the text influencing the design.</p>\r\n\r\n<p><em>Lorem ipsum</em>&nbsp;is typically a corrupted version of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/De_finibus_bonorum_et_malorum\">De finibus bonorum et malorum</a></em>, a first-century BCE text by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cicero\">Cicero</a>, with words altered, added, and removed to make it nonsensical, improper&nbsp;<a href=\"https://en.wikipedia.org/wiki/Latin\">Latin</a>.</p>\r\n\r\n<p>Versions of the&nbsp;<em>Lorem ipsum</em>&nbsp;text have been used in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Typesetting\">typesetting</a>&nbsp;at least since the 1960s, when it was popularized by advertisements for&nbsp;<a href=\"https://en.wikipedia.org/wiki/Letraset\">Letraset</a>&nbsp;transfer sheets.&nbsp;<em>Lorem ipsum</em>&nbsp;was introduced to the digital world in the mid-1980s when&nbsp;<a href=\"https://en.wikipedia.org/wiki/Aldus\">Aldus</a>&nbsp;employed it in graphic and word-processing templates for its desktop publishing program&nbsp;<a href=\"https://en.wikipedia.org/wiki/Adobe_PageMaker\">PageMaker</a>. Other popular&nbsp;<a href=\"https://en.wikipedia.org/wiki/Word_processor_(electronic_device)\">word processors</a>&nbsp;including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pages_(word_processor)\">Pages</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Word\">Microsoft Word</a>&nbsp;have since adopted&nbsp;<em>Lorem ipsum</em>&nbsp;as well.</p>', '2020-02-04 13:11:42', '2020-02-04 13:11:42', 8, 'slide1_1580834502.jpg'),
(23, 'Post five', '<p>sadsadsadadasdasdddadddsaddsddasddasddadadasd</p>', '2020-02-04 10:13:10', '2020-02-04 10:13:10', 8, 'slide2_1580823790.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_leader_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_leader_decription` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `user_id`, `team_pic`, `created_at`, `updated_at`, `team_gender`, `team_leader_name`, `team_leader_decription`) VALUES
(11, 'America', 10, 'photo1_1580737550.png', '2020-02-03 10:15:51', '2020-02-03 10:15:51', 'female', 'Ali Noshad', '<p>gOOD</p>'),
(10, 'Iran', 10, 'AdminLTELogo_1580737472.png', '2020-02-03 10:14:32', '2020-02-03 10:14:32', 'male', 'Ali Noshad', '<p>The Best In Coaching</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `user_pic`) VALUES
(9, 'ahmadreza Khonaksar', 'ahmadrezakhonaksar@gmail.com', '$2y$10$3Ku9P5NQOGo8yWjisQobduzpVw08FOOs8bDabiIqqMIU84TQNxEHu', 'IqXINQww9ZT80kGA6K2hGhiRjVk15GXmMJb5r8WrCMu6muSbHlPIekfzibkW', '2020-02-03 04:27:04', '2020-02-03 04:27:04', 1, 'avatar5_1580716624.png'),
(10, 'ali noshad', 'noshad96.itsu@yahoo.com', '$2y$10$Svqj30nSXF5oxrQ2BFmTiOVU2brDKNFGZKCa6dkf.cb/DRTh6/99.', 'mG04ruBQO29mXIckvuWwHs3Cz9lWkq6bVpsrHv7mwOoly8WBLyyuRhPpkqAh', '2020-02-03 04:38:51', '2020-02-03 04:38:51', 0, 'avatar2_1580717331.png'),
(8, 'Mr noshad', 'alinoshad96.itsu@gmail.com', '$2y$10$uIw1lcOlpvgsnvR3z0PyMugvCKvd6XQLRwAleoq67O2J55ClK2NxW', 'bdUVdMDweiTS0aZpBUWWPmAXj6afjJlQes1kYyjAoqNSmCyqtzUUsecZhL1m', '2020-02-03 03:39:33', '2020-02-03 10:04:41', 1, 'avatar5_1580713773.png'),
(11, 'Mr Noshad', 'joon.risse95@yahoo.com', '$2y$10$WXUE3dMa7YCA5G.JGVYa4eAI9VIowDK8NQO9MGj9jM1/n9hoRNbli', 'Al1j8ehoCXbkhi4GZwfOLhyI6pCGpCpkWxoxKvpsozfKzcOi0Wy9tRJlNgaV', '2020-02-03 05:06:17', '2020-02-03 05:06:17', 1, 'avatar04_1580718977.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
