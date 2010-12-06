<?php
//输出遍历此文件夹中的内容
function handie($filepath,$filet="")
{
	$handle = opendir($filepath); /* 打开指定文件夹 .DS_Store 是输出说有的文件 */
	while (false != ($file = readdir($handle)))
	{
		if ($file != "." && $file != ".." && $file != ".DS_Store")
		{ 
			$files[]= $filepath.'/'.$file;
		}
	}
	closedir($handle);
	if (!empty($filet))
	return $files;
	foreach ($files as $key=>$f)
	{
		if (filetype($f)=='dir')
		{
			$file  = handie($f);
			if (!empty($file))
			$file2['dir'][] = on_array($file);
		}
		else
		{
			$file2['file'][] = realpath($f);
		}
	}
	$file2 = on_array($file2);
	return on_array($file2);
}
function on_array($file2)
{
	foreach ($file2 as $f)
	{

		if (!is_array($f))
		{
			$file3[] = $f;
		}
		else
		{
			foreach ($f as $fs )
			{
				
				$file3[] = $fs;
			}
		}
	}
	return $file3;
}
?>