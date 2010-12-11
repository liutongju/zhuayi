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


if (!empty($_REQUEST['id']))
{
	$pagename = "编辑短信任务";
	$info = $query->one_array("select * from ".T."sms_task where id =".$_REQUEST['id']);
}
else
{
	$pagename = "添加短信任务";
	$info['cid'] = 0;
}
?>