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
	$pagename = "�����ؼ��ʱ༭";
	$info = $query->one_array("select * from ".T."search where id =".$_REQUEST['id']);
}
else
{
	$pagename = "�����ؼ������";
}

	
?>