<?php
/**
 * admin_cache.php     ZCMS �Ա���Ŀ���������ļ�
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
$sql = "select a.* from ".T."taobao_class as a  order by orders asc";
$reset = $query->query($sql);
$taobao_class_cache_js = '<script>var arrSorts = new Array();';
$i=0;
while ($row = $query->fetch_array($reset))
{
	$taobao_class_cache_js .='arrSorts['.$i.'] = ["'.$row['id'].'", "'.$row['classname'].'", "'.$row['parent_id'].'","'.$row['id'].'"];';
	/*
	if (!empty($row['taobao_generate_path']))
	{
		$row['url'] = str_replace(ZCMS_ROOT,'',taobao_generate_path($row));
	}
	elseif (empty($row['url']))
	$row['url'] = taobao_class_url($row['id']);
	$row['maxnum'] = $query->maxnum("select count(*) from ".T."taobao where cid=".$row['id']);
	*/
	$list[] = $row;
	$i++;
}
$taobao_class_cache_js .='</script>';
write(ZCMS_CACHE.'taobao_class_cache.js',$taobao_class_cache_js);
$list= tree($list,'parent_id',0,'&nbsp;','','classname');
$list = serialize($list);
//-----д�뻺��
$list = '<?php '."\r\n".' $taobao_class_cache = \''.$list.'\''."; \r\n".' ?>';write(ZCMS_CACHE.'taobao_class_cache.php',$list);

showmsg('����д��ɹ�..',ret_cookie('backurl'));
exit;
?>