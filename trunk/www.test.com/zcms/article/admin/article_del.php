<?php
/**
 * admin_del.php     ZCMS ��̨����ɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* �ж���·ID�Ƿ���� */
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ�����..',-1);
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	
	/* ɾ���ļ� */
	$reset = $query->query("select a.id,dtime,body,b.url from ".T."article as a left join ".T."seo  as b on a.id = b.aid and b.tables='article' where a.id in(".$_REQUEST['id'].")");
	while ($row = $query->fetch_array($reset))
	{
		
		echo $htmlfile = ZCMS_ROOT.$row['url'];
		
		$i = ceil(strlen($row['body'])/$article_page_len);
		for ($j=1;$j<=$i;$j++)
		{
			echo str_replace('.html','_'.$j.'.html',$htmlfile);
			unlink(str_replace('.html','_'.$j.'.html',$htmlfile));
		}
		
		unlink($htmlfile);
	}

	$query->delete("article"," id in (".$_REQUEST['id'].")");
	/* ----ɾ��SEO�� */
	seo('article',$_REQUEST['id'],'delete');
	/* ---------д����־ */
	admin_log("article",$_REQUEST['id'],'title','ɾ������');
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
}exit;
?>