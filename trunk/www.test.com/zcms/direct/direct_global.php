<?php
/**
 * admin_menu.php     ZCMS 后台菜单管理
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */


 
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('直投配置','config'),
			'1'=>array('管理直投','index'),
			'2'=>array('发布直投','edit'),
			);
//-------设置模块提示
$tips = '...';

//-------载入配置文件
include_once ZCMS_ROOT.'/zcms/direct/include/direct_config.php'
?>