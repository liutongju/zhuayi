<?php
/**
 * admin_edit.php     ZCMS 直投添加和编辑
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 
if (!empty($_REQUEST['id']))
{
	$pagename = "直投项目编辑";
	$info = $query->one_array("select * from ".T."direct where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='direct' and aid=".$_REQUEST['id']);
}
else
{
	exit('错误的来源');
}

?>