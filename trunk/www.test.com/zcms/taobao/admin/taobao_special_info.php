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

/* ��֤��¼ */
verify_admin('admin_username');



if (empty($_POST['litpic']) && $_POST['banner']['tpl']!='')
{
	
	header("Content-type: image/jpeg");
	$im = imagecreatefromjpeg($_POST['banner']['tpl']);
	$white = imagecolorallocate($im, 255,255,255);
	$black = imagecolorallocate($im, 0,0,0);
	$test = iconv('gbk','utf-8',$_POST['banner']['title']);
	$test2 = iconv('gbk','utf-8',$_POST['banner']['ftitle']);
	$test3 = iconv('gbk','utf-8',$_POST['banner']['body']);
	imagettftext($im, 30, 0, 71, 190, $white, ZCMS_ROOT.'/zcms/taobao/template/banner_tpl/FZDHTJW.TTF', $test);
	imagettftext($im, 20, 0, 207, 225, $white, ZCMS_ROOT.'/zcms/taobao/template/banner_tpl/msyh.ttf', $test2);
	imagettftext($im, 12, 0, 174, 263, $white, ZCMS_ROOT.'/zcms/taobao/template/banner_tpl/msyh.ttf', $test3);
	$banner_path = '/uploads/tbanner/';
	if (!file_exists(ZCMS_ROOT.$banner_path))
	{
		mkdir(ZCMS_ROOT.$banner_path,777,true);
	}
	imagejpeg($im,ZCMS_ROOT.$banner_path.md5($_POST['banner']['title']).'.jpg',100);
	imagedestroy($im);
	$_POST['litpic'] = $banner_path.md5($_POST['banner']['title']).'.jpg';
}
$_POST['banner'] = serialize($_POST['banner']);

$_POST['dtime'] = strtotime($_POST['dtime']);

/* ���л���Ʒ���� */
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
	/* ��Ŀԭʼurl���Զ���urlʱʹ�� */
}

/* д��SEO�� */
seo('taobao_special',$_POST['id']);
	
/* д����־ */
admin_log("taobao_special",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>