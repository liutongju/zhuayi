<?php
/**
 * admin_info.php     ZCMS ��̨�Զ���URL������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	$pagename = '����Զ���URL';
	$_POST['id'] = $query->save("seo",$_POST);
}
else
{
	$pagename = '�޸��Զ���URL';
	$query->save("seo",$_POST,' id = '.$_POST['id']);
	
}
/* д����־ */
admin_log("seo",$_POST['id'],'url',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>