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
	$pagename = '��Ӷ�������';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("sms_task",$_POST);
}
else
{
	$pagename = '�༭��������';
	$query->save("sms_task",$_POST,' id = '.$_POST['id']);
}


/* д����־ */
admin_log("sms_task",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>