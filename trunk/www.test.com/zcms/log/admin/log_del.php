<?php
/**
 * admin_del.php     ZCMS ��̨��־ɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	$search = 'id in('.$_REQUEST['id'].')';
}
elseif (empty($_REQUEST['id']))
{
	$search = 'id > 0';
}
//---------д����־
admin_log("log",$_REQUEST['id'],'log','ɾ��������־');
$query->delete("log",$search);
showmsg('����־ɾ���ɹ�...',ret_cookie('backurl'));exit;
?>