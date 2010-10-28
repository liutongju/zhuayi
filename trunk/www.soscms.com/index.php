<?php
/**
 * index.php     SOSCMS 入口文件
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
//-----定义SOSCMS根目录路径
define('SOSCMS_ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
//-----定义公用函数库路径
define('SOSCMS_FUN', SOSCMS_ROOT.'/data/data_cache/function.public.php');

//-----载入框架类
include SOSCMS_ROOT.'/class/Routing.class.php';

//-----初始化应用程序
$sos = new Routing();
$sos->creat_app();
?>