<?php
function blog_url($id,$c='',$request_url='')
{
	global $query;
	if ($request_url =='')
	{
		$request_url = $_POST['request_url'];
	}
	switch ($_REQUEST['c'])
	{
		case "class_info";
		/* 查询分类相关信息 */
		$info = $query->one_array("select * from ".T."blog_class where id=".$id);
		$_POST['url'] = str_replace('{id}',$info['id'],$request_url);
		$_POST['url'] = str_replace('{catdir}',$info['catdir'],$_POST['url']);
		$_POST['request_url'] = '/blog/class/cid/'.$id;
		break;
		case "info";
		/* 查询博客相关信息 */
		$info = $query->one_array("select a.*,b.catdir from ".T."blog  as a left join ".T."blog_class as b on a.cid = b.id where a.id=".$id);
		$_POST['url'] = str_replace('{id}',$info['id'],$request_url);
		$_POST['url'] = str_replace('{catdir}',$info['catdir'],$_POST['url']);
		$_POST['url'] = str_replace('{Y}',date("Y",$info['dtime']),$_POST['url']);
		$_POST['url'] = str_replace('{M}',date("m",$info['dtime']),$_POST['url']);
		$_POST['url'] = str_replace('{D}',date("d",$info['dtime']),$_POST['url']);
		$_POST['request_url'] = '/blog/show/id/'.$id;
		break;
	}
	if (substr($_POST['url'],0,7) != 'http://')
	{
		$_POST['url'] = str_replace('//','/',$_POST['url']);
	}
}
?>