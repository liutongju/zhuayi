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
/* ��֤��¼ */
verify_admin('admin_username');
/* �ж���·ID�Ƿ���� */
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ�����..',-1);
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	$query->delete("single"," id in (".$_REQUEST['id'].")");
	/* д����־ */
	admin_log("single",$_REQUEST['id'],'title','ɾ����ҳ��');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>