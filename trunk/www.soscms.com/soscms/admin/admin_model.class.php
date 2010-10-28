<?php
/**
 * admin_model.class.php     SOSCMS 后台管理面板,
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
 
 class admin extends Routing
 {
	//----构造函数
	function __construct()
	{
		//------如果不是login方法的话则验证是否登录
		if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
		cookie::verify_admin('admin_username');	
	}
	
	//----后台面板
	function index()
	{
		echo '我是后台管理面板';
		exit;
	}
	
	//----后台登录页面
	function login()
	{
		//---如果存有COOKIE，那么直接跳转到后台首页
		$ret = cookie::ret_cookie('admin_username');
		if (!empty($ret))
		{
			$this->showmsg('您已经登录了！','/index.php?m=admin&c=index');
		}
		//echo get_class($this);
		$this->info['username'] = '珊瑚虫';
	}
	
	//-----登录验证
	function login_info()
	{
		cookie::set_cookie('admin_username',$_POST['username']);
		$this->showmsg('登录成功！','/index.php?m=admin&c=index');
		exit;
	}
	function arrays()
	{
		return array(0,1,2,3,4,5);
	}
 }
 
 
 
 ?>