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
		//------�������login�����Ļ�����֤�Ƿ��¼
		if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
		cookie::verify_admin('admin_username');	
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
		$ret = cookie::ret_cookie('admin_username');
		if (!empty($ret))
		{
			$this->showmsg('���Ѿ���¼�ˣ�','/index.php?m=admin&c=index');
		}
		//echo get_class($this);
		$this->info['username'] = 'ɺ����';
	}
	
	//-----��¼��֤
	function login_info()
	{
		cookie::set_cookie('admin_username',$_POST['username']);
		$this->showmsg('��¼�ɹ���','/index.php?m=admin&c=index');
		exit;
	}
	function arrays()
	{
		return array(0,1,2,3,4,5);
	}
 }
 
 
 
 ?>