-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.2.7-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных base_provider
CREATE DATABASE IF NOT EXISTS `base_provider` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `base_provider`;

-- Дамп структуры для таблица base_provider.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `login_statistic` varchar(10) DEFAULT NULL,
  `password_statistic` varchar(255) DEFAULT NULL,
  `login_internet` varchar(10) DEFAULT NULL,
  `password_internet` varchar(255) DEFAULT NULL,
  `is_block` char(1) NOT NULL DEFAULT 'F',
  `enable_internet` char(1) NOT NULL DEFAULT 'T',
  `subnet` varchar(10) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT '192.168.0.1',
  `mac_address` varchar(50) DEFAULT '00:00:00:00:00',
  `tariff_id` int(11) DEFAULT NULL,
  `login_refer` varchar(10) DEFAULT '',
  `is_cable` varchar(1) DEFAULT 'F',
  `is_speedConnect` varchar(1) DEFAULT 'F',
  `is_contractHome` varchar(1) DEFAULT 'F',
  `balance` float DEFAULT 350,
  `date_payments` date DEFAULT NULL,
  `lic_schet` varchar(10) DEFAULT '',
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `clients_ibfk_2` (`tariff_id`),
  CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.clients: ~3 rows (приблизительно)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `person_id`, `login_statistic`, `password_statistic`, `login_internet`, `password_internet`, `is_block`, `enable_internet`, `subnet`, `ip_address`, `mac_address`, `tariff_id`, `login_refer`, `is_cable`, `is_speedConnect`, `is_contractHome`, `balance`, `date_payments`, `lic_schet`, `date_crt`) VALUES
	(0, 0, NULL, NULL, NULL, NULL, 'F', 'T', NULL, NULL, NULL, NULL, NULL, 'F', 'F', 'F', NULL, NULL, NULL, '2019-12-08 19:23:28'),
	(1, 1, '2000', '08f90c1a417155361a5c4b8d297e0d78', '2000', '08f90c1a417155361a5c4b8d297e0d78', 'F', 'T', 'lan35', '192.168.0.1', '00:00:00:00:00', 2, 'ddd', 'T', 'T', 'F', 52, '2019-12-08', '2000', '2019-12-08 03:20:00'),
	(10, 12, '1012', 'f33ba15effa5c10e873bf3842afb46a6', '1012', 'f33ba15effa5c10e873bf3842afb46a6', 'F', 'T', 'lan35', '192.168.0.1', '00:00:00:00:00', 1, NULL, 'T', 'F', 'F', 350, '2019-12-09', '1012', '2019-12-09 11:26:14');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(1500) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.comments: ~2 rows (приблизительно)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `client_id`, `user_id`, `comment`, `date_crt`) VALUES
	(1, 1, 1, 'asdasdasd', '2019-12-08 20:29:42'),
	(23, 10, 1, 'номер чел', '2019-12-09 11:38:47');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.departaments
CREATE TABLE IF NOT EXISTS `departaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `date_crt` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.departaments: ~7 rows (приблизительно)
DELETE FROM `departaments`;
/*!40000 ALTER TABLE `departaments` DISABLE KEYS */;
INSERT INTO `departaments` (`id`, `name`, `date_crt`) VALUES
	(1, 'Руководство', '2019-12-03 00:00:00'),
	(2, 'Техподдержка', '2019-12-03 00:00:00'),
	(3, 'Монтажный отдел', '2019-12-03 00:00:00'),
	(4, 'Админы', '2019-12-03 00:00:00'),
	(5, 'Настройщики', '2019-12-03 00:00:00'),
	(6, 'Бухгалтерия', '2019-12-03 00:00:00'),
	(7, 'Абонентский отдел', '2019-12-03 00:00:00');
/*!40000 ALTER TABLE `departaments` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `tariff_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `date_activtion` datetime DEFAULT current_timestamp(),
  `date_deactivation` datetime DEFAULT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `service_id` (`service_id`),
  KEY `tariff_id` (`tariff_id`),
  KEY `stock_id` (`stock_id`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `history_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  CONSTRAINT `history_ibfk_3` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`),
  CONSTRAINT `history_ibfk_4` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.history: ~3 rows (приблизительно)
DELETE FROM `history`;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`id`, `client_id`, `tariff_id`, `service_id`, `stock_id`, `date_activtion`, `date_deactivation`, `date_crt`) VALUES
	(2, 1, NULL, 1, NULL, '2019-12-08 20:32:40', NULL, '2019-12-08 20:32:40'),
	(3, 1, 2, NULL, NULL, '2019-12-08 20:48:37', NULL, '2019-12-08 20:48:37'),
	(4, 10, 1, NULL, 1, '2019-12-09 11:26:15', NULL, '2019-12-09 11:26:15');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.information
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `info_text` varchar(1500) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.information: ~0 rows (приблизительно)
DELETE FROM `information`;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
/*!40000 ALTER TABLE `information` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.payment_statistics
CREATE TABLE IF NOT EXISTS `payment_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `bill` float NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_pay` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `payment_statistics_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.payment_statistics: ~1 rows (приблизительно)
DELETE FROM `payment_statistics`;
/*!40000 ALTER TABLE `payment_statistics` DISABLE KEYS */;
INSERT INTO `payment_statistics` (`id`, `client_id`, `bill`, `comment`, `date_pay`) VALUES
	(1, 1, 380, 'Оплата через терминал', '2019-12-08 20:13:45');
/*!40000 ALTER TABLE `payment_statistics` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.persons
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famil` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `otch` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `pasp_ser` varchar(10) DEFAULT NULL,
  `pasp_num` varchar(50) DEFAULT NULL,
  `pasp_date` date DEFAULT NULL,
  `pasp_issue` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT '',
  `street` varchar(50) DEFAULT '',
  `house` varchar(25) DEFAULT '',
  `porch` int(11) DEFAULT 0,
  `floor` int(11) DEFAULT 0,
  `flatroom` varchar(10) DEFAULT '',
  `countRooms` int(11) DEFAULT NULL,
  `phoneOne` varchar(50) DEFAULT NULL,
  `phoneTwo` varchar(50) DEFAULT NULL,
  `phoneThree` varchar(50) DEFAULT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.persons: ~3 rows (приблизительно)
DELETE FROM `persons`;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` (`id`, `famil`, `name`, `otch`, `birthday`, `gender`, `pasp_ser`, `pasp_num`, `pasp_date`, `pasp_issue`, `city`, `street`, `house`, `porch`, `floor`, `flatroom`, `countRooms`, `phoneOne`, `phoneTwo`, `phoneThree`, `date_crt`) VALUES
	(0, '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 0, '', NULL, NULL, NULL, NULL, '2019-12-08 19:23:07'),
	(1, 'test', 'test', 'test', '2019-12-08', 'М', 'ee', '123456', '2019-12-08', 'asdasdasdad', 'city', 'street', '16', 2, 4, '85', 2, '654654654', '654654', '48987', '2019-12-08 02:28:09'),
	(12, 'test', 'test', 'est', '2019-12-09', 'Ж', 'asd', 'asd', '2019-12-09', 'asdasd', 'asd', 'asd', '4', 2, 3, '1', 2, '', '', '', '2019-12-09 11:26:00');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `departament_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `comments` varchar(1500) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `departament_id` (`departament_id`),
  KEY `category_id` (`category_id`),
  KEY `FK_requests_clients` (`client_id`),
  CONSTRAINT `FK_requests_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`departament_id`) REFERENCES `departaments` (`id`),
  CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `request_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.requests: ~4 rows (приблизительно)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `client_id`, `user_id`, `departament_id`, `category_id`, `title`, `comments`, `status`, `date_crt`) VALUES
	(1, 1, 1, 3, 1, 'Подключение по адресу:   / /', 'd s a     ком. свой кабель; быстрое подключение; договор на дому;', 'Закрыта', '2019-12-08 03:44:30'),
	(3, 1, 1, 3, 1, 'Подключение по адресу:   / /', 'asd asd asd     ком. свой кабель; быстрое подключение; ', 'Закрыта', '2019-12-08 04:01:53'),
	(4, 1, 1, 2, 3, 'крестик', 'все пропало!!!', 'Открыта', '2019-12-08 19:20:38'),
	(5, 0, 1, 3, 1, 'Подключение по адресу: asd asd 4/2 3/1', 'Подключение по адресу: asd asd 4/2 3/1 test test est    2 ком. свой кабель;  ', 'Новая', '2019-12-09 11:26:14');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.request_category
CREATE TABLE IF NOT EXISTS `request_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.request_category: ~7 rows (приблизительно)
DELETE FROM `request_category`;
/*!40000 ALTER TABLE `request_category` DISABLE KEYS */;
INSERT INTO `request_category` (`id`, `name`) VALUES
	(1, 'Подключение'),
	(2, 'Восстановление'),
	(3, 'Крестик'),
	(4, 'Нет сети'),
	(5, 'Вызов настройщика'),
	(6, 'Вызов монтажника'),
	(7, 'Оплата');
/*!40000 ALTER TABLE `request_category` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.request_history
CREATE TABLE IF NOT EXISTS `request_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `comment` varchar(1500) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `request_id` (`request_id`),
  CONSTRAINT `request_history_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.request_history: ~0 rows (приблизительно)
DELETE FROM `request_history`;
/*!40000 ALTER TABLE `request_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_history` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.roles: ~2 rows (приблизительно)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `date_crt`) VALUES
	(1, 'admin', '2019-12-03 00:00:00'),
	(2, 'operator', '2019-12-03 09:34:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `cost` float NOT NULL,
  `is_active` varchar(1) NOT NULL DEFAULT 'T',
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.services: ~1 rows (приблизительно)
DELETE FROM `services`;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `name`, `cost`, `is_active`, `date_crt`) VALUES
	(1, 'Реальный IP', 90, 'T', '2019-12-08 02:59:59');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `sessions_id` varchar(1500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.sessions: ~0 rows (приблизительно)
DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.statistic
CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `downloaded` int(11) NOT NULL DEFAULT 0,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `statistic_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.statistic: ~2 rows (приблизительно)
DELETE FROM `statistic`;
/*!40000 ALTER TABLE `statistic` DISABLE KEYS */;
INSERT INTO `statistic` (`id`, `client_id`, `downloaded`, `last_update`, `date_crt`) VALUES
	(1, 1, 234141, '2019-12-08 19:47:57', '2019-12-08 19:47:59'),
	(2, 10, 0, '2019-12-09 11:26:15', '2019-12-09 11:26:15');
/*!40000 ALTER TABLE `statistic` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.stocks
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `cost` float NOT NULL,
  `is_active` varchar(1) NOT NULL DEFAULT 'T',
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='акции';

-- Дамп данных таблицы base_provider.stocks: ~2 rows (приблизительно)
DELETE FROM `stocks`;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` (`id`, `name`, `cost`, `is_active`, `date_crt`) VALUES
	(1, 'Новогодний форсаж(10)', 100, 'T', '2019-12-08 02:56:10'),
	(2, 'Новогодний форсаж(100)', 300, 'T', '2019-12-08 02:56:10');
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.tariff
CREATE TABLE IF NOT EXISTS `tariff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `is_active` char(1) NOT NULL DEFAULT 'T',
  `date_crt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.tariff: ~3 rows (приблизительно)
DELETE FROM `tariff`;
/*!40000 ALTER TABLE `tariff` DISABLE KEYS */;
INSERT INTO `tariff` (`id`, `name`, `cost`, `speed`, `is_active`, `date_crt`) VALUES
	(1, 'Форсаж(10)', 250, 10, 'T', '2019-12-08 02:48:21'),
	(2, 'Форсаж(50)', 300, 50, 'T', '2019-12-08 02:48:21'),
	(3, 'Форсаж(100)', 375, 100, 'T', '2019-12-08 02:48:50');
/*!40000 ALTER TABLE `tariff` ENABLE KEYS */;

-- Дамп структуры для таблица base_provider.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `departament_id` int(11) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `famil` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `otch` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `is_active` char(1) DEFAULT 'F',
  `date_crt` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `FK_users_departaments` (`departament_id`),
  CONSTRAINT `FK_users_departaments` FOREIGN KEY (`departament_id`) REFERENCES `departaments` (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы base_provider.users: ~2 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `departament_id`, `login`, `password`, `famil`, `name`, `otch`, `birthday`, `gender`, `is_active`, `date_crt`) VALUES
	(1, 1, 4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', '2019-12-03', 'М', 'T', '2019-12-03 00:00:00'),
	(2, 2, 1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'tes', 'test', '2019-12-08', 'М', 'T', '2019-12-08 14:30:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
