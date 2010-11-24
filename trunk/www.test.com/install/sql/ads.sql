DROP TABLE IF EXISTS `{%z%}ads`;
CREATE TABLE IF NOT EXISTS `{%z%}ads` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `ismake` int(11) NOT NULL,
  `click` int(11) NOT NULL ,
  `dtime` int(11) NOT NULL ,
  `count` text NOT NULL,
  `link` varchar(200) NOT NULL ,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `ismake` (`ismake`),
  KEY `click` (`click`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=14 ;
INSERT INTO `z_ads` (`id`, `title`, `type`, `ismake`, `click`, `dtime`, `count`, `link`) VALUES
(13, '文字链广告测试', 1, 0, 0, 1290232224, 'ZCMS激情发布', 'http://www.zcms.cc');