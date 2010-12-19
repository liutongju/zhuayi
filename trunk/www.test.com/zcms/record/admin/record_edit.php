<?php
/**
 * admin_edit.php     ZCMS ²Ëµ¥Ìí¼Ó¡¢±à¼­
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = "±à¼­ÍøÕ¾";
	$info = $query->one_array("select * from ".T."record where id =".$_REQUEST['id']);
}
else
{
	$pagename = "Ìí¼ÓÍøÕ¾";
	$info['uid'] = ret_cookie('admin_userid');
	$info['icon'] = '/zcms/record/template/images/icon/7.png';
}

?>