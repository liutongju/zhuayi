DROP TABLE IF EXISTS `{%z%}menu`;
CREATE TABLE IF NOT EXISTS `{%z%}menu` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `orders` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='��̨�˵�' AUTO_INCREMENT=50 ;

INSERT INTO `{%z%}menu` (`id`, `parent_id`, `title`, `url`, `orders`) VALUES
(1, 0, '����', 'javascript:', 0),
(10, 1, 'ϵͳ����', 'javascript:', 2),
(3, 29, '����˵�', '/index.php?m=menu&c=index&a=init', 3),
(25, 10, 'ZCMS����', '/index.php?m=setup&c=zcms&a=init', 5),
(21, 29, '������־', '/index.php?m=log&c=index&a=init', 4),
(26, 10, '��������', '/index.php?m=setup&c=email&a=init', 7),
(27, 10, '��վ����', '/index.php?m=setup&c=web&a=init', 6),
(28, 0, '��չ', 'javascript:', 999),
(29, 28, '��չ', 'javascript:', 1),
(30, 29, '��֤������', '/index.php?m=checkcode&c=index', 7),
(31, 1, '����Ա����', 'javascript:', 3),
(32, 31, '�����ɫ', '/index.php?m=admin&c=group&a=init', 1),
(33, 31, '�����ʺ�', '/index.php?m=admin&c=list&a=init', 5),
(47, 29, '�����˵�', '/index.php?m=linkage&c=index&a=init', 5),
(49, 29, '��������', '/index.php?m=link&c=index&a=init', 6)