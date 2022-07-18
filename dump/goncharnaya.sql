-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 18 2022 г., 15:47
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `goncharnaya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(80) NOT NULL,
  `price_per_person` decimal(10,0) NOT NULL,
  `photo_style` set('Справа','Слева') NOT NULL COMMENT 'Стиль фото на карточке - справа или слева',
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `price_per_person`, `photo_style`, `photo`) VALUES
(3, 'ДНИ РОЖДЕНИЯ', 'Для творческих именинников и их не менее творческих друзей', '500', 'Слева', '306aafeabc9a763499cb1703aa552a8e.png'),
(4, 'КОРПОРАТИВЫ', 'Для дружного коллектива желающего интересно провести время', '500', 'Справа', '181b3a8cb952776f9b64de56ea289daf.png'),
(5, 'СВИДАНИЯ', 'Отличная возможность произвести впечатление на вторую половинку', '500', 'Слева', 'b8fb47b0337b2193835a6f58509f6e40.png'),
(6, 'выпускной', 'Для тех кто хочет отметить свой выпускной интересно и с хорошим настроением.', '1000', 'Справа', '5ac3b8ce42983206e5e7a5ff250d63fa.png');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_form`
--

CREATE TABLE `feedback_form` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_solved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `feedback_form`
--

INSERT INTO `feedback_form` (`id`, `name`, `phone_number`, `question`, `created_at`, `is_solved`) VALUES
(4, 'Админ Админ Админ', '+5 (676) 784 6783', 'Организация мероприятий', '2022-07-17 16:29:03', 0),
(8, 'Игорь', '+5 (676) 784 6783', 'Другое', '2022-07-17 16:42:31', 1),
(18, 'Игорь Максимович Соколов', '+5 (676) 784 6783', 'Организация мероприятий', '2022-07-18 11:43:54', 0),
(19, 'Игорь Максимович Соколов', '+5 (676) 784 6783', 'Организация мероприятий', '2022-07-18 11:44:06', 0),
(20, 'Алексей Алексеевич Алексеев', '+7 (123) 123 1231', 'Мастер классы', '2022-07-18 11:44:11', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `master_class`
--

CREATE TABLE `master_class` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `children_price` decimal(10,0) DEFAULT NULL,
  `adults_price` decimal(10,0) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `master_class`
--

INSERT INTO `master_class` (`id`, `name`, `description`, `children_price`, `adults_price`, `photo`) VALUES
(41, 'МАСТЕР КЛАСС \"БАЗОВЫЙ\"', 'Для тех, кто хочет необычно провести время и попробовать себя в роли гончара.', '500', '1000', 'a014cb9f2b49ccb44af93c5c456bc42b.png'),
(42, 'МАСТЕР КЛАСС \"ЛЕПКА\"', 'Гончарный круг и лепка  3 часа творчества  2 обжига  Покрытие глазурью', '1500', '2000', '0ac6c73e1d806528ed7fbe90ff78e5be.png'),
(43, 'МАСТЕР КЛАСС \"ПРОФЕССИОНАЛ\"', 'Для тех, кто решил погрузиться в гончарное дело.', '2000', '3000', 'dc166ff98217119beb3150bc067fada8.png'),
(44, 'МАСТЕР КЛАСС \"СУПЕР-УЛЬТРА-КЛАСС\"', 'Для тех, кто хочет суперски провести свой досуг.', '5000', '6000', '7d37a5b811b0e0c8cd79b720d70685ca.png');

-- --------------------------------------------------------

--
-- Структура таблицы `master_class_includes`
--

CREATE TABLE `master_class_includes` (
  `id` int NOT NULL,
  `id_master_class` int NOT NULL,
  `id_include` varchar(255) NOT NULL,
  `include_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `master_class_includes`
--

INSERT INTO `master_class_includes` (`id`, `id_master_class`, `id_include`, `include_description`) VALUES
(34, 41, '41', 'Гончарный круг и лепка'),
(35, 41, '41', '2 часа творчества'),
(36, 41, '41', '1 обжиг'),
(37, 42, '42', 'Гончарный круг и лепка'),
(38, 42, '42', '3 часа творчества'),
(39, 42, '42', '2 обжига'),
(40, 42, '42', 'Покрытие глазурью'),
(41, 43, '43', 'Гончарный круг и лепка'),
(42, 43, '43', '4 часа творчества'),
(43, 43, '43', '4 обжига'),
(44, 43, '43', 'Покрытие глазурью'),
(55, 44, '44', 'Гончарный круг и лепка'),
(56, 44, '44', '8 часов творчества'),
(57, 44, '44', '8 обжигов'),
(58, 44, '44', 'Покрытие глазурью и лаком');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `authKey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `accessToken` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `admin`, `authKey`, `accessToken`) VALUES
(4, 'admin@yandex.ru', '$2y$13$VzKrVotxkV2oWBrNGXr5B.zQfTHi7CgD1gFxTki4wte4ygvRQ2GaO', 1, '-xDOJovlwxfMZ-Aa0Y_12t1lgJKwqzmKVTRoVpn_SEEIkpAHS1rEk_y3Z9hsm0koWb-lwun0HRjARvK8a3ZFENTOzWB6s59QHT7Q5uqGydn8PMavm78vc3HfnRUsfa1FqqJsPGvQRHhgBDOM4F6eRO7RcSIHCNJTtdHrJHZlkaRuy6P8AKftAvIfuo1tTueFb90Hg1uw', 'S9ov7Kcd1q_7w1mG_vu-LJGFohsS6-C2W_ONXU55lrtTwIDxkNIlQWp32UHspzCfjsj84Z27y9RN3wrZNOhSL4FGNPMUorTDQF7_PeqmIFGpxGsvW4JA-9UV6Dz9MlSMkI6MVhAYeWxzEtWMb4zgv1XwK41l93TMfVqO_Y7XFmlvA3tbqNnXdP2HLb6PICw0K1srAYwR');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_form`
--
ALTER TABLE `feedback_form`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `master_class`
--
ALTER TABLE `master_class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `master_class_includes`
--
ALTER TABLE `master_class_includes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master_class` (`id_master_class`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `feedback_form`
--
ALTER TABLE `feedback_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `master_class`
--
ALTER TABLE `master_class`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `master_class_includes`
--
ALTER TABLE `master_class_includes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `master_class_includes`
--
ALTER TABLE `master_class_includes`
  ADD CONSTRAINT `master_class_includes_ibfk_1` FOREIGN KEY (`id_master_class`) REFERENCES `master_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
