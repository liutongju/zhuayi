<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* 验证登录 */
verify_admin('admin_username');

/* 设置模块提示 */
$tips = '聚合标签是将所有文章的Tags提取出来转换到搜索结果里,此功能将利于搜索引擎的索引。';

if ($_REQUEST['tags'] == 1)
{
	$limit = 300;
	if (empty($_REQUEST['page']))
	{	
		$_REQUEST['page'] = 1;
		$startnum = 0 ;
	}
	else
	$startnum =  ($_REQUEST['page']-1)*$limit;

	/* 查询文章 */
	$list = $query->arrays("select tags from ".T."article limit $startnum , $limit");
	if (count($list)==0)
	{
		showmsg('恭喜你，操作成功',ret_cookie('backurl'));
	}
	/* 循环写入搜索结果表中 */
	foreach ($list as $val)
	{
		/* 写入前先数组化并查询是否存在 */
		$val = explode(',',$val['tags']);
		foreach ($val as $vals)
		{
			/* 检查是否存在 */
			$info = $query->one_array("select id from ".T."search where title ='".trim($vals)."'");
			if (empty($info['id']))
			{
				/* 插入 */
				$query->query("insert into ".T."search(title,dtime,num,tables)values('".trim($vals)."','".time()."','0','article')");
			}
			else
			{
				/* 更新搜索次数 */
				$query->query("update ".T."search set num = num+1 where id=".$info['id']);
			}
		}
	}
	$_REQUEST['page']++;
	showmsg('已经格式化《'.($startnum+count($list)).'》个信息','/index.php?m=article&c=tags&a=init&tags=1&page='.$_REQUEST['page']);
}
else
{
	/* 设置返回URL */
	set_cookie("backurl",GetCurUrl(),0);
}
?>