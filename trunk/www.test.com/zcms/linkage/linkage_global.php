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

/* 验证登录 */
verify_admin('admin_username');
 
/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('管理菜单','index'),
			'1'=>array('添加菜单','edit','ajax'),
			);
$tips = '删除联动菜单时会将他的子级所有菜单删除，请慎重...';
?>