<?php
/**
 * admin_edit.php     ZCMS ����show
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

$id = inject_check($_REQUEST['id']);
$info = $query->one_array("select a.*,b.classname,c.url as classurl from ".T."blog as a left join ".T."blog_class as b on a.cid= b.id left join ".T."seo as c on b.id =c.aid and c.tables='blog_class' where a.id =".$_REQUEST['id']);
if (empty($info))
{
	error_404();
}

if (empty($seo['seo_title']))
{
	$seo['seo_title'] = $info['title'].' - '.$info['classname'];
}

$seo['seo_title'] .= ' - Powered by Zcms!';

/* ת��TAGS */
$info['tags'] = explode(',',$info['tags']);
foreach ($info['tags'] as $val)
{
	$tags .= '<a href="/tags/search/tags/'.$val.'" target="_blank">'.$val.'</a> ';
}
$info['tags'] = $tags;

/* ����Ƿ����ؼ��������滻 */
if ($key_highlight == 1)
{
	/* ����ʿ� */
	include_once ZCMS_CACHE.'zkeylink.php';
	/* ���л����� */
	$keylink = unserialize($zkeylink);
	$highlight_array = array();
	$info['body'] = highlight($info['body'],$keylink['title'],$keylink['url']);
}

/* ���µ���� */
$query->query("update ".T."blog set click = click+1 where id =".$id);

?>