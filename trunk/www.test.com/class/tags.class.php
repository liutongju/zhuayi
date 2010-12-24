<?php
/**
 * tags.class.php     ZCMS 主体框架文件-自动分词
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */


class tags
{
	var $tags;
	var $keywords;
	/* ------构造函数 */
	function __construct($title)
	{
		/* -----转码字符串 */
		$this->title = $title;
		$this->title = str_replace('：','',$this->title);
		$this->title = str_replace('“','',$this->title);
		
	}

	/* -----抓取百度分词结果 */
	function baidu()
	{
		$result = $this->file_get_open('http://74.125.71.99/search?hl=zh-CN&source=hp&biw=1366&bih=652&aq=f&aqi=&aql=&oq=&gs_rfai=&ei=utf-8&q=');
		//$result = iconv('utf-8','gbk',$result);
		//$tags = $this->jiequ('<div id="yui-main">','<!--}}end:yst web -->',$result);
		$tags = $this->jiequ('<em>','</em>',$result);
		
		/* ---去除重复 array_flip */
		$this->tags = array_count_values($tags);
		
		/* ---截取相关搜索 */
		$xiangguan = $this->jiequ('相关搜索','所有结果',$result);
		
		$this->keywords = $this->jiequ('">','</a></p>',$xiangguan[0]);
		
		$this->tags = $this->tags + array_flip($this->keywords);
		/* -------简单处理下数组 */
		$this->treat();
		
		
	}
	


	/* -----远程抓取函数 */
	function file_get_open($url)
	{
		$ctx = stream_context_create(array('http' => array('timeout' => 40)));
		$result = @file_get_contents($url.trim($this->title),0, $ctx);
		if($result)
		{
			return $result;
			
		}
		else
		{  
			return $url.trim($this->title);
		}
	}
	
	function jiequ($list_start , $list_end ,$str)
	{
		preg_match_all('|'.$list_start.'([^^]*?)'.$list_end.'|i', $str, $count);
		
		$count[0]=str_replace($list_start,'',$count[0]);
		
		return str_replace($list_end,'',$count[0]);
	}
	
	/* ----简单处理数组 */
	function treat()
	{
		
		/* ------处理数组 */
		foreach ($this->tags as $key=>$val)
		{
			foreach ($this->tags as $key2=>$val2)
			{
				if (strpos($key2,$key)!==false && strlen($key)<=20 && $key2!=$key)
				{
					$pk[] = $key;
					break;
				}
				
			}
		}
		$this->tags = array_flip($pk);
	}
	
	function return_tags()
	{
		$this->tags = array_flip($this->tags);
		
		foreach ($this->tags as $key=>$val)
		{
			foreach ($this->tags as $key2=>$val2)
			{
				if (strpos($val2,$val)!==false && $val2!=$val)
				{
					if (strlen($val2) < strlen($val))
					{
						unset($this->tags[$key2]);
					}
					else
					{
						unset($this->tags[$key2]);
					}
					break;
				}	
			}
		}
		return implode(',',$this->tags);
	}
	
	/* ----返回数组 */
	function return_keywords()
	{
		return implode(',',$this->keywords);
	}
	
}


?>