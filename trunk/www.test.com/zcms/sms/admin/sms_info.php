<?php
/**
 * admin_info.php     ZCMS ��̨������Ŀ������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 

if (empty($_REQUEST['id']))
{
	$pagename = '��Ӻ���';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("sms",$_POST);
}
else
{
	$pagename = '�༭����';
	$query->save("sms",$_POST,' id = '.$_POST['id']);
}


/* д����־ */
admin_log("sms",$_POST['id'],'sms',$pagename);
showmsg('��ϲ��,�����ɹ�..����ȥ���ɻ���',ret_cookie('backurl'));
?>