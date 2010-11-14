<?php
/**
 * cache.class.php     ZCMS �������ļ�-���湤��,
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
	//-----���빫��������
	function cache_funs()
	{
		//---------���ƺ�����·��
		$filepath = ZCMS_ROOT.'/function/';
		//------������治���ڣ������ɻ���
		
		if (!file_exists(ZCMS_FUN))
		{
			
			$handle = opendir($filepath); //��ָ���ļ��� .DS_Store �����˵�е��ļ�
			$files = array();
			$conent = '<?php'."\n";
			while (false != ($file = readdir($handle)))
			{
				//--------ȡ���ļ��ĺ�׺
				$h = trim(substr(strrchr($file,'.'),1,100)); 
				
				//--------������ļ������
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
	 * д���ļ�
	 * @ file   �ļ�������·��
	 * @ conent Ҫд�������
	 * @ w      Ȩ��
	 */
	function write($file,$conent,$w="w")
	{

		//-----��ȡд���ļ�·������������·��
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
	 * ����ģ�麯������
	 *
	 */
	function zcmsfun()	{
		//---------���ƺ�����·��
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