DROP TABLE IF EXISTS `{%z%}article`;
CREATE TABLE IF NOT EXISTS `{%z%}article` (
  `id` int(11) NOT NULL auto_increment,
  `cid` tinyint(4) NOT NULL ,
  `title` varchar(80) NOT NULL ,
  `tags` varchar(50) NOT NULL ,
  `source` varchar(10) NOT NULL ,
  `abstract` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `litpic` varchar(250) NOT NULL,
  `jump` varchar(250) NOT NULL,
  `comment` tinyint(4) NOT NULL ,
  `click` smallint(4) NOT NULL,
  `dtime` int(11) NOT NULL ,
  `related` varchar(250) NOT NULL,
  `flag` varchar(250) NOT NULL ,
  `article_generate_path` varchar(250) NOT NULL ,
  `generate` int(11) NOT NULL ,
  PRIMARY KEY  (`id`),
  KEY `comment` (`comment`),
  KEY `cid` (`cid`,`id`),
  FULLTEXT KEY `flag` (`flag`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=4
