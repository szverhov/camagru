-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2019 г., 10:17
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(14, 'c2416173e5751fabfcdbb9a48b637a26e0dfe0e7e63f60ff8ab6f471d3f4a6c3ebc23eaec2e426cb1bf860f1dbdf0fc5e2585c447f6847b3c83fa1be9bd73cd0.png', '/files/userFiles/26/userPhotos/', '', 26, '2019-09-07 10:02:07'),
(16, 'f746d0d7b1139e3abd0c8377110b36a405f5a4ab192950a2c1ea38368d8012e24604ebffc00ecdc1b9b3d1df63612ad717ca6cb0c53aefb55f469dbaae416d81.png', '/files/userFiles/31/userPhotos/', '', 31, '2019-09-07 10:10:43'),
(17, '22cfa11ad78206afa1b8b0161da5685368afdd503f95b4f3ef01cc44880eac0eb6d0ab52616e3f0284f969558bf995d0e09b3b486872425a09a1251ce33f9051.png', '/files/userFiles/31/userPhotos/', 'sad', 31, '2019-09-07 10:12:10'),
(19, '35fae586ec5aafb0099246178ac1d30bcbd008d04d5b8eb5d95fbf147fa6302585be16200c6d50f91b360454370ab9b16b4016848890eae6b66237e77ce9f7c8.png', '/files/userFiles/26/userPhotos/', 'asdsad', 26, '2019-09-07 11:29:47'),
(20, 'd3d16c25e6dcc2520ebd114c8a8126903fec3f353e9a9851ee16c173d2ed597afd54785fa98aabb5b274034b25b925cd619fe360b7954ee21261b5ce7f2771ef.png', '/files/userFiles/26/userPhotos/', 'asdz', 26, '2019-09-08 21:51:12'),
(21, '56d338dc0b452049b565899411fddd01878cfcb40ff3d3f8d820bfe2df01a26b9d942ce1ca291283e36c3c3429314e5982dd30b8bde86e426123c759109fc1d8.png', '/files/userFiles/26/userPhotos/', 'ffsdf', 26, '2019-09-08 21:53:34'),
(22, '1b22c1cd8f863aaa7d424acd955a6cada60d053afb60a01ba6cace68813c0a02afab55a42d4a7fa56f6f260f8786eda833c10f94d230f24d2d9222471ee6c990.png', '/files/userFiles/26/userPhotos/', 'gdfg', 26, '2019-09-08 21:55:09'),
(23, 'e232d176f997323fc47b2f0746642626f24e59b62545deed8701b4834f1ab277f5a0951696f3d15d3c56fc301cabecdfd789eb932973bfb817310ea6003ef2d4.png', '/files/userFiles/26/userPhotos/', 'zxcqwe', 26, '2019-09-08 21:56:10'),
(24, '677706bb6009c430e3382c730a7ef31764ab693f6c8830671bb2078e959e57c1160bfd1d3826c405b9ee573aa9d46d97bbe929dcb50f4765d9c4315432879014.png', '/files/userFiles/26/userPhotos/', 'asdasdzxc', 26, '2019-09-08 21:59:50'),
(25, '97bce4c1b65248b5fbfa7a40163faef6f4c29e0a00d19bc1cd76e80ceadcf8c05af9a3959df6a7dc61caba1cd1138bc56e3662bbb15c59bab941dbecaf0c7533.png', '/files/userFiles/26/userPhotos/', 'asdsada', 26, '2019-09-08 22:08:41');

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(20, 'asdasd', 26, 13, '2019-09-06 23:05:16'),
(21, 'Здарова братишка', 26, 12, '2019-09-07 10:20:19'),
(22, 'zasd', 31, 18, '2019-09-07 10:21:21'),
(23, 'asd', 26, 18, '2019-09-07 10:21:26'),
(24, 'asd', 26, 18, '2019-09-07 10:21:32'),
(25, 'zxc', 26, 18, '2019-09-07 10:21:34'),
(26, 'asd', 31, 18, '2019-09-07 10:22:44'),
(27, 'zxc', 31, 18, '2019-09-07 10:22:53'),
(28, 'Я батя', 31, 17, '2019-09-07 10:23:27'),
(29, 'Я батя', 31, 14, '2019-09-07 10:23:37'),
(30, 'azxc', 31, 14, '2019-09-07 10:25:56'),
(31, 'коля батя', 31, 17, '2019-09-07 10:33:44'),
(32, 'asdzxc', 31, 17, '2019-09-07 10:37:09'),
(33, 'zxc', 26, 17, '2019-09-07 10:38:04'),
(34, 'zxc', 31, 17, '2019-09-07 10:38:10'),
(35, 'Комент славика', 31, 17, '2019-09-07 10:41:13'),
(36, 'Комент коляна', 31, 17, '2019-09-07 10:41:35'),
(37, 'Комент славика', 26, 17, '2019-09-07 10:41:45'),
(38, 'Комент славика', 26, 17, '2019-09-07 10:41:55'),
(39, 'Комент славика', 26, 17, '2019-09-07 10:43:19'),
(40, 'asdasd', 26, 17, '2019-09-07 10:49:02'),
(41, 'asdzx', 26, 17, '2019-09-07 10:49:12'),
(42, 'zxcz', 31, 17, '2019-09-07 10:49:17'),
(43, 'Привет колян!', 26, 17, '2019-09-07 10:55:28'),
(44, 'А сейчас?', 26, 17, '2019-09-07 10:57:21'),
(45, 'А сейчас в.2.0', 26, 17, '2019-09-07 10:57:56'),
(46, 'asdaszx', 26, 17, '2019-09-08 20:42:16'),
(47, 'xccz', 26, 22, '2019-09-08 21:55:19'),
(48, 'fdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsdfdfsfsdsdsfdsfsdfsdfsdfsd', 26, 23, '2019-09-08 21:56:29');

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
(26, 13),
(26, 11),
(31, 31),
(31, 14),
(26, 6),
(31, 17),
(26, 18),
(26, 14),
(26, 19),
(26, 17),
(26, 20);

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `access_level`, `confirm_hash`, `creation_date`, `last_login`, `alerts`, `notifications`) VALUES
(26, 'szverhov', 'szverhov@gmail.com', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 1, 'c971c5b4d3271fbf5e6deb9023c7c375', '2019-07-14 21:25:01', NULL, 1, 1),
(27, 'asdasd', 'szverhov@gmail.cm', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '39db6d9bf6ad26778c3300e84bb03381', '2019-09-06 10:57:51', NULL, 1, 1),
(28, 'asd123', 'asd@asd.asd', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '629992dc6f361c32ae018a0280b72aa3', '2019-09-06 11:03:49', NULL, 1, 1),
(29, '321qwe', 'asd@asdz.zxc', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '6056851a038058d45e6671de05496ba6', '2019-09-06 11:07:29', NULL, 1, 1),
(30, '321qwes', 'asd@asdz.zxcs', '063ee9e7a22068123b32f2604679975dcb4fe096a715b784f7c605119d71e122f418a8e98dde4cb79ca528adee40efa2e7cd555c0ca386d2dc53a19408e2a71b', 0, '3f9c740c22a3a2ee2e5e310ebfbeaf0b', '2019-09-06 11:07:50', NULL, 1, 1),
(31, 'Prostak', 'kondratiuk.nikolas@gmail.com', '48d7722b3c586e7eb2e64fcaf3eae8dc48d75d665bda550407dddf9b70a2fee63a02eeab72e4e6bb4f85ce9fe21fa7c02648f9f19813c57a42ab7de0b5f188f8', 1, NULL, '2019-09-07 12:49:31', NULL, 1, 1);

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
