<?php
/**
 * admin_edit.php     ZCMS ºóÌ¨²Ëµ¥Ìí¼Ó¡¢±à¼­
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = "²Ëµ¥±à¼­";
	$info = $query->one_array("select * from ".T."linkage where id =".$_REQUEST['id']);
}
else
{
	$pagename = "²Ëµ¥Ìí¼Ó";
}

if (!empty($_REQUEST['parent_id'])){	$parent = $query->one_array("select * from ".T."linkage where id =".$_REQUEST['parent_id']);	$info['parent'] = $parent['title'];}else{	$info['parent_id'] = 0;	$info['parent'] = '¶¥¼¶²Ëµ¥';}
	
?>