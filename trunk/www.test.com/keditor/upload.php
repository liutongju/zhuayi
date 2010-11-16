<?php
//require_once('../data/data_cache/function.php');
define('VCMS_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
header('Content-Type: text/html; charset=UTF-8');
$msg = upload($_FILES['imgFile'],'edit/article/'.date("Y-m-d"),time(),0);
if ($msg===false)
{
	$err = '上传失败';
}
else
{
	$err= '0';
	//if (watermark($msg))
	$msg = realpath_url($msg);
}
echo json_encode(array('error' => 0, 'url' => $msg));
exit;


//----上传图片
function upload($file , $imgpath='' , $file3='',$h='')
{
	$size = 1024*1024*10; //----转换为字节，并设置大小
	$f = $file;
	//---------设置存放目录
	//----------如果赋值的文件名为空，那么以短时间戳为文件名
	if (empty($file3))
	$file3 = time();
	
	$filename = VCMS_ROOT.'/upload/'.$imgpath.'/';
	//---------判断存放目录是否为空，否则创建
	if(!file_exists($filename))
	{
		$mk=@mkdir($filename,0777 , true);
		if (empty($mk))
		{
			echo '目录创建失败';
			return false;
		}
	}
	if (empty($h))
	{
		$h = trim(substr(strrchr($f['name'],'.'),1,100)); //--------取的上传文件的后缀
	}
	$filename = $filename.$file3.'.'.$h;	//------------上传后文件所在绝对路径
	//----------判断文件类型
	if ($f["type"]!="image/gif" && $f["type"]!="image/pjpeg"   && $f["type"]!="image/jpeg" && $f["type"]!="application/x-shockwave-flash")
	{
		
		//echo '类型错误';
		return false ;
	}
	//-----------判断文件大小
	elseif($f['size']> $size )
	{
		//echo '文件大小出错';
		return false;
	}
	//-----------拷贝文件到指定目录
	//echo $filename;
	if (!copy($f['tmp_name'],$filename))
	{
		//echo '拷贝出错';
		return false;
	}
	else
	return $filename;
}

/*-----------------根据绝对路径转弯为url---------------*/
function realpath_url($filename)
{
	//return $filename;
	global $weburl;
	if ($filename == '')
	{
		return $filename;
	}
	$filename = realpath($filename); 
	$filename = str_replace(realpath(VCMS_ROOT),$weburl,$filename);
	return str_replace("\\",'/',$filename); 
}
?>