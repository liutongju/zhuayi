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
	$pagename = '��ӷ���';
	$_POST['id'] = $query->save("sms_class",$_POST);
}
else
{
	$pagename = '�༭����';
	$query->save("sms_class",$_POST,' id = '.$_POST['id']);
}


/* д����־ */
admin_log("sms_class",$_POST['id'],'classname',$pagename);
showmsg('��ϲ��,�����ɹ�..����ȥ���ɻ���',ret_cookie('backurl'));
?>