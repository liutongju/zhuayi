<?php
/**
 * admin_cache.php     ZCMS ��̨�˵����������ļ�
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
$list= tree($list,'parent_id',0,'��');
$list = serialize($list);
//-----д�뻺��
$list = '<?php '."\r\n".' $menu_cache = \''.$list.'\''."; \r\n".' ?>';write(ZCMS_CACHE.'menu_cache.php',$list);
showmsg('����д��ɹ�..',ret_cookie('backurl'));
exit;
?>