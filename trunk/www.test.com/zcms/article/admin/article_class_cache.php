<?php
/**
 * admin_cache.php     ZCMS ��̨��Ŀ���������ļ�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');
//--------������Ŀ������
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
$list= tree($list,'parent_id',0,'��','','classname');
$list = serialize($list);
//-----д�뻺��
$list = '<?php '."\r\n".' $article_class_cache = \''.$list.'\''."; \r\n".' ?>';write(ZCMS_CACHE.'article_class_cache.php',$list);

showmsg('����д��ɹ�..',ret_cookie('backurl'));
exit;
?>