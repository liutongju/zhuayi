<?php
/**
 * admin_edit.php     ZCMS 后台文章栏目编辑、添加
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* 验证登录 */
verify_admin('admin_username');

if (!empty($_REQUEST['id']))
{
	$pagename = "分类编辑";
	$info = $query->one_array("select * from ".T."blog_class where id=".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='blog_class' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "分类添加";
}

if (empty($seo['url']))
{
	$seo['url'] = $blog_class_url;
}
?>