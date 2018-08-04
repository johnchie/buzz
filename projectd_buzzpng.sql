-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2018 at 01:05 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectd_buzzpng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$NMlbsbKu95JgAqXn6sphQ.yVRUF4TyvU7u33lHutLNDjLKAmXRwrC', 'KBhCqaH1l7NdmDs2CNR3u92enkmZYxE59GxhRvdbNfAGOYyaLymEz6w7f6Ip', '2018-07-17 08:41:26', '0000-00-00 00:00:00'),
(4, 'Deep', 'test@test.com', '$2y$10$KpNma4/IwYuy0mg1R4yXIOiu1mGHBsg3nvKx5DuW1bSGgrJulJIYe', 'Ko1rJRqcDh2Oz57cxGzsDcAKeeff1QNGwyfDUZqQMdEKMY2yIOgWPhsgqbz0', '2018-06-19 07:30:54', '2018-06-19 01:59:24'),
(5, 'Elissa', 'elissa@digital-iq.com.au', '$2y$10$/UWmC6f/Dqhk89Q7CMzukOi2n70E3uIcFMS6twcUD/KY30tCrY0ma', 'sadhflks', '2018-06-20 19:16:44', '2018-06-20 19:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Comedy', '2018-04-06 07:22:01', '2018-07-18 13:15:49'),
(8, 'Conferences & Workshops', '2018-04-06 07:22:08', '2018-07-18 13:16:13'),
(9, 'Exhibition & Performances', '2018-04-06 07:24:02', '2018-07-18 13:16:30'),
(10, 'Food & Drink', '2018-04-06 07:26:46', '2018-07-18 13:16:55'),
(14, 'Music', '2018-07-07 02:42:18', '2018-07-18 13:17:09'),
(15, 'Travel & Activities', '2018-07-18 13:17:29', '2018-07-26 22:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `data` longtext NOT NULL,
  `page` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `data`, `page`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', '2018-03-29 18:30:00', '2018-03-29 18:30:00'),
(2, 'terms', 'terms', '2018-03-29 18:30:00', '2018-03-29 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `firstname`, `lastname`, `email`, `message`, `created_at`, `updated_at`) VALUES
(5, 0, 'Rahil', 'Momin', 'rahil@gmail.com', 'Testing Message', '2018-03-30 07:56:49', '2018-03-30 07:56:49'),
(6, 0, 'Rahil', 'Momin', 'rahil@gmail.com', 'Testing Message', '2018-06-15 05:06:46', '2018-06-15 05:06:46'),
(7, 1, 'Rahil', 'Momin', 'rahil@gmail.com', 'Testing Message', '2018-06-15 05:07:47', '2018-06-15 05:07:47'),
(8, 1, 'Rahil', 'Momin', 'rahil@gmail.com', 'Testing Message', '2018-06-15 05:25:58', '2018-06-15 05:25:58'),
(9, 0, 'Test', 'User', 'gaurang.pelicans@gmail.com', 'Hey', '2018-06-15 05:29:11', '2018-06-15 05:29:11'),
(10, 13, 'Aron', 'Finch', 'aron@gmail.com', 'Hey test', '2018-06-15 18:02:34', '2018-06-15 18:02:34'),
(11, 15, 'Sanjay', 'Shah', 'sanjay@gmail.com', 'Hello Testing Purpose', '2018-06-21 12:14:49', '2018-06-21 12:14:49'),
(12, 18, 'Sanjay', 'Shah', 'slb@gmail.com', 'Testing Purpose', '2018-06-21 13:44:12', '2018-06-21 13:44:12'),
(13, 13, 'Aron', 'Finch', 'aron@gmail.com', 'Test', '2018-07-05 04:34:37', '2018-07-05 04:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longtitude` text NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `popular` tinyint(1) NOT NULL DEFAULT '0',
  `top_events` tinyint(1) NOT NULL DEFAULT '0',
  `organized_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `short_description`, `description`, `image`, `category_id`, `latitude`, `longtitude`, `start_date`, `end_date`, `venue`, `popular`, `top_events`, `organized_name`, `address`, `city`, `state`, `contact_number`, `email`, `website_url`, `created_at`, `updated_at`) VALUES
(1, 'This is first Top Event', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1531482645.png', 7, '10.000000', '11.000000', '1522454400', '1522540800', 'Ahmedabad', 1, 0, 'GauranG', 'Navarangpura, ahmedabad', 'ahmedabad', 'Gujarat', '9876543210', 'gk@gk.com', 'https://www.advexplore.com', '2018-03-29 18:30:00', '2018-07-18 09:18:40'),
(4, 'Updated Event', 'sdfasdf', 'sdfasdfasdfsdfsdafsdfas', '1523256645.jpg', 10, '123', '1234', '1523404800', '1522800000', 'asdfsdfasfasdfasd', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-09 01:20:45', '2018-04-09 01:42:03'),
(5, 'FIESTA MUSIC', 'this best event', 'this is best event', '1531483360.png', 7, '10.000000', '10.000000', '1522454400', '1522540800', 'Ahmedabad', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-13 11:59:03', '2018-07-13 06:32:40'),
(6, 'FIESTA MUSIC 1', 'this best event', 'this is best event', '1531483347.png', 7, '10.000000', '10.000000', '1522454400', '1522540800', 'Ahmedabad', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-13 11:59:20', '2018-07-13 06:32:27'),
(7, 'parties weddings', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1531923296.jpg', 15, '23.0225', '72.5714', '1531872000', '1532995200', 'Ahmedabad', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-18 08:44:56', '2018-07-18 08:44:56'),
(8, 'dfgdfg', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1531923438.jpg', 15, '23.0225', '72.5714', '1532563200', '1532995200', 'Ahmedabad', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-18 08:47:18', '2018-07-18 08:47:18'),
(9, 'User story', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1531923917.jpg', 10, '23.0225', '72.5714', '1531353600', '1532476800', 'Ahmedabad', 0, 0, 'XYZ EVENTS', 'Navarangpura, ahmedabad', 'ahmedabad', 'Gujarat', '9876543210', 'admin@admin.com', 'https://www.advexplore.com', '2018-07-18 08:55:17', '2018-07-18 14:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `event_comment`
--

CREATE TABLE `event_comment` (
  `even_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_comment`
--

INSERT INTO `event_comment` (`even_comment`, `comment`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(5, 'This is testing Comment', 6, 1, '2018-07-02 18:30:00', '2018-07-03 19:03:31'),
(6, 'Hey ???', 13, 1, '2018-07-03 19:22:17', '2018-07-03 19:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `event_like`
--

CREATE TABLE `event_like` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-03-17 07:14:32', '0000-00-00 00:00:00'),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2018-03-17 07:14:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_number`, `location`, `latitude`, `longitude`, `device_type`, `device_token`, `user_image`, `facebook_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$5qJisJx74Dbot2bB/LMtQ.peqotDTOLotQSN0mGwAR6tntfKi6hDC', '987654321', 'Ahmedabad', '23.0225', '72.5714', 'ios', '789', '1521628707.png', NULL, 'gSAZxaXtqeVaEBfbKU1FNjPzzof3jauhrEopoPYZQgmcxP9SoEBzVCFLujWv', '2018-03-21 05:03:54', '2018-04-09 04:05:53'),
(4, 'Rahil', 'Test', 'rahil.pelicans@gmail.com', '$2y$10$5qJisJx74Dbot2bB/LMtQ.peqotDTOLotQSN0mGwAR6tntfKi6hDC', '987654321', 'Surat', '123', '987', 'ios', '789', '1521628707.png', NULL, 'A7iSH0RNLFm4ver1lPg09LR2E5V290Nj49NlyYLcuaKVv8tD8WXdQqnX54wC', '2018-03-21 05:03:54', '2018-06-26 13:31:26'),
(5, 'Admin', 'hiren', 'hiren.pelicans@gmail.com', '$2y$10$5qJisJx74Dbot2bB/LMtQ.peqotDTOLotQSN0mGwAR6tntfKi6hDC', '987654321', 'Ahmedabad', '23.0225', '72.5714', 'ios', '789', '1521628707.png', NULL, '534AG6ylZt9kUsWy94QXfMZ661SGXDd61pddNV9IQfNvraoAIImCOStVCwm4', '2018-03-21 05:03:54', '2018-04-09 04:05:53'),
(6, 'Gaurang', 'Patel', 'gaurang.pelicans@gmail.com', '$2y$10$JJHmIJ9UbtLKTTsl02fB8uD4Nie1nSmbGXxs7vyS2PEX3RBlK3.RK', '9876543210', 'Ahmedabad', '123.456', '123.54', 'ios', '789', '', NULL, NULL, '2018-06-05 01:18:40', '2018-06-05 01:18:40'),
(7, 'Gaurang', 'Patel', 'gaurang.pelicans2@gmail.com', '$2y$10$Jmeu/Y6tFt7dWHYndAZhGO4ph50nIOtVWgZHGmj5CmRYqVk1lH96.', '9876543211', 'Ahmedabad', '123.456', '123.54', 'ios', '789', '', NULL, NULL, '2018-06-15 10:13:29', '2018-06-15 10:13:29'),
(8, 'Ketul', 'Patel', 'ketulpatel2801@gmail.com', '$2y$10$Z/gNDLYapKLVCiKeC4rbROYf.3GTRhbG5go/mDOBn2FHU6W.Xgrqy', '9375727779', 'Ahmedabad, Gujarat, India', '23.022505', '72.5713621', 'android', 'dbCTNpK8rak:APA91bHoffraULt2b76hkKQnIeOhmu2mPMI4NK8CxbU3OV7_lByuPk16jSA4eO1AVQ19ibtoKpWTaBepu9mswvGPHHC25QD0WFtbKYKX-Ile1gT2WpFn9aI8IJeAR06OJfjgK-4K3QYW', '', NULL, NULL, '2018-06-15 10:26:17', '2018-06-15 10:34:11'),
(9, 'Test', 'User', 'test@test.com', '$2y$10$GJoJksv3kDQIX36oc1yISumPN8GiBBuiIO2DQH4RWNY.Y3MkId0pi', '1234567990', 'Ahlen, Germany', '51.7600942', '7.8973227999999995', 'android', 'dbCTNpK8rak:APA91bHoffraULt2b76hkKQnIeOhmu2mPMI4NK8CxbU3OV7_lByuPk16jSA4eO1AVQ19ibtoKpWTaBepu9mswvGPHHC25QD0WFtbKYKX-Ile1gT2WpFn9aI8IJeAR06OJfjgK-4K3QYW', '', NULL, NULL, '2018-06-15 10:36:00', '2018-06-15 12:18:37'),
(10, 'John', 'Smith', 'john@gmail.com', '$2y$10$eH0A2SfgzpK.YiPbIlSciO51sJwh8j.j2xgp/YY8bWX.XoYr2KKGO', '3698741250', 'New Jersey 38, Mount Holly, NJ, USA', '39.9823425', '-74.78784030000001', 'android', '', '', NULL, NULL, '2018-06-15 15:28:37', '2018-06-19 22:00:30'),
(11, 'Jeck', 'Smith', 'jack@gmail.com', '$2y$10$z597rGJMQMu.yI9YFfvVUO2vaLjhp9jZbCOaS9RB/BkPD59axGHmS', '6543219870', 'New Jersey 38, Mount Holly, NJ, USA', '39.9823425', '-74.78784030000001', 'android', 'dbCTNpK8rak:APA91bHoffraULt2b76hkKQnIeOhmu2mPMI4NK8CxbU3OV7_lByuPk16jSA4eO1AVQ19ibtoKpWTaBepu9mswvGPHHC25QD0WFtbKYKX-Ile1gT2WpFn9aI8IJeAR06OJfjgK-4K3QYW', '', NULL, NULL, '2018-06-15 17:44:58', '2018-06-15 17:44:58'),
(13, 'Aron', 'Finch', 'aron@gmail.com', '$2y$10$xdqdLktCV9EFmWJJ3daT1emgWGh8PzGpsIQQ9GxuL5h6gHLVpzrSW', '987654321', 'South Africa', '123', '987', 'android', 'fglHl4M7eag:APA91bErm4EPS0ODnk-4msGyqw43CR_5peA70pYO_YdJyOJYBEKyNYEr5wajR0orVRGLH5xqTFhlbWgj7rQVuneOqxkEGFXEDfQiRBF_MkwasQ2njmRFHPvGdaASgesJL7amehAwi8xM', '1530785100.jpg', NULL, NULL, '2018-06-15 18:01:16', '2018-07-05 04:35:00'),
(14, 'Sanjay', 'Shah', 'slbjain007@gmail.com', '$2y$10$wkNbvAVZ15LyOwyrCNx3/eNTyA6UY3nZn8vugWUT3vqhgoKW9bcvG', '9173917260', 'Australia Street, Camperdown NSW, Australia', '-33.8912486', '151.1760256', 'android', 'cnZPlcUmkkw:APA91bERd4vfY0lePphQoU5FFwMj0KbbJJz-0nsq4X1h3nl71nbCmPO93bOA6s2bxGF9H_g6CjtWu_9NSCIHzarUa5xbxKzeQEv8ZAVC5tPVAbjTkzNdh2T0LdjMdQg_8XCKraaTfO6F', '', NULL, NULL, '2018-06-18 12:54:16', '2018-06-18 12:54:16'),
(15, 'Sanjay', 'Shah', 'sanjay@gmail.com', '$2y$10$OqnLx4yjCDc5P6wCkcOK2ezDYHLi1N/GtUFYsgN/cvATnZhd9d87O', '8866331407', 'Ramesh Nagar, New Delhi, Delhi 110015, India', '28.65109', '77.1326969', 'ios', '', '', NULL, NULL, '2018-06-19 22:06:12', '2018-07-01 07:37:48'),
(16, 'Sanjay', 'Shah', 'ss@gmail.com', '$2y$10$bdYgGzxVbIl5Z0M1hOfL3etClDFONk5CmTV4eUR1hbZ0xSydQyqxC', '9898979695', 'Australia', '12.1223', '14.1223', 'ios', '123456', '', NULL, NULL, '2018-06-21 13:39:22', '2018-06-21 13:39:22'),
(17, 'Sanjay', 'Shah', 'slbjain@gmail.com', '$2y$10$qBTcTu8K3tmkB1q8W/cHAu5l3gWn4CkfO3XINK24PKvDJiGwJz0Yu', '7098988776', 'Austria', '12.1223', '14.1223', 'ios', '123456', '', NULL, NULL, '2018-06-21 13:41:49', '2018-06-21 13:41:49'),
(18, 'Sanjay', 'Shah', 'slb@gmail.com', '$2y$10$d4UUTj99rTV8LzqbKLAVj.jDV0XZQAGtJMv46ra/ovssFgLm/fdR2', '7016315454', 'Australia', '12.1223', '14.1223', 'ios', '', '', NULL, NULL, '2018-06-21 13:43:05', '2018-06-21 13:44:34'),
(19, 'Sanjay', 'Shah', 'abc@gmail.com', '$2y$10$JI0v60IDFOkHrYUBt9cpT.qiHRGf05OGUT/t.JMrnt.Ev6hm.bkTS', '9638527411', 'Opposite Narayan Heart Hospital (Monogram Mill), Rakhial Rd, Industrial Area, Rakhial, Ahmedabad, Gujarat 380023, India', '23.0214849', '72.6228519', 'ios', '', '', NULL, NULL, '2018-06-24 08:49:28', '2018-06-24 09:07:22'),
(20, 'Gaurang', 'Patel', 'g@gmail.com', '$2y$10$iHDJJbWJiY/yXGvhetwgGOGEVia1ZZpPT7WsRvm5MJcpyrSdzC8XS', '9876543211', 'Ahmedabad', '123.456', '123.54', 'ios', '789', '', NULL, NULL, '2018-06-26 13:39:08', '2018-06-26 13:39:08'),
(21, 'Gaurang', 'Patel', 'mg@gmail.com', '$2y$10$pYyUyDh5nLgOIVF6vesYAeuVvcOiexHKhkYoZrAeuwhu5E7iqhbDG', '9876543211', 'Ahmedabad', '123.456', '123.54', 'ios', '789', '', NULL, NULL, '2018-06-26 13:39:22', '2018-06-26 13:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 9, 7, '2018-06-15 20:40:03', '2018-06-15 20:40:03'),
(2, 9, 8, '2018-06-15 20:40:44', '2018-06-15 20:40:44'),
(3, 9, 9, '2018-06-15 20:41:43', '2018-06-15 20:41:43'),
(4, 10, 7, '2018-06-15 21:15:31', '2018-06-15 21:15:31'),
(5, 10, 8, '2018-06-15 21:15:31', '2018-06-15 21:15:31'),
(6, 10, 9, '2018-06-15 21:15:31', '2018-06-15 21:15:31'),
(8, 13, 7, '2018-06-15 23:31:57', '2018-06-15 23:31:57'),
(9, 13, 8, '2018-06-15 23:32:10', '2018-06-15 23:32:10'),
(10, 13, 10, '2018-06-15 23:32:10', '2018-06-15 23:32:10'),
(11, 13, 9, '2018-06-18 14:00:56', '2018-06-18 14:00:56'),
(12, 15, 9, '2018-06-21 17:41:54', '2018-06-21 17:41:54'),
(14, 18, 9, '2018-06-21 19:13:59', '2018-06-21 19:13:59'),
(15, 10, 14, '2018-07-15 11:29:04', '2018-07-15 11:29:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `event_comment`
--
ALTER TABLE `event_comment`
  ADD PRIMARY KEY (`even_comment`);

--
-- Indexes for table `event_like`
--
ALTER TABLE `event_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `event_comment`
--
ALTER TABLE `event_comment`
  MODIFY `even_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event_like`
--
ALTER TABLE `event_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
