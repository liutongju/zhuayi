<?php
/**
 * admin_del.php     ZCMS ��̨������Ŀɾ��
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */

/* �ж���·ID�Ƿ���� */
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ�����..',-1);
}
else
{
	$query->delete("sina_task_account"," id =".$_REQUEST['id']);
	showmsg('ɾ���ɹ�',ret_cookie('backurl'));
}
exit;
?>