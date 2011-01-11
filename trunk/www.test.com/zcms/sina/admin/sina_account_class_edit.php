<?php
/**
 * admin_edit.php     ZCMS 后台文章栏目编辑、添加
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */



if (!empty($_REQUEST['id']))
{
	$info = $query->one_array("select * from ".T."sina_account_class where id =".$_REQUEST['id']);
}


?>