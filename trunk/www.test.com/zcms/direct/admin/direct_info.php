<?php
/**
 * admin_info.php     ZCMS 后台菜单入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

$_POST['start_time'] = strtotime($_POST['start_time']);
$_POST['end_time'] = strtotime($_POST['end_time']);
if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '添加直投项目';
	$_POST['id'] = $query->save("direct",$_POST);
}
else
{
	$pagename = '修改直投项目';
	
	$query->save("direct",$_POST,' id = '.$_POST['id']);
}
if (!empty($_POST['url']))
{
	$_POST['request_url'] = direct_url($_POST['id']);  //项目原始url，自定义url时使用
}
//---------写入SEO表
seo('direct',$_POST['id']);
//---------写入日志
admin_log("direct",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>