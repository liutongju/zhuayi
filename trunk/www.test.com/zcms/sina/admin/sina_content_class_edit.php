<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ���÷���URL */
if (!empty($_REQUEST['id']))
{
	$pagename = "������Ŀ�༭";
	$info = $query->one_array("select * from ".T."sina_content_class where id =".$_REQUEST['id']);
}
else
{
	$pagename = "������Ŀ���";
}

?>