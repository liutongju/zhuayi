<?php
/**
 * admin_info.php     ZCMS �޸Ļ���ӹ���Ա��ɫ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
}
//------д����־
admin_log("admin_group",$_REQUEST['id'],'groupname','ɾ������Ա��ɫ');
$query->delete("admin_group",'id in('.$_REQUEST['id'].')');
showmsg('�ý�ɫɾ���ɹ�...',ret_cookie('backurl'));
?>