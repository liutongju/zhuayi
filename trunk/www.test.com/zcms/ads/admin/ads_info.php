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

if ($_REQUEST['type'] ==2 || $_REQUEST['type'] ==3)
{
	include_once ZCMS_ROOT.'/class/upload.class.php';
	$upload = new upload($_FILES['file1']);
	$upload->mark_false();
	$upload->request = $_POST['count'];
	$_POST['count'] = $upload->copy('ads',time());
}

if (empty($_REQUEST['id']))
{
	$pagename = '������';
	$_REQUEST['dtime'] = time();
	$_REQUEST['id'] = $query->save("ads",$_POST);
}
else
{
	$pagename = '���༭';
	$query->save("ads",$_POST,' id = '.$_REQUEST['id']);
	
}
//-------д����־
admin_log("ads",$_REQUEST['id'],'title',$pagename);
showmsg("���λ�༭�ɹ�...",ret_cookie("backurl"));
exit;
?>