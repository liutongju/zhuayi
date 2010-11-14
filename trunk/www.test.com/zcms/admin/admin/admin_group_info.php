<?php
/**
 * admin_info.php     ZCMS 修改或添加管理员角色
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
	//------写入日志
	admin_log("admin_group",$_REQUEST['id'],'groupname','新增管理员角色');
}
else
{
	$query->save("admin_group",$_POST,' id='.$_REQUEST['id']);
	//------写入日志
	admin_log("admin_group",$_REQUEST['id'],'groupname','编辑管理员角色');
}

showmsg("管理员角色编辑成功",ret_cookie('backurl'));
exit;
?>