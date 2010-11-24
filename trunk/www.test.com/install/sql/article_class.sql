DROP TABLE IF EXISTS `{%z%}article_class`;
CREATE TABLE IF NOT EXISTS `{%z%}article_class` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL,
  `classname` varchar(50) NOT NULL,
  `catdir` varchar(50) NOT NULL ,
  `description` varchar(260) NOT NULL,
  `nav` int(11) NOT NULL  ,
  `orders` int(11) NOT NULL  ,
  `article_generate_path` varchar(50) NOT NULL ,
  PRIMARY KEY  (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `nav` (`nav`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3

