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


?>