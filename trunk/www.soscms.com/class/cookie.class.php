<?php
/**
 * cookie.class.php     SOSCMS COOKIE操作类,
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
	 * 设置COOKIE
	 * @var COOKIE键值
	 * @val COOKIE值
	 */
	function set_cookie($var,$val)
	{
		return setcookie($this->cookievarpre.$var,$val,0,'/',$_SERVER['HTTP_HOST']);
	}
	
	/**
	 * 返回cookie值
	 * @var COOKIE键值
	 */
	function ret_cookie($var)
	{
		if (!empty($_COOKIE[$this->cookievarpre.$var]))
		return $_COOKIE[$this->cookievarpre.$var];
		else
		return '';
	}
	
	//----判断后台是否登录
	/**
	 * 判断是否登录
	 * @key COOKIE键值
	 */
	function verify_admin($key)
	{
		if (empty($_COOKIE[$this->cookievarpre.$key]))
		{
			Routing::showmsg('您还没有登录，或者登录超时','/index.php?m=admin&c=login');
		}
	}
}
 

?>