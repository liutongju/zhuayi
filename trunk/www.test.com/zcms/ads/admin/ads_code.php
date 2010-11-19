<?php
/**
 * admin_edit.php     ZCMS 后台菜单添加、编辑
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

$pagename = '调用代码';

if (empty($_REQUEST['id']))
{
	showmsg('错误的来源地址','-1');
	exit;
}
$info = $query->one_array("select * from ".T."ads where id =".$_REQUEST['id']);
$info['count'] = '<script type="text/javascript" src="'.$weburl.'/index.php?m=ads&c=show&id='.$_REQUEST['id'].'"></script>';


?>