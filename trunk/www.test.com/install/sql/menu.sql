DROP TABLE IF EXISTS `{%z%}menu`;
CREATE TABLE IF NOT EXISTS `{%z%}menu` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `orders` smallint(6) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=95 ;
INSERT INTO `z_menu` (`id`, `parent_id`, `title`, `url`, `orders`, `mid`) VALUES
(1, 0, '设置', 'javascript:', 1, 0),
(10, 1, '系统设置', 'javascript:', 2, 0),
(3, 29, '管理菜单', '/index.php?m=menu&c=index&a=init', 0, 0),
(25, 10, 'ZCMS配置', '/index.php?m=setup&c=zcms&a=init', 5, 0),
(21, 29, '操作日志', '/index.php?m=log&c=index&a=init', 4, 0),
(26, 10, '邮箱配置', '/index.php?m=setup&c=email&a=init', 7, 0),
(27, 10, '网站配置', '/index.php?m=setup&c=web&a=init', 6, 0),
(28, 0, '插件', 'javascript:', 999, 0),
(29, 28, '插件', 'javascript:', 1, 0),
(30, 29, '验证码设置', '/index.php?m=checkcode&c=index&a=init', 10, 0),
(31, 1, '管理员设置', 'javascript:', 3, 0),
(32, 31, '管理角色', '/index.php?m=admin&c=group&a=init', 1, 0),
(33, 31, '管理帐号', '/index.php?m=admin&c=list&a=init', 5, 0),
(47, 29, '联动菜单', '/index.php?m=linkage&c=index&a=init', 5, 0),
(50, 29, '自定义URL', '/index.php?m=diyurl&c=index&a=init', 7, 0),
(51, 10, '模块管理', '/index.php?m=module&c=index&a=init', 8, 0),
(79, 29, '友情连接', '/index.php?m=link&c=index&a=init', 8, 1),
(85, 10, '附件配置', '/index.php?m=setup&c=annex&a=init', 7, 0),
(86, 29, '广告中心', '/index.php?m=ads&c=index&a=init', 9, 0),
(87, 29, 'Baibu/Google地图', '/index.php?m=sitemaps&c=index&a=init', 999, 0),
(88, 29, '网站内链接', '/index.php?m=zkeylink&c=index&a=init', 11, 0)