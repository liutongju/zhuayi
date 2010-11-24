<?php

function litpic($litpic,$width,$height){
	global $weburl;
	$litpic = str_replace($weburl,'',$litpic);
	$litpic_tmp = ZCMS_ROOT.'/data/litpic_tmp/'.$width.'_'.$height.$litpic;
	if (!file_exists($litpic_tmp))
	{
		$litpic =  breviary($litpic_tmp,ZCMS_ROOT.$litpic,'500');
	}
	return str_replace(ZCMS_ROOT,$weburl,$litpic);}


function breviary($litpic_tmp,$pic,$logo_w,$logo_g){
	//----------缩小文件，获得图片的宽和高和类型	list($width, $height,$type) = getimagesize($pic);
	if ($logo_w>=$width)	{		return $pic;	}	elseif($logo_g>=$height)	{		return $pic;	}
		
	//----------如果高为0的话，则按宽的数值等比缩小
	if ($logo_w == 0)
	{
		$logo_w = $width / ($height / $logo_g);
	}
	if ($logo_g == 0)
	{
		$logo_g = $height / ($width / $logo_w);	}
			//-----------这个是PHP规定的	$image_p = imagecreatetruecolor($logo_w, $logo_g);	switch($type)	{ 		case 1:		$image = imagecreatefromgif($pic);		break; 		case 2:		$image = imagecreatefromjpeg($pic);		break; 		case 3:		$image = imagecreatefrompng($pic);		break; 		default:		return $pic;	}	//-------------缩小图片	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $logo_w, $logo_g, $width, $height);		$filename = str_replace(basename($litpic_tmp),'',$litpic_tmp);		if (!file_exists($filename))	{		mkdir($filename,777,true);	}	$filename .= basename($pic);		switch($type)//取得图片的格式 	{ 		case 1:		imagegif($image_p, $filename,90);		break; 		case 2:		imagejpeg($image_p, $filename,90);		break; 		case 3:		imagepng($image_p, $filename);		break; 		default:		return $pic;	}
	return $filename; }
?>