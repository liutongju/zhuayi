<?php
/**
 * admin_menu.php     ZCMS 后台模块管理
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
			'0'=>array('管理模块','index'),
			'1'=>array('导入模块','import&height=200','ajax'),
			);
$tips = '⑴ 卸载模块后，将会删除模块对应的数据和文件，请慎重操作';


?>