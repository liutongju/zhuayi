<?php
/**
 * Routing.class.php     SOSCMS 主体框架文件,
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
class Routing
{
	public $url;
	//----构造函数
	function __construct()
	{
		//----获取当前URL
		$this->url =  $_SERVER['REQUEST_URI'];
		//----格式化URL
		$this->url = parse_url($this->url);
	}
	//----初始话应用程序
	function creat_app()
	{
		/**
		 *  判断URL模式，
		 *  @ ?m=**&c=**&... GET第一种模式
		 *  @ /m/c/...   MVC第二种模式
		 *  如果empty($this->url['query'] && $this->url['path'] 则是第一种模式
		 */
		if (!empty($this->url['query']) && ($this->url['path'] == '/' || $this->url['path'] == '/index.php'))
		{
			print_r($this->url_get());
		}
		else
		{
			print_r($this->url_mvc());
		}
		$this->cache_funs();
	}
	//-----GET模式转换成数组
	function url_get()
	{
		//------根据&把URL转换成数组
		$this->url = explode('&',$this->url['query']);
		//------循环数组，调换键值和值,得出数组array('m'=>值1,'c'=>值2...)
		foreach ($this->url as $key=>$val)
		{
			$linshi = explode('=',$val);
			$url[$linshi[0]] = $linshi[1];
		}
		$this->url = $url;
		return $this->url;
	}
	//------MVC模式
	function url_mvc()
	{
		//------根据&把URL转换成数组
		$this->url = explode('/',$this->url['path']);
		//------删除第一个值,因为他总是空,并复制给M、C
		unset($this->url[0]);
		$url['m'] = $this->url[1];
		$url['c'] = @$this->url[2];
		//------循环数组并对调后边的键值,总是从第3个开始循环。循环前判断是否数组除M、C之外还有值否
		if (count($this->url)>2)
		{
			for ($i=3;$i<=count($this->url);$i=$i+2)
			{
				$j = $i+1;
				if ($j<=count($this->url))
				$url[$this->url[$i]] = $this->url[$i+1];
			}
		}
		unset($this->url);
		return $url;
	}
	//-----载入公共函数库
	function cache_funs()
	{
		//---------复制函数库路径
		$filepath = SOSCMS_ROOT.'/function/';
		//------如果缓存不存在，则生成缓存
		if (!file_exists(SOSCMS_FUN))
		{
			$handle = opendir($filepath); //打开指定文件夹 .DS_Store 是输出说有的文件
			$files = array();
			$conent = '<?php'."\n";
			while (false != ($file = readdir($handle)))
			{
				$h = trim(substr(strrchr($file,'.'),1,100)); //--------取的文件的后缀
				if ($file != "." && $file != ".." && $file != ".DS_Store")
				{ 
					$conent .= 'require_once(SOSCMS_ROOT.\'/function/'.$file.'\');'."\n";
				}
			}
			$conent .= '?>';
			closedir($handle);
			$handle = fopen(SOSCMS_FUN,'w');
			fwrite($handle, $conent);
			fclose($handle);
		}
		require_once(SOSCMS_FUN);
	}
}
?>