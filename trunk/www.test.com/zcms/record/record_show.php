<?php
/**
 * admin_global.php     ZCMS 后台管理面板,
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */


/* 判断类型 */

$info = $query->one_array("select * from ".T."record where id =".$_REQUEST['id']);
if ($info['type'] == 'swf')
{
	$_REQUEST['c_file'] =ZCMS_ROOT.'/zcms/record/template/swf.html';
}
if ($info['type'] == 'mp3')
{
	$_REQUEST['c_file'] =ZCMS_ROOT.'/zcms/record/template/mp3.html';
}
if ($info['type'] == 'img')
{
	$_REQUEST['c_file'] =ZCMS_ROOT.'/zcms/record/template/img.html';
}
if ($info['type'] == 'text')
{
	$_REQUEST['c_file'] =ZCMS_ROOT.'/zcms/record/template/text.html';
}
?>