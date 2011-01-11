<?php

verify_admin('admin_username');


if (!empty($_REQUEST['id']))
{
	$info = $query->one_array("select * from ".T."sina_task_account where id=".$_REQUEST['id']);
	$info['week'] = explode(',',$info['week']);

	$info['day'] = explode(',',$info['day']);


}
else
{
	$info['uid'] = $_REQUEST['uid'];
}

$task[0][1] = ''
?>