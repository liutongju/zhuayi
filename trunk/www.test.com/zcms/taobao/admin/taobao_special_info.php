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



//----�����ϴ��ļ�
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('taobao_special/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);

//---���л���Ʒ����
$_POST['customize'] = serialize($_POST['taobao']);

if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '����Ա�����Ʒר��';
	$_POST['id'] = $query->save("taobao_special",$_POST);
}
else
{
	$pagename = '�޸��Ա�����Ʒר��';
	
	$query->save("taobao_special",$_POST,' id = '.$_POST['id']);	
}

if (!empty($_POST['request_url']))
{
	$_POST['url'] = $_POST['request_url'];
	$_POST['request_url'] = taobao_special_url($_POST['id']);
	//��Ŀԭʼurl���Զ���urlʱʹ��
}

//---------д��SEO��
seo('taobao_special',$_POST['id']);
	
//---------д����־
admin_log("taobao_special",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>