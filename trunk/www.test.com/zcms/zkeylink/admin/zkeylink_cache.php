<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

$pagename = '����վ�����ӻ���';

$reset = $query->query("select title,url from ".T."keylink ");
while ($row = $query->fetch_array($reset))
{
	$list['title'][] = $row['title'];
	$list['url'][] = $row['url'];
}
//---д���ļ�
$conent = '<?php'."\r\n";
$conent .= '$zkeylink = \''.serialize($list).'\''."\r\n";
$conent .= '?>';

write(ZCMS_CACHE.'zkeylink.php',$conent);
showmsg('��ϲ�㣬�����ɹ�',ret_cookie('backurl'));
?>