<?php
/**
 * admin_edit.php     ZCMS 验证码规则编辑和添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = "验证码添加";
	$info = $query->one_array("select * from ".T."checkcode where id =".$_REQUEST['id']);
	$info['rule'] = unserialize($info['rule']);
}
else
{
	$pagename = "验证码编辑";
;
}

?>