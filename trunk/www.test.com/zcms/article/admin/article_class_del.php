<?php
/**
 * admin_del.php     ZCMS 后台文章栏目删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------判断来路ID是否存在
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个菜单..',-1);
}
else
{
	//-----判断是否还有子菜单，不允许直接删除树
	if ($query->maxnum("select count(*) from ".T."article_class where parent_id = ".$_REQUEST['id'])>0)
	{
		showmsg('该菜单下还有子栏目，不允许直接删除<br><font color=red>请先删除子栏目</font>',-1);
	}
	else
	{
		//---------写入日志
		admin_log("article_class",$_REQUEST['id'],'classname','删除文章栏目');

		$query->delete("article_class"," id =".$_REQUEST['id']);
		//----删除SEO表
		seo('article_class',$_REQUEST['id'],'delete');
		showmsg('删除成功..现在去生成缓存','/index.php?m=article&c=class_cache&a=init',1000);
	}
}exit;
?>