<?php
/**
 * admin_del.php     ZCMS 后台菜单删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 判断来路ID是否存在 */
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个菜单..',-1);
}
else
{
	/* 查询全部数组 */
	$array = $query->arrays("select * from ".T."linkage");
	$tree = tree($array,'parent_id',$_REQUEST['id']);
	foreach ($tree as $val)
	{
		$id[] = $val['id'];
	}
	$id = implode(',',$id);
	if (!empty($id))
	$query->delete("linkage"," id in (".$id.")");
	/* -写入日志 */
	admin_log("linkage",$_REQUEST['id'],'title','删除后台菜单');

	$query->delete("linkage"," id =".$_REQUEST['id']);
		
	showmsg('删除成功..',ret_cookie('backurl'));
	
}exit;
?>