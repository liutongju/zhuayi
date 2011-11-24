<?php
/**
 * memcache class
 *
 * @package default
 * @author zhuayi
 **/
class cache
{

	var $server;

	var $port;

	var $expire;

	var $power;

	var $flag = 0;

	var $debug;


	/**
	 * 构 造 函 数
	 *
	 * @author zhuayi
	 */
	function __construct($fields = array())
	{

		foreach ($fields as $key=>$val)
		{
			$this->$key = $val;
		}
		

		if (isset($_GET['cache_debug']))
		{
			/* 是否开启debug */
			$this->debug = true;
		}

		if ($this->power)
		{

			if (!function_exists('memcache_init'))
			{
				$this->mc = new Memcache;
				@$this->mc->pconnect($this->server, $this->port) or output::error('memcache 没有开启!');
				
			}
			else
			{
				$this->mc = memcache_init();
			}
			
		}
	}
	
	/**
	 * set 设 置 缓 存
	 *
	 * @author zhuayi
	 */
	function set($key,$value,$expire=0,$flag=0)
	{
		
		if (is_array($value))
		{
			$value = json_encode($value);
		}

		if ($expire == 0)
		{
			$expire = $this->expire;
		}
		if ($flag == 0)
		{
			$flag = $this->flag;
		}

		if (!$this->power)
		{
			return false;
		}

		if ($this->debug)
		{
			echo "<!--\n cache: set({$key}, {$value}, {$flag}, {$expire}) -->\n";
		}

		return memcache_set($this->mc,md5($key),$value,$flag,$expire);
	}
	
	/**
	 * increment 进行加法
	 *
	 * @param string $key 
	 * @param string $value 
	 * @return void
	 * @author 任 鑫
	 */
	function increment($key,$value)
	{
		if ($this->debug)
		{
			echo "<!-- cache::set({$key}, {$value}, {$flag}, {$expire}) -->\n";
		}

		if (!$this->power)
		{
			return false;
		}

		return $this->mc->increment(md5($key),$value);
	}
	
	/**
	 * decremen 进行减法
	 *
	 * @param string $key 
	 * @param string $value 
	 * @return void
	 * @author 任 鑫
	 */
	function decremen($key,$value)
	{
		if ($this->debug)
		{
			echo "<!-- cache_set: ({$key}, {$value}, {$flag}, {$expire}) -->\n";
		}
		return $this->mc->decremen(md5($key),$value);
	}
	
	/**
	 * get 获 取 缓 存
	 *
	 * @author zhuayi
	 */
	function get($key)
	{
		
		if (!$this->power)
		{
			return false;
		}

		$reset = memcache_get($this->mc,md5($key));
		
		if (empty($reset))
		{
			return false;
		}
		$json = json_decode($reset,true);
		if (is_array($json))
		{
			$reset =  $json;
		}
		if ($this->debug)
		{
			echo "<!--\n cache_get: {$key}";
			//print_r($reset);
			echo " \n-->\n";
		}

		return $reset;
		
	}
	
	/**
	 * delete 删 除 缓 存 
	 *
	 * @author zhuayi
	 */
	function delete($key)
	{
		return $this->mc->delete(md5($key));
	}
	
}

?>
