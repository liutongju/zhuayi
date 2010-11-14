<?php
/**
 * admin_edit.php     ZCMS 后台菜单添加、编辑
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$info = $query->one_array("select a.*,b.title as method_title,b.api as method_api from ".T."order as a left join ".T."order_method as b on a.method = b.id where a.id =".$_REQUEST['id']);
	$info['consignee'] = unserialize($info['consignee']);
	
	$info['product'] = unserialize($info['product']);

	
}
else
{
	showmsg('错误的来源..',-1);
}

?>