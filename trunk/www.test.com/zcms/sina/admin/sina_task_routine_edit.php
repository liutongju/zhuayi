<?php

verify_admin('admin_username');
$menu = array(
			array('管理任务','task_routine'),
			array('添加任务','task_routine_edit'),
			);

$tips = "提示信息带回写。";

if (!empty($_REQUEST['id']))
{
	$info = $query->one_array("select * from ".T."sina_task_routine where id=".$_REQUEST['id']);
	$info['set'] = unserialize($info['set']);
}
else
{
	//$info['starttime'] = time();
	$info['repeat'] = 0;
}


?>