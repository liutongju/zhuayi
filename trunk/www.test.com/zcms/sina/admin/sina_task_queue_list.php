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
$tips = "帮助文档最后写";

verify_admin('admin_username');
/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('任务队列','task_queue_list'),

			);
if (!empty($_REQUEST['username']))
{
	$search .= " and a.uid in (select id from ".T."sina_account where username like '%".urldecode($_REQUEST['username'])."%')";
}
if (!empty($_REQUEST['title']))
{
	$search .= " and a.title like '%".urldecode($_REQUEST['title'])."%'";
}
if ($_REQUEST['status'] == 1)
{
	$search .= " and a.reset like '%成功%'";
}
elseif ($_REQUEST['status'] == '2')
{
	$search .= " and a.reset not like '%成功%'";
}
$maxnum = $query->maxnum("select count(*) from ".T."sina_task_queue as a  where a.id>0".$search.$my);


?>