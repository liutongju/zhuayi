<?php

//-----��ǰλ��
function position($id)
{
	global $query,$position;
	$position++;
	$info[$position] = $query->one_array("select a.classname,parent_id,a.id,b.url from ".T."article_class as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article_class' where a.id = ".$id);
	if (empty($info[$position]['url']))
	{
		$info[$position]['url'] = article_class_url($info[$position]['id']);
	}
	if ($info[$position]['parent_id']!='0')
	{
		$info = $info + position($info[$position]['parent_id']);
	}
	return $info;
}

//------���ݸ�ID��ȡ����ȫ������
function parent_parent_id($id)
{
	global $query;

	$info = $query->one_array("select * from ".T."article_class where parent_id =".$id);
	if (!empty($info['id']) && $query->maxnum("select count(*) from ".T."article_class where parent_id=".$info['id'])!=0)
	{
		$info['id'] .= ','.$id.','.parent_parent_id($info['id']);
	}
	else
	{
		return $id;
	}
	return $info['id'];
}

//-----��ǰλ��
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