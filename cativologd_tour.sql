-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 24 2024 г., 12:13
-- Версия сервера: 8.0.29-21
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cativologd_tour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `image`, `country`, `price`, `days`, `city_id`) VALUES
(1, 'turkei.jpg', 'Турция', '132 500', '7 - 8', 1),
(2, 'egipet.jpg', 'Египет', '136 260', '7 - 8', 2),
(3, 'abhasiya.jpeg', 'Абхазия', '126 320', '7 - 8', 3),
(4, 'geledjik.jpeg', 'Россия', '139 000', '5', 4),
(5, 'dubai.jpg', 'ОАЭ', '104 400', '8', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `form_order`
--

CREATE TABLE `form_order` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_quest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `form_order`
--

INSERT INTO `form_order` (`id`, `name`, `phone`, `email`, `question`, `name_quest`) VALUES
(17, 'Артём', '89211448116', 'kirillov_art@list.ru', '', ''),
(23, 'Артём', '234423423', '123@mail.com', '', ''),
(22, 'Артём', '234423423', '123@mail.com', '', ''),
(24, '', '', '', 'Как это сделать?', 'Артём');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `tour_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tour_id` int NOT NULL,
  `second_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dad_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('man','woman') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_birth` date NOT NULL,
  `document_series` int NOT NULL,
  `document_issue_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES
(54, 0, 'Akka Claros', 6, 'Анна', 'Анна', 'Евгеньевна', 'woman', '2004-08-27', 1918465986, '2024-06-26'),
(103, 1, 'Mirror Family  ', 4, 'Математик', 'Райан', 'Гослинг', 'man', '2024-06-30', 1918264578, '2024-06-18'),
(102, 1, 'Mirror Family  ', 4, 'Арифметик', 'болгарец', 'Опана', 'man', '2024-06-21', 1918235689, '2024-06-17'),
(101, 1, 'Akka Claros', 6, 'Кириллов', 'Артём', 'Евгеньевич', 'man', '2024-06-02', 1918181223, '2024-06-01'),
(104, 1, 'Akka Claros', 6, 'Иванов', 'иВАН', 'Иванович', 'man', '2024-06-15', 1918124598, '2024-06-19');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int NOT NULL,
  `rating` int NOT NULL,
  `image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `in_rooms` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `infrastructure` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `beach_cover` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `adults` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `country_id` int NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `rating`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `name_hotel`, `location`, `description`, `place`, `type_place`, `in_rooms`, `infrastructure`, `beach_cover`, `price`, `adults`, `start_date`, `duration`, `country_id`, `country_name`) VALUES
(1, 5, 'egipt1.jpg', 'egipt2.jpg', 'egipt3.jpg', 'egipt4.jpg', 'egipt5.jpg', 'egipt6.jpg', 'Stella Di Mare Beach Hotel & Spa', 'Египет, Шарм-Эль-Шейх', 'Stella Di Mare Beach Hotel & Spa находится в городе Шарм-Эль-Шейх. Отель имеет 298 номеров, состоит из главного 8-этажного здания и отдельно стоящих 2-этажных зданий, 5 лифтов в главном здании. Отель построен в 2009 году, последняя реновация в 2021 году. ', 'До центра города Шарм-Эль-Шейх – 3,3 км. До Международного аэропорта Шарм-Эль-Шейх (Sharm el-Sheikh International Airport) - 14 км', 'Отель находится на первой береговой линии, в 50 м расположен собственный, песчаный пляж.', 'Двухспальная или 2 отдельные кровати, выход в отдельный внутренний двор, кондиционер, ТВ, мини-бар, кофемашина, душ.', '3 ресторана, 5 баров, 3 бассейна, библиотека, анимационная программа, дартс, бильярд, дискотека, ночное живое шоу-группа, пианист, гольф, настольный теннис, теннисный корт, пляжный волейбол, игровая комната.', 'песок', 150005.00, 2, '2024-06-12', 7, 2, 'Египет'),
(2, 4, 'turkey_hotel1.jpg', 'turkey_hotel2.jpg', 'turkey_hotel3.jpg', 'turkey_hotel4.jpg', 'turkey_hotel5.jpg', 'turkey_hotel6.jpg', 'Golden Sun ', 'Турция, Кемер: Бельдиби', 'Golden Sun находится в поселке Бельдиби. Отель имеет 98 номеров, состоит из 2-х и 3-х этажных 4 зданий. Отель построен в 1991 году, последняя реновация в 2014 году. Общая площадь: 7 000 кв.м.', 'До центральной части поселка Бельдиби - 2,2 км, до центра города Кемер - 15 км. До Международного аэропорта Анталии (Antalya International Airport) - 42 км.', 'В 450 м расположен собственный, галечно-каменистый пляж (длина 100 м).', 'Двухспальная или 2 отдельные кровати, выход в отдельный внутренний двор, кондиционер, ТВ, мини-бар, кофемашина, душ, сейф (платно: 1,5$)', 'Бар у бассейна, 2 открытых бассейна, бильярд, дартс.', 'галька', 142788.00, 2, '2024-06-15', 7, 1, 'Турция'),
(3, 4, 'abhasiya1.jpg', 'abhasiya2.jpg', 'abhasiya3.jpg', 'abhasiya4.jpg', 'abhasiya5.jpg', 'abhasiya6.jpg', 'Paradise Beach ', 'Абхазия, Пицунда', 'Paradise Beach (Парадиз Бич) находится в селе Алахадзы. Отель имеет 202 номера, состоит из 2-х корпусов (7 этажей, есть лифт и 4 этажа). Отель построен в 2017 году.', 'До центра села Алахадзы – 1,5 км. До Международного аэропорта Сочи (Sochi International Airport) - 58 км.\r\n', 'Отель находится на первой береговой линии, в 50 м расположен собственный песчано-галечный пляж. Шезлонги и зонтики, пляжные полотенца — бесплатно.', 'Двухспальная или 2 отдельные кровати, выход в отдельный внутренний двор, кондиционер.', 'Кафе, танцевальная площадка, летняя терраса, ресторан, бар, бассейн.', 'песок и галька', 106014.00, 2, '2024-07-01', 7, 3, 'Абхазия'),
(5, 5, 'oae1.jpg', 'oae2.jpg', 'oae3.jpg', 'oae4.jpg', 'oae5.jpeg', 'oae6.jpeg', 'Stella Di Mare Dubai Marina ', 'ОАЭ, Дубай', 'Stella Di Mare Dubai Marina находится в городе Дубай, в районе Дубай Марина, входит в сеть отелей Stella Di Mare. Отель имеет 369 номеров, построен в 2018 году. Общая площадь: 5 000 кв.м.', 'До центра города Дубай – 24 км. До Международного аэропорта Дубай (Dubai International Airport) – 35 км.', 'В 1,2 км расположен общественный, песчаный пляж Marina. Шезлонги, зонтики от солнца - платно.', 'Двухспальная или 2 отдельные кровати, выход в отдельный внутренний двор, кондиционер, ТВ, мини-бар, кофемашина, душ, сейф', 'Ресторан La Fontana, Японский ресторан HISAYA, Ресторан на крыше Headlines, 1 открытый бассейн, 1 детский открытый бассейн, развлекательные программы, экскурсионная программа', 'песок', 115000.00, 2, '2024-07-10', 8, 5, 'ОАЭ'),
(4, 4, 'russia1.jpg', 'russia2.jpg', 'russia3.jpg', 'russia4.jpg', 'russia5.jpg', 'russia6.jpg', 'Mirror Family  ', 'Россия, Большой Сочи: Адлер', 'Mirror Family находится в городе Сочи, в микрорайоне Адлер, Центральный. Отель имеет 167 номеров, состоит из 5-этажного корпуса с лифтом и 4-этажных 2 корпусов с лифтами. Отель построен в 2023 году.', 'До центральной части микрорайона Адлер - 2 км, до центра города Сочи - 28 км. До Международного аэропорта Сочи-Адлер имени В. И. Севастьянова (Sochi-Adler International Airport) - 6 км.', 'В 1,3 км расположен общественный, галечный пляж Чайка.', 'Двухспальная или 2 отдельные кровати, кондиционер, ТВ, мини-бар, душ, сейф', 'Ресторан, бар, бассейн.', 'Галька', 100456.00, 2, '2024-06-20', 5, 4, 'Россия'),
(6, 5, 'hotel_ones.jpg', 'hotel_2.jpg', 'hotel_3.jpg', 'hotel_5.jpg', 'hotel_6.jpg', 'hootel_4.jpg', 'Akka Claros', 'Турция, Кемер: Кириш', 'Добро пожаловать в Akka Claros – ваш оазис комфорта и уюта в самом сердце живописного Кириша, Кемер. Этот уютный отель, входящий в престижную сеть Akka Hotels, предлагает своим гостям уникальное сочетание современного удобства и традиционного турецкого гостеприимства.', 'Отель расположен в Турции в городе Кириша, Кемер, находится в км до аэропорта Antalya Airport (AYT).', 'Пляжный, 300м до пляжа', 'Двухспальная или 2 отдельные кровати, выход в отдельный внутренний двор, кондиционер, ТВ, мини-бар, кофемашина, душ, сейф, прекрасный вид на море.', 'Ресторан, бар, конференц-зал, камера хранения, бассейн, массаж, спа, водные виды спорта, прачечная.', 'галька', 174343.00, 1, '2024-06-12', 7, 1, 'Турция');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `pass`) VALUES
(1, 'Артём', 'Кириллов', 'kirillov_art@list.ru', '89211448116', 'qwerty123'),
(2, 'колян', 'малован', 'peta4okpro@mail.com', '8965321489', '123'),
(3, 'Аня', 'Подосёнова ', 'annadance3@gmail.com', '+7(900)505-1', '1111'),
(4, 'Аня', 'Подосёнова ', 'annadance3@gmail.com', '89005051100', '1111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_order`
--
ALTER TABLE `form_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `form_order`
--
ALTER TABLE `form_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
