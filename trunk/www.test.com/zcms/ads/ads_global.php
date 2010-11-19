<?php
/**
 * admin_menu.php     ZCMS 后台广告中心
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

if ($_REQUEST['c']!='show')
{ 
	//-------验证登录
	verify_admin('admin_username');
}
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('管理广告','index'),
			'1'=>array('添加广告','edit&height=400&width=700','ajax'),
			);
$tips = '添加完广告后,可以点击调用,复制调用代码带模版相应位置即可...';
?>