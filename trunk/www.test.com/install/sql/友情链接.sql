DROP TABLE IF EXISTS `{%z%}link`;
CREATE TABLE IF NOT EXISTS `{%z%}link` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `dtime` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='友情链接' AUTO_INCREMENT=5 ;

INSERT INTO `{%z%}link` (`id`, `title`, `url`, `dtime`) VALUES
(4, 'Zcms内容管理系统', 'http://www.zcms.cc', 1289647031);