<?php
//------����Զ�̸���
function downfile($file,$path,$width='',$height='')
{
	global $upload,$weburl;
	
	if (!empty($file) && substr($file,0,1)== '/' && substr($file,0,strlen($weburl))== $weburl)
	{
		return $file;
	}
	if (empty($upload))
	{
		include_once ZCMS_ROOT.'/class/upload.class.php';
		$upload = new upload();
	}

	//----�õ��ļ���
	$h = strtolower(trim(substr(strrchr($file,'.'),1,100)));
	$filename = ZCMS_ROOT.UPLOAD_PATH.$path.'/'.time().'.'.$h;
	
	//----Զ�̻�ȡ
	$picbody = file_get_contents($file);
	
	//----д��
	write($filename,$picbody);
	
	//---����
	if ($h !='jpg' && $h !='gif' && $h !='png')
	{
		return str_replace(ZCMS_ROOT,'',$filename);
	}
	else
	{
		if (!empty($width) || !empty($height))
		{
			return $upload->breviary($width,$height,$filename);
		}
		return $upload->mark($filename);
	}
}


?>