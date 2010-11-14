DROP TABLE IF EXISTS `{%z%}log`;
CREATE TABLE IF NOT EXISTS `{%z%}log` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL COMMENT '管理员ID',
  `log` text NOT NULL COMMENT '日志信息',
  `ip` varchar(15) NOT NULL COMMENT '操作IP',
  `dtime` int(11) NOT NULL COMMENT '操作时间',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='后台日志' AUTO_INCREMENT=1 
