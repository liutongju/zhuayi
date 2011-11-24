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
		//$this->file->domain(array('http://2.zhuayi.net/',ZHUAYI_ROOT));
		//$domain = array('url'=>'http://2.zhuayi.net/','root'=>ZHUAYI_ROOT.'//');
		//$reset = $this->file->write('/123/123.html','123',$domain);
		//$reset2 = $this->file->write('123/123.html','123');
		//$reset  = $this->file->delete('123/123.html',$domain);
		//$reset = $this->db->query('show tables;');
		//print_r($_SERVER);
		//$reset = blog_modle::blog_delete(array('id[]'=>16));
		$this->display($show);
	}

	function ceshi()
	{
		$this->cache_page = true;

		print_r(time());
	}


}