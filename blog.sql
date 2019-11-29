-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 29 2019 г., 19:07
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment_form`
--

CREATE TABLE `comment_form` (
  `id_comment` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date_comment` date NOT NULL,
  `comment_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comment_form`
--

INSERT INTO `comment_form` (`id_comment`, `username`, `comment`, `date_comment`, `comment_status`) VALUES
(2, 'artem', 'sssssssss', '2019-10-01', 0),
(3, 'test', 'sdadsasad', '2019-11-17', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `image`) VALUES
(1, 'artem', 'artem.ddpro@gmail.com', '$2y$10$cNVp.w.BurX67GyrfqTv7.Bc/aN8OHPFFCanoSksQJpzocnbQmpY.', ''),
(2, 'artem', 'saaa@mail.com', '$2y$10$S7Nd3NqbJQNsZRAXF4Bj7e9CRjrX9sPFKP8rWkyXimKQGO2h7YXCu', ''),
(3, 'Gewww', 'artem1@mail.com', '$2y$10$d6F1P4t99RREx/e5DU1SquFdDa78QhTgJb08dm4qvKp3QXN95ejcu', ''),
(4, 'test', 'askdja@mail.com', '$2y$10$iPf4SOaVuk0AG0ewVdVX5ecYvsvIkvpYFg2gpuqBb/R77CmjfndCq', ''),
(5, 'test', 'test12@mail.com', '$2y$10$eyW4ryFwmIRggVcWGPodAerydVSMxkUFgTFZD4fGiMxpkvNuhM.gK', ''),
(6, 'test', 'test1234@mail.com', '$2y$10$RjrJTIghd.4ll5u/2j9BA.rYj6n76fOukPFVDHmhI6m4iijUn96yW', ''),
(7, 'test', 'testtest@mail.com', '$2y$10$a5K3pVQS9NkL/BqSZFr0veuIesu/EvBajmLYGkgRX3EgzZaGfQSM6', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment_form`
--
ALTER TABLE `comment_form`
  ADD PRIMARY KEY (`id_comment`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment_form`
--
ALTER TABLE `comment_form`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
