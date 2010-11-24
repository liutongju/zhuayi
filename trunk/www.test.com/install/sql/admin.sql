DROP TABLE IF EXISTS `{%z%}admin`;
CREATE TABLE IF NOT EXISTS `{%z%}admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL ,
  `pass` varchar(32) NOT NULL ,
  `login_time` int(11) NOT NULL ,
  `login_ip` varchar(15) NOT NULL ,
  `dtime` int(11) NOT NULL ,
  `gid` int(11) NOT NULL ,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk  AUTO_INCREMENT=4 ;