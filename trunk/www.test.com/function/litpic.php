<?php

function litpic($litpic,$width,$height)
	global $weburl;
	$litpic = str_replace($weburl,'',$litpic);
	$litpic_tmp = ZCMS_ROOT.'/data/litpic_tmp/'.$width.'_'.$height.$litpic;
	if (!file_exists($litpic_tmp))
	{
		$litpic =  breviary($litpic_tmp,ZCMS_ROOT.$litpic,'500');
	}
	return str_replace(ZCMS_ROOT,$weburl,$litpic);


function breviary($litpic_tmp,$pic,$logo_w,$logo_g)
	//----------��С�ļ������ͼƬ�Ŀ��͸ߺ�����
	if ($logo_w>=$width)
		
	//----------�����Ϊ0�Ļ����򰴿�����ֵ�ȱ���С

	{
		$logo_w = $width / ($height / $logo_g);
	}
	if ($logo_g == 0)
	{
		$logo_g = $height / ($width / $logo_w);
		
	return $filename; 
?>