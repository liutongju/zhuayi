DROP TABLE IF EXISTS `{%z%}admin_group`;
CREATE TABLE IF NOT EXISTS `{%z%}admin_group` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL,
  `purview` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='管理员角色' AUTO_INCREMENT=6 ;
INSERT INTO `{%z%}admin_group` (`id`, `groupname`, `purview`) VALUES
(2, '超级管理员', '1,10,25,27,26,31,32,33,43,44,45,46,34,35,42,37,36,38,39,40,41,28,29,3,21,47,49,30');