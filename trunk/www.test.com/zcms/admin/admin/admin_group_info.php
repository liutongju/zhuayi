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
$_POST['purview'] = implode(',',$_POST['purview']);

if (empty($_REQUEST['id']))
{
	$_REQUEST['id'] = $query->save("admin_group",$_POST);
	//------д����־
	admin_log("admin_group",$_REQUEST['id'],'groupname','��������Ա��ɫ');
}
else
{
	$query->save("admin_group",$_POST,' id='.$_REQUEST['id']);
	//------д����־
	admin_log("admin_group",$_REQUEST['id'],'groupname','�༭����Ա��ɫ');
}

showmsg("����Ա��ɫ�༭�ɹ�",ret_cookie('backurl'));
exit;
?>