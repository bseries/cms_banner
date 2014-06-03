# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 10.0.10-MariaDB-log)
# Datenbank: rainmap
# Erstellungsdauer: 2014-06-03 15:28:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cover_media_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(250) DEFAULT '',
  `body` text,
  `url` varchar(250) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cover_media_id` (`cover_media_id`),
  KEY `order` (`order`),
  KEY `category` (`category`),
  KEY `is_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
