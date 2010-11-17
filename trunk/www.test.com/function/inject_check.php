<?php

//-------防止SQL注入
function inject_check($str)
{	global $weburl;	if (empty($str))
	{
		showmsg("SQL注入是不好的行为哦",$weburl);
	}
	$tmp=eregi('select|insert|update|‘|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str); // 进行过滤
	if($tmp)
	{
		showmsg("SQL注入是不好的行为哦",$weburl);
	}
	else
	{
		return $str;
	}
}
?>