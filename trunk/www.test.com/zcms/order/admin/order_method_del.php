<?php
/**
 * admin_del.php     ZCMS 配送方式删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------判断来路ID是否存在
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个菜单..',-1);
}
else
{
	
		//---------写入日志
		admin_log("order_method",$_REQUEST['id'],'title','删除配送方式');

		$query->delete("order_method"," id =".$_REQUEST['id']);
		
		showmsg('删除成功..',ret_cookie('backurl'));
	
}exit;
?>