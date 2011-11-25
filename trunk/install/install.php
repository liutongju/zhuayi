<?php
/*
 * am.php     	 Zhuayi php.exe 执行
 *
 * @copyright    (C) 2005 - 2010  zhuayi
 * @licenes      http://www.zhuayi.net
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

/* -----定义Zhuayi根目录路径  */
define('ZHUAYI_ROOT', str_replace("\\", '/', dirname(__FILE__)));

$sys = $_SERVER['HTTP_USER_AGENT']; 
if (!empty($sys) && strpos($sys,'NT '))
{
	$sys = 1;
}
else
{
	$sys = $_SERVER['OS'];

	if (strpos($sys,"NT") > 0 )
	{
		$sys = 1;
	}
	else
	{
		$sys=0;
	}
}

function tips()
{
	$tips= "-----------------------------------------------------------------------------";
$tips.= "
|   ########   ##     ##   ##       ##       ##      ##        ##   ##      |
|        ##    ##     ##   ##       ##    ##    ##    ##      ##    ##      |
|       ##     #########   ##       ##   ##      ##     ##   ##     ##      |
|      ##      ##     ##   ##       ##   ##########      ####       ##      |
|     ##       ##     ##    ##     ##    ##      ##       ##        ##      |
|   ########   ##     ##      #####      ##      ##       ##        ##      |\n";
	$tips.= "-----------------------------------------------------------------------------\n";
	$tips.= "|    全新安装 - php install.php install                                     |\n";
	$tips.= "|    单独安装 - php install.php -f 文件路径                                 |\n";
	$tips.= "-----------------------------------------------------------------------------\n";

	echo replace_code($tips);
}

/* main 函数 用来取输入的值,根据值调用对应的函数 */
function main($array)
{
	$ary = array();
	/* 遍历参数,第0个为文件名,抛弃, 第1个为函数名,其余转换为数组 */
	for ($i=2;$i< count($array);$i=$i+2)
	{
		$ary[$array[$i]] = $array[$i+1];
	}

	if (empty($array[1]))
	{
		tips();
		exit;
	}
	$array[1]($ary);
}

function install($ary)
{

	if (isset($ary['-f']))
	{
		$code = array($ary['-f']);
	}
	else
	{
		/* 读取文件目录 */
		echo "-------------------------------------------------\n";
		$url ='http://zhuayi.googlecode.com/svn/trunk/resources/zhuayi.list';
		$code = file_get_contents($url);

		$code = explode("\n",trim($code));
		if (empty($code))
		{
			echo replace_code(' 程序目录读取失败...'."\n");
			exit;
		}
		else
		{
			echo replace_code(' 程序目录读取成功! 正在安装..'."\n");
		}
	}
	

	foreach ($code as $val)
	{
		if (empty($val))
		{
			continue;
		}
		$val = explode(',',$val);

		if (empty($val[1]))
		{
			$val[1] = $val[0];
		}
		$val[1] = "<".trim($val[1]).'>';

		echo replace_code(" 正在下载...".trim($val[0])."\n");
		/* 下载文件 */
		$url = 'http://zhuayi.googlecode.com/svn/trunk/'.trim($val[0]);
		
		/* 写入文件 */
		if (write($val[0],file_get_contents($url)) === true)
		{
			echo replace_code(" ".trim($val[1])."安装成功! \n");
		}
		else
		{
			echo replace_code(" ".trim($val[1])."安装失败... \n");

		}
		echo replace_code("-------------------------------------------------\n");
	}

	echo replace_code(" 安装完毕! 请用浏览器执行install.php,进行配置!... \n");
	
}

@main($argv);
exit;


function replace_code($code)
{
	global $sys;

	if ($sys == 1)
	{
		return iconv('utf-8','gbk',$code);
	}
	else
	{
		return $code;
	}
	
}

function write($filename,$body)
{
	$filename = ZHUAYI_ROOT.'/'.$filename;

	$path = str_replace(basename($filename),'',$filename);
	if (!file_exists($path))
 	{
 		$oldumask = umask(0);
		$reset = @mkdir($path.'/',0777,true);
		@chmod($path.'/', 0777);
		umask($oldumask);

		if (!$reset)
		{
			return '创建文件夹'.$path.'失败...';
		}

 	}
	if (!@file_put_contents($filename,$body))
	{
		return '写入文件'.$filename.'失败...';
	}
	else
	{
		return true;
	}
}

?>