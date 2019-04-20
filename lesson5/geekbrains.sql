-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2019 г., 17:44
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekbrains`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `path_small` varchar(20) NOT NULL,
  `path_big` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `path_small`, `path_big`, `size`, `views_count`) VALUES
(24, '8.jpg', 'img/small/', 'img/big/', 15044, 7),
(25, '1.jpg', 'img/small/', 'img/big/', 161944, 6),
(27, '10.jpg', 'img/small/', 'img/big/', 41795, 7),
(28, '3.png', 'img/small/', 'img/big/', 31549, 1),
(29, '9.png', 'img/small/', 'img/big/', 19632, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
