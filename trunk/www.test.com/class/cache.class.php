<?php
/**
 * cache.class.php     ZCMS 主体框架文件-缓存工厂,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
 
 class cache
 {
	function __construct()
	{
		$this->cache_funs();
	
		$this->zcmsfun();
	}
	//-----载入公共函数库
	function cache_funs()
	{
		//---------复制函数库路径
		$filepath = ZCMS_ROOT.'/function/';
		//------如果缓存不存在，则生成缓存
		
		if (!file_exists(ZCMS_FUN))
		{
			
			$handle = opendir($filepath); //打开指定文件夹 .DS_Store 是输出说有的文件
			$files = array();
			$conent = '<?php'."\n";
			while (false != ($file = readdir($handle)))
			{
				//--------取的文件的后缀
				$h = trim(substr(strrchr($file,'.'),1,100)); 
				
				//--------如果是文件则包含
				if (is_file(ZCMS_ROOT.'/function/'.$file))
				{ 
					$conent .= 'include_once(ZCMS_ROOT.\'/function/'.$file.'\');'."\n";
				}
			}
			$conent .= '?>';
			closedir($handle);
			
			$this->write(ZCMS_FUN, $conent);
		}
		include_once  ZCMS_FUN ;
		
	}
	
	/**
	 * 写入文件
	 * @ file   文件名包含路径
	 * @ conent 要写入的内容
	 * @ w      权限
	 */
	function write($file,$conent,$w="w")
	{

		//-----获取写入文件路径，用来生成路径
		$filedir = str_replace(basename($file),'',$file);
		
		if (!file_exists($filedir))
		{
			mkdir($filedir,777,true);
		}
		$handle = fopen($file,$w);
		fwrite($handle,$conent);
		fclose($handle);
	}
	
	/**
	 * 生成模块函数缓存
	 *
	 */
	function zcmsfun()	{
		//---------复制函数库路径
		$filepath = ZCMS_ROOT.'/data/data_cache/zcms.function.php';
		if (file_exists($filepath))
		{
			include_once($filepath);
			return false;
		}
		
		$conent = '<?php'."\n";
		$file = handie(ZCMS_ROOT.'/zcms',1);
		foreach ($file as $key=>$val)
		{
			if (is_dir($val.'/function/'))
			{
				$fielst = handie($val.'/function',1);
				foreach ($fielst as $vas)
				{
					$conent .= 'require_once(ZCMS_ROOT.\''.str_replace(ZCMS_ROOT,'',$vas).'\');'."\n";
					//$files[] = $vas;
				}
			}
		}
		$conent .= '?>';
		
		$this->write($filepath, $conent);
		include_once($filepath);
	}
 }