<?php
/**
 * admin_edit.php     ZCMS ��̨���±༭�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');


if (is_array($_REQUEST['id']))
{
	$_REQUEST['id'] = implode(",",$_REQUEST['id']);
	$search = ' and id in('.$_REQUEST['id'].')';
}

$sql = "select id,title from ".T."article where id >0".$search;$reset = $query->query($sql);while ($row = $query->fetch_array($reset)){	$id[] = $row['id'];	$title[] = addslashes($row['title']);}$id =  '"'.implode("\",\"",$id).'"';$title =  '"'.implode("\",\"",$title).'"';



?>