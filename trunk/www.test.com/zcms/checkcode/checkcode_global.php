<?php
/**
 * checkcode.php     ZCMS 插件--验证码,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------载入验证码类
include_once ZCMS_ROOT.'/class/checkcode.class.php';
$checkcode = new checkcode();

 
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('验证码规则','index'),
			'1'=>array('添加验证码规则','edit','ajax'),
			);
//-------设置模块提示
$tips = '请在按照生成验证码地址调用...';
?>