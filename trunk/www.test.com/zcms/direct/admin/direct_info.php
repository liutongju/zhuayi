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

//-------��֤��¼
verify_admin('admin_username');

$_POST['start_time'] = strtotime($_POST['start_time']);
$_POST['end_time'] = strtotime($_POST['end_time']);
if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '���ֱͶ��Ŀ';
	$_POST['id'] = $query->save("direct",$_POST);
}
else
{
	$pagename = '�޸�ֱͶ��Ŀ';
	
	$query->save("direct",$_POST,' id = '.$_POST['id']);
}
if (!empty($_POST['url']))
{
	$_POST['request_url'] = direct_url($_POST['id']);  //��Ŀԭʼurl���Զ���urlʱʹ��
}
//---------д��SEO��
seo('direct',$_POST['id']);
//---------д����־
admin_log("direct",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>