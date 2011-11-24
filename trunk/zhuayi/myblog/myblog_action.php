<?php
/*
 * myblog_action.php     Zhuayi 博客
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class myblog_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();
		$this->load_class('db');

	}

	/* 前端article列表 */
	function index($id)
	{

		if (empty($id))
		{
			output::error('访问的页面不存在...','','/');
		}

		$tpl = '';

		if ($id == 6)
		{
			$tpl = 'myblog_update';
		}

		if ($id == 8)
		{
			$order = ' id asc';
		}
		else
		{
			$order = ' id desc';
		}

		$where = array();
		
		$perpage = 10;
		
		$limit = ($_GET['page']-1)*$perpage.','.$perpage;

		$show['category'] = article_modle::category(array('id'=>$id));

		if (empty($show['category']['id']))
		{
			output::error('访问的页面不存在...','','/');
		}

		$show['title'] = $show['category']['category'];

		$where['cid'] = $id;

		$list = article_modle::article_join($where,$order,$limit);
		$show['list'] = $list['list'];
		$show['maxnum'] = $list['maxnum'];

		$page = new page(array('total'=>$show['maxnum'],'perpage'=>$perpage,'page_css'=>'page_css','pagebarnum'=>5));

		$show['page'] = $page->show();

		$this->display($show,$tpl);
	}

	/* 前台show */
	function show($id)
	{
		
		$show['info'] = article_modle::article_join(array('id'=>$id));

		

		if (empty($show['info']['id']))
		{
			output::error('访问的页面不存在...','','/');
		}
		$show['info']['click']++;

		$show['title'] = $show['info']['title'].' - '.$show['info']['category']['category'];

		$show['info']['tags'] = explode(',',$show['info']['tags']);
		$tags = & $show['info']['tags'];

		foreach ($tags as $key=>$val)
		{
			if (!empty($val))
			{
				$tags[$key] = '<a href="/mytags/'.$val.'">'.$val.'</a>';
			}
		}
		$tags = implode('',$tags);
		unset($tags);

		/* 更新点击数 */
		article_modle::article_update(array('click'=>$show['info']['click'],'id'=>$show['info']['id']));

		if ($show['info']['category']['id'] == '7')
		{
			$tpl = 'article_plugins';
		}
		if ($show['info']['cid'] == 8)
		{
			$tpl = 'myblog_code';
		}
		$this->display($show,$tpl);
	}

	function right()
	{
		/* 获取全部分类 */
		$show['category_list'] = article_modle::article_class();
		/* 获取每日更新 */
		$show['article_new_list'] = article_modle::article_new_list();

		/* 获取热门分类 */
		$show['article_hot_list'] = article_modle::article_hot_list();

		require $this->load_tpl('myblog_right');
	}

}