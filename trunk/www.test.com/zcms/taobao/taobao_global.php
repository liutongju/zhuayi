<?php
/**
 * admin_menu.php     ZCMS 淘宝客
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
$menu = array(
			'0'=>array('淘宝客配置','config'),
			'1'=>array('管理栏目','class'),
			'2'=>array('添加栏目','class_edit'),
			'3'=>array('更新栏目缓存','class_cache'),
			'4'=>array('管理商品','index'),
			'5'=>array('发布商品','edit'),
			'6'=>array('导入商品','data'),
			);
$tips = '请慎重填写下列参数,配置不正确可能会使您的网站崩溃.';

if (!file_exists(ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("您还没有配置该模型,现在带你去配置",'/index.php?m=taobao&c=config&a=init');
}

//-------载入淘宝客配置文件
include_once ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php';

?>