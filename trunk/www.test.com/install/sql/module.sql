DROP TABLE IF EXISTS `{%z%}module`;
CREATE TABLE IF NOT EXISTS `{%z%}module` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL ,
  `type` int(11) NOT NULL,
  `mark` varchar(50) NOT NULL ,
  `author` varchar(20) NOT NULL ,
  `version` varchar(10) NOT NULL ,
  `install` int(11) NOT NULL,
  `dtime` int(11) NOT NULL,
  `tables` varchar(50) NOT NULL ,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=2
