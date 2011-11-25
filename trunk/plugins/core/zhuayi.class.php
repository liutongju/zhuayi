<?php
/**
 * index.php     Zhuayi 主框架文件
 *
 * @copyright    (C) 2005 - 2010  Zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */



class zhuayi
{
	protected $url_debug = array(
								'error_debug',
								'api_debug',
								'db_debug',
								'cache_debug',
								'recache',
								'debug',
								'url_debug',
								'config_debug',
								'include_debug'
								);

	/**
	 * 构造函数
	 */
	function __construct()
	{
		global $pagestartime,$cache,$file;

		$this->pagestartime = $pagestartime;

		$this->cache = & $cache;

		$this->file = & $file;

	}

	function app()
	{
		global $config;

		/* 检查是否开启 rewrite */
		if (!in_array('mod_rewrite',apache_get_modules()))
		{
			output::error('很抱谦,你的Apache不支持rewrite.','点击下边链接查看如何开启rewrite!');
		}

		/* 检查是否开启DEBUG模式,如果关闭则删除GET参数 */
		if ($config['debug'] === false)
		{
			foreach ($this->url_debug as $val)
			{
				unset($_GET[$val]);
			}
		}

		/* 过滤GET参数中的Debug参数 */
		$this->url_debug = '&'.implode('|&',$this->url_debug).'|\?'.implode('|\?',$this->url_debug);
		$this->url_debug = preg_replace("#".$this->url_debug."#",'',$_SERVER["REQUEST_URI"]);

		$controller_key = 'controller '.$this->url_debug;
		
		if (!$controller = $this->cache->get($controller_key))
		{
			$url = new z_url($this->url_debug);

			$url->url_config = $config['url_config'];

			$controller = $url->url();

			$this->cache->set($controller_key,$controller,86400);
		}

		/* 页面缓存 开始 */
		$cache_page_file = $config['cache_page']['root'].$controller['modle'].'_'.$controller['action'].'_'.implode('_',$controller['fileds']).'_'.$controller['get'].'.html';


		/* 判断是否开启页面缓存 $config['cache']['page'] = true */
		if ($config['cache_page']['root'])
		{
		
			if (isset($_GET['recache']))
			{
				$config['cache_page']['outtime'] = 0 ;
			}
			if (file_exists($cache_page_file) && (time() - filemtime($cache_page_file)) < $config['cache_page']['outtime'])
			{
				require $cache_page_file;
				exit;
			}
			ob_start();
		}

		$class = $controller['modle'].'_action';

		$app = $this->load_class($class);


		/* 检查方法 */
		if (method_exists($app,$controller['action']))
		{
			$app->modle = $controller['modle'];
			$app->action = $controller['action'];
			$app->fileds = $controller['fileds'];

			foreach ($config['web'] as $key=>$val)
			{
				$app->$key = $val;
			}

			call_user_func_array(array($app,$app->action),$app->fileds);	
			
		}
		else
		{
			output::error('加载控制器失败!','没有找到《'.$controller['action'].'》方法...');
		}

		/* 如果开始缓存页面 则把当前信息缓存为静态页面 */
		
		if (isset($app->cache_page) && $app->cache_page && isset($config['cache_page']['root']))
		{

			$cache_string = ob_get_contents();
			ob_clean();
			$config['cache_page']['url'] = '';
			$reset = $this->file->write($cache_page_file,$cache_string,$config['cache_page']);

			print_r($cache_string);
		}

		if (isset($_GET['debug']))
		{
			echo "\n<!--\n ";
			$app->db = '隐藏数据不公开!';
			print_r($app);
			echo "\n-->\n";
		}
	}


	function load_class($class,$construct = false)
	{
		if (isset($this->$class) && is_object($this->$class))
		{
			return $this->$class;
		}

		$filename = $this->_include_class($class);

		if ($this->_includes($filename))
		{
			$fileds = array();

			$fileds = $this->load_config($class);

			if ($construct === false)
			{
				$this->$class = new $class($fileds);
			}
			else if (!empty($fileds))
			{
				$this->$class = new $class($fileds);
				/* 以配置文件初始该模块 */
				foreach ($fileds as $key=>$val)
				{
					$this->$class->$key = $val;
				}
			}
			
			return $this->$class;
		}
		else
		{
			output::error('加载插件失败!',$class.' 没有找到!');
		}
	}

	static  function _load_class($class)
	{

		$filename = self::_include_class($class);

		if (!self::_includes($filename))
		{
			output::error('加载 '.$class.' 失败...');
		}
	}

	function _include_class($classname)
	{
		/* 判断是否有"_",有则表示是模块类 */
		$classname = explode('_',$classname);

		if (!empty($classname[1]))
		{
			$filename = APP_ROOT.$classname[0]."/".$classname[0]."_".$classname[1].".php";
		}
		else
		{
			$filename = PLUGINS_ROOT.$classname[0]."/".$classname[0].".class.php";
		}

		return $filename;
	}
	/**
	 * 加载文件，失败返回false
	 *
	 * @param string $filename 文件路径
	 */
	static function _includes($filename)
	{
		if (isset($_GET['include_debug']))
		{
			echo "<!--\n include: ";
			echo $filename;
			echo "\n-->\n";
		}
		if (file_exists($filename))
		{
			return require_once $filename;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 载入配置文件
	 *
	 * @param string $config 配置文件名
	 * @param string $sae 是否sae支持
	 */
	function load_config($config)
	{
		$config_key = 'config_'.$config;

		if (!$cache_config = $this->cache->get($config_key))
		{
			/* 以"_"为种子转换数组, 判断是模型还是系统*/
			$config = explode('_',$config);

			if (empty($config[1]))
			{
				$cache_config = PLUGINS_ROOT.$config[0].'/config/'.$config[0].'.config.php';
			}
			else
			{
				$cache_config = APP_ROOT.$config[0].'/config/'.$config[0].'.config.php';
			}

			$cache_config = $this->_includes($cache_config);
			$this->cache->set($config_key,$cache_config,86400);
		}

		return $cache_config;

	}

	/**
	 * include_tpl 引用模板
	 *
	 * @return void
	 * @author 
	 **/
	function load_tpl($filename)
	{
		$arrfile = explode('_',$filename);
		
		if (!empty($arrfile[1]))
		{
			$filename = ZHUAYI_ROOT."/zhuayi/".$arrfile[0].'/template/'.implode('_',$arrfile).'.html';
		}

		return $filename;
	}

	/**
	 * load_modle 加载模块
	 *
	 * @return void
	 * @author 
	 **/
	function load_modle($filename)
	{
		$filename = explode('_',$filename,2);
	
		$filename[0] .= '_action';

		if (is_callable(array($filename[0],$filename[1]),true,$callback))
		{
			/* 由于php5.2以下不支持 $filename[0]::$filename[1]()调用模式,废弃,改用eval;*/
			eval("{$filename[0]}::{$filename[1]}();");
		}
		else
		{
			echo '加载模块 '.$filename[0].':'.$filename[1].' 失败!';
		}
		
		
	}

	/**
	 * 载入模版 
	 * 
	 *
	 * @param string $filename 模版名称
	 *
	*/
	function display($param = '',$filename = '')
	{

		$this->variable['show'] = $param;

		extract($this->variable, EXTR_OVERWRITE);

		if (empty($filename))
		{
			$filename = $this->modle.'_'.$this->action;
		}

		$filename = self::load_tpl($filename);
		
		if (file_exists($filename))
		{

			/* 这只程序执行时间和消耗内存 */
			$pageendtime = microtime(); 
			$starttime = explode(" ",$this->pagestartime); 
			$endtime = explode(" ",$pageendtime); 
			$this->timecost= $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1]; 
			$this->timecost = sprintf("%0.2f",$this->timecost); 
			$this->memory_get_usage = sprintf('%0.2f', memory_get_usage() / 1048576 ).' MB';

			require $filename;
		}
		else
		{
			output::error('加载模板失败...',$filename);
		}
		
	}

	/**
	 * 函数调用
	 * @param string $fun_name 函数名 
	 */
	function load_fun($fun_name)
	{
		/* 获取全部参数 */
		$fun = func_get_args();	
		$fun_name = $fun[0];
		unset($fun[0]);
		
		/* 载入函数文件 */
		$this->_includes(ZHUAYI_ROOT.'/function/'.$fun_name.'.php');
		
		if (function_exists($fun_name))
		{
			return call_user_func_array($fun_name,$fun);
		}
		else
		{
			output::error('调用函数'.$fun_name.'失败...');	
		}
	}



}
?>