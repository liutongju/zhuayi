<?php
/**
 * admin_menu.php     ZCMS 短信群发配置
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
 
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('短信配置','config'),
			);
//-------设置模块提示
$tips = '此短信模块是基于易美短信接口，请先申请易美短信接口帐号';
?>