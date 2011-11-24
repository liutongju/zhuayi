<?php
/*
 * admin_action.php     Zhuayi 博客
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class blog_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();
		$this->load_class('db');
		admin_action::verify();

	}

	function category()
	{
		$show['list'] = blog_modle::category(array(),' id desc','0,100');

		$this->display($show);

	}

	function category_edit($id)
	{

		if (empty($id))
		{
			$show['pagename'] = '添加博客分类';
		}
		else
		{
			$show['pagename'] = '编辑博客分类';
			$show['info'] = blog_modle::category(array('id'=>$id));
		}
		$this->display($show);
	}

	function category_info()
	{

		blog_modle::category_update($_POST);

		output::url();
	}

	function category_del()
	{
	

		blog_modle::category_delete($_POST['id']);

		echo output::json('1','');
	}

	function edit($id)
	{

		$show['category'] = blog_modle::category(array(),' id desc','0,100');

		if (empty($id))
		{
			$show['pagename'] = '添加博客';
		}
		else
		{
			$show['pagename'] = '编辑博客';
			$show['info'] = blog_modle::blog(array('id'=>$id));
		}
		$this->display($show);
	}

	function info()
	{

		/* 上传图片 */
		if ($_FILES['file1']['error'] == 0)
		{
			$this->load_class('image',true);
			$litpic = $this->image->upload($_FILES['file1'],'/data/litpic/'.time(),120);

			if ($litpic['status'] == 0)
			{
				$_POST['litpic'] = $litpic['msg'];
			}
		}
		
		if (empty($_POST['litpic']))
		{
			/* 提取缩略图 */
			$img = $this->load_fun('image',$_POST['body']);
			$_POST['litpic'] = $img[0];
		}

		blog_modle::blog_update($_POST);

		output::url('/blog/');
	}

	function del()
	{

		blog_modle::blog_delete($_POST['id']);

		echo output::json('1','');
	}

	function index()
	{

		$show['category'] = blog_modle::category(array(),' id desc','0,100');

		if (isset($_GET['title']) && !empty($_GET['title']))
		{
			$where['title'] = '{%'.$_GET['title'].'%}';
		}
		if (isset($_GET['cid']) && !empty($_GET['cid']))
		{
			$where['cid'] = $_GET['cid'];
		}
	
		$perpage = 20;
		
		$limit = ($_GET['page']-1)*$perpage.','.$perpage;

		$list = blog_modle::blog_join($where,' id desc',$limit);
		$show['list'] = $list['list'];
		$show['maxnum'] = $list['maxnum'];

		$page = new page(array('total'=>$show['maxnum'],'perpage'=>$perpage,'page_css'=>'page_css','pagebarnum'=>5));

		$show['page'] = $page->show();

		$this->display($show);
	}


}