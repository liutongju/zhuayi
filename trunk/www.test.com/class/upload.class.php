<?php
/**
 * upload.class.php     ZCMS �ļ��ϴ���
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-15
 * @author       zhuayi  
 * @QQ			 ZCMS
 */
//-----���븽�������ļ�
include_once ZCMS_ROOT.'/data/include/annex_config.php';
//------�����ϴ�������С
define('UPLOAD_MAXSIZE', $upload_maxsize);

//------�������·��
define('UPLOAD_PATH', $upload_path);

//------�����ϴ���������
define('UPLOAD_ALLOWEXT', $upload_allowext);

//------�Ƿ���ͼƬˮӡ
define('WATERMARK_ENABLE', $watermark_enable);

//------ˮӡͼƬ
define('WATERMARK_IMG', $watermark_img);

//------ˮӡ͸����
define('WATERMARK_PCT', $watermark_pct);

//------JPEG ˮӡ����
define('WATERMARK_QUALITY', $watermark_quality);

//------ˮӡλ��
define('WATERMARK_POS', $watermark_pos);

class upload
{
	function __construct($file)
	{
		$this->file = $file;
	}
	
	
	//------�����ļ�
	function copy($dir,$base)
	{
		if (empty($this->file['name']))
		return $this->request;
		//----�������
		$this->type();
		
		//-----����С
		$this->size();
		
		//-----��ȡ�ļ���
		$this->base($base);
		
		//----ת��·��
		$this->path = ZCMS_ROOT.UPLOAD_PATH.$dir.'/'.date("Y-m-d").'/';
		
		if (!file_exists($this->path.'tmp'))
		{
			mkdir($this->path.'tmp',777,true);
		}
		//----����·��
		$this->path .= $this->filename;
		//-----�����ļ�
		if (!copy($this->file['tmp_name'],$this->path))
		{
			$this->error('�����ļ�����');
		}
		//----�������ˮӡ�����ˮӡ
		if (WATERMARK_ENABLE ==1)
		{
			$this->mark();
		}
		return $this->realpath($this->path);
		
	}

	//------����ļ�
	function size()
	{

		if ($this->file['size']> (UPLOAD_MAXSIZE*1024))
		{
			$this->error('�ļ��������ƴ�С...');
		}
	}
	
	//-----����ļ�����
	function type()
	{
		//--------ȡ���ϴ��ļ��ĺ�׺
		$h = trim(substr(strrchr($this->file['name'],'.'),1,100));
		
		//--------ת������ĸ�������Ϊ���飬��ʼ����
		$this->upload_allowext = explode('|',UPLOAD_ALLOWEXT);
		
		if (!in_array($h,$this->upload_allowext))
		{
			$this->error('���������ϴ����ļ�����');
		}
	}
	//-----������Ϣ
	function error($error)
	{
		showmsg($error,'-1');
	}
	
	//-----��ȡ�ļ���
	function base($former = '')
	{
		if ($former=='')
		$this->filename =  basename($this->file["name"]);
		else
		$this->filename = $former.'.'.trim(substr(strrchr($this->file['name'],'.'),1,100)); //--------ȡ���ϴ��ļ��ĺ�
	}
	
	//----ת��·��
	function realpath($path)
	{
		return str_replace(ZCMS_ROOT,'',$path);
	}
	
	//-----����ͼƬ
	function breviary($logo_w,$logo_g,$pic='')
	{
		if (!empty($pic))
		$this->path = $pic;
		
		//----------��С�ļ������ͼƬ�Ŀ�͸ߺ�����
		list($width, $height,$type) = getimagesize($this->path);
		if ($logo_w>=$width)
		{
			return $this->request;
		}
		elseif($logo_g>=$height)
		{
			return $this->request;
		}
		
		//----------�����Ϊ0�Ļ����򰴿����ֵ�ȱ���С

		if ($logo_w == 0)
		{
			$logo_w = $width / ($height / $logo_g);
		}
		if ($logo_g == 0)
		{
			$logo_g = $height / ($width / $logo_w);
		}
		
		//-----------�����PHP�涨��
		$image_p = imagecreatetruecolor($logo_w, $logo_g);
		switch($type)
		{ 
			case 1:
			$image = imagecreatefromgif($this->path);
			break; 
			case 2:
			$image = imagecreatefromjpeg($this->path);
			break; 
			case 3:
			$image = imagecreatefrompng($this->path);
			break; 
			default:
			return $this->request;
		}
		//-------------��СͼƬ
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $logo_w, $logo_g, $width, $height);
		
		$filename = str_replace(basename($this->path),'tmp/',$this->path);
		
		if (!file_exists($filename))
		{
			mkdir($filename,777,true);
		}
		$filename .= basename($this->path);
		
		switch($type)//ȡ��ͼƬ�ĸ�ʽ 
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
			return $this->request;
		}
		echo 'aaa';
		return $this->realpath($filename); 
	}
	
	function mark($pic='')
	{
		if (!empty($pic))
		$this->path = $pic;
		$water = ZCMS_ROOT.'/data'.WATERMARK_IMG;
		list($ground_w, $ground_h,$ground_type) = getimagesize($this->path);
		//ȡ��ˮӡͼƬ�ĸ�ʽ 
		
		list($water_w, $water_h,$water_type) = getimagesize($water);
		
		//---------�ж�ˮӡͼƬ�Ƿ�С��ԭͼ
		if ($water_w>=($ground_w+100))
		{
			return $this->request;
		}
		elseif($water_h>=($ground_h+100))
		{
			return $this->request;
		}
		switch($ground_type)//ȡ��ˮӡͼƬ�ĸ�ʽ 
		{ 
			case 1:
			$ground = imagecreatefromgif($this->path);
			break; 
			case 2:
			$ground = imagecreatefromjpeg($this->path);
			break; 
			case 3:
			$ground = imagecreatefrompng($this->path);
			break; 
			default:
			return $this->request;
		}
		
		switch($water_type)//ȡ��ˮӡͼƬ�ĸ�ʽ 
		{ 
			case 1:
			$water = imagecreatefromgif($water);
			break; 
			case 2:
			$water = imagecreatefromjpeg($water);
			break;
			case 3:
			$water = imagecreatefrompng($water);
			break; 
			default:
			return $this->request;
		}
		//$ground = realpath($ground);
		switch(WATERMARK_POS) 
		{ 
		case 0://��� 
			$posX = rand(0,($ground_w - $water_w)); 
			$posY = rand(0,($ground_h - $water_h)); 
			break; 
		case 1://1Ϊ���˾��� 
			$posX = 0; 
			$posY = 0; 
			break; 
		case 2://2Ϊ���˾��� 
			$posX = ($ground_w - $water_w) / 2; 
			$posY = 0; 
			break; 
		case 3://3Ϊ���˾��� 
			$posX = $ground_w - $water_w; 
			$posY = 0; 
			break; 
		case 4://4Ϊ�в����� 
			$posX = 0; 
			$posY = ($ground_h - $water_h) / 2; 
			break; 
		case 5://5Ϊ�в����� 
			$posX = ($ground_w - $water_w) / 2; 
			$posY = ($ground_h - $water_h) / 2; 
			break; 
		case 6://6Ϊ�в����� 
			$posX = $ground_w - $water_w; 
			$posY = ($ground_h - $water_h) / 2; 
			break; 
		case 7://7Ϊ�׶˾��� 
			$posX = 5; 
			$posY = $ground_h - $water_h; 
			break; 
		case 8://8Ϊ�׶˾��� 
			$posX = (($ground_w - $water_w) / 2); 
			$posY = $ground_h - $water_h; 
			break; 
		case 9://9Ϊ�׶˾��� 
			$posX = ($ground_w - $water_w); 
			$posY = ($ground_h - $water_h); 
			break; 
		
		default://��� 
			$posX = rand(0,($ground_w - $water_w)); 
			$posY = rand(0,($ground_h - $water_h)); 
			break;   
		}	
		imagecopymerge($ground, $water, $posX, $posY, 0, 0, $water_w,$water_h,WATERMARK_PCT);//����ˮӡ��Ŀ���ļ�
		
		imagejpeg($ground, $this->path, WATERMARK_QUALITY);
		return $this->realpath($this->path);
	}
}








?>