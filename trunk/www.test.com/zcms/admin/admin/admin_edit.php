<?php
/**
 * admin_info.php     ZCMS 修改或添加管理员
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */


if (!empty($_REQUEST['id']))
{
	$pagename = '帐号修改';
	$info = $query->one_array("select * from ".T."admin where id ='".$_REQUEST['id']."'");
}
else
{
	$pagename = '帐号添加';
}
?>