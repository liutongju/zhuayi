DROP TABLE IF EXISTS `{%z%}admin_group`;
CREATE TABLE IF NOT EXISTS `{%z%}admin_group` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL,
  `purview` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=6 ;
INSERT INTO `z_admin_group` (`id`, `groupname`, `purview`) VALUES
(2, '超级管理员', '1,10,25,27,26,85,51,31,32,33,80,81,82,83,84,89,90,91,92,93,94,28,29,3,21,47,50,79,86,30,88,87');