<?php
/**
 * admin_del.php     ZCMS ��̨��Ʒɾ��
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
	
	
	$query->delete("taobao"," id in (".$_REQUEST['id'].")");
	//----ɾ��SEO��
	seo('taobao',$_REQUEST['id'],'delete');
	//---------д����־
	admin_log("taobao",$_REQUEST['id'],'title','ɾ���Ա�����Ʒ');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>