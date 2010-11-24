<?php
/**
 * admin_info.php     ZCMS 后台商品入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

//-------序列化推送位
$_POST['flag'] = implode('|',$_POST['flag']);

//----处理上传文件
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('taobao/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);


if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '添加淘宝客商品';
	$_POST['id'] = $query->save("taobao",$_POST);
}
else
{
	$pagename = '修改淘宝客商品';
	
	$query->save("taobao",$_POST,' id = '.$_POST['id']);	
}

if (!empty($_POST['url'])){	$_POST['request_url'] = taobao_url($_POST['id']);  //项目原始url，自定义url时使用}//---------写入SEO表seo('taobao',$_POST['id']);
	
//---------写入日志
admin_log("taobao",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>