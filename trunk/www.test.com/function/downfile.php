<?php
//------����Զ�̸���
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
	//----�õ��ļ���
	$filename = ZCMS_ROOT.UPLOAD_PATH.$path.'/'.md5($file).'.'.$upload->h($file);
	
	//----Զ�̻�ȡ
	$ctx = stream_context_create(array('http' => array('timeout' => 1)));
	$picbody = @file_get_contents($file,false, $ctx);

	if (!empty($picbody))
	{
		//----д��
		write($filename,$picbody);
		$upload->request = $filename;
	}
	else
	{
		return $upload->request;
	}
	//---����
	return $upload->mark($filename);
}


?>