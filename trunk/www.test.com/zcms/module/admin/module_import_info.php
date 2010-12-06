<?php
/**
 * admin_info.php     ZCMS 后台模块导入 入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 判断是否安装文件 */

$file = $_FILES['file1'];
$h = trim(substr(strrchr($file['name'],'.'),1,100)); /* 取的上传文件的后缀 */
$filename = ZCMS_ROOT.'/data/install_cache/';
if (!file_exists($filename)){	mkdir($filename,777,true);}
$filename .= md5(time()).'.'.$h;
if ($h!='zcms')
{
	showmsg('您选择的不是模块安装文件..','-1');
}
if (!copy($file['tmp_name'],$filename)){	showmsg('上传文件出错..','-1');}
/* 打开上传的文件 */
$con = file_get_contents($filename);
$con = unserialize($con);
/* 查询是否有存在此模块 */
if ($query->maxnum("select count(*) from ".T."module where title='".$con['title']."' and mark='".$con['mark']."'")>0)
{
	showmsg('已经存在此模块，不允许安装',-1);
}
/* 判断安装文件是否正确 */
if (empty($con['title']) && empty($con['mark']))
{
	showmsg('安装文件错误,不允许安装',-1);
}
/* 导入库中 */
$_POST['id'] = $query->save('module',$con);
/* 写入日志 */
admin_log("module",$_POST['id'],'title','导入模块安装文件');
showmsg('导入成功..',ret_cookie('backurl'));
exit;
?>