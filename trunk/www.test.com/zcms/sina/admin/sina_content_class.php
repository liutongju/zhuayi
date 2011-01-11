<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */
/* 设置返回URL */
verify_admin('admin_username');
$menu = array(
			array('管理分类','content_class'),
			array('添加分类','content_class_edit&height=150','ajax'),
			array('管理内容','content'),
			array('添加内容','content_edit&height300','ajax'),
			);

$tips = "提示信息带回写。";

set_cookie("backurl",GetCurUrl(),0);

if ($_REQUEST['title'] !=''){	$search .= " and a.title = '".$_REQUEST['title']."'";}
if ($_REQUEST['url'] !='')
{
	$search .= " and a.url = '".$_REQUEST['url']."'";
}

$maxnum = $query->maxnum("select count(*) from ".T."sina_content_class as a where a.id >0 ".$search);
?>