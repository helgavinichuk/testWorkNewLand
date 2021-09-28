-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 28 2021 г., 12:16
-- Версия сервера: 8.0.26
-- Версия PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testForm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idCategory` int NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idCategory`, `category`) VALUES
(1, 'Приход'),
(2, 'Расход');

-- --------------------------------------------------------

--
-- Структура таблицы `Itog`
--

CREATE TABLE `Itog` (
  `idItog` int NOT NULL,
  `idType` int NOT NULL,
  `dateD` varchar(30) NOT NULL,
  `sum` double NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Itog`
--

INSERT INTO `Itog` (`idItog`, `idType`, `dateD`, `sum`, `comment`) VALUES
(76, 3, '2021-09-28T09:00', 23, 'sdfghj'),
(77, 3, '2021-09-28T09:00', 23.78, 'sdfghj'),
(78, 4, '2021-09-28T09:00', 987654, 'sdfghj'),
(79, 1, '2021-09-28T09:14', 1234567, 'qqq'),
(80, 1, '2021-09-28T09:14', 234, 'qaz'),
(81, 1, '2021-09-28T09:14', 12345, 'qazwsx'),
(82, 1, '2021-09-28T09:43', 98765, 'ygy'),
(83, 2, '2021-09-28T09:46', 123, 'rfgh'),
(84, 3, '2021-09-28T09:46', 6, 'rlkjnb'),
(85, 4, '2021-09-28T09:46', 5, 'kjhgv'),
(86, 5, '2021-09-28T09:46', 78, 'cvbnm'),
(87, 6, '2021-09-28T09:46', 70, ''),
(88, 7, '2021-09-28T09:46', 70, '345'),
(89, 8, '2021-09-28T09:46', 67, 'lkjhg'),
(90, 2, '2021-09-28T10:51', 98, 'rtyujhbl\nk\nk\nk\nk\n\nk\nk\nk\n'),
(91, 1, '2021-09-29T10:57', 23456, ''),
(92, 1, '2021-09-29T10:57', 23456, ''),
(93, 6, '2021-09-28T10:59', 12, 'ascsd'),
(94, 6, '2021-09-28T10:59', 12, 'ascsd'),
(95, 6, '2021-09-28T10:59', 12, 'ascsd'),
(96, 6, '2021-09-28T10:59', 12, 'ascsd');

-- --------------------------------------------------------

--
-- Структура таблицы `Type`
--

CREATE TABLE `Type` (
  `idType` int NOT NULL,
  `idCategory` int NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Type`
--

INSERT INTO `Type` (`idType`, `idCategory`, `Type`) VALUES
(1, 1, 'Заработная плата'),
(2, 1, 'Иные доходы'),
(3, 2, 'Продукты питания'),
(4, 2, 'Транспорт'),
(5, 2, 'Мобильная связь'),
(6, 2, 'Интернет'),
(7, 2, 'Развлечения'),
(8, 2, 'Другое');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `Itog`
--
ALTER TABLE `Itog`
  ADD PRIMARY KEY (`idItog`),
  ADD KEY `idType` (`idType`);

--
-- Индексы таблицы `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`idType`),
  ADD KEY `idCategory` (`idCategory`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Itog`
--
ALTER TABLE `Itog`
  MODIFY `idItog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `Type`
--
ALTER TABLE `Type`
  MODIFY `idType` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Itog`
--
ALTER TABLE `Itog`
  ADD CONSTRAINT `idType` FOREIGN KEY (`idType`) REFERENCES `Type` (`idType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Type`
--
ALTER TABLE `Type`
  ADD CONSTRAINT `idCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
