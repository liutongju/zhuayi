DROP TABLE IF EXISTS `{%z%}log`;
CREATE TABLE IF NOT EXISTS `{%z%}log` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL ,
  `log` text NOT NULL ,
  `ip` varchar(15) NOT NULL,
  `dtime` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=15440
