DROP TABLE IF EXISTS `{%z%}admin`;
CREATE TABLE IF NOT EXISTS `{%z%}admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL COMMENT '�û��˺�',
  `pass` varchar(32) NOT NULL COMMENT '�û�����',
  `login_time` int(11) NOT NULL COMMENT '��¼ʱ��',
  `login_ip` varchar(15) NOT NULL COMMENT '��¼IP',
  `dtime` int(11) NOT NULL COMMENT '������ɫ',
  `gid` int(11) NOT NULL COMMENT '������ɫ',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='����Ա��' AUTO_INCREMENT=2 