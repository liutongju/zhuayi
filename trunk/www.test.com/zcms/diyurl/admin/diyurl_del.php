<?php
/**
 * admin_del.php     ZCMS ��̨�Զ���URLɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------�ж���·ID�Ƿ����
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
	$query->delete("seo"," id in (".$_REQUEST['id'].")");
	//---------д����־
	admin_log("seo",$_REQUEST['id'],'url','ɾ����������');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}
?>