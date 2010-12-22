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
			'0'=>array('接口配置','api'),
			'1'=>array('添加接口','api_edit&height=200','ajax')
			);


/* 设置模块提示 */
$tips = '请在添加、修改、排序栏目全部完成后，更新栏目缓存';



?>