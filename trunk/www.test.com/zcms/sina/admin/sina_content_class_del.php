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
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	$query->delete("sina_content_class"," id in (".$_REQUEST['id'].")");
	/* д����־ */
	admin_log("sina_content_class",$_REQUEST['id'],'title','ɾ��΢��������Ŀ');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>