<?php
/**
 * admin_menu.php     ZCMS Baibu/Google地图
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-20
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
//-------设置页面内部菜单 
$tips = '<br><b>Sitemaps</b><br>
Sitemaps 服务旨在使用 Feed 文件 sitemap.xml 通知 Google、Yahoo! 以及 Microsoft 等 <br>Crawler(爬虫)网站上哪些文件需要索引、这些文件的最后修订时间、更改频度、文件位置、相对优先索引权，这些信息将帮助他们建立索引范围和索引的行为习惯。详细信息请查看 sitemaps.org 网站上的说明。<br>
通过Sitemaps，您可以获得： <br>
1、更大的抓取范围，更新的搜索结果 – 帮助网友找到更多您的网页。<br>
2、更为智能的抓取 – 因为我们可以得知您网页的最新修改时间或网页的更改频率。<br>
3、详细的报告 – 详细说明 Google 如何将网友的点击指向您的网站及 Googlebot 如何看到您的网页。<br>
<b>互联网新闻开放协议：</b> <br>
1、互联网新闻开放协议》是百度新闻搜索制定的搜索引擎新闻源收录标准，网站可将发布的新闻内容制作成遵循此开放协议的XML格式的网页（独立于原有的新闻发布形式）供搜索引擎索引。 ZCMS可自动生成网站的Sitemaps，但是您还需要向google或者baidu提交Sitemaps的访问地址。<br>
您的网站的Sitemaps 访问地址为：sitemaps.xml<br>
ZCMS可自动生成网站的<<互联网新闻开放协议>>，但是您还需要向baidu提交访问地址。<br>
您的网站的Sitemaps 访问地址为：baidunews.xml<br>
更多关于Google Sitemaps的信息：https://www.google.com/webmasters/sitemaps/login?hl=zh_CN<br>
更多关于<<互联网新闻开放协议>>的信息：http://news.baidu.com/newsop.html#kg<br>';

//-------设置页面内部菜单 
$menu = array(
			'0'=>array('生成地图','index'),
			'1'=>array('管理数据源','edit&height=200','ajax'),
			);
include_once ZCMS_ROOT.'/zcms/sitemaps/include/sitemaps_config.php';


?>