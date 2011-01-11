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


/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('管理分组','account_class'),
			array('添加分组','account_class_edit&height=230','ajax'),

			);
$tips = "每个分组必须绑定管理员";
?>