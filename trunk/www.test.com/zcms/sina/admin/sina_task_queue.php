<?php
/**
 * index.php     ZCMS ����ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

if ($_REQUEST['act'] == 2)
{
	$_REQUEST['id'] = explode('-',$_REQUEST['id']);
	
	
	exit;
}
if ($_REQUEST['act'] == 3)
{
	echo  '{CC1204}';
	exit;
}
//$cmd = exec("E:\\web\adsl.bat");
/* ��ʼ���� */
$task = array(
				array('title'=>'��ʼͷ��','url'=>'/index.php?m=sina&c=api_face&a=init'),
				array('title'=>'��ʼģ��','url'=>'/index.php?m=sina&c=api_skin&a=init'),
				array('title'=>'��ʼ����','url'=>'/index.php?m=sina&c=api_info&a=init'),
				array('title'=>'��ʼ��ǩ','url'=>'/index.php?m=sina&c=api_tags&a=init'),
				array('title'=>'��ʼ��ע','url'=>'/index.php?m=sina&c=api_attention&a=init'),
				array('title'=>'����΢��','url'=>'/index.php?m=sina&c=api_weibo&a=init'),
			 );

/* �������� */
$j = 10;
for ($i= 1; $i<=$j; $i++)
{
	$array[] = array_rand($task);
}

/* ����������� */
foreach ($array as $val)
{
	
	/* ��ʼͷ�� */
	if ($val == 0)
	{
		$search = ' and litpic = ""';
	}
	elseif ($val == 1)
	{
		$search .= " and skin = '' ";
	}
	elseif ($val == 2)
	{
		$search .= " and sign = '' ";
	}
	elseif ($val == 3)
	{
		$search .= " and account_tags = '' ";
	}
	elseif ($val == 4)
	{
		$search .= " and start_attention = '0' ";
	}
	elseif ($val == 5)
	{
		$search .= " and t_time < ".(time()-3600);
	}
	echo  "select * from ".T."sina_account where status = 1 ".' and task_time < '.(time()-3600).$search.' order by rand() limit 0, 1<br>';
	$user = $query->one_array( "select * from ".T."sina_account where status = 1 ".' and task_time < '.(time()-3600).$search.' order by rand() limit 0, 1');
	if (!empty($user['id']))
	{
		$task_queue['title'][] = $task[$val]['title'];
		$task_queue['userid'][] = $user['id'];
		$task_queue['username'][] = $user['username'];
		
		/* д�뵽���п��� */
		//$query->query("insert into ".T."sina_task_queue(uid,title,url) values('".$user['id']."','".$task[$val]['title']."','".$task[$val]['url'].'&id='.$user['id']."')");
		$taskid = $query->insert_id();
		$task_queue['id'][] = $user['id'].'-'.$taskid;
		$task_queue['url'][] = $task[$val]['url'].'&id='.$user['id'].'&taskid='.$taskid;
	}
}
$title =  "'".implode("','",$task_queue['title'])."'";
$task_url =  "'".implode("','",$task_queue['url'])."'";
$username =  "'".implode("','",$task_queue['username'])."'";
$id =  "'".implode("','",$task_queue['id'])."'";

?>