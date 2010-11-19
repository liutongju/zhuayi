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
	$pagename = '广告编辑';
	$info = $query->one_array("select * from ".T."ads where id =".$_REQUEST['id']);
	switch ($info['type'])
	{
		case "1";
		$info['qiu'] = "<input name='count' type='text' id='count' size='60' value='".$info['count']."'>";
		break;
		case "2";
		$info['qiu'] = "<input name=\"count\" type=\"text\" id=\"count\"  size=\"60\" value=\"".$info['count']."\" ><input type=\"file\" name=\"file1\" id=\"file1\" />";
		break;
		case "3";
		$info['qiu'] = "<input name=\"count\" type=\"text\" id=\"count\"  size=\"60\" value=\"".$info['count']."\" ><input type=\"file\" name=\"file1\" id=\"file1\" />";
		break;
		case "4";
		$info['qiu'] = "<textarea name=\"count\"  id=\"count\" style=\"width:99%; height:70px; overflow:auto;\" >".$info['count']."</textarea>";
		break;
	}
}
else
{
	$pagename = '广告添加';
}
?>