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


$_POST['fields'] = serialize($_POST['fields']);

$_POST['week'] = implode(',',$_POST['week']);

$_POST['day'] = implode(',',$_POST['day']);

if (empty($_REQUEST['id']))
{
	$pagename = '���΢������';
	$_POST['id'] = $query->save("sina_task_account",$_POST);
}
else
{
	$pagename = '�޸�΢������';

	$query->save("sina_task_account",$_POST,' id = '.$_POST['id']);
}


/* д����־ */
admin_log("sina_task_account",$_POST['id'],'title',$pagename);

showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>