<?php
/**
 * http.class.php     Zhuayi CURL 操 作 类
 *
 * @copyright    (C) 2005 - 2010  Zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 * 
 * ------------------------------------------------
 * $this->load_class('http',true);
 * 
 * // 设 置 来 路
 * $this->http->referer = 'http://www.baidu.com';
 * 
 * // 设 置 COOKIE 
 * $cookie = array();
 * $cookie['cookie1_key'] = 'cookie1_val';
 * $cookie['cookie2_key'] = 'cookie2_val';
 * $this->http->cookie = $cookie;
 * 
 * // 设 置 POST 提 交 ,
 * $this->http->post(url,参 数);
 * 
 * // 设 置 POST 提 交 并 上 传 文 件,
 * $this->http->post(url,array('参 数'=>' 参 数 1 值',filename'=>'@$val'));
 * 
 * // 设 置 GET
 * $this->http->get(url,array('参 数'=>' 参 数 1 值'...));
 * -------------------------------------------------
 */

class http 
{
	
	/*  超 时 时 间 */
	var $timeout = 30;

	/* 伪 造 来 路 */
	var $referer = '';
	
	var $agent = '';
	
	var $accept = "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
	
	/* 验证用户 username:password*/
	var $userpassword = '';

	/* CURL 返 回 错 误 */
	var $error = '';

		/**
		* 构造函数
		*/
	function __construct()
	{
		$this->curl = curl_init();
	}

	function exec($url,$method = 'GET',$parame = array()) 
	{
		/* 格 式 化 URL */
		$url_parts = parse_url($url);
            
		if (!empty($parame) && $method == 'GET')
		{
			$parame = http_build_query($parame);
			
			/* 设 置 GET  参 数 */
			if (strpos($url,'?') === false)
			{
				$url .= "?";
			}
			else
			{
				$url .= "&";
			}
			$url .= $parame;
		}
		
		curl_setopt($this->curl, CURLOPT_URL,$url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($this->curl, CURLOPT_TIMEOUT,$this->timeout);
		curl_setopt($this->curl, CURLOPT_HEADER, 1);
		
		/* 支 持 SSL */
		if ($url_parts['scheme'] == 'https')
		{
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); 
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
		}

		if (!empty($this->userpassword))
		{
			curl_setopt($this->curl,CURLOPT_USERPWD,$this->userpassword);
		}
		

		/* 伪 造 来 路 页 面 */
		if (!empty($this->referer))
		{
			curl_setopt($this->curl, CURLOPT_REFERER, $this->referer); 
		}
		
		/* 模 拟 浏 览 器 */
		if (!empty($this->agent))
		{
			curl_setopt($this->curl,CURLOPT_USERAGENT,$this->agent); 
		}
		
		/* 设 置 cookie */
		if (!empty($this->cookie))
		{
			curl_setopt ($this->curl, CURLOPT_COOKIE , $this->_cookies($this->cookie) );
		}
		
		/* POST 提 交 */
		if ($method == 'POST')
		{
			curl_setopt($this->curl, CURLOPT_POST, 1);
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parame);
		}
		
		
		curl_setopt($this->curl,CURLOPT_HTTPHEADER,array(
			'CONNECTION:""',
			'Accept-Language:zh-CN,zh;q=0.8',
			'Accept-Encoding:""',
			'CACHE_CONTROL:max-age=0',
			'ACCEPT:'.$this->accept,
			'ACCEPT_CHARSET:GBK,utf-8;q=0.7,*;q=0.3'
		));

		$this->results = curl_exec($this->curl) or $this->error = curl_error($this->curl);
		
		
		$this->status = curl_errno($this->curl);
		
		/* 返 回 状 态 吗 */
		$this->http_status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		$this->content_type = curl_getinfo($this->curl, CURLINFO_CONTENT_TYPE);

		/* 格式化COOKIE */
		$this->setcookies();

		if (isset($_GET['debug']))
		{
			$debug = curl_getinfo($this->curl);
			$debug['results'] = $this->results;
			echo '<!--http:'."\n";
			print_r($debug);
			//print_r($this);
			echo '-->'."\n";
		}
		//curl_close($this->curl);
		//unset($this->curl);
	}
	
	/**
	 * _cookies 转 换 cookie
	 *
	 * @param string $array 
	 * @param string $f 
	 * @return void
	 * @author zhuayi
	 */
	function _cookies($array = '')
	{
	    
	    if (empty($array) && !is_array($array))
	    {
			return $array;
	    }
	    foreach ($array as $key=>$val)
	    {
			$cookie[] = $key."=".$val;
	    }
	    
	    return implode(';',$cookie);
	}
	
	/**
	 * get
	 *
	 * @param string $url 
	 * @param string $array 
	 * @return void
	 * @author zhuayi
	 */
	function get($url,$array = array())
	{
		$this->exec($url,'GET',$array);

		return $this;
	}
	
	/**
	 * get_links
	 *
	 * @param string $url 
	 * @param string $array 
	 * @return void
	 * @author zhuayi
	 */
	function links()
	{
		//$this->get($url,$array);
		$this->results = $this->_striplinks($this->results);
	}
	
	/**
	 * post 
	 *
	 * @param string $url 
	 * @param string $array 
	 * @return void
	 * @author zhuayi
	 */
	function post($url,$array = array(),$multi = false)
	{
		$this->exec($url,'POST',$array,$multi);
	}

	function _striplinks($document)
	{
		preg_match_all("'<\s*a\s.*?href\s*=\s*			# find <a href=
						([\"\'])?					# find single or double quote
						(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching
													# quote, otherwise match up to next space
						'isx",$document,$links);
						

		// catenate the non-empty matches from the conditional subpattern
		$match = array();
		while(list($key,$val) = each($links[2]))
		{
			if(!empty($val))
				$match[] = $val;
		}				
		
		while(list($key,$val) = each($links[3]))
		{
			if(!empty($val))
				$match[] = $val;
		}		
		
		// return the links
		return $match;
	}

	function setcookies()
	{

		$this->results = explode("\n",$this->results);
		foreach ($this->results as $key=>$val)
		{
			$val = trim($val);

			if (empty($val))
			{
				unset($this->results[$key]);
			}

			if ($key == 0 )
			{
				unset($this->results[$key]);
				$this->headers[] = $val;
			}
			if (!empty($val) && $key > 0  && preg_match("/^[a-z\:]/i",substr($val,0,20)) && $key<20)
			{
				/* 取出COOKIE */
				if(preg_match('/^set-cookie:[\s]+([^=]+)=([^;]+)/i', $val,$match))
				{
					$this->cookies[$match[1]] = urldecode($match[2]);
				}
				
				$this->headers[] = $val;
				unset($this->results[$key]);
			}

			if ($key > 20)
			{
				break;
			}

		}

		$this->results = implode("\n",$this->results);
	}

} 

?>
