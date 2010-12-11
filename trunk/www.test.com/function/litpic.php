<?php
function litpic($litpic,$width=0,$height=0)
{
	global $weburl,$pic_cache;
	
	if ($pic_cache == 0)
	{
		/* �ر�ͼƬ���湦�� */
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
		/* �ж��Ƿ�Զ���ļ� */
		if (substr($litpic,0,1)!='/' && substr($litpic,0,strlen($weburl))!=$weburl)
		{
			/* ����ͼƬ,�������ʧ�ܻ᷵��ԭʼͼƬ���˴����Ƚϣ����һ���򷵻�ԭʼͼƬ */
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
		$litpic_tmp =  breviary($litpic_tmp,ZCMS_ROOT.$litpic,$width,$height,$cut);
		
	}
	return str_replace(ZCMS_ROOT,$weburl,$litpic_tmp);}

/*
	���ͬʱ�����Ⱥ͸߶�,����вü�
*/
function breviary($litpic_tmp,$pic,$logo_w,$logo_g)
{
	/* ����Ҫ�ü���ͼƬ��С */
	$cut_w = $logo_w;
	$cut_h = $logo_g;
	/* ----------��С�ļ������ͼƬ�Ŀ�͸ߺ����� */
	list($width, $height,$type) = getimagesize($pic);

	if ($logo_w>$width)
	{
		return $pic;
	}
	elseif($logo_g>=$height)
	{
		return $pic;
	}        
	/* ----------�����Ϊ0�Ļ����򰴿����ֵ�ȱ���С */

	if ($logo_w < $logo_g)
	{
		$logo_w = $width / ($height / $logo_g);
	}
	//if ($logo_g == 0)
	else
	{
		$logo_g = $height / ($width / $logo_w);
	}
	
	/* �ж��Ƿ���Ҫ����ͼƬ*/
	if ($logo_w < $cut_w)
	{
		$logo_w = $cut_w;
		$logo_g = $height / ($width / $logo_w);
	} 
	if ($logo_g < $cut_h)
	{
		$logo_g = $cut_h;
		$logo_w = $width / ($height / $logo_g);
	}

	/* -----------�����PHP�涨�� */
	$image_p = imagecreatetruecolor($logo_w, $logo_g);
	switch($type)
	{ 
		case 1:
		$image = imagecreatefromgif($pic);
		break; 
		case 2:
		$image = imagecreatefromjpeg($pic);
		break; 
		case 3:
		$image = imagecreatefrompng($pic);
		break; 
		default:
		return $pic;
	}
	/* -------------��СͼƬ */
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $logo_w, $logo_g, $width, $height);

	$filename = str_replace(basename($litpic_tmp),'',$litpic_tmp);

	if (!file_exists($filename))
	{
		mkdir($filename,777,true);
	}
	$filename .= basename($litpic_tmp);
	switch($type)
	{ 
		case 1:
		imagegif($image_p, $filename,90);
		break; 
		case 2:
		imagejpeg($image_p, $filename,90);
		break; 
		case 3:
		imagepng($image_p, $filename);
		break; 
		default:
		return $pic;
	}
	/* �����һ������0 �򲻽��вü������ȱ����� */
	if ($cut_w!=0 && $cut_h!=0)
	{
		/* �ж��Ƿ���Ҫ�ü�ͼƬ */
		list($width, $height,$type) = getimagesize($filename);
		$source=imagecreatefromjpeg($filename);
		$croped=imagecreatetruecolor($cut_w, $cut_h);
		imagecopy($croped,$source,0,0,0,0,$logo_w,$logo_g);
		imagejpeg($croped, $filename,90);
	}
	return $filename; 
}

?>