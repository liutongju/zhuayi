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


$_POST['fields'] = serialize($_POST['fields']);

$_POST['week'] = implode(',',$_POST['week']);

$_POST['day'] = implode(',',$_POST['day']);

if (empty($_REQUEST['id']))
{
	$pagename = '添加微博任务';
	$_POST['id'] = $query->save("sina_task_account",$_POST);
}
else
{
	$pagename = '修改微博任务';

	$query->save("sina_task_account",$_POST,' id = '.$_POST['id']);
}


/* 写入日志 */
admin_log("sina_task_account",$_POST['id'],'title',$pagename);

showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>