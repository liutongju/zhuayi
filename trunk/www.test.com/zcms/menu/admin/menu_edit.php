<?php
/**
 * admin_edit.php     ZCMS ��̨�˵���ӡ��༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = "�˵����";
	$info = $query->one_array("select * from ".T."menu where id =".$_REQUEST['id']);
}
else
{
	$pagename = "�˵��༭";
	if (!empty($_REQUEST['parent_id']))
	$info['parent_id'] = $_REQUEST['parent_id'];
	else
	$info['parent_id'] = 0;
}

?>