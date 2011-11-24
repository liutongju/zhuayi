<?php
/*
 * strings.php     Zhuayi 字符串操作类
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

 class strings
 {
 	function __construct() 
 	{
 		
 	}

 	/**
 	 * limit 根据指定的字符数目对一段字符串进行截取
 	 *
 	 * 截取字符串(UTF-8)
	 *
	 * @param string $string 原始字符串
	 * @param $start 开始截取位置
	 * @param $len 需要截取的偏移量
	 * $type=1 等于1时末尾加'...'不然不加
 	 **/
	function limit($string, $start, $len, $byte=3)
 	{
 		$string = htmlspecialchars_decode($string);
 		if (empty($string))
 		{
 			return $string;
 		}
 		$string = preg_replace("/\n|\r|&nbsp;/i",'',self::strip($string));
 		$str    = "";
		$count  = 0;
		$str_len = strlen($string);
		for ($i=0; $i<$str_len; $i++)
		{
			if (($count+1-$start)>$len)
			{
				break;
			}
			elseif ((ord(substr($string,$i,1)) <= 128) && ($count < $start))
			{
				$count++;
			}
			elseif ((ord(substr($string,$i,1)) > 128) && ($count < $start))
			{
				$count = $count+2;
				$i    = $i+$byte-1;
			} 
			elseif ((ord(substr($string,$i,1)) <= 128) && ($count >= $start))
			{
				$str  .= substr($string,$i,1);
				$count++;
			} 
			elseif ((ord(substr($string,$i,1)) > 128) && ($count >= $start))
			{
				$str  .= substr($string,$i,$byte);
				$count = $count+2;
				$i    = $i+$byte-1;
			}
		}
		return htmlspecialchars($str);
 	}

 	/**
 	 * iconvn 字符串转码
 	 *
 	 * @return void
 	 * @author 
 	 **/
	function iconvn($string,$outEncoding ='UTF-8')      
	{      
		$encoding = "GBK";      
		for($i=0;$i<strlen($string);$i++)      
		{      
			if(ord($string{$i})<128)      
			continue;      

			if((ord($string{$i})&224)==224)      
			{      
				//第一个字节判断通过      
				$char = $string{++$i};      
				if((ord($char)&128)==128)      
				{      
					//第二个字节判断通过      
					$char = $string{++$i};      
					if((ord($char)&128)==128)      
					{      
						$encoding = "UTF-8";      
						break;      
					}      
				}      
			}      

			if((ord($string{$i})&192)==192)      
			{      
				//第一个字节判断通过      
				$char = $string{++$i};      
				if((ord($char)&128)==128)      
				{      
					// 第二个字节判断通过      
					$encoding = "GB2312";      
					break;      
				}      
			}      
		}      

		if(strtoupper($encoding) == strtoupper($outEncoding))
		{
			return $string;
		}     
		else
		{
			return iconv($encoding,$outEncoding,$string); 
		}
	}

	/**
	 * strip 过滤HTML
	 *
	 * @return void
	 * @author 
	 **/
	function strip($string)
	{
		return strip_tags($string);
	}

	/**
	 * mymd5 加密字符串
	 *
	 * @return void
	 * @author 
	 **/
	 function mymd5($string)
	 {
	 	return md5($string.md5($string));
	 }

 }