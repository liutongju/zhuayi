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

if (!empty($_REQUEST['id']))
{
	$pagename = "���±༭";
	$info = $query->one_array("select * from ".T."article where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "�������";
	$info['cid'] = 0;
	$info['dtime'] = time();
	if ($article_generate ==0)
	$seo['url'] = $article_news_url;
	else
	$seo['url'] = $article_generate_path;
}
//------ת����Դ$source = explode('|',$source);
?>