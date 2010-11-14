DROP TABLE IF EXISTS `{%z%}seo`;
CREATE TABLE IF NOT EXISTS `{%z%}seo` (
  `id` int(11) NOT NULL auto_increment,
  `aid` int(11) NOT NULL,
  `seo_title` varchar(50) NOT NULL COMMENT '标题',
  `seo_keywords` varchar(100) NOT NULL COMMENT '关键词',
  `seo_description` varchar(250) NOT NULL COMMENT '描述',
  `tables` varchar(50) NOT NULL COMMENT '是表也是model',
  `request_url` varchar(250) NOT NULL COMMENT '当前URL',
  `parameter` int(11) NOT NULL COMMENT '模糊形式,允许带参数',
  `url` varchar(50) NOT NULL COMMENT '自定义URL',
  PRIMARY KEY  (`id`),
  KEY `tables` (`tables`),
  KEY `parameter` (`parameter`),
  KEY `aid` (`aid`),
  KEY `request_url` (`request_url`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='SEO设置' AUTO_INCREMENT=3 