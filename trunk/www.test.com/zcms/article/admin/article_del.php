<?php
/**
 * admin_del.php     ZCMS 后台文章删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 判断来路ID是否存在 */
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个连接..',-1);
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	
	/* 删除文件 */
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
	/* ----删除SEO表 */
	seo('article',$_REQUEST['id'],'delete');
	/* ---------写入日志 */
	admin_log("article",$_REQUEST['id'],'title','删除文章');
	showmsg('删除成功..',ret_cookie('backurl'));
}exit;
?>