DROP TABLE IF EXISTS `{%z%}seo`;
CREATE TABLE IF NOT EXISTS `{%z%}seo` (
  `id` int(11) NOT NULL auto_increment,
  `aid` int(11) NOT NULL,
  `seo_title` varchar(50) NOT NULL COMMENT '����',
  `seo_keywords` varchar(100) NOT NULL COMMENT '�ؼ���',
  `seo_description` varchar(250) NOT NULL COMMENT '����',
  `tables` varchar(50) NOT NULL COMMENT '�Ǳ�Ҳ��model',
  `request_url` varchar(250) NOT NULL COMMENT '��ǰURL',
  `parameter` int(11) NOT NULL COMMENT 'ģ����ʽ,���������',
  `url` varchar(50) NOT NULL COMMENT '�Զ���URL',
  PRIMARY KEY  (`id`),
  KEY `tables` (`tables`),
  KEY `parameter` (`parameter`),
  KEY `aid` (`aid`),
  KEY `request_url` (`request_url`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='SEO����' AUTO_INCREMENT=3 