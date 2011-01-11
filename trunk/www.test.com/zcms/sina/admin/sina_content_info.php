<?php
/**
 * admin_info.php     ZCMS 后台菜单入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加微博内容';
	$_POST['dtime'] = time();
	$_POST['uid'] = ret_cookie('admin_userid');
	$_POST['tags'] = str_replace('，',',',$_POST['tags']);
	if($_GET['body']){
		$_POST['body'] = urldecode($_REQUEST['body']);
		if(is_utf8($_POST['body'])){
			$_POST['body'] = iconv('utf-8','gb2312',$_POST['body']);
		}
		$_POST['id'] = $query->save("sina_content",$_POST);
		echo '<script>window.close();</script>';
		exit();
	}

	$_POST['fbtime'] = mktime($_POST['jidian'], $_POST['jifen'], $_POST['jimiao'], date('m'), date("d")+$_POST['jitian'], date('Y'));
	if($_POST['fbtime'] < time()){
		$_POST['fbtime'] =$_POST['fbtime'] + 86400;
	}

	$_POST['id'] = $query->save("sina_content",$_POST);
}
else
{
	$pagename = '修改微博内容';
	$_POST['tags'] = str_replace('，',',',$_POST['tags']);
	$query->save("sina_content",$_POST,' id = '.$_POST['id']);
	
}
/* 写入日志 */
admin_log("sina_content",$_POST['id'],'新浪微博内容',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));


function is_utf8($word)    
{    
    if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)    
    {    
    return true;    
    }    
    else    
    {    
    return false;    
    }    
  
} 
?>