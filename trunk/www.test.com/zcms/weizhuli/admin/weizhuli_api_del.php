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
	showmsg('��û��ָ��Ҫɾ���ĸ�΢���ӿ�..',-1);
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	$query->delete("weizhuli_api"," id in (".$_REQUEST['id'].")");
	/* д����־ */
	admin_log("weizhuli_api",$_REQUEST['id'],'api_name','ɾ��΢���ӿ�');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>