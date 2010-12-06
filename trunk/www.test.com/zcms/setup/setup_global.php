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
$menu = array(
			'0'=>array('ZCMS配置','zcms'),
			'1'=>array('网站配置','web'),
			'2'=>array('邮箱配置','email'),
			'3'=>array('附件配置','annex'),
			);
$tips = '请慎重填写下列参数,配置不正确可能会使您的网站崩溃.';
?>