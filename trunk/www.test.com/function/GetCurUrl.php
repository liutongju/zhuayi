<?php

//-------��ȡ��Դҳ
function GetCurUrl()
{
	if(!empty($_SERVER["REQUEST_URI"]))
	{
		$nowurl = $_SERVER["REQUEST_URI"];
		$nowurls = explode("?",$nowurl);
		$nowurl = $nowurl;
	}
	else
	{
		$nowurl = $_SERVER["PHP_SELF"];
	}
	return $nowurl;
}
?>