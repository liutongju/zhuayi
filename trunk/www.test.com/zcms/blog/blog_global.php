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
if (!file_exists(ZCMS_ROOT.'/zcms/blog/include/blog_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("您还没有配置该模型,现在带你去配置",'/index.php?m=blog&c=config&a=init');
}

/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('博客配置','config'),
			'1'=>array('管理栏目','class'),
			'2'=>array('添加栏目','class_edit'),
			'3'=>array('管理博客','index'),
			'4'=>array('发布博文','edit'),
			);


/* 设置模块提示 */
$tips = 'ZcmsBlog可基于新浪微博,并与新浪微博同步,当然您也可以选择不开启。';

/* 载入配置文件 */
include_once ZCMS_ROOT.'/zcms/blog/include/blog_config.php';
?>