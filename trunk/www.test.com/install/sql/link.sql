DROP TABLE IF EXISTS `{%z%}link`;
CREATE TABLE IF NOT EXISTS `{%z%}link` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=5
