<?php
/**
 * admin_info.php     ZCMS ��̨����������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* ��֤��¼ */
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
	$fun = 'article_generate_path';
	$article_url = $article_generate_path;
	$fun2 = 'article_url';
}
elseif ($_REQUEST['tables'] == 'article_class')
{
	$sql = "select * from ".T."article_class limit $startnum , $limit";
	$fun = 'article_class_generate_path';
	$article_url = $article_class_path;
	$fun2 = 'article_class_url';
}
else
{
	showmsg('�������Դ');
}
$reset = $query->arrays($sql);

if (count($reset)==0)
{
	showmsg('��ϲ�㣬�����ɹ�',ret_cookie('backurl'));
}
foreach ($reset as $val)
{
	$val['url'] = $fun($val['id'],$article_url);
	$_POST['url'] = $val['url'];
	$_POST['request_url'] = $fun2($val['id']);
	$_POST['parameter'] = 1;
	seo($_REQUEST['tables'],$val['id']);
}
$_REQUEST['page']++;
showmsg('�Ѿ���ʽ����'.($startnum+count($reset)).'������Ϣ','/index.php?m=article&c=format&a=init&tables='.$_REQUEST['tables'].'&page='.$_REQUEST['page']);
?>