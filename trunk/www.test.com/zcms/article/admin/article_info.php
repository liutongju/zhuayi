<?php
/**
 * admin_info.php     ZCMS ��̨����������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');
 
$_POST['dtime'] = strtotime($_POST['dtime']);
//-----�ж��Ƿ��Զ���ȡ����ժҪ
if ($abstract ==1)
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n/', '',strlens($_POST['body'],0,250))));
}
if (!empty($_REQUEST['jump']))
{
	$_POST['url'] = $_REQUEST['jump'];
}
if (empty($_REQUEST['id']))
{
	$pagename = '�������';
	$_POST['id'] = $query->save("article",$_POST);
}
else
{
	$pagename = '�޸���Ŀ';
	
	$query->save("article",$_POST,' id = '.$_POST['id']);
	if (!empty($_POST['url']))
	{
		$_POST['request_url'] = article_url($_POST['id']);  //��Ŀԭʼurl���Զ���urlʱʹ��
	}	//---------д��SEO��
	seo('article',$_POST['id']);	
}
//---------д����־
admin_log("article",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>