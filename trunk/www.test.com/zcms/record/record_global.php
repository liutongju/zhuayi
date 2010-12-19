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
if (!empty($_REQUEST['a']))
{
	verify_admin('admin_username');
}


/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('分类管理','class'),
			'1'=>array('添加分类','class_edit','ajax'),
			'2'=>array('记录管理','index'),
			'3'=>array('添加记录','edit'),
			);
$tips = '网址导航基于会员系统而建';
$GLOBALS['zcms_config']['perpagenum'] = 20;
$background = handie(ZCMS_ROOT.'/zcms/record/template/images/icon',1);

?>