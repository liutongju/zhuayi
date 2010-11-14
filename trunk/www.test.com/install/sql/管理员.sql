DROP TABLE IF EXISTS `{%z%}admin`;
CREATE TABLE IF NOT EXISTS `{%z%}admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL COMMENT '用户账号',
  `pass` varchar(32) NOT NULL COMMENT '用户密码',
  `login_time` int(11) NOT NULL COMMENT '登录时间',
  `login_ip` varchar(15) NOT NULL COMMENT '登录IP',
  `dtime` int(11) NOT NULL COMMENT '所属角色',
  `gid` int(11) NOT NULL COMMENT '所属角色',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='管理员表' AUTO_INCREMENT=2 