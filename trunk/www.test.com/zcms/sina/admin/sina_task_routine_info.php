<?php
/**
 * admin_info.php     ZCMS ��̨����������
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* -------��֤��¼ */
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

	$pagename = '���΢������';
	if (!empty($my))
	{
		$_POST['myid'] = ret_cookie('admin_userid');
	}
	$_POST['id'] = $query->save("sina_task_routine",$_POST);
}
else
{
	$pagename = '�޸�΢������';

	$query->save("sina_task_routine",$_POST,' id = '.$_POST['id']);
}


/* д����־ */
admin_log("sina_task_routine",$_POST['id'],'title',$pagename);

showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>