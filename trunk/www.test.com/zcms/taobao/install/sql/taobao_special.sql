DROP TABLE IF EXISTS `{%z%}taobao_special`;
CREATE TABLE IF NOT EXISTS `{%z%}taobao_special` (
  `id` int(11) NOT NULL auto_increment,
  `cid` tinyint(4) NOT NULL  ,
  `title` varchar(80) NOT NULL  ,
  `litpic` varchar(250) NOT NULL  ,
  `click` smallint(4) NOT NULL  ,
  `dtime` int(11) NOT NULL  ,
  `taobao_json` text NOT NULL ,
  `customize` text NOT NULL ,
  PRIMARY KEY  (`id`),
  KEY `cid` (`cid`,`id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=6 
