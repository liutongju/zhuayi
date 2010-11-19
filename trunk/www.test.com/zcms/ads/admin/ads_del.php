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

if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
}

//-------写入日志
admin_log("ads",$_REQUEST['id'],'title','删除广告');
$query->delete("ads",'id in('.$_REQUEST['id'].')');
showmsg('广告删除成功...',ret_cookie("backurl"));
?>