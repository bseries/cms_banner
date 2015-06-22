CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
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