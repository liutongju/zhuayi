DROP TABLE IF EXISTS `{%z%}ads`;
CREATE TABLE IF NOT EXISTS `{%z%}ads` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `ismake` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `dtime` int(11) NOT NULL,
  `count` text NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `ismake` (`ismake`),
  KEY `click` (`click`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=0