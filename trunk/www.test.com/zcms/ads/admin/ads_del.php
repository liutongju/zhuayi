<?php
/**
 * admin_edit.php     ZCMS ��̨�˵���ӡ��༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
}

//-------д����־
admin_log("ads",$_REQUEST['id'],'title','ɾ�����');
$query->delete("ads",'id in('.$_REQUEST['id'].')');
showmsg('���ɾ���ɹ�...',ret_cookie("backurl"));
?>