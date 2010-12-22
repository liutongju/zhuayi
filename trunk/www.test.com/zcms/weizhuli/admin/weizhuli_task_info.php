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
$_POST['timeing'] = strtotime($_POST['timeing']);
if (empty($_REQUEST['id']))
{
	$pagename = '添加任务';

	$_POST['id'] = $query->save("weizhuli_task",$_POST);
}
else
{
	$pagename = '修改任务';
	$query->save("weizhuli_task",$_POST,' id = '.$_POST['id']);

}
/* 写入日志 */
admin_log("weizhuli_task",$_POST['id'],'task',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>