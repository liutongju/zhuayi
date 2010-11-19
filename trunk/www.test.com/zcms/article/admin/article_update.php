<?php
/**
 * admin_info.php     ZCMS 后台文章入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

if (!is_array($_REQUEST['id']))
{
	showmsg('您没有选择信息',-1);
}
$_REQUEST['id'] = implode(',',$_REQUEST['id']);


if ($_REQUEST['action'] == 'flag')
$query->query("update ".T."article set flag = concat(replace(flag,'".$_REQUEST['tuisong']."',''),',".$_REQUEST['tuisong']."') where id in (".$_REQUEST['id'].")");
elseif ($_REQUEST['action'] == 'cid')
$query->query("update ".T."article set cid = '".$_REQUEST['yidong']."' where id in (".$_REQUEST['id'].")");

showmsg('恭喜你，操作成功',ret_cookie('backurl'));
?>