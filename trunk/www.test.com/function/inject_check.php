<?php

//-------��ֹSQLע��
function inject_check($str)
{	global $weburl;	if (empty($str))
	{
		error_404("SQLע���ǲ��õ���ΪŶ",$weburl);
	}
	$tmp=eregi('select|insert|update|��|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $str); /* ���й��� */
	if($tmp)
	{
		error_404("SQLע���ǲ��õ���ΪŶ",$weburl);
	}
	else
	{
		return $str;
	}
}
?>