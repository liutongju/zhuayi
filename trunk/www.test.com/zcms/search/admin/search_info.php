<?php
/**
 * admin_info.php     ZCMS ��̨�˵�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '��������ؼ���';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("search",$_POST);
}
else
{
	$pagename = '�޸������ؼ���';
	$query->save("search",$_POST,' id = '.$_POST['id']);
	
}
/* д����־ */
admin_log("search",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>