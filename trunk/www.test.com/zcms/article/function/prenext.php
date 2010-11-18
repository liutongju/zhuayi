<?php
//----下一篇   上一篇
function prenext($id,$pre)
{
	global $query;
	$info = $query->one_array("select a.title,a.id,b.url from ".T."article as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article' where a.id ".$pre.$id." order by a.id asc");
	if (empty($info))
	{
		$info['title'] = '没有了';
		$info['url'] = $weburl;
	}
	elseif (empty($info['url']))
	{
		$info['url'] = article_url($info['id']);
	}
	return $info;
}
?>