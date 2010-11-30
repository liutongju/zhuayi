<?php
/**
 * admin_cache.php     ZCMS 后台栏目缓存生成文件
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------验证登录
verify_admin('admin_username');
//--------生成栏目树缓存
$sql = "select a.*,b.url from ".T."article_class as a left join ".T."seo as b on a.id = b.aid and b.tables = 'article_class' order by orders asc";
$reset = $query->query($sql);
$article_class_cache_js = '<script>var arrSorts = new Array();';
$i=0;
while ($row = $query->fetch_array($reset))
{
	$article_class_cache_js .='arrSorts['.$i.'] = ["'.$row['id'].'", "'.$row['classname'].'", "'.$row['parent_id'].'","'.$row['id'].'"];';
	
	$row['maxnum'] = $query->maxnum("select count(*) from ".T."article where cid=".$row['id']);
	$list[] = $row;
	$i++;
}
$article_class_cache_js .='</script>';
write(ZCMS_CACHE.'article_class_cache.js',$article_class_cache_js);
$list= tree($list,'parent_id',0,'　','','classname');
$list = serialize($list);
//-----写入缓存
$list = '<?php '."\r\n".' $article_class_cache = \''.$list.'\''."; \r\n".' ?>';write(ZCMS_CACHE.'article_class_cache.php',$list);

showmsg('缓存写入成功..',ret_cookie('backurl'));
exit;
?>