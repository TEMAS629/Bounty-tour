-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2024 г., 17:38
-- Версия сервера: 8.3.0
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bounty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `image`, `country`, `price`, `days`, `city_id`) VALUES
(1, 'turkei.jpg', 'Турция', '32 500', '7 - 8', 1),
(2, 'egipet.jpg', 'Египет', '36 260', '7 - 8', 2),
(3, 'abhasiya.jpeg', 'Абхазия', '26 320', '7 - 8', 3),
(4, 'geledjik.jpeg', 'Геленджик', '39 000', '8', 4),
(5, 'dubai.jpg', 'Дубай', '56 400', '7', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name_hotel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `beach_cover` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `adults` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `rating`, `image_1`, `image_2`, `image_3`, `name_hotel`, `location`, `description`, `beach_cover`, `price`, `adults`, `start_date`, `duration`) VALUES
(1, 4, 'hotel_one.jpg', 'hotel_two.jpg', 'hotel_three.jpg', 'Arial', 'Египет, Хургада', 'Хороший отель со множеством развлечений ', 'песок', 163256.00, 2, '2024-06-12', 7),
(2, 5, 'hotel_one1.jpg', 'hotel_two1.jpg', '', 'Artemis Princess ', 'Египет, Гагры', 'Artemis Princess находится в городе Аланья, в поселке Обагол. Отель имеет 146 номеров, состоит из ад...', 'галька', 138500.00, 1, '2024-06-15', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
