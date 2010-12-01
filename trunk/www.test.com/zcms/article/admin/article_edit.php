<?php
/**
 * admin_edit.php     ZCMS 后台文章编辑、添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

if (!empty($_REQUEST['id']))
{
	$pagename = "文章编辑";
	$info = $query->one_array("select * from ".T."article where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "文章添加";
	$info['cid'] = 0;
	$info['dtime'] = time();
	if ($article_generate ==0)
	$seo['url'] = $article_news_url;
	else
	$seo['url'] = $article_generate_path;
}
//------转换来源$source = explode('|',$source);
?>