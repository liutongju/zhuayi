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
		$this->load_class('http',true);
		$url = 'http://code.google.com/p/zhuayi/source/browse/trunk/plugins/email/phpmailer.class.php';

		$this->http->get($url);
		//$this->http->results = preg_replace("/\n/",'',$this->http->results);
		$this->http->results = explode('id="src_table_0">',$this->http->results,2);
		$this->http->results = explode('</table>',$this->http->results[1],2);
		$code = str_replace('<br>',"\n",$this->http->results[0]);
		$code = str_replace('&#39;',"'",$code);
		$code = htmlspecialchars_decode(strip_tags($code));
		print_r($code);
		exit;
		preg_match('/<td class="source">([\s\S]*?)<\/table>/',$this->http->results,$code);
		//'<table id="src_table_0">';
		//$code[1] = str_replace('<br>',"\n",$code[1]);
		//$code[1] = str_replace('&#39;',"'",$code[1]);
		//$code = htmlspecialchars_decode(strip_tags($code[1]));
		print_r($code);
		//$this->file->domain(array('http://2.zhuayi.net/',ZHUAYI_ROOT));
		//$domain = array('url'=>'http://2.zhuayi.net/','root'=>ZHUAYI_ROOT.'//');
		//$reset = $this->file->write('/123/123.html','123',$domain);
		//$reset2 = $this->file->write('123/123.html','123');
		//$reset  = $this->file->delete('123/123.html',$domain);
		//$reset = $this->db->query('show tables;');
		//print_r($_SERVER);
		//$reset = blog_modle::blog_delete(array('id[]'=>16));
		//$this->display($show);
	}

	function ceshi()
	{
		$this->cache_page = true;

		print_r(time());
	}


}