<?php
/**
 * admin_global.php     ZCMS 后台管理面板,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 验证是否登录状态 */
if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
{
	verify_admin('admin_username');
}

/* 赋值锁屏COOKIE用来判断是否为锁屏状态。*/
$admin_lock = ret_cookie('admin_lock');

/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('管理角色','group'),
			'1'=>array('角色添加','group_edit'),
			'2'=>array('管理帐号','list'),
			'3'=>array('帐号添加','edit','ajax'),
			);
$tips = '欢迎进入 '.$webname.' 管理中心';			
?>