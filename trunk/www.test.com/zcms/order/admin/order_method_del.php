<?php
/**
 * admin_del.php     ZCMS ���ͷ�ʽɾ��
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
	showmsg('��û��ָ��Ҫɾ���ĸ��˵�..',-1);
}
else
{
	
		//---------д����־
		admin_log("order_method",$_REQUEST['id'],'title','ɾ�����ͷ�ʽ');

		$query->delete("order_method"," id =".$_REQUEST['id']);
		
		showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
	
}exit;
?>