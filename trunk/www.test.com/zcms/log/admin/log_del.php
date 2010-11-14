<?php
/**
 * admin_del.php     ZCMS 后台日志删除
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
//---------写入日志
admin_log("log",$_REQUEST['id'],'log','删除操作日志');
$query->delete("log",$search);
showmsg('该日志删除成功...',ret_cookie('backurl'));exit;
?>