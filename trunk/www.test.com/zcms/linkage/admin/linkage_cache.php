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



$array = $query->arrays("select * from ".T."linkage");
$tree = tree($array,'parent_id',$_REQUEST['id'],'^','^');
$menu_cache_js = '<script>var arrSorts = new Array();';
$i=0;
foreach ($tree as $val)
{
	$menu_cache_js .='arrSorts['.$i.'] = ["'.$val['id'].'", "'.$val['title'].'", "'.$val['parent_id'].'","'.$val['id'].'"];';
	$i++;
}
$menu_cache_js .='</script>';
write(ZCMS_CACHE.'linkeage_'.$_REQUEST['id'].'.js',$menu_cache_js);
showmsg('����д��ɹ�..',ret_cookie('backurl'));
exit;
?>