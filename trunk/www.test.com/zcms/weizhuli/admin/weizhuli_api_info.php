<?php
/**
 * admin_info.php     ZCMS 后台菜单入库操作
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	$pagename = '添加微博API';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("weizhuli_api",$_POST);
}
else
{
	$pagename = '修改微博API';
	$query->save("weizhuli_api",$_POST,' id = '.$_POST['id']);

}
/* 写入日志 */
admin_log("weizhuli_api",$_POST['id'],'api_name',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>