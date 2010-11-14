<?php
/**
 * admin_cache.php     ZCMS 后台菜单缓存生成文件
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */



$sql = "select * from ".T."menu order by orders asc";
$reset = $query->query($sql);
$menu_cache_js = '<script>var arrSorts = new Array();';
$i=0;
while ($row = $query->fetch_array($reset))
{
	$menu_cache_js .='arrSorts['.$i.'] = ["'.$row['id'].'", "'.$row['title'].'", "'.$row['parent_id'].'","'.$row['id'].'"];';
	$list[] = $row;
	$i++;
}
$menu_cache_js .='</script>';
write(ZCMS_CACHE.'menu_cache.js',$menu_cache_js);
$list= tree($list,'parent_id',0,'　');
$list = serialize($list);
//-----写入缓存
$list = '<?php '."\r\n".' $menu_cache = \''.$list.'\''."; \r\n".' ?>';write(ZCMS_CACHE.'menu_cache.php',$list);
showmsg('缓存写入成功..',ret_cookie('backurl'));
exit;
?>