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
 
/* 设置页面内部菜单 */
$menu = array(
			'0'=>array('管理菜单','index'),
			'1'=>array('添加菜单','edit','ajax'),
			'2'=>array('更新菜单缓存','cache')
			);
/* 设置模块提示 */
$tips = '请在添加、修改、排序菜单全部完成后，更新菜单缓存';
?>