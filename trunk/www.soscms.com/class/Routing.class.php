<?php
/**
 * Routing.class.php     SOSCMS �������ļ�,
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
class Routing
{
	public $url;
	//----���캯��
	function __construct()
	{
		//----��ȡ��ǰURL
		$this->url =  $_SERVER['REQUEST_URI'];
		//----��ʽ��URL
		$this->url = parse_url($this->url);
	}
	//----��ʼ��Ӧ�ó���
	function creat_app()
	{
		/**
		 *  �ж�URLģʽ��
		 *  @ ?m=**&c=**&... GET��һ��ģʽ
		 *  @ /m/c/...   MVC�ڶ���ģʽ
		 *  ���empty($this->url['query'] && $this->url['path'] ���ǵ�һ��ģʽ
		 */
		if (!empty($this->url['query']) && ($this->url['path'] == '/' || $this->url['path'] == '/index.php'))
		{
			print_r($this->url_get());
		}
		else
		{
			print_r($this->url_mvc());
		}
		$this->cache_funs();
	}
	//-----GETģʽת��������
	function url_get()
	{
		//------����&��URLת��������
		$this->url = explode('&',$this->url['query']);
		//------ѭ�����飬������ֵ��ֵ,�ó�����array('m'=>ֵ1,'c'=>ֵ2...)
		foreach ($this->url as $key=>$val)
		{
			$linshi = explode('=',$val);
			$url[$linshi[0]] = $linshi[1];
		}
		$this->url = $url;
		return $this->url;
	}
	//------MVCģʽ
	function url_mvc()
	{
		//------����&��URLת��������
		$this->url = explode('/',$this->url['path']);
		//------ɾ����һ��ֵ,��Ϊ�����ǿ�,�����Ƹ�M��C
		unset($this->url[0]);
		$url['m'] = $this->url[1];
		$url['c'] = @$this->url[2];
		//------ѭ�����鲢�Ե���ߵļ�ֵ,���Ǵӵ�3����ʼѭ����ѭ��ǰ�ж��Ƿ������M��C֮�⻹��ֵ��
		if (count($this->url)>2)
		{
			for ($i=3;$i<=count($this->url);$i=$i+2)
			{
				$j = $i+1;
				if ($j<=count($this->url))
				$url[$this->url[$i]] = $this->url[$i+1];
			}
		}
		unset($this->url);
		return $url;
	}
	//-----���빫��������
	function cache_funs()
	{
		//---------���ƺ�����·��
		$filepath = SOSCMS_ROOT.'/function/';
		//------������治���ڣ������ɻ���
		if (!file_exists(SOSCMS_FUN))
		{
			$handle = opendir($filepath); //��ָ���ļ��� .DS_Store �����˵�е��ļ�
			$files = array();
			$conent = '<?php'."\n";
			while (false != ($file = readdir($handle)))
			{
				$h = trim(substr(strrchr($file,'.'),1,100)); //--------ȡ���ļ��ĺ�׺
				if ($file != "." && $file != ".." && $file != ".DS_Store")
				{ 
					$conent .= 'require_once(SOSCMS_ROOT.\'/function/'.$file.'\');'."\n";
				}
			}
			$conent .= '?>';
			closedir($handle);
			$handle = fopen(SOSCMS_FUN,'w');
			fwrite($handle, $conent);
			fclose($handle);
		}
		require_once(SOSCMS_FUN);
	}
}
?>