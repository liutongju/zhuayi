<?php
/*
 * about_action.php     关于我们
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class about_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();
		$this->load_class('db');
	}

	function index()
	{
		$show['title'] = '关于Zhuayi';
		$this->display($show);
	}

}