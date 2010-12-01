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
	//------构造函数
	function __construct($title)
	{
		//-----转码字符串
		$this->title = $title;
		
	}

	//-----抓取百度分词结果
	function baidu()
	{
		$result = $this->file_get_open('http://www.baidu.com/s?wd=');
		
		$result .= $this->file_get_open('http://www.baidu.com/s?pn=10&wd=');
		
		$tags = $this->jiequ('<em>','</em>',$result);
		
		//---去除重复 array_flip
		$this->tags = array_count_values($tags);
		
		//---截取相关搜索
		$xiangguan = $this->jiequ('相关搜索','</table>',$result);
		
		$this->keywords = $this->jiequ('">','</a>',$xiangguan[0]);
		
		$this->tags = $this->tags + array_flip($this->keywords);
		
		//-------简单处理下数组
		$this->treat();
		
	}
	


	//-----远程抓取函数
	function file_get_open($url)
	{
		$ctx = stream_context_create(array('http' => array('timeout' => 10)));
		$result = @file_get_contents($url.trim($this->title),0, $ctx);
		if($result)
		{
			return $result;
			
		}
		else
		{  
			return false;
		}
	}
	
	function jiequ($list_start , $list_end ,$str)
	{
		preg_match_all('|'.$list_start.'([^^]*?)'.$list_end.'|i', $str, $count);
		
		$count[0]=str_replace($list_start,'',$count[0]);
		
		return str_replace($list_end,'',$count[0]);
	}
	
	//----简单处理数组
	function treat()
	{
		
		//------处理数组
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
	
	//----返回数组
	function return_keywords()
	{
		return implode(',',$this->keywords);
	}
	
}


?>