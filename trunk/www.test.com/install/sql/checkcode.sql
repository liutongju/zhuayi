DROP TABLE IF EXISTS `{%z%}checkcode`;
CREATE TABLE IF NOT EXISTS `{%z%}checkcode` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `rule` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;