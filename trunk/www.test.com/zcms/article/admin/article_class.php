<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------��֤��¼
verify_admin('admin_username');
//-------���÷���URL
set_cookie("backurl",GetCurUrl(),0);
//-------�жϻ����Ƿ����
if (!file_exists(ZCMS_CACHE.'article_class_cache.php'))
{
	showmsg('û�л����ļ�,����ȥ����..','/index.php?m=article&c=class_cache&a=init');
} 
else
{
	//------���뻺��
	include_once ZCMS_CACHE.'article_class_cache.php';
	$list = unserialize($article_class_cache);
}
/*
$sql = "select * from ".T."article";$reset = $query->query($sql);
while ($row = $query->fetch_array($reset))
{
	$row['body'] = addslashes($row['body']);
	$query->save('article',$row);
	$row['cid'] = 11;
	$query->save('article',$row);
	$row['cid'] = 12;
	$query->save('article',$row);
	$row['cid'] = 13;
	$query->save('article',$row);
}
*/
?>