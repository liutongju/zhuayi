<?php
/**
 * admin_info.php     ZCMS 配送方式入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加配送方式';
	$_POST['id'] = $query->save("order_method",$_POST);
}
else
{
	$pagename = '修改配送方式';
	$query->save("order_method",$_POST,' id = '.$_POST['id']);
	
}
//---------写入日志
admin_log("order_method",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>