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
	//$info['starttime'] =  date("G",$info['starttime']);

}
else
{
	showmsg('错误的来源地址',ret_cookie('backurl'));
}
/* 获取用户ID */
$info['uid'] = explode(':',$info['uid']);
$info['uid'][0] = str_replace('<!-{','',$info['uid'][0]);
if (substr($info['uid'][1],-1,1) == ',')
$info['uid'][1] = str_replace(',}->','',$info['uid'][1]);
else
$info['uid'][1] = str_replace('}->','',$info['uid'][1]);

if ($info['uid'][0] == 'id')
{
	$reset = $query->query("select * from ".T."sina_account where id in(".$info['uid'][1].")");
}
elseif ($info['uid'][0] == 'all}->')
{
	$reset = $query->query("select * from ".T."sina_account ");
}
elseif ($info['uid'][0] == 'rand')
{
	$reset = $query->query("select * from ".T."sina_account order by rand() limit 0,".$info['uid'][1]);
}
elseif ($info['uid'][0] == 'sex')
{
	$reset = $query->query("select * from ".T."sina_account where gender = ".$info['uid'][1]);
}
elseif ($info['uid'][0] == 'region')
{
	$reset = $query->query("select * from ".T."sina_account where province like '".$info['uid'][1].",%'");
}
else
{
	echo $info['uid'][0];
}

while ($row = $query->fetch_array($reset))
{
	$id[] =  $row['id'];
	$username[] =  $row['username'];
	$nick[] =  $row['nick'];
}
$id =  "'".implode("','",$id)."'";
$username = "'".implode("','",$username)."'";
$nick = "'".implode("','",$nick)."'";


$info['fields'] = unserialize($info['fields']);
$form = '&';
foreach ( $info['fields'] as $key=>$val)
{
	if (is_array($val))
	{
		$form .= $key."=".implode(',',$val).'&';
	}
	else
	{
		$form .= $key."=".$val.'&';
	}
}
$info['task'] .=$form;

$task_name = '微博发送';

if (empty($_REQUEST['page']))
$_REQUEST['page'] = 1;
?>