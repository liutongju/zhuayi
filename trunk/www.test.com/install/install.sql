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
  `title` varchar(50) NOT NULL COMMENT '������',
  `type` int(11) NOT NULL COMMENT '�������',
  `ismake` int(11) NOT NULL COMMENT '״̬',
  `click` int(11) NOT NULL COMMENT '�����',
  `dtime` int(11) NOT NULL COMMENT '���ʱ��',
  `count` text NOT NULL,
  `link` varchar(200) NOT NULL COMMENT '���ӵ�ַ',
  `key` varchar(50) NOT NULL COMMENT 'ȱʡֵ���ɹ������ѯ',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `ismake` (`ismake`),
  KEY `click` (`click`),
  KEY `dtime` (`dtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='����' AUTO_INCREMENT=15 ;

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
  `default` varchar(50) NOT NULL COMMENT 'ƥ��ȱʡֵ',
  `dtime` int(11) NOT NULL COMMENT '���ʱ��',
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
  `mid` int(11) NOT NULL COMMENT 'ģ��ID',
  PRIMARY KEY  (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='??????' AUTO_INCREMENT=103 ;

DROP TABLE IF EXISTS `{%z%}module`;
CREATE TABLE IF NOT EXISTS `{%z%}module` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL COMMENT 'ģ������',
  `type` int(11) NOT NULL COMMENT '����-0ģ��1���',
  `mark` varchar(50) NOT NULL COMMENT '��ʶ��',
  `author` varchar(20) NOT NULL COMMENT '����',
  `version` varchar(10) NOT NULL COMMENT '�汾',
  `install` int(11) NOT NULL COMMENT '�Ƿ�װ',
  `dtime` int(11) NOT NULL,
  `tables` varchar(50) NOT NULL COMMENT 'ģ�������',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='ģ�ͱ�' AUTO_INCREMENT=2 ;

INSERT INTO `{%z%}module` (`id`, `title`, `type`, `mark`, `author`, `version`, `install`, `dtime`, `tables`) VALUES
(2, '�������', 1, 'ads', 'zhuayi', 'v1.0', 0, 0, 'ads'),
(3, '��֤������', 1, 'checkcode', 'zhuayi', 'v1.0', 0, 0, 'checkcode'),
(4, '��������', 1, 'link', 'zhuayi', 'v1.0', 0, 0, 'link'),
(5, '�����˵�', 1, 'linkage', 'zhuayi', 'v1.0', 0, 0, 'linkage'),
(6, 'Baibu/Google��ͼ', 1, 'sitemaps', 'zhuayi', 'v1.0', 0, 0, ''),
(7, '��վ������', 1, 'zkeylink', 'zhuayi', 'v1.0', 0, 0, 'keylink'),
(8, '����ģ��', 0, 'article', 'zhuayi', 'v1.0', 0, 0, 'article,article_class');

DROP TABLE IF EXISTS `{%z%}search`;
CREATE TABLE IF NOT EXISTS `{%z%}search` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) character set gbk NOT NULL COMMENT '�����ؼ���',
  `dtime` int(11) NOT NULL COMMENT '�������ʱ��',
  `num` int(11) NOT NULL COMMENT '����������',
  `tables` varchar(10) character set gbk NOT NULL COMMENT '����Դ',
  KEY `id` (`id`),
  KEY `num` (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='������¼����' AUTO_INCREMENT=10 ;

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
  `parent_id` int(11) NOT NULL COMMENT '�ϼ�ID',
  `title` varchar(50) NOT NULL COMMENT '����',
  `body` text NOT NULL COMMENT '����',
  `tpl` varchar(250) NOT NULL COMMENT 'ģ��',
  `dtime` int(11) NOT NULL COMMENT '���ʱ��',
  KEY `id` (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='��ҳ��' AUTO_INCREMENT=7 ;
REPLACE INTO `{%z%}menu` (`id`, `parent_id`, `title`, `url`, `orders`, `mid`) VALUES
(96, 29, '�� ҳ ��', '/index.php?m=single&c=index&a=init', 8, 0),
(95, 29, '�������', '/index.php?m=search&c=index&a=init', 7, 0),
(88, 29, '��վ������', '/index.php?m=zkeylink&c=index&a=init', 11, 0),
(87, 29, 'Baibu/Google��ͼ', '/index.php?m=sitemaps&c=index&a=init', 999, 0),
(86, 29, '�������', '/index.php?m=ads&c=index&a=init', 9, 0),
(85, 10, '��������', '/index.php?m=setup&c=annex&a=init', 7, 0),
(79, 29, '��������', '/index.php?m=link&c=index&a=init', 8, 1),
(51, 10, 'ģ�����', '/index.php?m=module&c=index&a=init', 8, 0),
(50, 29, '�Զ���URL', '/index.php?m=diyurl&c=index&a=init', 7, 0),
(47, 29, '�����˵�', '/index.php?m=linkage&c=index&a=init', 5, 0),
(33, 31, '�����ʺ�', '/index.php?m=admin&c=list&a=init', 5, 0),
(32, 31, '�����ɫ', '/index.php?m=admin&c=group&a=init', 1, 0),
(31, 1, '����Ա����', 'javascript:', 3, 0),
(30, 29, '��֤������', '/index.php?m=checkcode&c=index&a=init', 10, 0),
(29, 28, '���', 'javascript:', 1, 0),
(28, 0, '���', 'javascript:', 999, 0),
(27, 10, '��վ����', '/index.php?m=setup&c=web&a=init', 6, 0),
(26, 10, '��������', '/index.php?m=setup&c=email&a=init', 7, 0),
(25, 10, 'ZCMS����', '/index.php?m=setup&c=zcms&a=init', 5, 0),
(21, 29, '������־', '/index.php?m=log&c=index&a=init', 4, 0),
(10, 1, 'ϵͳ����', 'javascript:', 2, 0),
(3, 29, '����˵�', '/index.php?m=menu&c=index&a=init', 0, 0),
(1, 0, '����', 'javascript:', 1, 0);

INSERT INTO `{%z%}admin_group` (`id`, `groupname`, `purview`) VALUES
(2, '��������Ա', '1,10,25,27,26,85,51,31,32,33,80,81,82,83,84,89,90,91,93,94,97,98,99,100,101,102,28,29,3,21,47,95,50,79,96,86,30,88,87')