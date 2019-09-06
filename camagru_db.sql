-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 06 2019 г., 23:56
-- Версия сервера: 5.7.21
-- Версия PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `camagru_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageName` varchar(256) COLLATE utf8_bin NOT NULL,
  `imagePath` varchar(256) COLLATE utf8_bin NOT NULL,
  `caption` varchar(256) COLLATE utf8_bin NOT NULL,
  `userID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `imageName`, `imagePath`, `caption`, `userID`, `date`) VALUES
(6, 'a9e14745b2c359cacb53164ad4d72857ae8512f9daf4b80eec5a65ba0d293a6dff69711542eae546e143bc0e2c8113de34c8001eb228a20433c8dd1774d53319.png', '/files/userFiles/26/userPhotos/', 'kyky', 26, '2019-08-27 18:30:26'),
(7, '42910ec617d5c559ec81272e725153677ae73543e101dbf92c16a5acb1def3020bc69424d095cf7dfff078a1279432586b95e1d3f8c6c1d62c86e90207d26043.png', '/files/userFiles/26/userPhotos/', 'ТуПо НиКоЛаС', 26, '2019-08-27 21:07:38'),
(8, 'a88ff178bf246eb84de7b54e6aa2bf399f9bb8ec6ebaa7bca3a9f2210ab152f053d835d9c6782f952b62826928c7ea5f34c309aea88b34ac455202608ddca194.png', '/files/userFiles/26/userPhotos/', 'Привет!', 26, '2019-08-28 12:27:20'),
(9, 'fee23b69d00e32902edf89c3e1a5fbacce45ff402601f1773c394d0af67ee65535679cffd70350d790e316fad0a5c795af5bca9c2baaa7d552e161ab924a3806.png', '/files/userFiles/26/userPhotos/', 'asdasd', 26, '2019-09-06 08:24:14'),
(10, 'd6dde3803ac051c960fe01c3840fac5aea1e5083f5a7e78326d6c83b8230735ba29e0f14dd405e2fb1225b347a83fce6b4dff8daebf8c21d6adf46fd2949c811.png', '/files/userFiles/26/userPhotos/', 'daszxc', 26, '2019-09-06 08:26:22'),
(11, 'b0191482c0445bdce64b0ed104df1d5837dd2d68cedbcb5323af6aeebfbbbbba5706f49d2e6945e96a9cf86eb89a31aeb493244776a91c72495b54bd8bea75f1.png', '/files/userFiles/26/userPhotos/', 'asdsadzxc', 26, '2019-09-06 08:27:18'),
(12, 'd7c6fc1bc226a40d7936dcc6a9c7bc3f2875afa3cfde29c02326878eec10edcf6ac3d159b371a59a19ef542192f4cf824b79a3c1f95f4c9bc160468dfb3f7905.png', '/files/userFiles/26/userPhotos/', '', 26, '2019-09-06 08:29:47'),
(13, '09b17dfc1ef440a31fad729dfe0371b760bcac072064806dd3a7dc66a0c6bdec13bb02a7924162fd64434389a25b4c7fe115217ab1322a87bc1e5f742e318045.png', '/files/userFiles/26/userPhotos/', 'csa cascas', 26, '2019-09-06 08:36:21');

-- --------------------------------------------------------

--
-- Структура таблицы `post_comment`
--

DROP TABLE IF EXISTS `post_comment`;
CREATE TABLE IF NOT EXISTS `post_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `postID` (`postID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `post_comment`
--

INSERT INTO `post_comment` (`id`, `text`, `userID`, `postID`, `date`) VALUES
(1, 'Hello world!', 26, 3, '2019-08-27 08:43:49'),
(2, 'One More', 26, 3, '2019-08-27 09:22:10'),
(3, 'asdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasvasdasasdasdpasdask;dnasv', 26, 3, '2019-08-27 09:25:07'),
(4, 'zxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczxzxczx', 26, 3, '2019-08-27 09:48:43'),
(5, 'фівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфффівіфвфф', 26, 3, '2019-08-27 09:52:13'),
(6, '11', 26, 3, '2019-08-27 12:38:00'),
(7, 'zxca', 26, 3, '2019-08-27 12:39:01'),
(8, 'qwe', 26, 3, '2019-08-27 12:40:45'),
(9, 'zxc', 26, 3, '2019-08-27 13:04:03'),
(10, 'zxcqwe', 26, 3, '2019-08-27 13:05:29'),
(11, '123321', 26, 3, '2019-08-27 13:05:56'),
(12, 'zxc1123', 26, 3, '2019-08-27 13:06:56'),
(13, 'zxc123zxc123', 26, 3, '2019-08-27 13:07:11'),
(14, 'ячс', 26, 4, '2019-08-27 18:10:50'),
(15, '&lt;script&gt;console.log(\'asd\');&lt;/script&gt;', 26, 3, '2019-08-27 21:46:21'),
(16, '&lt;script type=&quot;text/javascript&quot;&gt;\nconsole.log(\'hello\');\n&lt;/script&gt;', 26, 3, '2019-08-27 21:48:34'),
(17, '&lt;script&gt;&lt;/script&gt;', 26, 3, '2019-08-27 21:49:26'),
(18, 'ячсфів', 26, 8, '2019-08-28 12:27:33'),
(19, 'zxc', 26, 3, '2019-09-06 08:20:55'),
(20, 'asdasd', 26, 13, '2019-09-06 23:05:16');

-- --------------------------------------------------------

--
-- Структура таблицы `post_like`
--

DROP TABLE IF EXISTS `post_like`;
CREATE TABLE IF NOT EXISTS `post_like` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  KEY `postID` (`postID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `post_like`
--

INSERT INTO `post_like` (`userID`, `postID`) VALUES
(26, 3),
(26, 4),
(26, 8),
(26, 5),
(26, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(21) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `access_level` tinyint(4) NOT NULL DEFAULT '0',
  `confirm_hash` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `alerts` tinyint(1) NOT NULL DEFAULT '1',
  `notifications` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `access_level`, `confirm_hash`, `creation_date`, `last_login`, `alerts`, `notifications`) VALUES
(26, 'szverhov', 'szverhov@gmail.com', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 1, '86983f596f5bbb668024080324cb42cf', '2019-07-14 21:25:01', NULL, 1, 1),
(27, 'asdasd', 'szverhov@gmail.cm', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '39db6d9bf6ad26778c3300e84bb03381', '2019-09-06 10:57:51', NULL, 1, 1),
(28, 'asd123', 'asd@asd.asd', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '629992dc6f361c32ae018a0280b72aa3', '2019-09-06 11:03:49', NULL, 1, 1),
(29, '321qwe', 'asd@asdz.zxc', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '6056851a038058d45e6671de05496ba6', '2019-09-06 11:07:29', NULL, 1, 1),
(30, '321qwes', 'asd@asdz.zxcs', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '3f9c740c22a3a2ee2e5e310ebfbeaf0b', '2019-09-06 11:07:50', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_friends`
--

DROP TABLE IF EXISTS `user_friends`;
CREATE TABLE IF NOT EXISTS `user_friends` (
  `userID1` int(11) NOT NULL,
  `userID2` int(11) NOT NULL,
  KEY `userID1` (`userID1`),
  KEY `userID2` (`userID2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `userID` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `lastName` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `sex` enum('male','female') COLLATE utf8_bin DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `pictureUrl` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'http://catoca.com/ru/wp-content/themes/images/no-image-found-360x260.png',
  `phone` varchar(13) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
