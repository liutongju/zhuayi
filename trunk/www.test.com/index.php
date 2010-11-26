<?php
/**
 * index.php     ZCMS 入口文件
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 *///----屏蔽一般错误
error_reporting(E_ALL^E_NOTICE^E_WARNING);

//-----输出页面字符集
header('Content-type: text/html; charset=gbk');

/* -- 判断是否安装 ---*/
if(!file_exists('./data/zcms.lock') ){exit('<a href="/install/">尚未安装</a>');}

//-----设施程序运行初始时间
$pagestartime=microtime(); 

//-----定义ZCMS根目录路径
define('ZCMS_ROOT', str_replace("\\", '/', dirname(__FILE__)));

//-----定义公用函数库路径
define('ZCMS_FUN', ZCMS_ROOT.'/data/data_cache/function.public.php');

//-----定义缓存路径
define('ZCMS_CACHE', ZCMS_ROOT.'/data/data_cache/');

//-----定义公用类库
define('ZCMS_CLASS', ZCMS_ROOT.'/class/');

//-----定义系统模版路径
define('ZCMS_TPLPATH', ZCMS_ROOT.'/statics/template');

//-----定义模版缓存路径
define('ZCMS_TPLCACHE', ZCMS_ROOT.'/data/tpl_cache/');

//-----设置时区
date_default_timezone_set('Asia/Shanghai');

//-----载入网站配置文件
include_once ZCMS_ROOT.'/data/include/web_config.php';

//-----定义ZCMS虚拟路径
define('ZCMS_URL', $weburl);

//-----载入数据库配置文件
include_once ZCMS_ROOT.'/data/include/zcms_config.php';

//-----版本信息
include_once ZCMS_ROOT.'/data/zcms_version.php';
//-----载入数据库类
include_once(ZCMS_ROOT.'/class/mysql.class.php');
$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
//-----定义数据表前缀
define('T', $cookievarpre);

//-----载入ZCMS缓存工厂

include ZCMS_ROOT.'/class/cache.class.php';
$cache = new cache();

//-----载入框架URL解析类
include ZCMS_ROOT.'/class/routing.class.php';
$url = new routing();
$url->app();

//-----优先载入模型全局文件
if(file_exists($_REQUEST['g_file']))
{
	include_once $_REQUEST['g_file'];
}
//------载入模版
require ZCMS_ROOT.'/class/template.class.php';
$tpl = new DedeTemplate();

//-----载入模型文件
if(file_exists($_REQUEST['m_file']))
{
	include_once $_REQUEST['m_file'];
}
$tpl->LoadTemplate($_REQUEST['c_file']);
$tpl->Display();

/*
$zcms_upload['zcms_version'] = 'Zcms V3 Beta Release 20101124';
$zcms_upload['zcms_upload_tips'] = '修正网站配置时，如果网站域名有有“/”，则替换掉“/”<br>修正附件配置UE，多个附件用“|”隔开的提示性文字';
$zcms_upload['zcms_upload_file']= array(
							'/zcms/admin/template/admin_right.html',
						);
$zcms_upload['zcms_upload_version_next'] = 'Zcms V3 Beta Release 20101126';						
$zcms_upload['zcms_upload_sql'] = 'update `{%z%}admin` set username = "zhuayi86" where id = 2;';	
echo serialize($zcms_upload);*/
?>