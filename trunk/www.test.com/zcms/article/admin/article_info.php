<?php
/**
 * admin_info.php     ZCMS 后台文章入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
 
$_POST['dtime'] = strtotime($_POST['dtime']);
//-----判断是否自动提取文章摘要
if ($abstract ==1)
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n/', '',strlens($_POST['body'],0,250))));
}
if (!empty($_REQUEST['jump']))
{
	$_POST['url'] = $_REQUEST['jump'];
}
if (empty($_REQUEST['id']))
{
	$pagename = '添加文章';
	$_POST['id'] = $query->save("article",$_POST);
}
else
{
	$pagename = '修改栏目';
	
	$query->save("article",$_POST,' id = '.$_POST['id']);
	if (!empty($_POST['url']))
	{
		$_POST['request_url'] = article_url($_POST['id']);  //项目原始url，自定义url时使用
	}	//---------写入SEO表
	seo('article',$_POST['id']);	
}
//---------写入日志
admin_log("article",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>