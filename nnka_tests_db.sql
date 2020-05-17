-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 17 2020 г., 19:01
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nnka_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sectionheaders`
--

CREATE TABLE `sectionheaders` (
  `ID` tinyint(4) DEFAULT NULL,
  `SUB_TYPE` tinyint(4) DEFAULT NULL,
  `SECTION_HEADER` varchar(26) DEFAULT NULL,
  `SECTION_DESCRIPTION` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sectionheaders`
--

INSERT INTO `sectionheaders` (`ID`, `SUB_TYPE`, `SECTION_HEADER`, `SECTION_DESCRIPTION`) VALUES
(1, 1, 'Раздел 1: Введение', 'Знакомство с предметом'),
(2, 1, 'Раздел 2: Основные понятия', 'Правила и грамматика'),
(3, 1, 'Раздел 3: Конец курса', 'Заключительные слова'),
(4, 2, 'Раздел 1: Введение', 'Знакомство с предметом');

-- --------------------------------------------------------

--
-- Структура таблицы `sqlite_sequence`
--

CREATE TABLE `sqlite_sequence` (
  `name` varchar(14) DEFAULT NULL,
  `seq` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sqlite_sequence`
--

INSERT INTO `sqlite_sequence` (`name`, `seq`) VALUES
('SectionHeaders', 3),
('TestHeaders', 9),
('TestData', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `testdata`
--

CREATE TABLE `testdata` (
  `ID` tinyint(4) DEFAULT NULL,
  `PARENT_ID` tinyint(4) DEFAULT NULL,
  `ANSWER_TYPE` varchar(7) DEFAULT NULL,
  `QUEST_STRING` varchar(69) DEFAULT NULL,
  `CORRECT_ANSWER` varchar(12) DEFAULT NULL,
  `ANSWER_COMMENT` varchar(5) DEFAULT NULL,
  `VAR0` varchar(12) DEFAULT NULL,
  `VAR1` varchar(12) DEFAULT NULL,
  `VAR2` varchar(12) DEFAULT NULL,
  `VAR3` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `testdata`
--

INSERT INTO `testdata` (`ID`, `PARENT_ID`, `ANSWER_TYPE`, `QUEST_STRING`, `CORRECT_ANSWER`, `ANSWER_COMMENT`, `VAR0`, `VAR1`, `VAR2`, `VAR3`) VALUES
(1, 1, 'LESSON', 'Добро пожаловать!\r\nЭто первый созданный урок в системе тестирования!', '', '', '', '', '', ''),
(2, 2, 'VARIANT', 'В каком веке началось распространения английского языка?', '3', 'Да :)', 'XXI', 'V', 'XIV', 'XVI'),
(3, 2, 'TEXT', 'Сколько букв в английском алфавите?', '26', '', '', '', '', ''),
(4, 5, 'VARIANT', 'My mother ___ the dishes.', '2', NULL, 'wash', 'washs', 'washes', 'to wash'),
(5, 5, 'TEXT', 'He often ___ (to use) his telephone', 'uses', NULL, NULL, NULL, NULL, NULL),
(6, 5, 'VARIANT', 'Does he ___ the answer?', '1', NULL, 'knows', 'know', 'to know', 'knew'),
(7, 5, 'VARIANT', 'We ___ (not see) the light.', '3', NULL, 'does not see', 'not to see', 'don\'t sees', 'do not see'),
(8, 6, 'VARIANT', 'Are you ___ (talk) to me?', '3', NULL, 'told', 'talks', 'to talk', 'talking'),
(9, 6, 'VARIANT', 'She is constantly ___ (cry).', '1', NULL, 'cries', 'crying', 'criing', 'cry'),
(10, 6, 'TEXT', 'I\'m always ___ (make) mistakes!', 'making', NULL, NULL, NULL, NULL, NULL),
(11, 7, 'VARIANT', 'Have they just ___ home? ', '0', NULL, 'arrived', 'arrive', 'to arrive', 'arriving'),
(12, 7, 'TEXT', 'I have ___ (cook) a good dinner.', 'cooked', NULL, NULL, NULL, NULL, NULL),
(13, 2, 'VARIANT', 'Сколько падежей имеют местоимения?', '1', NULL, '2', '3', '5', '1'),
(14, 4, 'LESSON', 'Предлагаем Вам изучить информацию о временах в английском языке.', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 8, 'LESSON', 'Спасибо Вам за прохождение данного теста.', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 3, 'VARIANT', 'Какие глаголы часто не имеют дословного перевода?', NULL, '3', 'простые', 'производные', 'сложные', 'фразовые'),
(17, 3, 'VARIANT', 'Какое время обозначается как \"простое?\"', '1', NULL, 'Past', 'Simple', 'Perfect', 'Future'),
(18, 10, 'LESSON', 'Предлагаем Вам пройти первый тест для ознакомления с типами заданий.', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 11, 'VARIANT', 'Сколько вариантов ответа вы видите в форме ниже?', '3', NULL, '1', '2', '3', '4'),
(20, 11, 'TEXT', 'Обязательно ли нажимать на кнопку ниже для отправки ответов (да/нет)?', 'да', NULL, NULL, NULL, NULL, NULL),
(21, 12, 'VARIANT', 'К какой группе языков принадлежит русский язык?', '2', NULL, 'германская', 'романская', 'славянская', 'балтийская'),
(22, 12, 'TEXT', 'Сколько млн. человек говорят по-русски (круглый ответ)?', '260', NULL, NULL, NULL, NULL, NULL),
(23, 9, 'LESSON', 'Возможности данной системы могут быть расширены по вашему усмотрению', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `testheaders`
--

CREATE TABLE `testheaders` (
  `ID` tinyint(4) DEFAULT NULL,
  `SECTION_ID` tinyint(4) DEFAULT NULL,
  `TEST_TYPE` varchar(6) DEFAULT NULL,
  `TEST_NAME` varchar(26) DEFAULT NULL,
  `TEST_DESCR` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `testheaders`
--

INSERT INTO `testheaders` (`ID`, `SECTION_ID`, `TEST_TYPE`, `TEST_NAME`, `TEST_DESCR`) VALUES
(1, 1, 'LESSON', 'Приветствие', 'Первый созданный урок!'),
(2, 1, 'TEST', 'Первый тест', 'Основные сведения'),
(3, 1, 'TEST\r\n', 'Тест на общие знания', 'Структура языка'),
(4, 2, 'LESSON', 'Времена в английском языке', 'Основные времена'),
(5, 2, 'TEST', 'Grammar: Present Simple', 'Грамматика: настоящее простое время'),
(6, 2, 'TEST', 'Grammar:Present Continuous', 'Грамматика: настоящее продолженное'),
(7, 2, 'TEST', 'Grammar: Present Perfect', 'Грамматика: настоящее совершенное время'),
(8, 3, 'LESSON', 'Благодарим за прохождение', 'Заключительные слова тестовой версии'),
(9, 3, 'TEST', 'От разработчиков', 'Расширение функционала'),
(10, 4, 'LESSON', 'Приветствие', 'Первый созданный урок!'),
(11, 4, 'TEST', 'Пробный тест', 'Как отвечать на задания.'),
(12, 4, 'LESSON', 'Основные сведения о языке', 'Вводные слова');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sectionheaders`
--
ALTER TABLE `sectionheaders`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Индексы таблицы `testdata`
--
ALTER TABLE `testdata`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Индексы таблицы `testheaders`
--
ALTER TABLE `testheaders`
  ADD UNIQUE KEY `ID` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
