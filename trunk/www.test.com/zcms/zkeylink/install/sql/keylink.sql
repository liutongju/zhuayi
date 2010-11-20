DROP TABLE IF EXISTS `{%z%}keylink`;
CREATE TABLE IF NOT EXISTS `{%z%}keylink` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `dtime` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk   AUTO_INCREMENT=0 ;