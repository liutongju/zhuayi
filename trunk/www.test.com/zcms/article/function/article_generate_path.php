<?php

/* 解析文章内容页生成的URL */
function article_generate_path($id,$article_generate_path)
{
	global $query;
	$info = $query->one_array("select a.id,dtime,b.catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id where a.id=".$id);
	
	$url = str_replace('{catdir}',$info['catdir'],$article_generate_path);
	$url = str_replace('{id}',$id,$url);
	$url = str_replace('{Y}',date("Y",$info['dtime']),$url);
	$url = str_replace('{M}',date("m",$info['dtime']),$url);
	$url = str_replace('{D}',date("d",$info['dtime']),$url);
	$url = str_replace('//','/',$url);
	return $url;
	
}

function article_class_generate_path($id,$article_class_path)
{
	global $query;
	$info = $query->one_array("select * from ".T."article_class as a  where a.id=".$id);
	$url = str_replace('{catdir}',$info['catdir'],$article_class_path);
	$url = str_replace('{id}',$id,$url);
	$url = str_replace('{Y}',date("Y",$info['dtime']),$url);
	$url = str_replace('{M}',date("m",$info['dtime']),$url);
	$url = str_replace('{D}',date("d",$info['dtime']),$url);
	$url = str_replace('//','/',$url);
	
	return $url;
}

?>