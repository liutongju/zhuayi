<?php

/**
 *  文件操作类
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 * <code>
 * $this->load_class('file',true);
 * //遍历目录
 * $reset = $this->file->filelist('zhuayi',true,true);
 * //写入文件
 * $reset = $this->file->write('1.html',time());
 * //删除文件或目录
 * $reset = $this->file->delete('test',true);
 * </code>
 */

 class file
 {

 	function __construct($fields = array())
	{
		foreach ($fields as $key=>$val)
		{
			$this->$key = $val;
		}

	}
 	/**
 	 * file_path 转换路径
 	 *
 	 * @return void
 	 * @author 
 	 *
 	 */
 	private function file_path($filename,$domain='')
 	{
 		if (empty($domain))
 		{
 			$domain = $this->path[array_rand($this->path)];
 		}

 		/* 去掉domain filename 左侧第一个"/" */
 		if (substr($filename,0,1) == '/')
 		{
 			$filename = substr($filename,1,strlen($filename)-1);
 		}
 		/* 判断$domain url 最后一个是不是"/",如果不是,则加上"/" */
 		if (substr($domain['url'],-1,1) != '/')
 		{
 			$domain['url'] = '/';
 		}

 		if (strpos($filename,$domain['root']) === false)
 		{
 			$filename = $domain['root'].'/'.$filename;
 		}
 		if (!preg_match('/^sae(.*)/i',$domain['root']))
 		{

 			$filename = str_replace("//", '/', $filename);
 		}
 		
 		$domain['filename'] = $filename;

 		return $domain;
 	}


 	/**
 	 * mkdir_file 创建文件夹 
 	 *
 	 * @return void
 	 * @author 
 	 *
 	 */
 	private function mkdir_file($file_path)
 	{

 		/* 如果是sae数据流则不创建文件夹 */
 		if (preg_match('/^sae(.*)/i',$file_path))
 		{
 			return true;
 		}

 		if (!file_exists($file_path))
 		{

 			$oldumask = umask(0);
			$reset = @mkdir($file_path.'/',0777,true);
			@chmod($file_path.'/', 0777);
			umask($oldumask);

			if (!$reset)
			{
				return output::arrays('-1','创建文件夹'.$file_path.'失败...');
			}
			else
			{
				return true;
			}
 		}
 		else
 		{
 			return true;
 		}

 	}

 	/**
 	 * write 写入文件 
 	 *
 	 * @return void
 	 * @author 
 	 *
 	 */
 	public function write($filename , $conent = '',$domain=array(), $purview = 'w+')
 	{

 		$filename = $this->file_path($filename,$domain);


 		$file_path = $this->mkdir_file(dirname($filename['filename']));

 		if (is_array($file_path))
 		{
 			return $file_path;
 		}

		if (!@file_put_contents($filename['filename'],$conent))
		{
			return output::arrays('-1','写入文件'.$filename['filename'].'失败...');
		}
		else
		{

			return $this->results($filename);
		}

 	}


 	/**
 	 * delete 删除文件,  
 	 *
 	 * @param string $filename 文件名称,可以是目录名
 	 * @param string $domain 文件存放domain 
 	 * @author zhuayi
 	 *
 	 */
 	function delete($filename,$domain)
 	{
 		if (empty($domain))
 		{
 			return output::arrays('-1','domain为空不可删除..');
 		}
 		$filename = $this->file_path($filename,$domain);

 		if (@unlink($filename['filename']))
 		{
 			return true;
 		}
 		else
 		{
 			return output::arrays('-1','删除失败..');
 		}
 	
 	}

 	/**
 	 * results 替换URL地址,  
 	 *
 	 * @param string $filename 数组,key是返回URL,key2为路径
 	 * @author zhuayi
 	 *
 	 */
 	function results($filename)
 	{

 		return str_replace($filename['root'],$filename['url'],$filename['filename']);
 	}
 }