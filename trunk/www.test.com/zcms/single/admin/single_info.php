<?php
/**
 * admin_info.php     ZCMS ��̨�˵�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ��֤��¼ */
verify_admin('admin_username');
if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '��ӵ�ҳ��';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("single",$_POST);
}
else
{
	$pagename = '�޸ĵ�ҳ��';
	$query->save("single",$_POST,' id = '.$_POST['id']);
	
}
if (!empty($_POST['request_url']))
{
	$_POST['url'] = $_POST['request_url'];
}
else
{
	$_POST['url'] = '/single/show/id/'.$_POST['id'];
}

/* д��SEO�� */
$_POST['request_url'] = '/single/show/id/'.$_POST['id'];
/* ��Ŀԭʼurl���Զ���urlʱʹ�� */

seo('single',$_POST['id']);
/* д����־ */
admin_log("single",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>