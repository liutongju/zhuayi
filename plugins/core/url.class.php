<?php
/**
 * url.class.php     Zhuayi URL路由类
 *
 * @copyright    (C) 2005 - 2010  Zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

class z_url
{
	
	public $url_config;


	/**
	 * 构造函数
	 *
	 */
	function __construct($url)
	{
		$this->url = $url;

		if (!isset($this->url_config['default']))
		{
			$this->url_config['default'] = 'index';
		}
	}

	/**
	 * 将当前URL进行路由映射
	 *
	 */
	function url()
	{
		$this->replace_debug()->routing()->xxs();

		/* 根据"/"把URL转换成数组 */
		$url = explode('/',$this->url);

		unset($url[0]);

		/* 查找模型 */
		$controller['modle'] = (empty($url['1']) || $url['1']=='index.php')?$this->url_config['default']:$url[1];
		unset($url[1]);

		/* 查找方法 */
		$controller['action'] = (empty($url['2']) || $url['2']=='index.php')?'index':$url[2];
		unset($url[2]);

		$controller['fileds'] = $url;

		$controller['get'] = $this->get;

		if (isset($_GET['url_debug']))
		{
			echo "<!--\n routing:";
			print_r($controller);
			echo "\n-->\n";
		}

		return $controller;
	}


	/**
	 * 去掉URL中的GET参数,?之后的所有数据
	 *
	 */
	function replace_debug()
	{
		preg_match('/(.*?)\?(.*)/i',$this->url,$list);

		if (isset($list[1]))
		{
			$this->url = $list[1];
		}
		if (isset($list[1]))
		{
			$this->get = $list[2];
		}
		else
		{
			$this->get = '';
		}
		

		return $this;
	}

	/**
	 * 正则匹配URL地址
	 *
	 */
	function routing()
	{

		if (isset($this->url_config['routing']))
		{
			foreach ($this->url_config['routing'] as $key=>$val)
			{
				$this->url = preg_replace('/'.$key.'/i',$val,$this->url);
			}
		}

		return $this;
	}

	/**
	 * 过滤XXS
	 *
	 */
	function xxs()
	{
		/* 过滤XSS 攻击脚本 */
		foreach ($_GET as $key=>$val)
		{
			$_GET[$key] = addslashes(preg_replace('#<script>(.*)<\/script>#','',$val));
		}
	}
}


?>