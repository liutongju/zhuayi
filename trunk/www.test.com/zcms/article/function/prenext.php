<?php
//----下一篇   上一篇
function prenext($id,$pre)
{
	global $query,$weburl;

	$info = $query->one_array("select a.title,dtime,a.article_generate_path,a.id,b.url,c.catdir from ".T."article as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article' left join ".T."article_class as c on a.cid = c.id where a.id ".$pre.$id." order by a.id desc limit 0 ,1");
	if (empty($info))
	{
		$info['title'] = '没有了';
		$info['url'] = $weburl;
	}
	elseif (!empty($info['article_generate_path']))
	{
		$info['url'] = str_replace(ZCMS_ROOT,'',article_generate_path($info));
	}
	elseif (empty($info['url']))
	$info['url'] = article_url($info['id']);
	return $info;
}
?>