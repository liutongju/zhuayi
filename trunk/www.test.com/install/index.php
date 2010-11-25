<?php
/**
 * index.php     ZCMS 安装文件
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 *///----屏蔽一般错误
error_reporting(E_ALL^E_NOTICE^E_WARNING);
//-----输出页面字符集
header('Content-type: text/html; charset=gbk');

define('ZCMS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));

if(file_exists(ZCMS_ROOT.'/data/zcms.lock') ){exit('你已经安装过了<br>重新安装请删除data目录下的zcms.lock文件');}
include_once ZCMS_ROOT.'/data/include/zcms_config.php';
include_once ZCMS_ROOT.'/data/include/web_config.php';
//-----载入数据库配置文件

//-----载入数据库类
include_once(ZCMS_ROOT.'/class/mysql.class.php');


if ($_REQUEST['c'] != 'info' && $_REQUEST['c'] != 'setup')
{
	require ZCMS_ROOT.'/install/template/zcms.html';
}
if ($_REQUEST['c'] == 'info')
{
	$_POST['zcms_config']['perpagenum'] = 20;
	
	//---判断网站域名后边有没有"/"，如果有则替换掉
	if (substr($_POST['web_config']['weburl'],-1,1) == '/')
	{
		$_POST['web_config']['weburl'] = substr($_POST['web_config']['weburl'],0,strlen($_POST['web_config']['weburl'])-1);
	}
	//---写入文件
	foreach ($_POST['filename'] as $key=>$val)
	{
		$conent = '<?php'."\r\n";

		foreach ($_POST[$val] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n"; 
		}
		
		$conent .= '?>';
		write(ZCMS_ROOT.'/data/include/'.$val.'.php',$conent);
	}

	$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
	//----安装数据库
	$sql = handie(ZCMS_ROOT.'/install/sql/');
	//----创建数据库
	$query->query('CREATE DATABASE IF NOT EXISTS `'.$dbname.'` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci');
	//echo '创建数据库....<br>';
	$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
	foreach ($sql as $val)
	{
		//-------创建数据表
		echo '创建<font color=red>'.str_replace('.sql','',basename($val)).'</font>数据表...<br>';
		//-------打开
		$content = file_get_contents($val);
		//------转换为数组
		$content = explode(";".chr(13),$content);
		//------安装数据库
		foreach ($content as $vals)
		{
			if (!empty($vals))
			$query->query(str_replace('{%z%}',$cookievarpre,$vals));
			
		}
		
	}
	$_POST['admin']['pass'] = mymd5($_POST['admin']['pass']);
	$_POST['admin']['gid'] = 2;
	$query->save('admin',$_POST['admin']);
	//echo '完成安装';
	write(ZCMS_ROOT.'/data/zcms.lock');
	showmsg('安装成功','/index.php?m=admin&c=login&a=init');
}
/**
 * 写入文件
 * @ file   文件名包含路径
 * @ conent 要写入的内容
 * @ w      权限
 */
function write($file,$conent,$w="w")
{
	//-----获取写入文件路径，用来生成路径
	$filedir = str_replace(basename($file),'',$file);	
	if (!file_exists($filedir))
	{
		mkdir($filedir,777,true);
	}
	$handle = fopen($file,$w);
	fwrite($handle,$conent);
	fclose($handle);
}


//输出遍历此文件夹中的内容
function handie($filepath,$filet="")
{
	$handle = opendir($filepath); //打开指定文件夹 .DS_Store 是输出说有的文件
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
//-------自定义加密函数
function mymd5($str)
{

	$str = base64_encode(md5($str));
	return md5($str);
}

function showmsg($title='',$url='/',$time=1250,$a='init')
{

	if ($url == '-1')
	{
		$url = 'javascript:history.go(-1)';
	}
	else
	{
		$url = "window.location.href='".$url."'";
	}
	//----跳转URL	
	header("Location: /index.php?m=showmsg&a=".$a."&title=".$title."&url=".base64_encode($url).'&time='.$time); 
	exit;
}
?>