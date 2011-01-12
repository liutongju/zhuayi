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
elseif ($info['uid'][0] = 'news}->')
{
	$reset = $query->query("select * from ".T."sina_account where status = 1 and cookie <> ''");
}
else
{
	echo $info['uid'][0];
	exit;
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

$info['set'] = unserialize($info['set']);
if ($info['set']['title'] == 'one')
{
	$outtime =  strtotime($info['set']['starttime']) - time();
	$repeat = 1;
	$outtime_tpl = ZCMS_ROOT.'/zcms/sina/template/admin/outtime/one.html';
}
elseif ($info['set']['title'] == 'loop')
{
	$outtime = $info['set']['gap_time'];
	$repeat = $info['repeat'];
	$outtime_tpl = ZCMS_ROOT.'/zcms/sina/template/admin/outtime/one.html';
}
elseif ($info['set']['title'] == 'day')
{
	//echo '<pre>';
	$strart = strtotime(date("Y-m-d ".$info['set']['day_strtime']));
	$strart2 = $strart+86400;
	if ($strart > time())
	{
		$outtime = $strart - time();
	}
	else
	{
		$outtime = $strart2 - time();
	}
	$repeat = 0;
	$outtime_tpl = ZCMS_ROOT.'/zcms/sina/template/admin/outtime/one.html';
}
elseif ($info['set']['title'] == 'week')
{
	//echo '<pre>';
	$week = $info['set']['week'];
	$key = array_search(date('w'),$week);
	$strart = strtotime(date("Y-m-d ".$info['set']['week_strtime']));
	if (in_array(date('w'),$week))
	{
		//$strart2 = $strart+86400;
		if ($strart > time())
		{
			$outtime = $strart - time();
		}
	}
	if (empty($outtime))
	{
		foreach ($week as $key=>$val)
		{
			if (date('w') < $val)
			{
				$day_week = $val;
				break;
			}
		}
		if (empty($day_week))
		{
			$day_week = $week[0];
		}
		if ($day_week > date('w'))
		{
			$outtime = $strart+86400*($day_week - date('w')) - time();
		}
		else
		{
			$outtime = $strart+86400*( 7 - date('w')+ $week[0]) - time();
		}
	}
	$repeat = 0;
	$outtime_tpl = ZCMS_ROOT.'/zcms/sina/template/admin/outtime/one.html';
}
elseif ($info['set']['title'] == 'month')
{
	$month = $info['set']['month'];
	$key = array_search(date('d'),$month);
	$strart = strtotime(date("Y-m-d ".$info['set']['month_strtime']));
	if (in_array(date('d'),$month))
	{
		//$strart2 = $strart+86400;
		if ($strart > time())
		{
			$outtime = $strart - time();
		}
	}
	if (empty($outtime))
	{
		foreach ($month as $key=>$val)
		{
			if (date('d') < $val)
			{
				$day_week = $val;
				break;
			}
		}
		if (empty($day_week))
		{
			$day_week = $month[0];
		}
		elseif (count($month)==$key)
		{
			$day_week = $month[0];
		}
		elseif (count($month) > $key)
		{
			$day_week = $month[$key];
		}
		if ($day_week > date('d'))
		{
			$outtime = $strart + 86400*($day_week - date("d")) - time();
		}
		else
		{
			$outtime = $strart + 86400*( date("t") - date("d") + $month[0]) - time();
		}
	}
	$repeat = 0;
	$outtime_tpl = ZCMS_ROOT.'/zcms/sina/template/admin/outtime/one.html';
}
else
{
	exit('未知任务设置');
}
?>