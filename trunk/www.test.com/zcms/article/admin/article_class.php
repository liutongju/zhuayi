<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* 验证登录 */
verify_admin('admin_username');
/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);
/* 判断缓存是否存在 */
if (!file_exists(ZCMS_CACHE.'article_class_cache.php'))
{
	showmsg('没有缓存文件,现在去生成..','/index.php?m=article&c=class_cache&a=init');
} 
else
{
	/* 载入缓存 */
	include_once ZCMS_CACHE.'article_class_cache.php';
	$list = unserialize($article_class_cache);
}
?>