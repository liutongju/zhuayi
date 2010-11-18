<?php

//-------解析文章内容页生成的URL
function article_generate_path($info)
{
	$info['article_generate_path'] = str_replace('{catdir}',$info['catdir'],$info['article_generate_path']);
	$info['article_generate_path'] = str_replace('{id}',$info['id'],$info['article_generate_path']);
	$info['article_generate_path'] = str_replace('{Y}',date("Y",$info['dtime']),$info['article_generate_path']);
	$info['article_generate_path'] = str_replace('{M}',date("m",$info['dtime']),$info['article_generate_path']);
	$info['article_generate_path'] = str_replace('{D}',date("d",$info['dtime']),$info['article_generate_path']);
	$info['article_generate_path'] = str_replace('//','/',$info['article_generate_path']);
	return ZCMS_ROOT.$info['article_generate_path'];
	
}


?>