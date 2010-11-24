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
(1, 0, '����', 'javascript:', 1, 0),
(10, 1, 'ϵͳ����', 'javascript:', 2, 0),
(3, 29, '����˵�', '/index.php?m=menu&c=index&a=init', 0, 0),
(25, 10, 'ZCMS����', '/index.php?m=setup&c=zcms&a=init', 5, 0),
(21, 29, '������־', '/index.php?m=log&c=index&a=init', 4, 0),
(26, 10, '��������', '/index.php?m=setup&c=email&a=init', 7, 0),
(27, 10, '��վ����', '/index.php?m=setup&c=web&a=init', 6, 0),
(28, 0, '���', 'javascript:', 999, 0),
(29, 28, '���', 'javascript:', 1, 0),
(30, 29, '��֤������', '/index.php?m=checkcode&c=index&a=init', 10, 0),
(31, 1, '����Ա����', 'javascript:', 3, 0),
(32, 31, '�����ɫ', '/index.php?m=admin&c=group&a=init', 1, 0),
(33, 31, '�����ʺ�', '/index.php?m=admin&c=list&a=init', 5, 0),
(47, 29, '�����˵�', '/index.php?m=linkage&c=index&a=init', 5, 0),
(50, 29, '�Զ���URL', '/index.php?m=diyurl&c=index&a=init', 7, 0),
(51, 10, 'ģ�����', '/index.php?m=module&c=index&a=init', 8, 0),
(79, 29, '��������', '/index.php?m=link&c=index&a=init', 8, 1),
(85, 10, '��������', '/index.php?m=setup&c=annex&a=init', 7, 0),
(86, 29, '�������', '/index.php?m=ads&c=index&a=init', 9, 0),
(87, 29, 'Baibu/Google��ͼ', '/index.php?m=sitemaps&c=index&a=init', 999, 0),
(88, 29, '��վ������', '/index.php?m=zkeylink&c=index&a=init', 11, 0)