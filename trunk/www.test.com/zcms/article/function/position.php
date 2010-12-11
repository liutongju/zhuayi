<?php

/* 当前位置 */
function position($id)
{
	global $query,$position;
	$position++;
	$info[$position] = $query->one_array("select a.classname,parent_id,a.id,b.url from ".T."article_class as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article_class' where a.id = ".$id." limit 0,1");
	if ($info[$position]['parent_id']!='0')
	{
		$info = $info + position($info[$position]['parent_id']);
	}
	return $info;
}

/* 根据父ID获取下属全部子类ID */
function parent_parent_id($id)
{
	global $query;
	$info = $query->arrays("select id from ".T."article_class where parent_id =".$id);
	foreach ($info as $val)
	{
		if (!empty($val['id']))
		{
			$id .= ','.parent_parent_id($val['id']);
		}
	}
	return $id;
}

/* 当前位置 */
function parent_classname($id)
{
	global $query;
	$info = $query->one_array("select id,classname,parent_id from ".T."article_class  where id = ".$id);
	if ($info['parent_id']!='0')
	{
		$info['classname'] .= ' - '.parent_classname($info['parent_id']);
	}
	return $info['classname'];
}
?>