<?php
/**
 * cookie.class.php     SOSCMS COOKIE������,
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
 
class cookie
{

	private $cookievarpre = 'sos_';
	/**
	 * ����COOKIE
	 * @var COOKIE��ֵ
	 * @val COOKIEֵ
	 */
	function set_cookie($var,$val)
	{
		return setcookie($this->cookievarpre.$var,$val,0,'/',$_SERVER['HTTP_HOST']);
	}
	
	/**
	 * ����cookieֵ
	 * @var COOKIE��ֵ
	 */
	function ret_cookie($var)
	{
		if (!empty($_COOKIE[$this->cookievarpre.$var]))
		return $_COOKIE[$this->cookievarpre.$var];
		else
		return '';
	}
	
	//----�жϺ�̨�Ƿ��¼
	/**
	 * �ж��Ƿ��¼
	 * @key COOKIE��ֵ
	 */
	function verify_admin($key)
	{
		if (empty($_COOKIE[$this->cookievarpre.$key]))
		{
			Routing::showmsg('����û�е�¼�����ߵ�¼��ʱ','/index.php?m=admin&c=login');
		}
	}
}
 

?>