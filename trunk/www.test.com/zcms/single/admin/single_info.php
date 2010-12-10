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
/* 验证登录 */
verify_admin('admin_username');
if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加单页面';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("single",$_POST);
}
else
{
	$pagename = '修改单页面';
	$query->save("single",$_POST,' id = '.$_POST['id']);
	
}
if (!empty($_POST['request_url']))
{
	$_POST['url'] = $_POST['request_url'];
}
else
{
	$_POST['url'] = '/single/show/id/'.$_POST['id'];
}

/* 写入SEO表 */
$_POST['request_url'] = '/single/show/id/'.$_POST['id'];
/* 项目原始url，自定义url时使用 */

seo('single',$_POST['id']);
/* 写入日志 */
admin_log("single",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>