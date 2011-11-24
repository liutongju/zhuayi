<?php
/**
 * image class 图 片 操 作 类
 *
 * $this->load_class('image',true);
 *
 *  下 载 图 片
 * $this->image->show('http://ww3.sinaimg.cn/bmiddle/88ee4465jw1dkj2cwnlh4j.jpg');
 *
 *  上 传 图 片 
 * $this->image->show($_FILES['imgFile']);
 *
 *  缩 放 图 片 ，如 果 宽 和 高 都 输 入 则 先 等 比 例 缩 小  然 后 不 够 的 像 素 填 充 白 色
 * $this->image->zomm(300);
 *
 *  打 水 印 
 * $this->image->mark();
 *
 * 合并图片
 * $hebing[] = 'http://ww3.sinaimg.cn/bmiddle/640b9a98tw1dkyy1peeycj.jpg';
 * $hebing[] = 'http://ww4.sinaimg.cn/large/68f5e3afjw1dkxp60rfd9j.jpg';
 * $this->image->hebing($hebing);
 *  保 存 图 片
 * $this->image->save('/cache/1');
 * @package default
 * @author zhuayi
 *
*/

class image
{

	/* 水印图片 */
	public $mark;
	
	/* 水印位置 */
	public $mark_type;
	
	/**
	 * 构 造 函 数
	 *
	 * @author zhuayi
	 */
	function __construct()
	{
		global $file;

		/* 加载缓存类 */
		$this->file = & $file;
	}
	
	/**
	 * 获取图片二进制数据
	 *
	 * @author zhuayi
	 */
	function show($file)
	{
		if (is_array($file))
		{
			$filename = $file['tmp_name'];
			$this->h = trim(substr(strrchr(strtolower($file['name']),'.'),1,100));
		}
		else
		{
			$filename = preg_replace('#\?(.*)|&(.*)|#','',$file);
			$this->h = trim(substr(strrchr(strtolower($filename),'.'),1,100));
		}
		
		/* 第一简单判断后缀 */
		$upload_allowext = explode('|',$this->allowext);
		
		if (!in_array($this->h,$upload_allowext))
		{
			return $this->error = output::arrays('-1','one-图片格式不正确!');
		}
		

		$reset = file_get_contents($filename);
		
		if (empty($reset))
		{
			return $this->error = output::arrays('-1','图片下载失败');
		}

		$temp = tempnam('/tmp','zhuayi');
		
		if (empty($temp))
		{
			return $this->error = output::arrays('-1','创建临时文件失败');
		}

		file_put_contents($temp,$reset);
		$this->filename = $temp;
		
		$reset = $this->info();

		switch($reset[2])
		{ 
			case 1:
			$this->h = '.gif';
			break; 
			case 2:
			$this->h = '.jpg';
			break; 
			case 3:
			$this->h = '.png';
			break; 
			default:
			return $this->error = output::arrays('-1','图片格式不正确');
			break;
		}

	}
	
	/**
	 * 获 取 图 片 信 息
	 *
	 * @author zhuayi
	 */
	function info($filename = '')
	{
		if (empty($filename))
		{
			return getimagesize($this->filename);
		}
		else
		{
			return getimagesize($filename);
		}
	}
	/**
	 * zoom 缩 放 图 片
	 *
	 * @author zhuayi
	 */
	function zomm($width = 0,$height = 0)
	{
		if (!empty($this->error))
		{
			return $this->error;
		}
		
		$info = $this->info();
		
		$x  = $y = 0;
		
		if ($width >0 && $height >0)
		{
			$max_width = $width;
			$max_height = $height;
			/* 先判断图片事横的还事树的 */
			if ($info['0'] > $info[1])
			{
				/* 横的 */
				$_height = intval($info['1']*$width/$info['0']);
				$y = ($height - $_height)/2;
				$height = $_height;
			}
			else
			{
				$_width = intval($info['0']*$width/$info['1']);
				$x = ($width-$_width)/2;
				$width = $_width;
			}
			
		}
		elseif ($width < $info['0'] && $width > 0 && $height == 0)
		{
			$height = intval($info['1']*$width/$info['0']);
			$max_width = $width;
			$max_height = $height;
		}
		elseif ($height < $info['0'] && $width==0)
		{
			$width = intval($info['0']*$height/$info['1']);
			$max_width = $width;
			$max_height = $height;
		}

		$image = $this->create($info[2],$this->filename);
		
		if ($image  == '-1')
		{
			$this->error = output::arrays('-1','图片格式错误了');;
		}

		$image_p = imagecreatetruecolor($max_width, $max_height);
		$color = imagecolorAllocate($image_p,255,255,255);
		imagefill($image_p,0,0,$color);
		imagecopyresampled($image_p, $image, $x, $y, 0, 0, $width, $height, $info[0], $info[1]);
		$this->_save($image_p,$info['2']);

		
	}
	
	/**
	 * 返回图像资源句柄
	 *
	 * @author zhuayi
	 */
	function create($type,$filename)
	{
		switch($type)
		{ 
			case 1:
			return imagecreatefromgif($filename);
			break; 
			case 2:
			return imagecreatefromjpeg($filename);
			break; 
			case 3:
			return imagecreatefrompng($filename);
			break; 
			default:
			return -1;
		}
	}
	
	/**
	 * save pic
	 *
	 * @author zhuayi
	 */
	function _save($image_p,$type)
	{
		switch($type)
		{ 
			case 1:
			imagegif($image_p, $this->filename,90);
			break; 
			case 2:
			imagejpeg($image_p, $this->filename,90);
			break; 
			case 3:
			imagepng($image_p, $this->filename);
			break; 
			default:
			$this->error = output::arrays('-1','图片格式不正确');
			break;
		}
		return $this->filename;
	}
	
	/**
	 * mark  水印
	 *
	 * @author zhuayi
	 */
	function mark($mark = '')
	{
		if (!empty($this->error))
		{
			return $this->error;
		}
		
		if (empty($mark))
		{
			$mark = $this->mark;
		}
		
		list($image_w,$image_h,$image_type) = $this->info();
		list($mark_w,$mark_h,$mark_type) = $this->info($mark);
		
		$image = $this->create($image_type,$this->filename);
		$mark_p = $this->create($mark_type,$mark);
		
		if ($image_w < 100 || $image_h < 100)
		{
			$this->error = output::arrays('-1','水印失败');
		}
		switch($this->mark_type)
		{
		case 0:
			$posX = rand(0,($image_w - $mark_w));
			$posY = rand(0,($image_h - $mark_h));
			break;

		case 1:
			$posX = 0;
			$posY = 0;
			break;
		case 2:
			$posX = ($image_w - $mark_w) / 2;
			$posY = 0;
			break;
		case 3:
			$posX = $image_w - $mark_w;
			$posY = 0;
			break;
		case 4:
			$posX = 0;
			$posY = ($image_h - $mark_h) / 2;
			break;
		case 5:
			$posX = ($image_w - $mark_w) / 2;
			$posY = ($image_h - $mark_h) / 2;
			break;
		case 6:
			$posX = $image_w - $mark_w;
			$posY = ($image_h - $mark_h) / 2;
			break;
		case 7:
			$posX = 5;
			$posY = $image_h - $mark_h;
			break;
		case 8:
			$posX = (($image_w - $mark_w) / 2);
			$posY = $image_h - $mark_h;
			break;
		case 9:
			$posX = ($image_w - $mark_w);
			$posY = ($image_h - $mark_h);
			break;
		default:
			$posX = rand(0,($image_w - $mark_w));
			$posY = rand(0,($image_h - $mark_h));
			break;
		}
		imagecopymerge($image, $mark_p, $posX, $posY, 0, 0, $mark_w,$mark_h,$this->mark_t);
		$this->_save($image,$image_type);
		
	}
	
	/**
	 * cut 裁 剪 图 片
	 *
	 * @author zhuayi
	 * $source_width 、 $source_height 要裁剪原始图片的宽和高
	 * $width  、 $height 裁剪后大小
	 */
	function cut($width,$height,$x,$y,$source_width,$source_height)
	{
		if (!empty($this->error))
		{
			return $this->error;
		}
		
		list($image_w,$image_h,$image_type) = $this->info();
		$image = self::create($image_type,$this->filename);
		$dst_r = ImageCreateTrueColor($width, $height);
		imagecopyresampled($dst_r,$image,0,0,$x,$y,$width,$height,$source_width,$source_height);
		$this->_save($dst_r,$image_type);
	}


	/**
	 * out 输出二进制
	 *
	 * @return void
	 * @author 
	 **/
	function out()
	{
		if (!empty($this->error))
		{
			return $this->error;
		}
		
		return  file_get_contents($this->filename);
	}

	/**
	 * save 保存图片 
	 *
	 * @author zhuayi
	 */
	function save($filename)
	{

		if (!empty($this->error))
		{
			return $this->error;
		}

		$filedata = $this->out();

		$h = trim(substr(strrchr(strtolower($filename),'.'),1,100));
		if (empty($h))
		{
			$filename .= $this->h; 
		}

		$reset = $this->file->write($filename,$filedata);
		
		if (!is_array($reset))
		{
			return output::arrays('1',$reset);
		}
		else
		{
			return $reset;
		}
	}
	
	/**
	 * temp 写 入 临 时 缓 存
	 *
	 * @author zhuayi
	 */
	function temp()
	{
		if (!empty($this->error))
		{
			return $this->error;
		}
		return  output::arrays('1','/image/'.base64_encode($this->filename));
	
	}
	
	/**
	 * 合 并 图 片
	 *
	 * @author zhuayi
	 */
	function hebing($array = array())
	{
		$qheight = 0;
		$qwidth = 0;
		foreach ($array as $key=>$val)
		{
			/* 创 建 临 时 文 件 写 入 图 片 数 据 */
			$temp = tempnam($temp,'zhuayi');
			file_put_contents($temp,file_get_contents($val));
			
			/* 填 充 图 片 信 息 */
			$list[$key]['url'] = $temp;
			list($width,$height,$type) = $this->info($temp);
			$list[$key]['width'] = $width;
			$list[$key]['height'] = $height;
			$list[$key]['type'] = $type;
			
			if ($key == 0)
			{
				$list[$key]['y'] = 0;
			}
			else
			{
				$list[$key]['y'] = $list[$key-1]['height'];
			}

			/* 计 算 合 并 后 图 片 尺 寸 */
			$qheight +=$height;
			if ($width > $qwidth)
			{
				$qwidth = $width;
			}
		}
		
		/* 创 建 图 片 */
		$image = imagecreate($qwidth,$qheight);
		/* 设 置 背 景 色 */
		imagecolorallocate($image,255,255,255);
		$temp = tempnam($temp,'zhuayi');
		imagejpeg($image,$temp,100);
		$image = imagecreatefromjpeg($temp);
			
		/* 合 并 图 片 */
		foreach ($list as $val)
		{	
			
			$markim = $this->create($val['type'],$val['url']);
			
			imagecopymerge($image, $markim, ($qwidth-$val['width'])/2, $val['y'], 0, 0, $val['width'],$val['height'],100);
		}
		
		$temp = tempnam($temp,'zhuayi');
		imagejpeg($image,$temp,90);
		$this->h = '.jpg';
		$this->filename = $temp;		
		return true;
	}

	/**
	 * 图片上传
	 *
	 * @author zhuayi
	 */
	function upload($file,$filename = '',$zomm = '')
	{

		$this->show($file);

		if (!empty($zomm))
		{
			$this->zomm($zomm);
		}
		
		return  $this->save($filename);
	}
}
 
?>