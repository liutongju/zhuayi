<?php
/**
 * admin_info.php     ZCMS ��̨��Ʒ������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');

//-------���л�����λ
$_POST['flag'] = implode('|',$_POST['flag']);

//----�����ϴ��ļ�
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('taobao/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);


if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '����Ա�����Ʒ';
	$_POST['id'] = $query->save("taobao",$_POST);
}
else
{
	$pagename = '�޸��Ա�����Ʒ';
	
	$query->save("taobao",$_POST,' id = '.$_POST['id']);	
}

if (!empty($_POST['url'])){	$_POST['request_url'] = taobao_url($_POST['id']);  //��Ŀԭʼurl���Զ���urlʱʹ��}//---------д��SEO��seo('taobao',$_POST['id']);
	
//---------д����־
admin_log("taobao",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>