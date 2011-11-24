<?php
/**
 * index.php     Zhuayi 消息输出类
 *
 * @copyright    (C) 2005 - 2010  Zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */
class output extends zhuayi
{

	/**
	 * 错误页面,
	 *
	 * @param string $title 错误页面提示性文字
	 */
	function error($title='未知错误!',$msg='',$url='')
	{
		if (empty($url))
		{
			$url = @$_SERVER['HTTP_REFERER'];
		}
		
		$show['title'] = $title;
		$show['msg'] = $msg;
		$show['url'] = $url;

		require  dirname(__FILE__).'/template/error.html';

		//zhuayi::display($show,$tpl);
		exit;
	}

	/**
	 * 404,
	 *
	 * @param string $title 错误页面提示性文字
	 */
	function _404($title='未知错误!')
	{
		$show['title'] = $title;

		$tpl =  dirname(__FILE__).'/template/404.html';

		zhuayi::display($tpl,$show);
		exit;
	}

	/**
	 * 返回JSON数据,
	 *
	 * @param string $title 错误页面提示性文字
	 */
	function json($status = 0 ,$msg = '')
	{
		return json_encode(array('status'=>$status,'msg'=>$msg));
	}

	/**
	 * 返回数组,
	 *
	 * @param string $title 错误页面提示性文字
	 */
	function arrays($status = 0 ,$msg = '')
	{
		return array('status'=>$status,'msg'=>$msg);
	}

	/**
	 * 跳转URL
	 *
	 * @param string $title 错误页面提示性文字
	 */
	function url($url)
	{
		if (empty($url))
		{
			$url = $_SERVER['HTTP_REFERER'];
		}
		header("Location: ".$url);
	}
}
?>