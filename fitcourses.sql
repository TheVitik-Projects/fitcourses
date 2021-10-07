-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 29 2021 р., 18:56
-- Версія сервера: 5.7.16-log
-- Версія PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `fitcourses`
--

-- --------------------------------------------------------

--
-- Структура таблиці `accounts`
--

CREATE TABLE `accounts` (
  `id` int(6) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(32) NOT NULL,
  `firstname` varchar(24) DEFAULT NULL,
  `lastname` varchar(24) DEFAULT NULL,
  `fathername` varchar(24) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `courses` varchar(1024) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `avatar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `password`, `email`, `firstname`, `lastname`, `fathername`, `phone`, `date`, `ip`, `courses`, `role`, `avatar`) VALUES
(1, 'admin', '1bbd886460827015e5d605ed44252251', 'admin@fitcourses.ua', NULL, NULL, NULL, NULL, '25-04-2021', '127.0.0.1', NULL, 1, 'unknown'),
(2, 'help', '25d55ad283aa400af464c76d713c07ad', 'help@fitcourses.ua', 'Хелпер', 'Помічник', 'Адміна', 987654321, '26-04-2021', '127.0.0.1', 'a:1:{i:1;i:10;}', 0, 'unknown'),
(3, 'test', '1bbd886460827015e5d605ed44252251', 'test@gmail.com', NULL, NULL, NULL, NULL, '27-04-2021', '127.0.0.1', NULL, 0, 'unknown'),
(4, 'account', '1bbd886460827015e5d605ed44252251', 'account@gmail.com', 'Імя', 'Прізвище', 'По-батькові', NULL, '27-04-2021', '127.0.0.1', NULL, 1, 'unknown'),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL, NULL, NULL, NULL, '29-04-2021', '127.0.0.1', NULL, 0, 'unknown'),
(6, 'Teacher', '1bbd886460827015e5d605ed44252251', 'teacher@fitcourses.ua', 'Вчитель', 'Вчительский', 'Вчителевич', 1234567890, '29-04-2021', '127.0.0.1', NULL, 0, 'unknown');

-- --------------------------------------------------------

--
-- Структура таблиці `courses`
--

CREATE TABLE `courses` (
  `id` int(6) NOT NULL,
  `creator_id` int(6) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` varchar(64) NOT NULL,
  `members` varchar(8192) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `courses`
--

INSERT INTO `courses` (`id`, `creator_id`, `title`, `description`, `members`, `status`) VALUES
(1, 1, 'Курс адміністратора', 'Для тестування сервісу', 'a:1:{i:0;i:2;}', 2),
(2, 2, 'Тестовий курс ', 'Також просто для тесту', NULL, 0),
(3, 1, 'Добрий курс', '', NULL, 0),
(4, 1, 'Весело', '', NULL, 0),
(5, 1, 'Тестовий курс', 'Тест форми створення', 'a:1:{i:0;i:2;}', 0),
(6, 1, 'Курс адміна', 'Просто так', NULL, 0),
(7, 1, 'Курс тесту', 'Тееест', NULL, 0),
(9, 1, 'Сьогодні', 'Завтра', NULL, 2),
(10, 4, 'Курс для відео', 'Просто опис', 'a:1:{i:0;i:2;}', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `tasks`
--

CREATE TABLE `tasks` (
  `id` int(6) NOT NULL,
  `course_id` int(6) NOT NULL,
  `title` varchar(64) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `files` varchar(1024) NOT NULL,
  `datecreated` varchar(10) NOT NULL,
  `datesend` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tasks`
--

INSERT INTO `tasks` (`id`, `course_id`, `title`, `text`, `files`, `datecreated`, `datesend`, `status`) VALUES
(1, 0, 'Test', 'Test', 'a:2:{i:0;a:2:{s:5:\"title\";s:32:\"Посилання на гугл\";s:4:\"link\";s:18:\"https://google.com\";}i:1;a:2:{s:5:\"title\";s:21:\"Пройти тест\";s:4:\"link\";s:13:\"test.php?id=1\";}}', '25-04-2021', '25-04-2021', 1),
(2, 1, 'Тестове завдання', 'Текст завдання', 'a:2:{i:0;a:2:{s:5:\"title\";s:32:\"Посилання на гугл\";s:4:\"link\";s:18:\"https://google.com\";}i:1;a:2:{s:5:\"title\";s:21:\"Пройти тест\";s:4:\"link\";s:13:\"test.php?id=1\";}}', '25-04-2021', '27-05-2021', 1),
(3, 1, 'Тестове завдання', 'Текст завдання', 'a:2:{i:0;a:2:{s:5:\"title\";s:32:\"Посилання на гугл\";s:4:\"link\";s:18:\"https://google.com\";}i:1;a:2:{s:5:\"title\";s:21:\"Пройти тест\";s:4:\"link\";s:13:\"test.php?id=1\";}}', '25-04-2021', '27-05-2021', 1),
(4, 1, 'Тестове завдання', 'Текст завдання', '', '25-04-2021', '27-05-2021', 1),
(5, 6, 'Тестове', 'Завдання через форму', 'a:2:{i:0;a:3:{s:5:\"title\";s:11:\"Fontawesome\";s:4:\"link\";s:46:\"https://fontawesome.com/icons/edit?style=solid\";s:4:\"icon\";s:4:\"link\";}i:1;a:3:{s:5:\"title\";s:21:\"BullseyeCoverageError\";s:4:\"link\";s:45:\"../files/BullseyeCoverageError_1619536279.txt\";s:4:\"icon\";s:3:\"txt\";}}', '27-04-2021', '2021-04-28', 0),
(6, 6, 'Тестовий курс2', 'Працює', 'a:3:{i:0;a:3:{s:5:\"title\";s:0:\"\";s:4:\"link\";s:0:\"\";s:4:\"icon\";s:4:\"link\";}i:1;a:3:{s:5:\"title\";s:4:\"Lab1\";s:4:\"link\";s:27:\"../files/Lab1_1619536380.py\";s:4:\"icon\";s:2:\"py\";}i:2;a:3:{s:5:\"title\";s:5:\"Task3\";s:4:\"link\";s:28:\"../files/Task3_1619536380.py\";s:4:\"icon\";s:2:\"py\";}}', '27-04-2021', '2021-04-29', 0),
(7, 6, 'Круте завдання', 'Опис', 'a:1:{i:0;a:3:{s:5:\"title\";s:0:\"\";s:4:\"link\";s:0:\"\";s:4:\"icon\";s:4:\"link\";}}', '27-04-2021', '2021-04-30', 0),
(8, 6, 'Круте завдання', 'Опис', 'a:0:{}', '27-04-2021', '2021-04-30', 0),
(9, 6, 'Тест дати', 'Працює?', 'a:0:{}', '27-04-2021', '', 0),
(10, 6, 'Тест дати', 'Працює?', 'a:0:{}', '27-04-2021', '', 0),
(11, 6, 'Нове завдання', 'Нема', 'a:0:{}', '27-04-2021', '09-05-2021', 1),
(12, 5, 'Завдання', 'Опис', 'a:1:{i:0;a:3:{s:5:\"title\";s:4:\"Lab1\";s:4:\"link\";s:27:\"../files/Lab1_1619545652.py\";s:4:\"icon\";s:2:\"py\";}}', '27-04-2021', '30-04-2021', 1),
(13, 10, 'Завдання для відео', 'Текст завдання', 'a:3:{i:0;a:3:{s:5:\"title\";s:11:\"Fontawesome\";s:4:\"link\";s:46:\"https://fontawesome.com/icons/edit?style=solid\";s:4:\"icon\";s:4:\"link\";}i:1;a:3:{s:5:\"title\";s:4:\"Lab1\";s:4:\"link\";s:27:\"../files/Lab1_1619552874.py\";s:4:\"icon\";s:2:\"py\";}i:2;a:3:{s:5:\"title\";s:5:\"Task3\";s:4:\"link\";s:28:\"../files/Task3_1619552874.py\";s:4:\"icon\";s:2:\"py\";}}', '27-04-2021', '28-04-2021', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `tests`
--

CREATE TABLE `tests` (
  `id` int(6) NOT NULL,
  `creator_id` int(6) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `max` int(11) NOT NULL,
  `points` varchar(1024) DEFAULT NULL,
  `html` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tests`
--

INSERT INTO `tests` (`id`, `creator_id`, `title`, `content`, `max`, `points`, `html`) VALUES
(1, 1, 'Тест на IQ', '', 200, NULL, ''),
(2, 1, 'Тест', 'a:5:{i:0;a:1:{s:8:\"question\";a:4:{i:1;s:33:\"Виберіть варіант 2\";i:2;s:60:\"Виберіть вчора,сьогодні і завтра\";i:3;s:21:\"Виберіть 2019\";i:4;s:38:\"Напишіть слово \"Тест\"\";}}i:1;a:1:{s:6:\"select\";a:1:{i:1;s:15:\"Варіант2\";}}i:2;a:1:{s:5:\"check\";a:1:{i:2;s:1:\"2\";}}i:3;a:1:{s:5:\"radio\";a:1:{i:3;s:1:\"0\";}}i:4;a:1:{s:6:\"input4\";s:8:\"Тест\";}}', 10, NULL, '\n                    \n                <div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[1]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type1\"><select name=\"select[1]\" required=\"\"><option value=\"Варіант1\">Варіант1</option><option value=\"Варіант2\">Варіант2</option><option value=\"Варіант3\">Варіант3</option></select></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[2]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type2\"><input type=\"checkbox\" id=\"check1-1\" value=\"0\" name=\"check[2]\" required=\"\"><label for=\"check1-1\">Вчора</label><input type=\"checkbox\" id=\"check1-2\" value=\"1\" name=\"check[2]\" required=\"\"><label for=\"check1-2\">Сьогодні</label><input type=\"checkbox\" id=\"check1-3\" value=\"2\" name=\"check[2]\" required=\"\"><label for=\"check1-3\">Завтра</label></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[3]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type3\"><input type=\"radio\" id=\"radio1-1\" value=\"0\" name=\"radio[3]\" required=\"\"><label for=\"radio1-1\">2019</label><input type=\"radio\" id=\"radio1-2\" value=\"1\" name=\"radio[3]\" required=\"\"><label for=\"radio1-2\">2018</label><input type=\"radio\" id=\"radio1-3\" value=\"2\" name=\"radio[3]\" required=\"\"><label for=\"radio1-3\">2017</label></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[4]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type4\"><input class=\"text\" type=\"text\" id=\"text11\" placeholder=\"Відповідь\" name=\"input4\" \"=\"\" required=\"\"></div></div>'),
(3, 1, 'Перший тест', 'a:5:{i:0;a:1:{s:8:\"question\";a:4:{i:1;s:14:\"Тільки 1\";i:2;s:8:\"20 і 30\";i:3;s:32:\"Виберіть Варіант3\";i:4;s:19:\"Напишіть Я\";}}i:1;a:1:{s:5:\"radio\";a:1:{i:1;s:1:\"0\";}}i:2;a:1:{s:5:\"check\";a:1:{i:2;s:1:\"2\";}}i:3;a:1:{s:6:\"select\";a:1:{i:3;s:15:\"Варіант3\";}}i:4;a:1:{s:6:\"input4\";s:2:\"Я\";}}', 10, NULL, '\r\n                    \r\n                <div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[1]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type1\"><input type=\"radio\" id=\"radio1-1\" value=\"0\" name=\"radio[1]\" required=\"\"><label for=\"radio1-1\">1</label><input type=\"radio\" id=\"radio1-2\" value=\"1\" name=\"radio[1]\" required=\"\"><label for=\"radio1-2\">2</label><input type=\"radio\" id=\"radio1-3\" value=\"2\" name=\"radio[1]\" required=\"\"><label for=\"radio1-3\">3</label></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[2]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type2\"><input type=\"checkbox\" id=\"check1-1\" value=\"0\" name=\"check[2]\"><label for=\"check1-1\">10</label><input type=\"checkbox\" id=\"check1-2\" value=\"1\" name=\"check[2]\"><label for=\"check1-2\">20</label><input type=\"checkbox\" id=\"check1-3\" value=\"2\" name=\"check[2]\"><label for=\"check1-3\">30</label></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[3]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type3\"><select name=\"select[3]\" required=\"\"><option value=\"Варіант1\">Варіант1</option><option value=\"Варіант2\">Варіант2</option><option value=\"Варіант3\">Варіант3</option></select></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[4]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type4\"><input class=\"text\" type=\"text\" id=\"text11\" placeholder=\"Відповідь\" name=\"input4\" \"=\"\" required=\"\"></div></div>'),
(4, 1, 'Крутий тест', 'a:3:{i:0;a:1:{s:8:\"question\";a:2:{i:1;s:6:\"Лол\";i:2;s:7:\"Так?\";}}i:1;a:1:{s:5:\"check\";a:1:{i:1;s:1:\"2\";}}i:2;a:1:{s:5:\"input\";a:1:{i:2;s:4:\"Да\";}}}', 10, 'a:1:{i:1;i:5;}', '\r\n                    \r\n                <div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[1]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type1\"><input type=\"checkbox\" id=\"check1-1\" value=\"0\" name=\"check[1]\"><label for=\"check1-1\">1</label><input type=\"checkbox\" id=\"check1-2\" value=\"1\" name=\"check[1]\"><label for=\"check1-2\">2</label><input type=\"checkbox\" id=\"check1-3\" value=\"2\" name=\"check[1]\"><label for=\"check1-3\">3</label></div></div><div class=\"test-block\"><input class=\"text\" type=\"text\" name=\"question[2]\" placeholder=\"Текст запитання\" required=\"\"><div id=\"test-type2\"><input class=\"text\" type=\"text\" id=\"text11\" placeholder=\"Відповідь\" name=\"input[2]\" \"=\"\" required=\"\"></div></div>');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `tasks`
--
ALTER TABLE `tasks`
  ADD UNIQUE KEY `id` (`id`);

--
-- Індекси таблиці `tests`
--
ALTER TABLE `tests`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
