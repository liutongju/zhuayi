<?php
/*----------��ҳ-------*/
function pagelist($atts)
{

	extract($atts, EXTR_OVERWRITE);
	//------
	if (empty($perpagenum))
	global $perpagenum;

	/*------------��ҳ����---����ÿҳ��ʾ���ټ�¼---------*/

	if (empty($page))
	{
		$page=1;
	}
	if (empty($url))
	{
		$url = $_SERVER["REQUEST_URI"];
	}

	/* ��ȡ��׺ */
	$h = trim(substr(strrchr($url,'.'),1,100));;

	$urls = parse_url($url);
	if (!empty($urls['query']) && ($urls['path'] == '/' || $urls['path'] == '/index.php'))
	{
		/* ��ʽ��URL */
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
		/* ��ʽ��URL */
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

//-------��ҳ����
function page ( $totalPage , $currentPage,$url ,$halfPer=5,$maxnum)
{
	$total=$totalPage;
	$next=$currentPage+1;
	$per  =$currentPage-1;

	$re="<div class='page'><span class=page3>�ܼƣ�".$maxnum.' ��</span>';
	$re .= ( $currentPage > 1 )
		? "<span class='page3'>��ǰ����{$currentPage}/{$total}ҳ</span> <a href=\"".ereg_replace('{page}','1',$url)."\" class='page2 '>��ҳ</a> <a href=\"".ereg_replace('{page}',strval($per),$url)."\" class='page2 '>��һҳ</a>"
		: " <span class=page3>��ҳ</span> <span class=page3>��һҳ</span>";
	for ( $i = $currentPage - $halfPer,$i > 0 || $i = 0 ,     $j = $currentPage + $halfPer, $j < $totalPage || $j = $totalPage;$i < $j ;$i++ )
	{
		$re .= $i == $currentPage-1
			? " <b class=page1>" . ( $i+1 ) . "</b> "
			: " <a class='page2 ' href=\"".ereg_replace('{page}',strval($i+1),$url)."\">" . ( $i+1 ) . "</a> ";
	}
	$re .= ( $currentPage < $total )
		? " <a href=\"".ereg_replace('{page}',strval($next),$url). "\" class='page2 '>��һҳ</a> <a href=\"".ereg_replace('{page}',"$total",$url)."\" class='page2 '>βҳ</a> "
		: " <span class=page3>��һҳ</span> <span class=page3>βҳ</span> ";
	return $re.'</div>';
}


?>