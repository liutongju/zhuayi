<?php
/**
 * tags.class.php     ZCMS �������ļ�-�Զ��ִ�
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
	//------���캯��
	function __construct($title)
	{
		//-----ת���ַ���
		$this->title = $title;
		
	}

	//-----ץȡ�ٶȷִʽ��
	function baidu()
	{
		$result = $this->file_get_open('http://www.baidu.com/s?wd=');
		
		$result .= $this->file_get_open('http://www.baidu.com/s?pn=10&wd=');
		
		$tags = $this->jiequ('<em>','</em>',$result);
		
		//---ȥ���ظ� array_flip
		$this->tags = array_count_values($tags);
		
		//---��ȡ�������
		$xiangguan = $this->jiequ('�������','</table>',$result);
		
		$this->keywords = $this->jiequ('">','</a>',$xiangguan[0]);
		
		$this->tags = $this->tags + array_flip($this->keywords);
		
		//-------�򵥴���������
		$this->treat();
		
	}
	


	//-----Զ��ץȡ����
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
	
	//----�򵥴�������
	function treat()
	{
		
		//------��������
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
	
	//----��������
	function return_keywords()
	{
		return implode(',',$this->keywords);
	}
	
}


?>