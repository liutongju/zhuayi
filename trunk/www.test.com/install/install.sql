DROP TABLE IF EXISTS `{%z%}admin`;
CREATE TABLE IF NOT EXISTS `{%z%}admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(15) NOT NULL,
  `dtime` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS `{%z%}admin_group`;
CREATE TABLE IF NOT EXISTS `{%z%}admin_group` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL,
  `purview` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `{%z%}ads`;
CREATE TABLE IF NOT EXISTS `{%z%}ads` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL COMMENT '广告标题',
  `type` int(11) NOT NULL COMMENT '广告类型',
  `ismake` int(11) NOT NULL COMMENT '状态',
  `click` int(11) NOT NULL COMMENT '点击数',
  `dtime` int(11) NOT NULL COMMENT '添加时间',
  `count` text NOT NULL,
  `link` varchar(200) NOT NULL COMMENT '连接地址',
  `key` varchar(50) NOT NULL COMMENT '缺省值，可供标题查询',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `ismake` (`ismake`),
  KEY `click` (`click`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='广告表' AUTO_INCREMENT=15 ;

DROP TABLE IF EXISTS `{%z%}checkcode`;
CREATE TABLE IF NOT EXISTS `{%z%}checkcode` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `rule` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `{%z%}keylink`;
CREATE TABLE IF NOT EXISTS `{%z%}keylink` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `dtime` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=13 ;

DROP TABLE IF EXISTS `{%z%}link`;
CREATE TABLE IF NOT EXISTS `{%z%}link` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `default` varchar(50) NOT NULL COMMENT '匹配缺省值',
  `dtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `{%z%}linkage`;
CREATE TABLE IF NOT EXISTS `{%z%}linkage` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL COMMENT '??ID',
  `title` varchar(50) NOT NULL COMMENT '????',
  `orders` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='??????' AUTO_INCREMENT=3402 ;

DROP TABLE IF EXISTS `{%z%}log`;
CREATE TABLE IF NOT EXISTS `{%z%}log` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL COMMENT '?????ID',
  `log` text NOT NULL COMMENT '??????',
  `ip` varchar(15) NOT NULL COMMENT '????IP',
  `dtime` int(11) NOT NULL COMMENT '???????',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='??????' AUTO_INCREMENT=74 ;

DROP TABLE IF EXISTS `{%z%}menu`;
CREATE TABLE IF NOT EXISTS `{%z%}menu` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `orders` smallint(6) NOT NULL,
  `mid` int(11) NOT NULL COMMENT '模型ID',
  PRIMARY KEY  (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='??????' AUTO_INCREMENT=103 ;

DROP TABLE IF EXISTS `{%z%}module`;
CREATE TABLE IF NOT EXISTS `{%z%}module` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL COMMENT '模块名称',
  `type` int(11) NOT NULL COMMENT '类型-0模块1插件',
  `mark` varchar(50) NOT NULL COMMENT '标识符',
  `author` varchar(20) NOT NULL COMMENT '作者',
  `version` varchar(10) NOT NULL COMMENT '版本',
  `install` int(11) NOT NULL COMMENT '是否安装',
  `dtime` int(11) NOT NULL,
  `tables` varchar(50) NOT NULL COMMENT '模型所需表',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='模型表' AUTO_INCREMENT=2 ;

INSERT INTO `{%z%}module` (`id`, `title`, `type`, `mark`, `author`, `version`, `install`, `dtime`, `tables`) VALUES
(2, '广告中心', 1, 'ads', 'zhuayi', 'v1.0', 0, 0, 'ads'),
(3, '验证码设置', 1, 'checkcode', 'zhuayi', 'v1.0', 0, 0, 'checkcode'),
(4, '友情链接', 1, 'link', 'zhuayi', 'v1.0', 0, 0, 'link'),
(5, '联动菜单', 1, 'linkage', 'zhuayi', 'v1.0', 0, 0, 'linkage'),
(6, 'Baibu/Google地图', 1, 'sitemaps', 'zhuayi', 'v1.0', 0, 0, ''),
(7, '网站内链接', 1, 'zkeylink', 'zhuayi', 'v1.0', 0, 0, 'keylink'),
(8, '文章模块', 0, 'article', 'zhuayi', 'v1.0', 0, 0, 'article,article_class');

DROP TABLE IF EXISTS `{%z%}search`;
CREATE TABLE IF NOT EXISTS `{%z%}search` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) character set gbk NOT NULL COMMENT '搜索关键词',
  `dtime` int(11) NOT NULL COMMENT '最后搜索时间',
  `num` int(11) NOT NULL COMMENT '总搜索次数',
  `tables` varchar(10) character set gbk NOT NULL COMMENT '数据源',
  KEY `id` (`id`),
  KEY `num` (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='搜索记录保存' AUTO_INCREMENT=10 ;

DROP TABLE IF EXISTS `{%z%}seo`;
CREATE TABLE IF NOT EXISTS `{%z%}seo` (
  `id` int(11) NOT NULL auto_increment,
  `aid` int(11) NOT NULL,
  `seo_title` varchar(50) NOT NULL COMMENT '????',
  `seo_keywords` varchar(100) NOT NULL COMMENT '????',
  `seo_description` varchar(250) NOT NULL COMMENT '????',
  `tables` varchar(50) NOT NULL COMMENT '??????model',
  `request_url` varchar(250) NOT NULL COMMENT '???URL',
  `parameter` int(11) NOT NULL COMMENT '??????,????????',
  `url` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `tables` (`tables`),
  KEY `parameter` (`parameter`),
  KEY `aid` (`aid`),
  KEY `request_url` (`request_url`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='SEO????' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `{%z%}single`;
CREATE TABLE IF NOT EXISTS `{%z%}single` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL COMMENT '上级ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `body` text NOT NULL COMMENT '内容',
  `tpl` varchar(250) NOT NULL COMMENT '模版',
  `dtime` int(11) NOT NULL COMMENT '添加时间',
  KEY `id` (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='单页面' AUTO_INCREMENT=7 ;
REPLACE INTO `{%z%}menu` (`id`, `parent_id`, `title`, `url`, `orders`, `mid`) VALUES
(96, 29, '单 页 面', '/index.php?m=single&c=index&a=init', 8, 0),
(95, 29, '搜索结果', '/index.php?m=search&c=index&a=init', 7, 0),
(88, 29, '网站内链接', '/index.php?m=zkeylink&c=index&a=init', 11, 0),
(87, 29, 'Baibu/Google地图', '/index.php?m=sitemaps&c=index&a=init', 999, 0),
(86, 29, '广告中心', '/index.php?m=ads&c=index&a=init', 9, 0),
(85, 10, '附件配置', '/index.php?m=setup&c=annex&a=init', 7, 0),
(79, 29, '友情连接', '/index.php?m=link&c=index&a=init', 8, 1),
(51, 10, '模块管理', '/index.php?m=module&c=index&a=init', 8, 0),
(50, 29, '自定义URL', '/index.php?m=diyurl&c=index&a=init', 7, 0),
(47, 29, '联动菜单', '/index.php?m=linkage&c=index&a=init', 5, 0),
(33, 31, '管理帐号', '/index.php?m=admin&c=list&a=init', 5, 0),
(32, 31, '管理角色', '/index.php?m=admin&c=group&a=init', 1, 0),
(31, 1, '管理员设置', 'javascript:', 3, 0),
(30, 29, '验证码设置', '/index.php?m=checkcode&c=index&a=init', 10, 0),
(29, 28, '插件', 'javascript:', 1, 0),
(28, 0, '插件', 'javascript:', 999, 0),
(27, 10, '网站配置', '/index.php?m=setup&c=web&a=init', 6, 0),
(26, 10, '邮箱配置', '/index.php?m=setup&c=email&a=init', 7, 0),
(25, 10, 'ZCMS配置', '/index.php?m=setup&c=zcms&a=init', 5, 0),
(21, 29, '操作日志', '/index.php?m=log&c=index&a=init', 4, 0),
(10, 1, '系统设置', 'javascript:', 2, 0),
(3, 29, '管理菜单', '/index.php?m=menu&c=index&a=init', 0, 0),
(1, 0, '设置', 'javascript:', 1, 0);

INSERT INTO `{%z%}admin_group` (`id`, `groupname`, `purview`) VALUES
(2, '超级管理员', '1,10,25,27,26,85,51,31,32,33,80,81,82,83,84,89,90,91,93,94,97,98,99,100,101,102,28,29,3,21,47,95,50,79,96,86,30,88,87')