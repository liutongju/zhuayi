<?php
/**
 * admin_info.php     ZCMS ��֤��������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

$_POST['rule'] = serialize($_POST['rule']); 
if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '�����֤�����';
	$_POST['id'] = $query->save("checkcode",$_POST);
}
else
{
	$pagename = '�޸���֤�����';
	$query->save("checkcode",$_POST,' id = '.$_POST['id']);
	
}
//---------д����־
admin_log("checkcode",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>