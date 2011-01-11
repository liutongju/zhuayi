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


verify_admin('admin_username');
/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('管理任务','task_account&uid='.$_REQUEST['id']),
			array('添加任务','task_account_edit&uid='.$_REQUEST['id'],'ajax'),
			);
$tips = "提示信息带回写。";



?>