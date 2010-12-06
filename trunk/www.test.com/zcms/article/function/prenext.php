<?php
/* 下一篇   上一篇 */
function prenext($id,$pre,$order)
{
	global $query,$weburl;

	$info = $query->one_array("select a.title,dtime,a.id,b.url,c.catdir from ".T."article as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article' left join ".T."article_class as c on a.cid = c.id where a.id ".$pre.$id." order by a.id ".$order." limit 0 ,1");
	if (empty($info))
	{
		$info['title'] = '没有了';
		$info['url'] = $weburl;
	}
	
	return $info;
}
?>