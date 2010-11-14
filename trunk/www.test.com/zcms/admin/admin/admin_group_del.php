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
if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
}
//------写入日志
admin_log("admin_group",$_REQUEST['id'],'groupname','删除管理员角色');
$query->delete("admin_group",'id in('.$_REQUEST['id'].')');
showmsg('该角色删除成功...',ret_cookie('backurl'));
?>