<?php

verify_admin('admin_username');
$menu = array(
			array('��������','task_routine'),
			array('�������','task_routine_edit'),
			);

$tips = "��ʾ��Ϣ����д��";

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

$task = array(
				array('�ʺŵ�¼','/index.php?m=sina&c=task_login&a=init','/index.php?m=sina&c=login&a=init&act=1'),
				array('�������','/index.php?m=sina&c=task_life&a=init','/index.php?m=sina&c=life&a=init&act=1'),
				array('Ⱥ��΢��','/index.php?m=sina&c=task_t&a=init','/index.php?m=sina&c=t_info&a=init'),
			 )
?>