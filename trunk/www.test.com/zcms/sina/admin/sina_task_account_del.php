<?php
/**
 * admin_del.php     ZCMS 后台文章栏目删除
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */

/* 判断来路ID是否存在 */
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个任务..',-1);
}
else
{
	$query->delete("sina_task_account"," id =".$_REQUEST['id']);
	showmsg('删除成功',ret_cookie('backurl'));
}
exit;
?>