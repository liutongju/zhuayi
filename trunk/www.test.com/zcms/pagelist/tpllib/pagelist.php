<?php
/*----------分页-------*/
function pagelist($atts)
{

	extract($atts, EXTR_OVERWRITE);
	//------
	if (empty($perpagenum))
	global $perpagenum;

	/*------------分页操作---定义每页显示多少记录---------*/

	if (empty($page))
	{
		$page=1;
	}
	if (empty($url))
	{
		$url = $_SERVER["REQUEST_URI"];
	}

	/* 读取后缀 */
	$h = trim(substr(strrchr($url,'.'),1,100));;

	$urls = parse_url($url);
	if (!empty($urls['query']) && ($urls['path'] == '/' || $urls['path'] == '/index.php'))
	{
		/* 格式化URL */
		$url = explode('&',$url);
		foreach ($url as $key=>$val)
		{
			$val = explode('=',$val);

			if ($val[0] == 'page')
			{
				unset($url[$key]);
			}
		}
		$url = implode('&',$url);
		$url .= "&page={page}";
	}
	elseif (!empty($h))
	{

		$url = preg_replace('/_(.*)(.html|.php|shtml)/','$2',$url);
		$html = $url;
	}
	else
	{
		if (substr($url,'-1',strlen($url))!='/')
		{
			$url .='/';
		}
		/* 格式化URL */
		$url = explode('/',$url);
		foreach ($url as $key=>$val)
		{
			if ($val == 'page')
			{
				unset($url[$key]);
				unset($url[$key+1]);
			}
		}
		$url = implode('/',$url);
		$url .= "page/{page}";
	}


	if (!empty($html))
	{
		$url = str_replace('.'.$h,"_{page}.".$h,$html);
		//$url = str_replace('.shtml',"_{page}.shtml",$url);
		//$url = str_replace('.php',"_{page}.php",$url);

	}

	$totalPage      = ceil($maxnum/$perpagenum);
	if ($totalPage>1)
	return  page( $totalPage , $page , $url,3,$maxnum);

}

//-------分页函数
function page ( $totalPage , $currentPage,$url ,$halfPer=5,$maxnum)
{
	$total=$totalPage;
	$next=$currentPage+1;
	$per  =$currentPage-1;

	$re="<div class='page'><span class=page3>总计：".$maxnum.' 个</span>';
	$re .= ( $currentPage > 1 )
		? "<span class='page3'>当前：第{$currentPage}/{$total}页</span> <a href=\"".ereg_replace('{page}','1',$url)."\" class='page2 '>首页</a> <a href=\"".ereg_replace('{page}',strval($per),$url)."\" class='page2 '>上一页</a>"
		: " <span class=page3>首页</span> <span class=page3>上一页</span>";
	for ( $i = $currentPage - $halfPer,$i > 0 || $i = 0 ,     $j = $currentPage + $halfPer, $j < $totalPage || $j = $totalPage;$i < $j ;$i++ )
	{
		$re .= $i == $currentPage-1
			? " <b class=page1>" . ( $i+1 ) . "</b> "
			: " <a class='page2 ' href=\"".ereg_replace('{page}',strval($i+1),$url)."\">" . ( $i+1 ) . "</a> ";
	}
	$re .= ( $currentPage < $total )
		? " <a href=\"".ereg_replace('{page}',strval($next),$url). "\" class='page2 '>下一页</a> <a href=\"".ereg_replace('{page}',"$total",$url)."\" class='page2 '>尾页</a> "
		: " <span class=page3>下一页</span> <span class=page3>尾页</span> ";
	return $re.'</div>';
}


?>