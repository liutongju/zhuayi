<?php

class hello_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		/* 加载DB操作类*/
		$this->load_class('db');
		
		$show['title'] = '我是显示数据的页面';
		$show['list'] = hello_modle::lists();
		//加载模板
		$this->display($show);
	}

	/* 编辑数据 */
	function edit()
	{
		$this->display();
	}

	/* 数据入库 */
	function info()
	{
		/* 加载DB操作类*/
		$this->load_class('db');
		$id = hello_modle::insert($_POST);
		echo '新增数据成功,新增的ID为->'.$id;
	}
}
?>