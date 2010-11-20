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

$pagename = '更新站内链接缓存';

$reset = $query->query("select title,url from ".T."keylink ");
while ($row = $query->fetch_array($reset))
{
	$list['title'][] = $row['title'];
	$list['url'][] = $row['url'];
}
//---写入文件
$conent = '<?php'."\r\n";
$conent .= '$zkeylink = \''.serialize($list).'\''."\r\n";
$conent .= '?>';

write(ZCMS_CACHE.'zkeylink.php',$conent);
showmsg('恭喜你，操作成功',ret_cookie('backurl'));
?>