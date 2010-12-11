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
/* 验证登录 */
verify_admin('admin_username');

if (!file_exists(ZCMS_ROOT.'/zcms/sms/include/sms_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("您还没有配置该模型,现在带你去配置",'/index.php?m=sms&c=config&a=init');
}

/* 设置页面内部菜单  */
$menu = array(
			'0'=>array('接口配置','config'),
			'1'=>array('管理分类','class'),
			'2'=>array('添加分类','class_edit&height=230','ajax'),
			'3'=>array('管理号码','index'),
			'4'=>array('添加号码','edit&height=230','ajax'),
			'5'=>array('发送短信','play&height=250&width=700','ajax'),
			'6'=>array('任务管理器','task'),
			'7'=>array('发布任务','task_edit'),
			'8'=>array('导入号码','import&height=200','ajax'),
			);

/* 总计发送了 */
$toll = $query->one_array("select * from ".T."sms_statistics");

/* 设置模块提示 */
$tips = '本短信平台是基于亿美短信平台基础搭建,相关信息请通过亿美获取,程序相关,请联系中坤大菠萝,QQ:2179942,手机:18611743551<br><font color=red>本系统已成功发送了 <b>'.$toll['sms_num'].'</b> 条信息</font>';


/* 载入接口配置文件 */
include_once ZCMS_ROOT.'/zcms/sms/include/sms_config.php';
/*  配置发送接口 */
$sessionKey = '815370';
$readTimeOut = 10; 
$proxyhost = false; //----可选，代理服务器地址，默认为 false ,则不使用代理服务器
$proxyport = false; //---可选，代理服务器端口，默认为 false
$proxyusername = false; //---可选，代理服务器用户名，默认为 false
$proxypassword = false; //----可选，代理服务器密码，默认为 false
include_once ZCMS_ROOT.'/zcms/sms/class/include/Client.php';
$sms = new Client($gateway,$serial,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$outtime,$readTimeOut);
$sms->setOutgoingEncoding("GBK");
?>