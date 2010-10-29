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
		//-----加载公共函数库
		$this->cache_funs();
		//-----加载公共类
		//include SOSCMS_ROOT.'/class/cookie.class.php';
		/**
		 *  判断URL模式，
		 *  @ ?m=**&c=**&... GET第一种模式
		 *  @ /m/c/...   MVC第二种模式
		 *  @ api.php?m=**&...  插件形式
		 *  如果empty($this->url['query'] && $this->url['path'] 则是第一种模式
		 */
		if (!empty($this->url['query']) && ($this->url['path'] == '/' || $this->url['path'] == '/index.php'))
		{
			$this->include_model($this->url_get());
		}
		elseif ($this->url['path'] == '/api.php')
		{
			$this->include_api();
		}
		else
		{
			$this->include_model($this->url_mvc());
		}
		
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
	//------插件函数
	function include_api()
	{
		//------判断是否有REQUEST['m']值
		if (empty($_REQUEST['m']))
		{
			$this->showmsg('插件方法错误...');
		}
		
		//------根据m的值引入插件文件
		$file = SOSCMS_ROOT.'/api/'.$_REQUEST['m'].'.php';
		
		//------判断文件是否存在,不存在则提示没有此插件
		if (!file_exists($file))
		{
			$this->showmsg('不存在插件..'.$_REQUEST['m']);
		}
		
		//------引入插件文件
		include $file;
	}
	/**
	 * 加载模块类
	 * @ array 数组,根据URL映射方法转换而成的数组
	 */
	function include_model($array)
	{
		$array['m'] = empty($array['m'])?'index':$array['m']=='index.php'?'index':$array['m'];
		
		$array['c'] = empty($array['c'])?'index':$array['c'];
		
		$model_file = SOSCMS_ROOT.'/soscms/'.$array['m'].'/'.$array['m'].'_model.class.php';
		
		//-----判断类是否存在,如果不存在类，则返回错误信息
		if (!file_exists($model_file))
		{
			$this->showmsg('不存在模型..'.$array['m']);
		}
		
		//-----加载模块类
		include $model_file;
		
		//-----检查方法是否存在
		if (!method_exists($array['m'],$array['c']))
		{
			$this->showmsg('不存在此方法..');
		}
		
		//-----实例化该模块类，并调用该方法
		$this->model = new $array['m']();
		$this->model->$array['c']();
		
		unset($model_file);
		//----加载模块模版
		$tpl_file = SOSCMS_ROOT.'/soscms/'.$array['m'].'/template/'.$array['m'].'_'.$array['c'].'.html'; 
		
		//----判断模版是否存在
		if (!file_exists($tpl_file))
		{
			$this->showmsg('没有该模块和方法对应的模版...');
		}
		
		//-----载入模版
		include $tpl_file;
	}
	/**
	 * 主框架提示信息
	 * @ title 提示性文字
	 * @ url   跳转地址
	 */
	function showmsg($title='',$url='/',$time=1250)
	{
		$this->msg['title'] = $title;
		if ($url == '-1')
		{
			$url = 'javascript:history.go(-1)';
		}
		else
		{
			$url = "window.location.href='".$url."'";
		}
		$this->msg['url'] = $url;
		//----跳转URL
		
		header("Location: /api.php?m=showmsg&title=".$title."&url=".base64_encode($url).'&time='.$time); 
		exit;
	}
	/**
	 * 加载类
	 * @ file 文件名
	 */
	function load_class($file)
	{
		include SOSCMS_ROOT.'/class/'.$file.'.class.php';
		return new $file;
		
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
				//--------取的文件的后缀
				$h = trim(substr(strrchr($file,'.'),1,100)); 
				
				//--------如果是文件则包含
				if (is_file(SOSCMS_ROOT.'/function/'.$file))
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