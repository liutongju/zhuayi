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
	showmsg('��û��ָ��Ҫɾ���ĸ��˵�..',-1);
}
else
{
	
	/* д����־ */
	admin_log("sms_class",$_REQUEST['id'],'classname','ɾ��������Ŀ');
	$query->delete("sms_class"," id =".$_REQUEST['id']);
	/* -- ɾ������ --*/
	$query->delete("sms"," cid =".$_REQUEST['id']);
	//----ɾ��SEO��
	seo('sms_class',$_REQUEST['id'],'delete');
	showmsg('ɾ���ɹ�..����ȥ���ɻ���',ret_cookie('backurl'));
}
exit;
?>