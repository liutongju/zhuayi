<?php
/**
 * admin_menu.php     ZCMS 后台文章管理
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
if (!file_exists(ZCMS_ROOT.'/zcms/article/include/article_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("您还没有配置该模型,现在带你去配置",'/index.php?m=article&c=config&a=init');
}

/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('文章配置','config'),
			'1'=>array('管理栏目','class'),
			'2'=>array('添加栏目','class_edit'),
			'3'=>array('更新栏目缓存','class_cache'),
			'4'=>array('管理文章','index'),
			'5'=>array('发布文章','edit'),
			'6'=>array('生成全部文章','generate&act=show'),
			'7'=>array('生成全部栏目','generate&act=class'),
			'8'=>array('格式化文章URL','format&tables=article'),
			'9'=>array('格式化栏目URL','format&tables=article_class')
			);


/* 设置模块提示 */
$tips = '请在添加、修改、排序栏目全部完成后，更新栏目缓存';

/* 载入文章文件 */
include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';

if ($article_generate == 0)
unset($menu[6]);

if ($article_class_generate == 0)
unset($menu[7]);
/* 序列化推送位 */
$flag = explode(chr(13),$flag);

/* 载入模版缓存文件 */
$tpl_cache =  ZCMS_ROOT.'/data/data_cache/tpl.cache.php';

if (file_exists($tpl_cache))
{
	$tpl_cache = file_get_contents($tpl_cache);
	$tpl_cache = unserialize($tpl_cache);
}

/* 频道URL */
if ($article_index_generate==1)
{
	$article_url = $article_index_path;
}
else
{
	$article_url = $article_index_url;
}
/* 模版虚拟路径 */
$path = str_replace(ZCMS_ROOT,'',$article_tpl).'/';


?>