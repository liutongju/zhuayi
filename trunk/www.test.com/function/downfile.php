<?php
//------下载远程附件
function downfile($file,$path)
{
	global $upload,$weburl,$i;
	$i++;
	
	if (empty($file) || substr($file,0,1)== '/' || substr($file,0,strlen($weburl))== $weburl)
	{
		return $file;
	}

	if (empty($upload))
	{
		include_once ZCMS_ROOT.'/class/upload.class.php';
		$upload = new upload();
		
	}
	$upload->request = $file;
	//----得到文件名
	$filename = ZCMS_ROOT.UPLOAD_PATH.$path.'/'.md5($file).'.'.$upload->h($file);
	
	//----远程获取
	$ctx = stream_context_create(array('http' => array('timeout' => 1)));
	$picbody = @file_get_contents($file,false, $ctx);

	if (!empty($picbody))
	{
		//----写入
		write($filename,$picbody);
		$upload->request = $filename;
	}
	else
	{
		return $upload->request;
	}
	//---返回
	return $upload->mark($filename);
}


?>