DROP TABLE IF EXISTS `{%z%}seo`;
CREATE TABLE IF NOT EXISTS `{%z%}seo` (
  `id` int(11) NOT NULL auto_increment,
  `aid` int(11) NOT NULL,
  `seo_title` varchar(50) NOT NULL,
  `seo_keywords` varchar(100) NOT NULL,
  `seo_description` varchar(250) NOT NULL,
  `tables` varchar(50) NOT NULL,
  `request_url` varchar(250) NOT NULL,
  `parameter` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `tables` (`tables`),
  KEY `parameter` (`parameter`),
  KEY `aid` (`aid`),
  KEY `request_url` (`request_url`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 