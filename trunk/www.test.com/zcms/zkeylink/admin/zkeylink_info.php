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

if (!empty($_REQUEST['id']))
{
	$search = ' and id <>'.$_REQUEST['id'];
}if ($query->maxnum("select count(*) from ".T."keylink where title ='".$_POST['title']."'".$search)>0)
{
	showmsg('�ؼ����ظ���',-1);
}
if (empty($_REQUEST['id']))
{
	
	$pagename = '�����վ������';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("keylink",$_POST);
}
else
{
	$pagename = '�޸���վ������';
	$query->save("keylink",$_POST,' id = '.$_POST['id']);
	
}
//---------д����־
admin_log("keylink",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>