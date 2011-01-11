<?php
/**
 * admin_info.php     ZCMS 后台文章栏目入库操作
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */


if (empty($_REQUEST['id']))
{
	$_POST['id'] = $query->save("sina_account_class",$_POST);
}
else
{
	$query->save("sina_account_class",$_POST,' id = '.$_POST['id']);

}

showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>