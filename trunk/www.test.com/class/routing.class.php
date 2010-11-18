<?php
/**
 * routing.class.php     ZCMS �������ļ�,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 ZCMS
 */
class routing 
{
	private  $url;
	
	//----���캯��
	function __construct()
	{
		//----��ȡ��ǰURL
		//$this->url =  $_SERVER['REQUEST_URI'];
		$this->url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		
		$this->seo();
		
		//----��ʽ��URL
		$this->url = parse_url($this->url);
		$this->url_res();
	}
	//----��ʼ��Ӧ�ó��� 
	function url_res()
	{
		//-----���ع���������
		//$this->cache_funs();
		/**
		 *  �ж�URLģʽ��
		 *  @ ?m=**&c=**&... GET��һ��ģʽ
		 *  @ /m/c/...   MVC�ڶ���ģʽ
		 *  @ api.php?m=**&...  �����ʽ
		 *  ���empty($this->url['query'] && $this->url['path'] ���ǵ�һ��ģʽ
		 */
		if (!empty($this->url['query']) && ($this->url['path'] == '/' || $this->url['path'] == '/index.php'))
		{
			$this->url_get();
		}
		else
		{
			$this->url_mvc();
		}
		
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
			if (!empty($linshi[1]))
			$url[$linshi[0]] = $linshi[1];
		}
		$this->url = $url;
		//return $this->url;
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
		//$url['a'] = @$this->url[3];
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
		$this->url = $url;
	}
	
	//-----URLӳ��Ӧ�ó���
	function app()
	{
		//------��ת�����URLת��ΪREQUEST��Ӧ�õ���
		foreach ($this->url as $key=>$val)
		{
			$_REQUEST[$key] = $val;
		}
		//----����ģ��
		$_REQUEST['m'] = (empty($_REQUEST['m']) || $_REQUEST['m']=='index.php')?'index':$_REQUEST['m'];
		
		//----������
		$_REQUEST['c'] = empty($_REQUEST['c'])?'index':$_REQUEST['c'];
		
		//----����ǰ��̨�ļ�
		$_REQUEST['a'] = (empty($_REQUEST['a']) || $_REQUEST['a']!='init')?'':'admin/';
		
		//-----ӳ��ģ��·��
		$_REQUEST['m_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/'.$_REQUEST['a'].$_REQUEST['m'].'_'.$_REQUEST['c'].'.'.'php';
		
		//-----ӳ��ģ��·��
		$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/template/'.$_REQUEST['a'].$_REQUEST['m'].'_'.$_REQUEST['c'].'.'.'html';
		
		//-----����һ�����캯��,���Ҹ�ģ���µ�ȫ���ļ�,�Ǳ��룬���������ȵ��ô��ļ�,һ����ģ�������ļ�����Ը�ģ���µ�ȫ�ֱ���
		$_REQUEST['g_file'] = ZCMS_ROOT.'/zcms/'.$_REQUEST['m'].'/'.$_REQUEST['m'].'_global.php';
		
		//-----ӳ��ģ������·��,��Ҫ��������ģ�����ͼƬ��CSS����
		$_REQUEST['app_url'] = ZCMS_URL.'/zcms/'.$_REQUEST['m'].'/template/'.$_REQUEST['a'];		
	}
	
	//--------��ѯ�Ƿ����SEO����
	function seo()
	{
		global $query;
		$info = $query->one_array("select * from ".T."seo where ((instr('".$this->url."',url)  and parameter = 1) or (url ='".$this->url."' and parameter = 0)) && url<>''");
		if (!empty($info['request_url']))
		{

			//----ɾ����ǰURL�������ģ��ƥ��Ļ���ɾ��������ܶ�GET����
			$this->url = str_replace($info['url'],$info['request_url'],$this->url);
		}

	}
}

?>