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

//-------��֤��¼
verify_admin('admin_username');

//------�ж���·ID�Ƿ����
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ�ֱͶ��Ŀ..',-1);
}
else
{
		//---------д����־
		admin_log("direct",$_REQUEST['id'],'title','ɾ��ֱͶ��Ŀ');
		$query->delete("direct"," id =".$_REQUEST['id']);	
		showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>