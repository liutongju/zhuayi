<?php/** * 写入文件 * @ file   文件名包含路径 * @ conent 要写入的内容 * @ w      权限 */function write($file,$conent,$w="w"){	/* 获取写入文件路径，用来生成路径 */	$filedir = str_replace(basename($file),'',$file);	if (!file_exists($filedir))	{		$oldumask=umask(0);		mkdir($filedir.'/',0777,true);		chmod($filedir.'/', 0777);		umask($oldumask);	}	$handle = fopen($file,$w);	fwrite($handle,$conent);	fclose($handle);}
?>