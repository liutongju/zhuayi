<?php
/**
 * admin_edit.php     ZCMS ��̨������Ŀ�༭�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');

if (!empty($_REQUEST['id']))
{
	$pagename = "��Ŀ�༭";
	$info = $query->one_array("select * from ".T."taobao_class where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='taobao_class' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "��Ŀ���";
	if (!empty($_REQUEST['parent_id']))
	$info['parent_id'] = $_REQUEST['parent_id'];
	else
	$info['parent_id'] = 0;
	
	//$seo['url'] = $article_class_url;
	
}

?>