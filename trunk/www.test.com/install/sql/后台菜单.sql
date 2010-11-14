DROP TABLE IF EXISTS `{%z%}menu`;
CREATE TABLE IF NOT EXISTS `{%z%}menu` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `orders` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='后台菜单' AUTO_INCREMENT=50 ;

INSERT INTO `{%z%}menu` (`id`, `parent_id`, `title`, `url`, `orders`) VALUES
(1, 0, '设置', 'javascript:', 0),
(10, 1, '系统设置', 'javascript:', 2),
(3, 29, '管理菜单', '/index.php?m=menu&c=index&a=init', 3),
(25, 10, 'ZCMS配置', '/index.php?m=setup&c=zcms&a=init', 5),
(21, 29, '操作日志', '/index.php?m=log&c=index&a=init', 4),
(26, 10, '邮箱配置', '/index.php?m=setup&c=email&a=init', 7),
(27, 10, '网站配置', '/index.php?m=setup&c=web&a=init', 6),
(28, 0, '扩展', 'javascript:', 999),
(29, 28, '扩展', 'javascript:', 1),
(30, 29, '验证码设置', '/index.php?m=checkcode&c=index', 7),
(31, 1, '管理员设置', 'javascript:', 3),
(32, 31, '管理角色', '/index.php?m=admin&c=group&a=init', 1),
(33, 31, '管理帐号', '/index.php?m=admin&c=list&a=init', 5),
(47, 29, '联动菜单', '/index.php?m=linkage&c=index&a=init', 5),
(49, 29, '友情链接', '/index.php?m=link&c=index&a=init', 6)