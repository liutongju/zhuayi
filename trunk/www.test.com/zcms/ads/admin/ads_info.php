<?php
/**
 * admin_edit.php     ZCMS 后台菜单添加、编辑
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
	$pagename = '广告添加';
	$_REQUEST['dtime'] = time();
	$_REQUEST['id'] = $query->save("ads",$_POST);
}
else
{
	$pagename = '广告编辑';
	$query->save("ads",$_POST,' id = '.$_REQUEST['id']);
	
}
//-------写入日志
admin_log("ads",$_REQUEST['id'],'title',$pagename);
showmsg("广告位编辑成功...",ret_cookie("backurl"));
exit;
?>