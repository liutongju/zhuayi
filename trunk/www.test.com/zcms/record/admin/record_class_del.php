<?php
/**
 * admin_del.php     ZCMS ��̨�˵�ɾ��
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

	/* д����־ */
	admin_log("record_class",$_REQUEST['id'],'classname','ɾ������');
	$query->delete("record_class"," id =".$_REQUEST['id']);
	showmsg('��ϲ����ɾ���ɹ�',ret_cookie('backurl'));
}exit;
?>