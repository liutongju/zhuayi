<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */
/* 验证登录 */


verify_admin('admin_username');
/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('管理任务','task_routine'),
			array('添加任务','task_routine_edit'),
			);
$tips = "提示信息带回写。";
if (!empty($_REQUEST['title']))
{
	$search .= " and a.title like '%".$_REQUEST['title']."%'";
}

$maxnum = $query->maxnum("select count(*) from ".T."sina_task_routine as a  where a.id>0".$search.$my);


?>