DROP TABLE IF EXISTS `{%z%}checkcode`;
CREATE TABLE IF NOT EXISTS `{%z%}checkcode` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL COMMENT '����',
  `rule` text NOT NULL COMMENT '���л��������',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='��֤��' AUTO_INCREMENT=3 ;
INSERT INTO `{%z%}checkcode` (`id`, `title`, `rule`) VALUES
(2, '��̨��¼', 'a:4:{s:8:"code_len";s:1:"4";s:9:"font_size";s:2:"20";s:5:"width";s:3:"130";s:6:"height";s:2:"50";}')