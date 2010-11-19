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
  PRIMARY KEY  (`id`),
  KEY `comment` (`comment`),
  KEY `cid` (`cid`),
  FULLTEXT KEY `flag` (`flag`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='文章表' AUTO_INCREMENT=0
