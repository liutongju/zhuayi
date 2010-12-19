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

/* -----定义数据表前缀  */
define('T', $cookievarpre);

//-----载入数据库类
include_once(ZCMS_ROOT.'/class/mysql.class.php');

if ($_REQUEST['setup']=='')
{
	require ZCMS_ROOT.'/install/1.html';
	exit;
}
elseif ($_REQUEST['setup'] ==2)
{
	if ($_REQUEST['method'] == 'info')
	{
		$_POST['zcms_config']['perpagenum']=20;
		/* 写入文件 */
		$conent = '<?php'."\r\n";

		foreach ($_POST['zcms_config'] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n";
		}
		$conent .= '?>';
		write(ZCMS_ROOT.'/data/include/zcms_config.php',$conent);
		$query = new dbQuery($_POST['zcms_config']['dbhost'],$_POST['zcms_config']['dbuser'],$_POST['zcms_config']['dbpw'],$_POST['zcms_config']['dbname'],'GBK');
		//----创建数据库
		$query->query('CREATE DATABASE IF NOT EXISTS `'.$_POST['zcms_config']['dbname'].'` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci');
		//echo '创建数据库....<br>';
		Header("Location:/install/?setup=3");
	}
	require ZCMS_ROOT.'/install/2.html';
	exit;
}
elseif ($_REQUEST['setup'] ==3)
{

	$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
	if ($_REQUEST['method'] == 'info')
	{
		/* 写入文件 */
		$conent = '<?php'."\r\n";

		$_POST['web_config']['pic_cache']=1;
		foreach ($_POST['web_config'] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n";
		}
		$conent .= '?>';
		write(ZCMS_ROOT.'/data/include/web_config.php',$conent);
		/* 写入管理员帐号密码。写入前先清空 */
		$query->query('truncate table '.T.'admin');
		/* 写入数据库 */
		$_POST['admin']['pass'] = mymd5($_POST['admin']['pass']);
		$_POST['admin']['gid'] = 2;
		$query->save('admin',$_POST['admin']);
		write(ZCMS_ROOT.'/data/zcms.lock',time());
		showmsg('安装成功','/index.php?m=admin&c=login&a=init');
	}
	else
	{
		//echo $dbhost;
		//----安装数据库
		$sql = ZCMS_ROOT.'/install/install.sql';
		$content = file_get_contents($sql);
		$content = explode(";".chr(13),$content);
		//------安装数据库
		foreach ($content as $vals)
		{
			if (!empty($vals))
			$query->query(str_replace('{%z%}',$cookievarpre,$vals));
		}
		if (empty($weburl))
		{
			$weburl = 'http://';
		}
	}
	require ZCMS_ROOT.'/install/3.html';
	exit;
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

function set_cookie($var,$val)
{

	return setcookie(T.$var,$val,0,'/',$_SERVER['HTTP_HOST']);
}

?>