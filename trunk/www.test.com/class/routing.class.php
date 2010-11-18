<?php
/**
 * routing.class.php     ZCMS 主体框架文件,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 ZCMS
 */
class routing 
{
	private  $url;
	
	//----构造函数
	function __construct()
	{
		//----获取当前URL
		//$this->url =  $_SERVER['REQUEST_URI'];
		$this->url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		
		$this->seo();
		
		//----格式化URL
		$this->url = parse_url($this->url);
		$this->url_res();
	}
	//----初始话应用程序 
	function url_res()
	{
		//-----加载公共函数库
		//$this->cache_funs();
		/**
		 *  判断URL模式，
		 *  @ ?m=**&c=**&... GET第一种模式
		 *  @ /m/c/...   MVC第二种模式
		 *  @ api.php?m=**&...  插件形式
		 *  如果empty($this->url['query'] && $this->url['path'] 则是第一种模式
		 */
		if (!empty($this->url['query']) && ($this->url['path'] == '/' || $this->url['path'] == '/index.php'))
		{
			$this->url_get();
		}
		else
		{
			$this->url_mvc();
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
			if (!empty($linshi[1]))
			$url[$linshi[0]] = $linshi[1];
		}
		$this->url = $url;
		//return $this->url;
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
		//$url['a'] = @$this->url[3];
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
		$this->url = $url;
	}
	
	//-----URL映射应用程序
	function app()
	{
		//------将转换后的URL转换为REQUEST给应用调用
		foreach ($this->url as $key=>$val)
		{
			$_REQUEST[$key] = $val;
		}
		//----处理模型
		$_REQUEST['m'] = (empty($_REQUEST['m']) || $_REQUEST['m']=='index.php')?'index':$_REQUEST['m'];
		
		//----处理方法
		$_REQUEST['c'] = empty($_REQUEST['c'])?'index':$_REQUEST['c'];
		
		//----处理前后台文件
		$_REQUEST['a'] = (empty($_REQUEST['a']) || $_REQUEST['a']!='init')?'':'admin/';
		
		//-----映射模型路径
		$_REQUEST['m_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/'.$_REQUEST['a'].$_REQUEST['m'].'_'.$_REQUEST['c'].'.'.'php';
		
		//-----映射模版路径
		$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/template/'.$_REQUEST['a'].$_REQUEST['m'].'_'.$_REQUEST['c'].'.'.'html';
		
		//-----虚拟一个构造函数,左右该模块下的全局文件,非必须，存在则优先调用此文件,一般存放模块配置文件或针对该模块下的全局变量
		$_REQUEST['g_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/'.$_REQUEST['m'].'_global.php';
		
		//-----映射模块虚拟路径,主要用来载入模块里的图片，CSS作用
		$_REQUEST['app_url'] = ZCMS_URL.'/zcms/'.$_REQUEST['m'].'/template/'.$_REQUEST['a'];		
	}
	
	//--------查询是否存在SEO表中
	function seo()
	{
		global $query;
		$info = $query->one_array("select * from ".T."seo where ((instr('".$this->url."',url)  and parameter = 1) or (url ='".$this->url."' and parameter = 0)) && url<>''");
		if (!empty($info['request_url']))
		{

			//----删除当前URL，如果是模糊匹配的话不删除则会多出很多GET参数
			$this->url = str_replace($info['url'],$info['request_url'],$this->url);
		}

	}
}

?>