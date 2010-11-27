<?php

function litpic($litpic,$width,$height){
	global $weburl,$pic_cache;
	
	if ($pic_cache == 0)
	{
		//------关闭图片缓存功能
		return $litpic;
	}
	$litpic_tmp = md5(str_replace($weburl,'',$litpic));
	
	$h = strtolower(trim(substr(strrchr($file,'.'),1,100)));
	if ($h !='jpg' && $h !='gif' && $h !='png')
	{
			
		$h= '.jpg';
	}
	else
	{
		$h = '.'.$h;
	}	$litpic_tmp = ZCMS_ROOT.'/data/litpic_tmp/'.$width.'_'.$height.'/'.$litpic_tmp.$h;
	
	if (!file_exists($litpic_tmp))
	{
		//------判断是否远程文件
		if (substr($litpic,0,1)!='/' && substr($litpic,0,strlen($weburl))!=$weburl)
		{
			//------下载图片,如果下载失败会返回原始图片，此处做比较，如果一样则返回原始图片
			$litpic2 =  downfile($litpic,'data/litpic_tmp');
			if ($litpic2 == $litpic)
			{
				return $litpic;
			}
			else
			{
				$litpic = $litpic2;
			}
		}
		$litpic_tmp =  breviary($litpic_tmp,ZCMS_ROOT.$litpic,$width);
		
	}
	return str_replace(ZCMS_ROOT,$weburl,$litpic_tmp);}


function breviary($litpic_tmp,$pic,$logo_w,$logo_g){
	//----------缩小文件，获得图片的宽和高和类型	list($width, $height,$type) = getimagesize($pic);
	
	if ($logo_w>$width)	{		return $pic;	}	elseif($logo_g>=$height)	{		return $pic;	}
		
	//----------如果高为0的话，则按宽的数值等比缩小
	if ($logo_w == 0)
	{
		$logo_w = $width / ($height / $logo_g);
	}
	if ($logo_g == 0)
	{
		$logo_g = $height / ($width / $logo_w);	}
			//-----------这个是PHP规定的	$image_p = imagecreatetruecolor($logo_w, $logo_g);	switch($type)	{ 		case 1:		$image = imagecreatefromgif($pic);		break; 		case 2:		$image = imagecreatefromjpeg($pic);		break; 		case 3:		$image = imagecreatefrompng($pic);		break; 		default:		return $pic;	}	//-------------缩小图片	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $logo_w, $logo_g, $width, $height);		$filename = str_replace(basename($litpic_tmp),'',$litpic_tmp);		if (!file_exists($filename))	{		mkdir($filename,777,true);	}	$filename .= basename($litpic_tmp);	switch($type)//取得图片的格式 	{ 		case 1:		imagegif($image_p, $filename,90);		break; 		case 2:		imagejpeg($image_p, $filename,90);		break; 		case 3:		imagepng($image_p, $filename);		break; 		default:		return $pic;	}
	return $filename; }
?>