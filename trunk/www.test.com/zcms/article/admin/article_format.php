<?php
/**
 * admin_info.php     ZCMS 后台文章入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');

if ($_REQUEST['tables'] == 'article')
{
	$sql = "select a.id,dtime,b.catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id ";
	$fun = 'article_generate_path';
	$article_url = $article_news_url;
	$fun2 = 'article_url';}
elseif ($_REQUEST['tables'] == 'article_class')
{
	$sql = "select * from ".T."article_class ";
	$fun = 'article_class_generate_path';
	$article_url = $article_class_url;
	$fun2 = 'article_class_url';}
else
{
	showmsg('错误的来源');
}
$reset = $query->query($sql);
while ($row = $query->fetch_array($reset))
{
	if ($article_generate == 0)
	{
		$row['url']= str_replace('{id}',$row['id'],$article_url);
	}
	elseif ($article_generate == 1)
	{
		$row['url'] = $fun($row['id']);
	}
	$query->query("update ".T."seo set request_url = '".$fun2($row['id'])."' , url = '".$row['url']."' ,parameter=1  where aid<>0 and  tables ='".$_REQUEST['tables']."' and aid=".$row['id']);
}

showmsg('恭喜你，操作成功',ret_cookie('backurl'));
?>