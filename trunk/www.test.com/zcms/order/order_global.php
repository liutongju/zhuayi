<?php
/**
 * admin_menu.php     ZCMS 订单模块
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
			'0'=>array('订单列表','index','','&recycle=0'),
			'1'=>array('添加订单','edit'),
			'2'=>array('配送方式','method'),
			'3'=>array('添加配送方式','method_edit','ajax')
			);
//-------设置模块提示
$tips = '...';

//-------载入配置文件
include_once ZCMS_ROOT.'/zcms/order/include/order_config.php';
?>