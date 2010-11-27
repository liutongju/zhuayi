<?php
//-----定义ZCMS根目录路径
define('ZCMS_ROOT', $_SERVER['DOCUMENT_ROOT']);

header('Content-Type: text/html; charset=UTF-8');

//----处理上传文件
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['imgFile']);

$msg = $upload->copy('article/edit',time());

if ($msg===false)
{
	$err = '上传失败';
}
else
{
	$err= '0';
}
echo json_encode(array('error' => 0, 'url' => $msg));
exit;
?>