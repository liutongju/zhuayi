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
		//----载入验证码类
		$this->cookie = Routing::load_class('cookie');
		//------如果不是login方法的话则验证是否登录
		if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
		$this->cookie->verify_admin('admin_username');
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
		$ret = $this->cookie->ret_cookie('admin_username');
		if (!empty($ret))
		{
			//$this->showmsg('您已经登录了！','/index.php?m=admin&c=index');
		}
		$this->info['username'] = '珊瑚虫';
	}
	
	//-----登录验证
	function login_info()
	{
		//-------判断验证码
		$code = $this->cookie->ret_cookie('checkcode');
		if (md5($_POST['code']) != $code)
		{
			$this->showmsg('验证码错误...',-1);
		}
		$this->cookie->set_cookie('admin_username',$_POST['username']);
		$this->showmsg('登录成功！','/index.php?m=admin&c=index');
		exit;
	}
 }
 
 
 
 ?>