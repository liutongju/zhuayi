<?php
/**
 * admin_del.php     ZCMS 后台菜单删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

//------判断来路ID是否存在
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个直投项目..',-1);
}
else
{
		//---------写入日志
		admin_log("direct",$_REQUEST['id'],'title','删除直投项目');
		$query->delete("direct"," id =".$_REQUEST['id']);	
		showmsg('删除成功..',ret_cookie('backurl'));
}exit;
?>