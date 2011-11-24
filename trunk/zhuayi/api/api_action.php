<?php

class api_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();

	}

	/* 上传图片接口 */
	function upload($file,$filename = '/data/keditor/',$zomm = '',$mark = '')
	{
		$this->load_class('image',true);

		$reset = $this->image->upload($_FILES[$file],$filename.time(),$zomm);

		if ($reset['status'] == 1)
		{
			$reset2['error'] = 0;
			$reset2['url'] = $reset['msg'];
		}
		else
		{
			$reset2['error'] = 1;
			$reset2['message'] = $reset['msg'];
		}		

		echo json_encode($reset2);
	}


	/* 获取关键词接口 */
	function tags($title,$act='echo')
	{
		$api = 'http://keyword.discuz.com/related_kw.html?title='.$title.'&ics=utf-8&ocs=utf-8';
		$data = @implode('', file($api));
		if($data)
		{
			$parser = xml_parser_create();
			xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
			xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
			xml_parse_into_struct($parser, $data, $values, $index);
			xml_parser_free($parser);
			
			$kws = array();
			foreach($values as $valuearray) 
			{
				if ($valuearray['tag'] == 'kw' || $valuearray['tag'] == 'ekw')
				{
					$kws[] = trim($valuearray['value']);
				}
			}
			$return = '';
			if ($kws)
			$reset =   @implode(',',$kws);
			else
			$reset =   '';
		}
		else
		{
			$reset =  '';
		}

		if ($act == 'echo')
		{
			echo $reset;
		}
		else
		{
			return $reset;
		}
		
	}
}
?>