<?php
/**
 * admin_del.php     ZCMS 后台文章栏目删除
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */

/* 判断来路ID是否存在 */
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个博客分类..',-1);
}
else
{

	/* 写入日志 */
	admin_log("blog_class",$_REQUEST['id'],'classname','删除博客分类');

	$query->delete("blog_class"," id =".$_REQUEST['id']);

	/* -- 删除文章 --*/
	$query->delete("blog"," cid =".$_REQUEST['id']);
	//----删除SEO表
	seo('blog_class',$_REQUEST['id'],'delete');
	showmsg('删除成功',ret_cookie('backurl'));
}
exit;
?>