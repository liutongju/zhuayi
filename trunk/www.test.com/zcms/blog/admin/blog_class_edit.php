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

/* ��֤��¼ */
verify_admin('admin_username');

if (!empty($_REQUEST['id']))
{
	$pagename = "����༭";
	$info = $query->one_array("select * from ".T."blog_class where id=".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='blog_class' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "�������";
}

if (empty($seo['url']))
{
	$seo['url'] = $blog_class_url;
}
?>