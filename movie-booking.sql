-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 04:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie-booking`
--
CREATE DATABASE movie_booking;
USE `movie_booking`;
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`) VALUES
(1, 'Viễn tưởng'),
(2, 'Khoa học'),
(3, 'Tâm lí'),
(4, 'Hoạt hình 2D'),
(5, 'Hoạt hình 3D'),
(8, 'Kinh dị'),
(9, 'Kịch'),
(10, 'Hài'),
(11, 'Lãng mạn'),
(12, 'Âm nhạc'),
(13, 'Hoạt hoạ'),
(14, 'Hư cấu'),
(15, 'Trinh thám');

-- --------------------------------------------------------

--
-- Table structure for table `combo_food`
--

CREATE TABLE `combo_food` (
  `combo_id` bigint UNSIGNED NOT NULL,
  `food_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo_food`
--

INSERT INTO `combo_food` (`combo_id`, `food_id`) VALUES
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(10, 1),
(3, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(10, 4),
(2, 9),
(3, 9),
(5, 9),
(6, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `founded_date` datetime NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `founded_date`, `user_id`) VALUES
(1, '2022-12-14 18:18:43', 3),
(2, '2022-12-18 18:18:43', 5),
(3, '2022-12-19 18:18:43', 4),
(4, '2022-11-26 18:18:43', 3),
(5, '2022-12-20 18:18:43', 6),
(6, '2022-11-26 18:18:43', 7),
(7, '2022-12-24 18:18:43', 2),
(8, '2022-11-26 18:18:43', 1),
(9, '2022-11-26 18:18:43', 4),
(10, '2022-11-26 18:18:43', 5),
(11, '2022-11-26 18:18:43', 10),
(12, '2022-11-26 18:18:43', 6),
(13, '2022-11-26 18:18:43', 4),
(14, '2022-11-26 18:18:43', 6),
(15, '2022-11-26 18:18:43', 10),
(16, '2022-11-26 18:18:43', 4),
(17, '2022-11-26 18:18:43', 9),
(18, '2022-11-26 18:18:43', 1),
(19, '2022-11-26 18:18:43', 9),
(20, '2022-11-26 18:18:43', 4),
(21, '2022-11-26 18:18:43', 9),
(22, '2022-11-26 18:18:43', 1),
(23, '2022-11-26 18:18:43', 9),
(24, '2022-11-26 18:18:43', 8),
(25, '2022-11-26 18:18:43', 3),
(26, '2022-11-26 18:18:43', 10),
(27, '2022-11-26 18:18:43', 7),
(28, '2022-11-26 18:18:43', 8),
(29, '2022-11-26 18:18:43', 5),
(30, '2022-11-26 18:18:43', 4),
(31, '2022-11-26 18:18:43', 8),
(32, '2022-11-26 18:18:43', 3),
(33, '2022-11-26 18:18:43', 10),
(34, '2022-11-26 18:18:43', 2),
(35, '2022-11-26 18:18:43', 5),
(36, '2022-11-26 18:18:43', 10),
(37, '2022-11-26 18:18:43', 3),
(38, '2022-11-26 18:18:43', 5),
(39, '2022-11-26 18:18:43', 7),
(40, '2022-11-26 18:18:43', 9),
(41, '2022-11-26 18:18:43', 8),
(42, '2022-11-26 18:18:43', 4),
(43, '2022-11-26 18:18:43', 4),
(44, '2022-11-26 18:18:43', 9),
(45, '2022-11-26 18:18:43', 9),
(46, '2022-11-26 18:18:43', 6),
(47, '2022-11-26 18:18:43', 2),
(48, '2022-11-26 18:18:43', 1),
(49, '2022-11-26 18:18:43', 4),
(50, '2022-11-26 18:18:43', 4);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_ticket`
--

CREATE TABLE `invoice_ticket` (
  `invoice_id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_ticket`
--

INSERT INTO `invoice_ticket` (`invoice_id`, `ticket_id`) VALUES
(38, 1),
(33, 4),
(32, 7),
(44, 8),
(14, 9),
(36, 11),
(4, 15),
(10, 17),
(11, 19),
(48, 21),
(6, 23),
(45, 27),
(39, 28),
(49, 32),
(34, 34),
(30, 38),
(7, 42),
(13, 47),
(25, 48),
(12, 51),
(17, 52),
(43, 53),
(8, 55),
(15, 56),
(3, 58),
(46, 66),
(24, 67),
(26, 70),
(19, 72),
(18, 73),
(41, 74),
(35, 75),
(50, 76),
(27, 77),
(9, 79),
(23, 88),
(22, 89),
(40, 90),
(28, 91),
(21, 92),
(20, 93),
(42, 94),
(37, 95),
(2, 98),
(5, 102),
(1, 105),
(29, 107),
(47, 108),
(31, 109),
(16, 110);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_path` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_path` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `title`, `release_date`, `close_date`, `description`, `duration`, `trailer_path`, `banner_path`) VALUES
	(1, 'Doraemon', 'Doraemon', '2022-12-18 00:00:00', '2022-12-30 00:00:00', 'Doraemon.', '90', 'https://www.youtube.com/watch?v=gX8DrS-foFs', 'public/assets/images/doraemon.jpg'),
	(2, 'Songoku', 'Songoku', '2022-11-24 00:00:00', '2022-12-31 00:00:00', 'Songoku', '150', 'https://www.google.com/search?q=trailer+songoku&oq=trailer+songoku&aqs=edge..69i57j0i546l3j69i64.3999j0j9&sourceid=chrome&ie=UTF-8#fpstate=ive&vld=cid:abac857b,vid:045k-R-hzJU', 'public/assets/images/forest.jpg'),
	(3, 'One Piece', 'One Piece', '2022-12-19 00:00:00', '2023-01-22 00:00:00', 'One Piece', '90', 'https://www.youtube.com/watch?v=_sJWa73bpP8', 'public/assets/images/onepiece.jpg'),
	(4, 'Fairy tail', 'Fairy tail', '2022-12-20 00:00:00', '2023-01-01 00:00:00', 'Fairy tail', '120', 'https://www.youtube.com/watch?v=AbOw39RbGTc', 'public/assets/images/tho.jpg'),
	(5, 'Liar', 'Liar', '2022-12-12 00:00:00', '2022-12-30 00:00:00', 'Liar', '180', 'https://www.google.com/search?q=trailer+liar&oq=trailer+liar&aqs=edge..69i57j0i546j0i30i546j69i64.3512j0j1&sourceid=chrome&ie=UTF-8#fpstate=ive&vld=cid:25b48a19,vid:M4it2tN_hVY', 'public/assets/images/avatar.jpg'),
	(6, 'Wednesday', 'Wednesday', '2022-12-15 00:00:00', '2022-12-30 00:00:00', 'Phim về gia đình Addams', '120', 'https://www.google.com/search?q=trailer+wednesday&oq=trailer+wedne&aqs=edge.0.0i512j69i57j0i22i30l7.8468j0j1&sourceid=chrome&ie=UTF-8#fpstate=ive&vld=cid:7c5d0eb2,vid:Di310WS8zLk', 'public/assets/images/trotan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `movie_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`movie_id`, `category_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(5, 2),
(1, 3),
(2, 3),
(3, 3),
(6, 3),
(1, 4),
(2, 4),
(4, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 8),
(6, 8),
(5, 10),
(5, 11),
(6, 14),
(5, 15),
(6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `movie_room`
--

CREATE TABLE `movie_room` (
  `movie_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_room`
--

INSERT INTO `movie_room` (`movie_id`, `room_id`) VALUES
(2, 1),
(1, 2),
(3, 2),
(4, 2),
(1, 3),
(2, 3),
(3, 3),
(5, 3),
(2, 4),
(5, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `description`, `price`) VALUES
(1, 'Bắp Matcha', 'food', 'Bắp trà xanh', 80000),
(2, 'B1', 'combo', 'Bắp Cheese + Bắp Matcha + Fanta', 180000),
(3, 'J1', 'combo', '7Up + Pepsi ', 55000),
(4, 'Bắp Original', 'food', 'Bắp thường', 60000),
(5, '3B', 'combo', 'Bắp Cheese + Bắp Matcha + Bắp Original', 220000),
(6, 'N2', 'combo', 'Bắp Original + Pepsi', 85000),
(7, 'N1', 'combo', 'Bắp Cheese + 7Up', 105000),
(8, 'T1', 'combo', 'Bắp Matcha + Bắp Original', 80000),
(9, 'Bắp Cheese', 'food', 'Bắp phô mai', 80000),
(10, 'T2', 'combo', 'Bắp Matcha + Bắp Original + 7Up + Pepsi', 200000),
(14, 'Fanta', 'food', 'Nước giải khát Fanta', 30000),
(16, '7Up', 'food', 'Nước giải khát 7Up', 30000),
(19, 'Pepsi', 'food', 'Nước ngọt Pepsi', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint UNSIGNED NOT NULL,
  `total_price` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `total_price`, `user_id`, `created_at`) VALUES
(1, 0, 10, '2022-11-26 18:18:43'),
(2, 0, 7, '2022-11-26 18:18:43'),
(3, 0, 6, '2022-11-26 18:18:43'),
(4, 0, 3, '2022-11-26 18:18:43'),
(5, 0, 9, '2022-11-26 18:18:43'),
(6, 0, 9, '2022-11-26 18:18:43'),
(7, 0, 5, '2022-11-26 18:18:43'),
(8, 0, 9, '2022-11-26 18:18:43'),
(9, 0, 6, '2022-11-26 18:18:43'),
(10, 0, 5, '2022-11-26 18:18:43'),
(11, 0, 6, '2022-11-26 18:18:43'),
(12, 0, 5, '2022-11-26 18:18:43'),
(13, 0, 5, '2022-11-26 18:18:43'),
(14, 0, 2, '2022-11-26 18:18:43'),
(15, 0, 1, '2022-11-26 18:18:43'),
(16, 0, 10, '2022-11-26 18:18:43'),
(17, 0, 2, '2022-11-26 18:18:43'),
(18, 0, 5, '2022-11-26 18:18:43'),
(19, 0, 1, '2022-11-26 18:18:43'),
(20, 0, 6, '2022-11-26 18:18:43'),
(21, 0, 3, '2022-11-26 18:18:43'),
(22, 0, 6, '2022-11-26 18:18:43'),
(23, 0, 8, '2022-11-26 18:18:43'),
(24, 0, 7, '2022-11-26 18:18:43'),
(25, 0, 2, '2022-11-26 18:18:43'),
(26, 0, 5, '2022-11-26 18:18:43'),
(27, 0, 9, '2022-11-26 18:18:43'),
(28, 0, 10, '2022-11-26 18:18:43'),
(29, 0, 7, '2022-11-26 18:18:43'),
(30, 0, 6, '2022-11-26 18:18:43'),
(31, 0, 8, '2022-11-26 18:18:43'),
(32, 0, 4, '2022-11-26 18:18:43'),
(33, 0, 1, '2022-11-26 18:18:43'),
(34, 0, 5, '2022-11-26 18:18:43'),
(35, 0, 2, '2022-11-26 18:18:43'),
(36, 0, 5, '2022-11-26 18:18:43'),
(37, 0, 7, '2022-11-26 18:18:43'),
(38, 0, 8, '2022-11-26 18:18:43'),
(39, 0, 5, '2022-11-26 18:18:43'),
(40, 0, 6, '2022-11-26 18:18:43'),
(41, 0, 3, '2022-11-26 18:18:43'),
(42, 0, 9, '2022-11-26 18:18:43'),
(43, 0, 7, '2022-11-26 18:18:43'),
(44, 0, 6, '2022-11-26 18:18:43'),
(45, 0, 10, '2022-11-26 18:18:43'),
(46, 0, 6, '2022-11-26 18:18:43'),
(47, 0, 8, '2022-11-26 18:18:43'),
(48, 0, 1, '2022-11-26 18:18:43'),
(49, 0, 1, '2022-11-26 18:18:43'),
(50, 0, 9, '2022-11-26 18:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_product`
--

CREATE TABLE `receipt_product` (
  `receipt_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_product`
--

INSERT INTO `receipt_product` (`receipt_id`, `product_id`, `amount`) VALUES
(16, 1, 1),
(22, 1, 1),
(28, 1, 5),
(34, 1, 1),
(35, 1, 1),
(38, 1, 5),
(9, 2, 5),
(19, 2, 2),
(20, 2, 5),
(27, 2, 5),
(40, 2, 4),
(33, 3, 1),
(46, 3, 3),
(12, 4, 1),
(15, 4, 4),
(18, 4, 5),
(24, 4, 2),
(47, 4, 4),
(49, 4, 2),
(17, 5, 5),
(21, 5, 3),
(41, 5, 5),
(44, 5, 3),
(45, 5, 3),
(5, 6, 2),
(30, 6, 3),
(36, 6, 1),
(37, 6, 3),
(50, 6, 5),
(1, 7, 3),
(2, 7, 2),
(6, 7, 5),
(10, 7, 3),
(23, 7, 2),
(32, 7, 5),
(4, 8, 5),
(8, 8, 2),
(26, 8, 5),
(43, 8, 5),
(3, 9, 2),
(7, 9, 4),
(11, 9, 3),
(25, 9, 4),
(29, 9, 2),
(39, 9, 3),
(48, 9, 3),
(13, 10, 5),
(14, 10, 1),
(31, 10, 3),
(42, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`) VALUES
(1, 'Phòng 1'),
(2, 'Phòng 2'),
(3, 'Phòng 3'),
(4, 'Phòng 4'),
(5, 'Phòng 5');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint UNSIGNED NOT NULL,
  `location` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `location`, `type`, `room_id`) VALUES
(1, '1:1', 2, 1),
(2, '2:1', 0, 1),
(3, '3:1', 3, 1),
(4, '4:1', 3, 1),
(5, '5:1', 3, 1),
(6, '1:2', 3, 1),
(7, '2:2', 2, 1),
(8, '3:2', 3, 1),
(9, '4:2', 3, 1),
(10, '5:2', 1, 1),
(11, '1:1', 3, 2),
(12, '2:1', 3, 2),
(13, '3:1', 2, 2),
(14, '4:1', 2, 2),
(15, '5:1', 2, 2),
(16, '1:2', 3, 2),
(17, '2:2', 0, 2),
(18, '3:2', 0, 2),
(19, '4:2', 0, 2),
(20, '5:2', 3, 2),
(21, '1:1', 3, 3),
(22, '2:1', 3, 3),
(23, '3:1', 2, 3),
(24, '4:1', 0, 3),
(25, '5:1', 1, 3),
(26, '1:2', 2, 3),
(27, '2:2', 2, 3),
(28, '3:2', 3, 3),
(29, '4:2', 2, 3),
(30, '5:2', 1, 3),
(31, '1:1', 2, 4),
(32, '2:1', 2, 4),
(33, '3:1', 3, 4),
(34, '4:1', 2, 4),
(35, '5:1', 3, 4),
(36, '1:2', 2, 4),
(37, '2:2', 1, 4),
(38, '3:2', 1, 4),
(39, '4:2', 0, 4),
(40, '5:2', 0, 4),
(41, '1:1', 1, 5),
(42, '2:1', 1, 5),
(43, '3:1', 0, 5),
(44, '4:1', 0, 5),
(45, '5:1', 0, 5),
(46, '1:2', 2, 5),
(47, '2:2', 0, 5),
(48, '3:2', 3, 5),
(49, '4:2', 1, 5),
(50, '5:2', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `price_per_ticket` int NOT NULL,
  `premiered_at` datetime NOT NULL,
  `seat_id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `price_per_ticket`, `premiered_at`, `seat_id`, `movie_id`) VALUES
	(1, 800000, '2022-12-26 06:22:01', 11, 1),
	(2, 100000, '2022-12-26 13:38:02', 12, 1),
	(3, 200000, '2022-12-26 09:44:24', 13, 1),
	(4, 200000, '2022-12-27 14:21:28', 14, 1),
	(5, 300000, '2022-12-26 17:08:07', 15, 1),
	(6, 200000, '2022-12-26 04:21:02', 16, 1),
	(7, 300000, '2022-12-26 00:26:35', 17, 1),
	(8, 800000, '2022-12-26 17:16:01', 18, 1),
	(9, 100000, '2022-12-27 12:05:00', 19, 1),
	(10, 300000, '2022-12-26 02:10:40', 20, 1),
	(11, 300000, '2022-12-26 04:37:59', 21, 1),
	(12, 100000, '2022-12-25 20:25:42', 22, 1),
	(13, 800000, '2022-12-27 10:26:10', 23, 1),
	(14, 300000, '2022-12-25 14:26:06', 24, 1),
	(15, 1000000, '2022-12-26 12:20:23', 25, 1),
	(16, 300000, '2022-12-25 08:32:29', 26, 1),
	(17, 300000, '2022-12-25 03:13:49', 27, 1),
	(18, 1000000, '2022-12-27 08:30:16', 28, 1),
	(19, 500000, '2022-12-27 12:30:45', 29, 1),
	(20, 200000, '2022-12-27 17:11:55', 30, 1),
	(21, 300000, '2022-12-27 05:10:58', 1, 2),
	(22, 500000, '2022-12-27 19:20:59', 2, 2),
	(23, 300000, '2022-12-26 08:59:40', 3, 2),
	(24, 100000, '2022-12-27 20:45:00', 4, 2),
	(25, 800000, '2022-12-26 01:17:59', 5, 2),
	(26, 300000, '2022-12-28 05:56:45', 6, 2),
	(27, 300000, '2022-12-27 05:16:28', 7, 2),
	(28, 500000, '2022-12-27 22:42:09', 8, 2),
	(29, 100000, '2022-12-28 23:52:35', 9, 2),
	(30, 300000, '2022-12-27 09:19:27', 10, 2),
	(31, 800000, '2022-12-28 10:16:35', 21, 2),
	(32, 200000, '2022-12-27 15:19:54', 22, 2),
	(33, 300000, '2022-12-26 06:48:53', 23, 2),
	(34, 500000, '2022-12-27 15:29:40', 24, 2),
	(35, 800000, '2022-12-27 17:03:44', 25, 2),
	(36, 1000000, '2022-12-27 16:43:44', 26, 2),
	(37, 100000, '2022-12-28 20:17:19', 27, 2),
	(38, 1000000, '2022-12-28 18:55:15', 28, 2),
	(39, 300000, '2022-12-27 08:53:51', 29, 2),
	(40, 500000, '2022-12-28 22:46:05', 30, 2),
	(41, 200000, '2022-12-27 16:30:45', 31, 2),
	(42, 300000, '2022-12-27 12:49:22', 32, 2),
	(43, 1000000, '2022-12-26 23:01:23', 33, 2),
	(44, 500000, '2022-12-27 10:01:47', 34, 2),
	(45, 300000, '2022-12-27 07:21:27', 35, 2),
	(46, 800000, '2022-12-27 01:31:34', 36, 2),
	(47, 800000, '2022-12-26 10:46:53', 37, 2),
	(48, 100000, '2022-12-28 23:06:42', 38, 2),
	(49, 300000, '2022-12-26 06:05:02', 39, 2),
	(50, 300000, '2022-12-27 03:35:25', 40, 2),
	(51, 200000, '2022-12-26 13:27:39', 11, 3),
	(52, 200000, '2022-12-28 07:26:42', 12, 3),
	(53, 300000, '2022-12-26 20:18:23', 13, 3),
	(54, 300000, '2022-12-28 06:48:57', 14, 3),
	(55, 100000, '2022-12-26 18:44:38', 15, 3),
	(56, 100000, '2022-12-27 06:47:23', 16, 3),
	(57, 100000, '2022-12-28 08:18:42', 17, 3),
	(58, 500000, '2022-12-26 00:48:53', 18, 3),
	(59, 500000, '2022-12-27 12:40:34', 19, 3),
	(60, 1000000, '2022-12-26 17:30:49', 20, 3),
	(61, 300000, '2022-12-27 02:40:16', 21, 3),
	(62, 800000, '2022-12-26 13:07:48', 22, 3),
	(63, 1000000, '2022-12-26 09:25:54', 23, 3),
	(64, 200000, '2022-12-27 13:01:52', 24, 3),
	(65, 100000, '2022-12-27 18:42:20', 25, 3),
	(66, 800000, '2022-12-28 22:07:37', 26, 3),
	(67, 800000, '2022-12-26 12:03:30', 27, 3),
	(68, 100000, '2022-12-27 05:58:04', 28, 3),
	(69, 200000, '2022-12-26 04:51:52', 29, 3),
	(70, 500000, '2022-12-27 14:43:00', 30, 3),
	(71, 100000, '2022-12-27 19:50:07', 41, 3),
	(72, 100000, '2022-12-28 04:25:00', 42, 3),
	(73, 100000, '2022-12-26 01:24:08', 43, 3),
	(74, 300000, '2022-12-28 10:53:41', 44, 3),
	(75, 300000, '2022-12-27 02:22:43', 45, 3),
	(76, 300000, '2022-12-26 19:08:28', 46, 3),
	(77, 500000, '2022-12-28 06:16:27', 47, 3),
	(78, 300000, '2022-12-27 18:56:29', 48, 3),
	(79, 300000, '2022-12-27 15:24:50', 49, 3),
	(80, 100000, '2022-12-26 02:23:34', 50, 3),
	(81, 200000, '2022-12-27 02:44:33', 11, 4),
	(82, 200000, '2022-12-26 06:34:13', 12, 4),
	(83, 1000000, '2022-12-28 04:09:06', 13, 4),
	(84, 1000000, '2022-12-28 19:45:14', 14, 4),
	(85, 300000, '2022-12-27 01:57:19', 15, 4),
	(86, 800000, '2022-12-28 03:22:07', 16, 4),
	(87, 1000000, '2022-12-26 22:24:24', 17, 4),
	(88, 300000, '2022-12-27 11:24:20', 18, 4),
	(89, 300000, '2022-12-26 15:02:40', 19, 4),
	(90, 200000, '2022-12-26 15:11:48', 20, 4),
	(91, 800000, '2022-12-30 09:00:36', 21, 5),
	(92, 200000, '2022-12-29 10:56:44', 22, 5),
	(93, 1000000, '2022-12-31 06:52:24', 23, 5),
	(94, 1000000, '2022-12-30 08:05:10', 24, 5),
	(95, 200000, '2022-12-31 19:46:32', 25, 5),
	(96, 800000, '2022-12-31 14:57:28', 26, 5),
	(97, 200000, '2022-12-30 10:13:09', 27, 5),
	(98, 800000, '2022-12-29 11:32:39', 28, 5),
	(99, 500000, '2022-12-31 07:22:00', 29, 5),
	(100, 1000000, '2022-12-30 12:04:11', 30, 5),
	(101, 500000, '2022-12-30 19:01:27', 31, 5),
	(102, 100000, '2022-12-30 12:49:51', 32, 5),
	(103, 300000, '2022-12-31 00:34:11', 33, 5),
	(104, 800000, '2022-12-30 15:20:49', 34, 5),
	(105, 100000, '2022-12-29 22:27:55', 35, 5),
	(106, 300000, '2022-12-29 00:42:48', 36, 5),
	(107, 800000, '2022-12-30 03:22:07', 37, 5),
	(108, 200000, '2022-12-31 09:35:01', 38, 5),
	(109, 100000, '2022-12-30 07:46:15', 39, 5),
	(110, 300000, '2022-12-30 13:23:49', 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` datetime NOT NULL,
  `_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_address`, `password`, `phone`, `gender`, `registered_at`, `_token`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$b3W2ox50Q.KaeeuivaZCouGJsu8x9xF9oE.2pwUBQUymgG9CKZstC', '(351) 776-6546', 'Nam', '1971-08-08 20:23:25', '1', 1),
(2, 'Phòng 2', 'judd23@stehr.biz', '$2y$10$2Wg/oW5y6EfBu9qi6ptArORAVbDpJrLDkYyyoY47y8qYkeyDw1SjC', '+1-678-732-1927', 'Nam', '1976-12-05 18:58:47', '2', 0),
(3, 'Phòng 3', 'enola30@mclaughlin.com', '$2y$10$PUrjUa7X49BTxA9pvOxZruwKVPrKLtS2/VbBCbPp8GF210grUErXq', '534-443-4741', 'Nữ', '2015-08-10 19:25:31', '3', 0),
(4, 'Phòng 4', 'tracey58@beahan.com', '$2y$10$ZYKfkTh5z/SE3DHpsQfGteKxb6vvGRUa8eftae6nPGVRAlE9vz/Va', '254.660.0643', 'Nữ', '1979-08-07 16:45:15', '4', 0),
(5, 'Phòng 5', 'simonis.herminia@legros.info', '$2y$10$fkjlEBPtJYYY5Gp8sRokO.QpBYhASovSMA5KxhoJc/VrVSFuzqUga', '207.479.8794', 'Bê đê', '2015-08-07 19:38:20', '5', 0),
(6, 'Phòng 6', 'ibashirian@ruecker.biz', '$2y$10$rG45ilSC1rKkG4nEt197RulYA730F9J/7nd/GLijRh8tpfLtaCYiG', '+1-620-396-1546', 'Bê đê', '2009-06-16 16:01:27', '6', 0),
(7, 'Phòng 7', 'roosevelt71@stroman.com', '$2y$10$OAf369S7pqcPiv.cEHf/cu8tr3U8tWAoBZPVzyRS52W44FfJAQYny', '(216) 743-4500', 'Bê đê', '2018-04-17 06:11:33', '7', 0),
(8, 'Phòng 8', 'ukreiger@little.info', '$2y$10$voLVJHCiauzzVgvd/IWtFO1lNh3ziamRP4uY6Nhs3LsnrJ/Hu8obu', '(616) 613-2922', 'Nam', '2002-11-09 12:39:55', '8', 1),
(9, 'Phòng 9', 'rodriguez.seamus@yahoo.com', '$2y$10$GrgtoSqhyZxkxSnVBrPXU.U3f6FhhYIghKFfaiVxffAY0TANK8Wv.', '424-526-7566', 'Bê đê', '1988-08-27 08:52:59', '9', 1),
(10, 'Phòng 10', 'erdman.moshe@parisian.org', '$2y$10$m5d9lwoLqs7HZPhA2E1BduiAXpHLkO3WYLIJjkbyER0zx3dAnpOaG', '+1.551.464.6475', 'Bê đê', '1971-11-10 23:07:35', '10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combo_food`
--
ALTER TABLE `combo_food`
  ADD PRIMARY KEY (`combo_id`,`food_id`),
  ADD KEY `combo_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoice_ticket`
--
ALTER TABLE `invoice_ticket`
  ADD PRIMARY KEY (`invoice_id`,`ticket_id`),
  ADD KEY `invoice_ticket_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`movie_id`,`category_id`),
  ADD KEY `movie_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `movie_room`
--
ALTER TABLE `movie_room`
  ADD PRIMARY KEY (`movie_id`,`room_id`),
  ADD KEY `movie_room_room_id_foreign` (`room_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_user_id_foreign` (`user_id`);

--
-- Indexes for table `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD PRIMARY KEY (`receipt_id`,`product_id`,`amount`),
  ADD KEY `receipt_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_room_id_foreign` (`room_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_seat_id_foreign` (`seat_id`),
  ADD KEY `tickets_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_address_unique` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `combo_food`
--
ALTER TABLE `combo_food`
  ADD CONSTRAINT `combo_food_combo_id_foreign` FOREIGN KEY (`combo_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `combo_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_ticket`
--
ALTER TABLE `invoice_ticket`
  ADD CONSTRAINT `invoice_ticket_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_ticket_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `movie_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_category_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_room`
--
ALTER TABLE `movie_room`
  ADD CONSTRAINT `movie_room_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `movie_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD CONSTRAINT `receipt_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `receipt_product_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `tickets_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
