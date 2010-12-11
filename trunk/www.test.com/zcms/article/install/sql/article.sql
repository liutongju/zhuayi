DROP TABLE IF EXISTS `{%z%}article`;
CREATE TABLE IF NOT EXISTS `{%z%}article` (
  `id` int(11) NOT NULL auto_increment,
  `cid` tinyint(4) NOT NULL COMMENT '栏目ID',
  `title` varchar(80) NOT NULL COMMENT '标题',
  `tags` varchar(50) NOT NULL COMMENT '关键词',
  `source` varchar(10) NOT NULL COMMENT '来源',
  `abstract` varchar(250) NOT NULL COMMENT '摘要',
  `body` text NOT NULL COMMENT '内容',
  `litpic` varchar(250) NOT NULL COMMENT '缩略图',
  `jump` varchar(250) NOT NULL COMMENT '转向连接',
  `comment` tinyint(4) NOT NULL COMMENT '是否评论',
  `click` smallint(4) NOT NULL COMMENT '点击量',
  `dtime` int(11) NOT NULL COMMENT '发布时间',
  `related` varchar(250) NOT NULL COMMENT '相关文章关键词',
  `flag` varchar(250) NOT NULL COMMENT '推送位',
  `generate` int(11) NOT NULL COMMENT '0表示未生成静态',
  PRIMARY KEY  (`id`),
  KEY `comment` (`comment`),
  KEY `cid` (`cid`,`id`),
  FULLTEXT KEY `flag` (`flag`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='文章表' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `{%z%}article_class`;
CREATE TABLE IF NOT EXISTS `{%z%}article_class` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL COMMENT '父类ID',
  `classname` varchar(50) NOT NULL COMMENT '栏目名称',
  `bclassname` varchar(50) NOT NULL COMMENT '栏目别名',
  `catdir` varchar(50) NOT NULL COMMENT '英文目录',
  `description` varchar(260) NOT NULL COMMENT '描述',
  `nav` int(11) NOT NULL COMMENT '是否在导航',
  `orders` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY  (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `nav` (`nav`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;