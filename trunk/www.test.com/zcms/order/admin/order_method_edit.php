<?php
/**
 * admin_edit.php     ZCMS ���ͷ�ʽ�༭�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = '���ͷ�ʽ�༭';
	$info = $query->one_array("select * from ".T."order_method where id =".$_REQUEST['id']);
}
else
{
	$pagename = '���ͷ�ʽ���';
}

?>