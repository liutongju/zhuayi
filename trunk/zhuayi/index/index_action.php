<?php
/*
 * index_action.php     Zhuayi
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class index_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();

		$this->load_class('db');

	}

	function index()
	{
		$show['plugin_list'] = plugins_modle::plugins(array(),' id asc ','0,7');
		$show['title'] = $this->webname;
		$this->display($show);
	}

	function ceshi()
	{
		$this->cache_page = true;

		print_r(time());
	}


}