DROP TABLE IF EXISTS `{%z%}log`;
CREATE TABLE IF NOT EXISTS `{%z%}log` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL COMMENT '����ԱID',
  `log` text NOT NULL COMMENT '��־��Ϣ',
  `ip` varchar(15) NOT NULL COMMENT '����IP',
  `dtime` int(11) NOT NULL COMMENT '����ʱ��',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='��̨��־' AUTO_INCREMENT=1 
