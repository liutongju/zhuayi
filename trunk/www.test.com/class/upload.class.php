<?php
/**
 * upload.class.php     ZCMS 文件上传类
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-15
 * @author       zhuayi
 * @QQ			 ZCMS
 */
/* -----载入附件配置文件 */
include_once ZCMS_ROOT.'/data/include/annex_config.php';
//------允许上传附件大小
define('UPLOAD_MAXSIZE', $upload_maxsize);

/* ------附件存放路径 */
define('UPLOAD_PATH', $upload_path);

/* ------允许上传附件类型 */
define('UPLOAD_ALLOWEXT', $upload_allowext);

/* ------是否开启图片水印 */
define('WATERMARK_ENABLE', $watermark_enable);

/* ------水印图片 */
define('WATERMARK_IMG', $watermark_img);

/* ------水印透明度 */
define('WATERMARK_PCT', $watermark_pct);

/* ------JPEG 水印质量 */
define('WATERMARK_QUALITY', $watermark_quality);

/* ------水印位置 */
define('WATERMARK_POS', $watermark_pos);

class upload
{
	function __construct($file)
	{
		$this->file = $file;
	}


	/* ------复制文件 */
	function copy($dir,$base)
	{
		if (empty($this->file['name']))
		return $this->request;
		/* ----检查类型 */
		$this->type();

		/* -----检查大小 */
		$this->size();

		/* -----获取文件名 */
		$this->base($base);

		/* ----转换路径 */
		$this->path = ZCMS_ROOT.UPLOAD_PATH.$dir.'/'.date("Y-m-d").'/';

		if (!file_exists($this->path))
		{
			$oldumask=umask(0);
			mkdir($this->path.'/',0777,true);
			chmod($this->path.'/', 0777);
			umask($oldumask);
		}

		/* ----连接路径 */
		$this->path .= $this->filename;
		/* -----复制文件 */
		if (!copy($this->file['tmp_name'],$this->path))
		{
			$this->error('拷贝文件出错');
		}
		/* ----如果开启水印则添加水印 */
		if (WATERMARK_ENABLE ==1)
		{
			$this->mark();
		}
		return $this->realpath($this->path);

	}

	/* ------检查文件 */
	function size()
	{

		if ($this->file['size']> (UPLOAD_MAXSIZE*1024))
		{
			$this->error('文件超出限制大小...');
		}
	}

	/* -----检查文件类型 */
	function type()
	{
		/* --------取的上传文件的后缀 */
		$h = trim(substr(strrchr($this->file['name'],'.'),1,100));

		/* --------转换定义的附件类型为数组，开始查找 */
		$this->upload_allowext = explode('|',UPLOAD_ALLOWEXT);

		if (!in_array($h,$this->upload_allowext))
		{
			$this->error('不是允许上传的文件类型');
		}
	}
	/* -----错误信息 */
	function error($error)
	{
		showmsg($error,'-1');
	}

	/* -----获取文件名 */
	function base($former = '')
	{
		if ($former=='')
		$this->filename =  basename($this->file["name"]);
		else
		$this->filename = $former.'.'.trim(substr(strrchr($this->file['name'],'.'),1,100)); /* --------取的上传文件的后 */
	}

	/* ----转换路径 */
	function realpath($path)
	{
		return str_replace(ZCMS_ROOT,'',$path);
	}

	/* -----缩放图片 */
	function breviary($logo_w,$logo_g,$pic='')
	{
		if (!empty($pic))
		$this->path = $pic;

		/* ----------缩小文件，获得图片的宽和高和类型 */
		list($width, $height,$type) = getimagesize($this->path);
		if ($logo_w>=$width)
		{
			return $this->request;
		}
		elseif($logo_g>=$height)
		{
			return $this->request;
		}

		/* ----------如果高为0的话，则按宽的数值等比缩小 */

		if ($logo_w == 0)
		{
			$logo_w = $width / ($height / $logo_g);
		}
		if ($logo_g == 0)
		{
			$logo_g = $height / ($width / $logo_w);
		}

		/* 这个是PHP规定的 */
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
		/* 缩小图片 */
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $logo_w, $logo_g, $width, $height);

		$filename = str_replace(basename($this->path),$this->path);

		if (!file_exists($filename))
		{
			mkdir($filename,777,true);
		}
		$filename .= basename($this->path);

		/* 取得图片的格式 */
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
			return $this->request;
		}
		return $this->realpath($filename);
	}

	function mark($pic='')
	{
		if (!empty($pic))
		$this->path = $pic;
		$water = ZCMS_ROOT.'/data'.WATERMARK_IMG;
		list($ground_w, $ground_h,$ground_type) = getimagesize($this->path);

		/*  取得水印图片的格式  */

		list($water_w, $water_h,$water_type) = getimagesize($water);

		/* 判断水印图片是否小于原图 */
		if ($water_w>=($ground_w+100))
		{
			return $this->request;
		}
		elseif($water_h>=($ground_h+100))
		{
			return $this->request;
		}
		switch($ground_type)
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

		switch($water_type)
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
		switch(WATERMARK_POS)
		{
		/* 随机 */
		case 0:
			$posX = rand(0,($ground_w - $water_w));
			$posY = rand(0,($ground_h - $water_h));
			break;
		/* 1为顶端居左 */
		case 1:
			$posX = 0;
			$posY = 0;
			break;
		/* 2为顶端居中 */
		case 2:
			$posX = ($ground_w - $water_w) / 2;
			$posY = 0;
			break;
		/* 3为顶端居右 */
		case 3:
			$posX = $ground_w - $water_w;
			$posY = 0;
			break;
		/* 4为中部居左 */
		case 4:
			$posX = 0;
			$posY = ($ground_h - $water_h) / 2;
			break;
		/* 5为中部居中 */
		case 5:
			$posX = ($ground_w - $water_w) / 2;
			$posY = ($ground_h - $water_h) / 2;
			break;
		/* 6为中部居右 */
		case 6:
			$posX = $ground_w - $water_w;
			$posY = ($ground_h - $water_h) / 2;
			break;
		/* 7为底端居左 */
		case 7:
			$posX = 5;
			$posY = $ground_h - $water_h;
			break;
		/* 8为底端居中 */
		case 8:
			$posX = (($ground_w - $water_w) / 2);
			$posY = $ground_h - $water_h;
			break;
		/* 9为底端居右 */
		case 9:
			$posX = ($ground_w - $water_w);
			$posY = ($ground_h - $water_h);
			break;
		/* 随机 */
		default:
			$posX = rand(0,($ground_w - $water_w));
			$posY = rand(0,($ground_h - $water_h));
			break;
		}
		imagealphablending($ground,true);


		/* 拷贝水印到目标文件 */
		if ($water_type==3)
		imagecopy($ground, $water, $posX, $posY, 0, 0, $water_w,$water_h);
		/* 拷贝水印到目标文件 */
		else
		imagecopymerge($ground, $water, $posX, $posY, 0, 0, $water_w,$water_h,WATERMARK_PCT);

		imagejpeg($ground, $this->path, WATERMARK_QUALITY);
		return $this->realpath($this->path);
	}

	/*  禁止打水印*/
	function mark_false()
	{
		define('WATERMARK_ENABLE', 0);
	}

	/*  获取文件名 */
	function h($file)
	{
		$h = strtolower(trim(substr(strrchr($file,'.'),1,100)));
		if ($h !='jpg' && $h !='gif' && $h !='png')
		{

			return 'jpg';
		}
		return $h;
	}
}
?>