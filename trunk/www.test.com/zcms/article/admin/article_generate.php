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


if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = implode(",",$_REQUEST['id']);
	$search = ' and id in('.$_REQUEST['id'].')';
}

if ($_REQUEST['act'] == 'class')
{
	$tables = 'article_class';
	$fields = 'classname';
	$zfields = 'cid';
}
if ($_REQUEST['act'] == 'show')
{
	$tables = 'article';
	$fields = 'title';
	$zfields = 'id';
}
$sql = "select id,".$fields." from ".T.$tables." where id >0".$search;$reset = $query->query($sql);while ($row = $query->fetch_array($reset)){	$id[] = $row['id'];	$title[] = addslashes($row[$fields]);}$id =  '"'.implode("\",\"",$id).'"';$title =  '"'.implode("\",\"",$title).'"';



?>