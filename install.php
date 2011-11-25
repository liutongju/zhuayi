<?php
/*
 * am.php     	 Zhuayi php.exe 执行
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

/* -----定义Zhuayi根目录路径  */
define('ZHUAYI_ROOT', str_replace("\\", '/', dirname(__FILE__)));

$http = new http();

getSystem();

function tips()
{
	echo "-----------------------------------------------------------------------------";
echo "
|   ########   ##     ##   ##       ##       ##      ##        ##   ##      |
|        ##    ##     ##   ##       ##    ##    ##    ##      ##    ##      |
|       ##     #########   ##       ##   ##      ##     ##   ##     ##      |
|      ##      ##     ##   ##       ##   ##########      ####       ##      |
|     ##       ##     ##    ##     ##    ##      ##       ##        ##      |
|   ########   ##     ##      #####      ##      ##       ##        ##      |\n";
	echo "-----------------------------------------------------------------------------\n";
	echo "|    全新安装 - php install.php install                                     |\n";
	echo "|    单独安装 - php install.php -f 文件路径                                 |\n";
	echo "-----------------------------------------------------------------------------\n";

}

/* main 函数 用来取输入的值,根据值调用对应的函数 */
function main($array)
{
	$ary = array();
	/* 遍历参数,第0个为文件名,抛弃, 第1个为函数名,其余转换为数组 */
	for ($i=2;$i< count($array);$i=$i+2)
	{
		$ary[$array[$i]] = $array[$i+1];
	}

	if (empty($array[1]))
	{
		tips();
		exit;
	}
	$array[1]($ary);
}

function install($ary)
{
	global $http;

	if (isset($ary['-f']))
	{
		$code = array($ary['-f']);
	}
	else
	{
		/* 读取文件目录 */
		echo "-------------------------------------------------\n";
		$url ='http://code.google.com/p/zhuayi/source/browse/trunk/resources/zhuayi.list';
		$http->get($url);
		$code = replace_code($http->results);
		$code = explode("\n",trim($code));
		if (empty($code))
		{
			echo ' 程序目录读取失败...'."\n";
			exit;
		}
		else
		{
			echo ' 程序目录读取成功! 正在安装..'."\n";
		}
	}
	

	foreach ($code as $val)
	{
		if (empty($val))
		{
			continue;
		}
		$val = explode(',',$val);

		if (empty($val[1]))
		{
			$val[1] = $val[0];
		}
		$val[1] = "<".trim($val[1]).'>';

		echo " 正在下载...".trim($val[0])."\n";
		/* 下载文件 */
		$url = 'http://zhuayi.googlecode.com/svn/trunk/'.trim($val[0]);
		$http->get($url);
		
		/* 写入文件 */
		if (write($val[0],$http->results) === true)
		{
			echo " ".trim($val[1])."安装成功! \n";
		}
		else
		{
			echo " ".trim($val[1])."安装失败... \n";

		}
		echo "-------------------------------------------------\n";
	}

	echo " 安装完毕! 请用浏览器执行install.php,进行配置!... \n";
	
}

main($argv);
exit;


function replace_code($code)
{
	$code = explode('id="src_table_0">',$code,2);
	$code = explode('</table>',$code[1],2);
	$code = str_replace('<br>',"\n",$code[0]);
	$code = str_replace('&#39;',"'",$code);
	return htmlspecialchars_decode(strip_tags($code));
	preg_match('/id="src_table_0">([\s\S]*?)<\/table>/i',$code,$code);
	print_r($code);
	exit;
	$code[1] = str_replace('<br>',"\n",$code[1]);
	$code[1] = str_replace('&#39;',"'",$code[1]);
	return htmlspecialchars_decode(strip_tags($code[1]));
}

function write($filename,$body)
{
	$filename = ZHUAYI_ROOT.'/'.$filename;

	$path = str_replace(basename($filename),'',$filename);
	if (!file_exists($path))
 	{
 		$oldumask = umask(0);
		$reset = @mkdir($path.'/',0777,true);
		@chmod($path.'/', 0777);
		umask($oldumask);

		if (!$reset)
		{
			return '创建文件夹'.$path.'失败...';
		}

 	}
	if (!@file_put_contents($filename,$body))
	{
		return '写入文件'.$filename.'失败...';
	}
	else
	{
		return true;
	}
}

class http 
{
	
	/*  超 时 时 间 */
	var $timeout = 20;

	/* 伪 造 来 路 */
	var $referer = '';
	
	var $agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1";
	
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
function getSystem()
{  
    $sys = $_SERVER['HTTP_USER_AGENT'];  
    if(stripos($sys, "NT "))
    {
    	header('Content-type: text/html; charset=GBK');
    }
    else
    {
    	header('Content-type: text/html; charset=utf-8');
    }    
  
}  
?>