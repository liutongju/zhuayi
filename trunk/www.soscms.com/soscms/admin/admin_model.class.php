<?php
/**
 * admin_model.class.php     SOSCMS ��̨�������,
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
 
 class admin extends Routing
 {
	//----���캯��
	function __construct()
	{
		//----������֤����
		$this->cookie = Routing::load_class('cookie');
		//------�������login�����Ļ�����֤�Ƿ��¼
		if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
		$this->cookie->verify_admin('admin_username');
	}
	
	//----��̨���
	function index()
	{
		echo '���Ǻ�̨�������';
		exit;
	}
	
	//----��̨��¼ҳ��
	function login()
	{
		//---�������COOKIE����ôֱ����ת����̨��ҳ
		$ret = $this->cookie->ret_cookie('admin_username');
		if (!empty($ret))
		{
			//$this->showmsg('���Ѿ���¼�ˣ�','/index.php?m=admin&c=index');
		}
		$this->info['username'] = 'ɺ����';
	}
	
	//-----��¼��֤
	function login_info()
	{
		//-------�ж���֤��
		$code = $this->cookie->ret_cookie('checkcode');
		if (md5($_POST['code']) != $code)
		{
			$this->showmsg('��֤�����...',-1);
		}
		$this->cookie->set_cookie('admin_username',$_POST['username']);
		$this->showmsg('��¼�ɹ���','/index.php?m=admin&c=index');
		exit;
	}
 }
 
 
 
 ?>