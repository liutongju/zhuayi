<?php
/*
 * admin_action.php     Zhuayi 后台登录
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */                                                                                              
class admin_action extends zhuayi
{

	/* 构造函数 */
	function __construct()
	{
		parent::__construct();
		$this->load_class('db');

	}

	function index()
	{

		/** 验证是否登录 **/
		$show['admin'] = $this->verify();
		$show['admin']['logintime'] = $this->load_fun('dtime',$show['admin']['logintime']);
		/* 查询菜单 */
		$show['menu_list'] = admin_modle::admin_menu_list(array('parent_id'=>'0'));

		$this->display($show);
	}

	/** 获取菜单 **/
	function menu($id)
	{
		/** 验证是否登录 **/
		$this->verify();

		$show = admin_modle::admin_menu_list(array('parent_id'=>$id));

		foreach ($show as $key=>$val)
		{
			$show[$key]['menu_list'] = admin_modle::admin_menu_list(array('parent_id'=>$val['id'],'hidden'=>0));
		}
		print_r(output::json('1',$show));
	}

	/** menu_list 菜单列表 **/
	function menu_list()
	{
		/** 验证是否登录 **/
		$this->verify();

		$show['tips'] = '请在添加、修改、排序菜单全部完成后，更新菜单缓存';

		$show['menu_list'] = admin_modle::admin_menu_list();
		$show['menu_list'] = $this->load_fun('tree',$show['menu_list'],'parent_id');
		$this->display($show);
	}

	/** 编辑菜单 **/
	function menu_edit($id='',$parent_id='')
	{
		/** 验证是否登录 **/
		$this->verify();

		/* 读取后台菜单数据 */
		$show['list'] = admin_modle::admin_menu_list(array());
		if (empty($id))
		{
			$show['pagename'] = '菜单添加';
			$parent = admin_modle::admin_menu(array('id'=>$parent_id));
			$show['parent_id'] = $parent['id'];
			$show['info']['modle'] = $parent['modle'];
			$show['info']['orders'] = 0;
		}
		else
		{
			$show['pagename'] = '菜单编辑';
			$show['info'] = admin_modle::admin_menu(array('id'=>$id));
			$show['parent_id'] = $show['info']['parent_id'];
		}

		$this->display($show);
	}


	/** menu_info 提交菜单 **/
	function menu_info()
	{
		/** 验证是否登录 **/
		$this->verify();

		$id = admin_modle::admin_menu_update($_POST);

		if (empty($_POST['parent_id']))
		{
			$_POST['parent_id'] = $id;
			
			admin_modle::admin_menu_update($_POST);
		}
		output::url('/admin/menu_list');
	}

	/** menu_del 删除菜单 **/
	function menu_del($id)
	{
		/** 验证是否登录 **/
		$this->verify();

		$menu = admin_modle::admin_menu(array('parent_id'=>$id));
		if (empty($menu))
		{
			admin_modle::admin_menu_delete($id);
		}
		else
		{
			output::error('该菜单下还有未删除的菜单,请先删除!');
		}
		output::url('/admin/menu_list');
	}

	/* login 登录 */
	function login()
	{
		$this->display($show);
	}

	/* login_info */
	function login_info()
	{

		$_POST['password'] = strings::mymd5($_POST['password']);
		$_POST['code'] = md5($_POST['code']);
		if ($_POST['code'] != cookie::ret_cookie('code'))
		{
			output::error('验证码填写错误!');
		}

		/* 查询帐号 */
		$admin = admin_modle::admin($_POST);

		if (empty($admin['id']))
		{
			output::error('帐号或密码错误!');
		}

		/* 更新登录时间 */
		$array['id'] = $admin['id'];
		$array['logintime'] = time();
		$array['login_ip'] = ip::get_ip(true);
		
		admin_modle::admin_update($array);
		cookie::set_cookie('admin',$admin);

		output::url('/admin');

	}

	/*  验证是否登录 */
	function verify()
	{

		$admin = cookie::ret_cookie('admin');

		if (empty($admin['id']))
		{
			output::url('/admin/login');
		}
		else
		{
			return $admin;
		}

	}

	/** logout 退出登录 **/
	function logout()
	{
		cookie::set_cookie('admin','');
		output::url('/admin/login');
	}

	/** right 右侧 **/
	function right()
	{
		/** 验证是否登录 **/
		$reset = $this->verify();
		$this->display();
	}

	/* 验证码 */
	function checkcode()
	{
		$this->load_class('checkcode');
		cookie::set_cookie('code',$this->checkcode->get_code());

		$this->checkcode->doimage();
	}
	
	/* 管理员 */
	function user()
	{
		if (isset($_GET['username']) && !empty($_GET['username']))
		{
			$where['username'] = '{%'.$_GET['username'].'%}';
		}
	
		$perpage = 20;
		
		$limit = ($_GET['page']-1)*$perpage.','.$perpage;

		$show['list'] = admin_modle::admin($where,' id desc',$limit);
		$show['maxnum'] = admin_modle::admin_maxnum($where);

		$page = new page(array('total'=>$show['maxnum'],'perpage'=>$perpage,'page_css'=>'page_css','pagebarnum'=>5));

		$show['page'] = $page->show();

		$this->display($show);
	}

	function user_edit($id)
	{
		if (empty($id))
		{
			$show['pagename'] = '添加管理员';
		}
		else
		{
			$show['pagename'] = '编辑管理员';
			$show['info'] = admin_modle::admin(array('id'=>$id));
		}
		$this->display($show);
	}

	function user_info()
	{
		/* 查询帐号是否存在 */
		if (empty($_POST['id']))
		{
			$user = admin_modle::admin(array('username'=>$_POST['username']));

			if (!empty($user['id']))
			{
				echo output::json('-1','帐号重复,不允许添加!');
				exit;
			}

			$_POST['password'] = strings::mymd5($_POST['password']);
		}
		else
		{
			if (empty($_POST['password']))
			{
				unset($_POST['password']);
			}
			else
			{
				$_POST['password'] = strings::mymd5($_POST['password']);
			}
		}

		admin_modle::user_update($_POST);

		echo output::json('1','添加成功!');
	}

	/* 删除管理员 */
	function user_del()
	{
		admin_modle::admin_delete($_POST['id']);

		echo output::json('1','');
	}
}