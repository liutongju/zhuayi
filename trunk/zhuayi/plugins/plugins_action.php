<?php
/*
 * plugins_action.php     Zhuayi 插件库
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class plugins_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();
		$this->load_class('db');
		admin_action::verify();

	}



	function index()
	{

		if (isset($_GET['title']) && !empty($_GET['title']))
		{
			$where['title'] = '{%'.$_GET['title'].'%}';
		}

		$perpage = 20;
		
		$limit = ($_GET['page']-1)*$perpage.','.$perpage;

		$show['list'] = plugins_modle::plugins($where,' id desc',$limit);
		$show['maxnum'] = plugins_modle::plugins_maxnum($where);

		$page = new page(array('total'=>$show['maxnum'],'perpage'=>$perpage,'page_css'=>'page_css','pagebarnum'=>5));

		$show['page'] = $page->show();

		$this->display($show);
	}

	function edit($id)
	{

		if (empty($id))
		{
			$show['pagename'] = '添加插件';
		}
		else
		{
			$show['pagename'] = '编辑插件';
			$show['info'] = plugins_modle::plugins(array('id'=>$id));
		}
		$this->display($show);
	}

	function info()
	{

		plugins_modle::plugins_update($_POST);

		output::url('/plugins/index');
	}

	function del()
	{

		plugins_modle::plugins_delete($_POST['id']);

		echo output::json('1','');
	}

	function fun()
	{
		if (empty($_GET['pid']))
		{
			output::error('错误的来路');
		}
		else
		{
			$show['pid'] = $_GET['pid'];
		}
		$where['pid'] = $show['pid'];

		if (isset($_GET['title']) && !empty($_GET['title']))
		{
			$where['title'] = '{%'.$_GET['title'].'%}';
		}
		
		$perpage = 20;
		
		$limit = ($_GET['page']-1)*$perpage.','.$perpage;

		$show['list'] = plugins_modle::fun_list($where,' id desc',$limit);

		$this->display($show);
	}

	function fun_edit($id)
	{
		if (empty($_GET['pid']) && empty($id))
		{
			output::error('错误的来路');
		}
		else
		{
			$show['pid'] = $_GET['pid'];
		}

		if (empty($id))
		{
			$show['pagename'] = '添加方法';
		}
		else
		{
			$show['pagename'] = '编辑方法';
			$show['info'] = plugins_modle::fun_list(array('id'=>$id));
			$show['pid'] = $show['info']['pid'];
		}
		$this->display($show);
	}

	function fun_info()
	{

		plugins_modle::fun_update($_POST);

		output::url('/plugins/fun?pid='.$_POST['pid']);
	}

	function fun_del()
	{

		plugins_modle::fun_delete($_POST['id']);

		echo output::json('1','');
	}



}