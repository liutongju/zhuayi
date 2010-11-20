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

//-------验证登录
verify_admin('admin_username');

$tips = '为了提高效率，添加、修改、删除完后请更新缓存'; 
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('管理网站内链接','index'),
			'1'=>array('添加网站内链接','edit&height=200','ajax'),
			'2'=>array('更新站内链接缓存','cache'),
			);	
?>