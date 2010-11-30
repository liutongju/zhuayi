<?php
//----下一篇   上一篇
function taobao_article_prenext($id,$cid,$pre)
{
	global $query,$infourl;

	$info = $query->one_array("select a.title,a.id,b.url from ".T."article as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article'  where a.id ".$pre.$id." and a.cid ='".$cid."' order by a.id desc limit 0 ,1");
	if (empty($info))
	{
		$info['title'] = '没有了';
		$info['url'] = $infourl;
	}
	else
	{
		$info['url'] = $infourl.'/aid/'.$info['id'];
	}
	return $info;
}
?>