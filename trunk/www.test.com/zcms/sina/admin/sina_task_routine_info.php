<?php
/**
 * admin_info.php     ZCMS 后台文章入库操作
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* -------验证登录 */
verify_admin('admin_username');

//if (!empty($_POST['fields']))
//{
	$_POST['fields'] = serialize($_POST['fields']);
	$_POST['set'] = serialize($_POST['set']);
//}

//$_POST['starttime'] = strtotime($_POST['starttime']);

if (empty($_REQUEST['id']))
{
	if (empty($_POST['dtime']))
	{
		$_POST['dtime'] = time();
	}

	$pagename = '添加微博任务';
	if (!empty($my))
	{
		$_POST['myid'] = ret_cookie('admin_userid');
	}
	$_POST['id'] = $query->save("sina_task_routine",$_POST);
}
else
{
	$pagename = '修改微博任务';

	$query->save("sina_task_routine",$_POST,' id = '.$_POST['id']);
}


/* 写入日志 */
admin_log("sina_task_routine",$_POST['id'],'title',$pagename);

showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>