<?php
/**
 * admin_edit.php     ZCMS ֱͶ��Ӻͱ༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 
if (!empty($_REQUEST['id']))
{
	$pagename = "ֱͶ��Ŀ�༭";
	$info = $query->one_array("select * from ".T."direct where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='direct' and aid=".$_REQUEST['id']);
}
else
{
	exit('�������Դ');
}

?>