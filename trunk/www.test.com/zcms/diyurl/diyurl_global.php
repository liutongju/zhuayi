<?php
/**
 * admin_menu.php     ZCMS 后台自定义URL
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
 
//-------设置页面内部菜单 
$menu = array(
			'0'=>array('管理自定义URL','index'),
			'1'=>array('添加自定义URL','edit','ajax'),
			);
$tips = 'ZCMS系统映射的URL都必须以根目录“/”开头规则如下:<br>';	
$tips .= '⑴ 常规模式:/index.php?m=模型&c=方法&a=是否后台 如：/index.php?m=admin&c=index&a=init 表示后台首页 a=init 省略不写则表示前台页面<br>';		
$tips .= '⑵ 简短模式:/模型/方法/a/是否后台 如：/admin/index/a/init/ 表示后台首页 /a/init/省略不写则表示前台页面<br>';		
$tips .= '⑶ 模糊匹配是指映射一个URL之后，是否允许在映射的URL后加参数,如http://www.test.com/zcms.php,映射到/index.php?m=admin&c=index&a=init 表示后台页面<br> ';		
$tips .= '如果开启模糊匹配则后边跟的参数可以识别，如http://www.test.com/zcms.php?page=2,将会识别参数page=2,关闭模糊匹配则当前URL必须和自定义的URL绝对一样才可 ';		
?>