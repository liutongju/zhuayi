<?php
/**
 * admin_info.php     ZCMS 后台文章栏目入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
 

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加栏目';
	$_POST['id'] = $query->save("article_class",$_POST);
}
else
{
	$pagename = '修改栏目';
	
	if (is_array($_REQUEST['orders']))
	{
		$pagename = '排序栏目';

		foreach ($_REQUEST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("article_class",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("article_class",$_POST,' id = '.$_POST['id']);
		if (!empty($_POST['url']))
		{
			$_POST['request_url'] = article_class_url($_POST['id']);  //项目原始url，自定义url时使用
		}

		//---------写入SEO表
		seo('article_class',$_POST['id']);
	}	
}

//---------写入日志
admin_log("article_class",$_POST['id'],'classname',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>