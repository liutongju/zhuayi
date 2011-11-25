<?php

/**
* index.php     Zhuayi 入口文件
*
* @copyright    (C) 2005 - 2010  Zhuayi
* @licenes      http://www.zhuayi.net
* @lastmodify   2010-10-27
* @author       zhuayi
* @QQ			2179942
*/
/* error debug */
$pagestartime = microtime();


if (isset($_GET['error_debug']))
{
	ini_set( "display_errors",true);
	error_reporting(E_ALL);
}
else
{
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
}

/*  输出页面字符集 */
header('Content-type: text/html; charset=utf-8');

/* -----设置时区  */
date_default_timezone_set('Asia/Shanghai');

/* -----定义Zhuayi根目录路径  */
define('ZHUAYI_ROOT', str_replace("\\", '/', dirname(__FILE__)));

define('APP_ROOT', ZHUAYI_ROOT.'/zhuayi/');

define('PLUGINS_ROOT', ZHUAYI_ROOT.'/plugins/');

require ZHUAYI_ROOT.'/plugins/core/zhuayi.php';

$zhuayi = new zhuayi();

$zhuayi->app();

?>
