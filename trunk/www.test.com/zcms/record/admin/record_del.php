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
$_POST['id'] = implode(',',$_POST['id']);
if (empty($_POST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ���¼..',-1);
}
else
{


	/* д����־ */
	admin_log("record",$_POST['id'],'title','ɾ����¼');
	$query->delete("record"," id in (".$_POST['id'].")");
	showmsg('��ϲ����ɾ���ɹ�',ret_cookie('backurl'));
}
?>