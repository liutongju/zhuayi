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
			'0'=>array('管理友情连接','index'),
			'1'=>array('添加友情连接','edit&height=200','ajax'),
			);
$tips = '匹配缺省值是智能控制友情链接调用的一个必备,格式是:模块标识符|信息ID，如,我要只在国内新闻中调用友情链接：article(模块标识符)|4(ID)';
?>