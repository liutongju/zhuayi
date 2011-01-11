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
/* 验证登录 */

if (!empty($_REQUEST['username']))
{
	$search .= " and concat(a.username,a.nick) like '%".$_REQUEST['username']."%'";
}

if (!empty($_REQUEST['cid']))
{
	$search .= " and a.cid = '".$_REQUEST['cid']."'";
}
if ($_REQUEST['status']!='')
{
	$search .= " and a.status like '".$_REQUEST['status']."'";
}

if ($_REQUEST['litpic'] == '1')
{
	$search .= " and a.litpic <> ''";
}
elseif ($_REQUEST['litpic'] == '0')
{
	$search .= " and a.litpic = ''";
}

if ($_REQUEST['login'] == '1')
{
	$search .= " and a.cookie <> ''";
}
elseif ($_REQUEST['login'] == '0')
{
	$search .= " and a.cookie = ''";
}
$maxnum = $query->maxnum("select count(*) from ".T."sina_account as a  where a.id>0".$search.$my);


?>