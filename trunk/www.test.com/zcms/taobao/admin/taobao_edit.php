<?php
/**
 * admin_edit.php     ZCMS ��̨��Ʒ�༭�����
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
	$pagename = "��Ʒ�༭";
	$info = $query->one_array("select * from ".T."taobao where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='taobao' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "��Ʒ���";
	$info['cid'] = 0;
	$info['dtime'] = time();
	$seo['url'] = $taobao_news_url;
}



?>