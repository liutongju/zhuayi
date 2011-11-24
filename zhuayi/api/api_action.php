<?php

class api_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();

	}


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
}
?>