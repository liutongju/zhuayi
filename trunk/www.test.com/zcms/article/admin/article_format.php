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

/* 验证登录 */
verify_admin('admin_username');

$limit = 1000;
if (empty($_REQUEST['page']))
{
	$_REQUEST['page'] = 1;
	$startnum = 0 ;
}
else
$startnum =  ($_REQUEST['page']-1)*$limit;

if ($_REQUEST['tables'] == 'article')
{
	$sql = "select a.id,dtime,b.catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id limit $startnum , $limit";
	$_REQUEST['c'] = 'info';
	$url = $article_generate_path;
}
elseif ($_REQUEST['tables'] == 'article_class')
{
	$sql = "select * from ".T."article_class limit $startnum , $limit";
	$_REQUEST['c'] = 'class_info';
	$url = $article_class_path;
	$article_url = $article_class_path;
}
else
{
	showmsg('错误的来源');
}
$reset = $query->arrays($sql);

if (count($reset)==0)
{
	showmsg('恭喜你，操作成功',ret_cookie('backurl'));
}
foreach ($reset as $val)
{
	$_POST['url'] = '';
	article_url($val['id'],$_REQUEST['c'],$url);
	$_POST['parameter'] = 1;
	seo($_REQUEST['tables'],$val['id']);
}
$_REQUEST['page']++;
showmsg('已经格式化《'.($startnum+count($reset)).'》个信息','/index.php?m=article&c=format&a=init&tables='.$_REQUEST['tables'].'&page='.$_REQUEST['page']);
?>