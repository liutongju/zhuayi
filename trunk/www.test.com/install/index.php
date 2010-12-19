<?php
/**
 * index.php     ZCMS ��װ�ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 *///----����һ�����
error_reporting(E_ALL^E_NOTICE^E_WARNING);
//-----���ҳ���ַ���
header('Content-type: text/html; charset=gbk');

define('ZCMS_ROOT', str_replace("\\", '/', substr(dirname(__FILE__), 0, -7)));

if(file_exists(ZCMS_ROOT.'/data/zcms.lock') ){exit('���Ѿ���װ����<br>���°�װ��ɾ��dataĿ¼�µ�zcms.lock�ļ�');}
include_once ZCMS_ROOT.'/data/include/zcms_config.php';
include_once ZCMS_ROOT.'/data/include/web_config.php';

/* -----�������ݱ�ǰ׺  */
define('T', $cookievarpre);

//-----�������ݿ���
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
		/* д���ļ� */
		$conent = '<?php'."\r\n";

		foreach ($_POST['zcms_config'] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n";
		}
		$conent .= '?>';
		write(ZCMS_ROOT.'/data/include/zcms_config.php',$conent);
		$query = new dbQuery($_POST['zcms_config']['dbhost'],$_POST['zcms_config']['dbuser'],$_POST['zcms_config']['dbpw'],$_POST['zcms_config']['dbname'],'GBK');
		//----�������ݿ�
		$query->query('CREATE DATABASE IF NOT EXISTS `'.$_POST['zcms_config']['dbname'].'` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci');
		//echo '�������ݿ�....<br>';
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
		/* д���ļ� */
		$conent = '<?php'."\r\n";

		$_POST['web_config']['pic_cache']=1;
		foreach ($_POST['web_config'] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n";
		}
		$conent .= '?>';
		write(ZCMS_ROOT.'/data/include/web_config.php',$conent);
		/* д�����Ա�ʺ����롣д��ǰ����� */
		$query->query('truncate table '.T.'admin');
		/* д�����ݿ� */
		$_POST['admin']['pass'] = mymd5($_POST['admin']['pass']);
		$_POST['admin']['gid'] = 2;
		$query->save('admin',$_POST['admin']);
		write(ZCMS_ROOT.'/data/zcms.lock',time());
		showmsg('��װ�ɹ�','/index.php?m=admin&c=login&a=init');
	}
	else
	{
		//echo $dbhost;
		//----��װ���ݿ�
		$sql = ZCMS_ROOT.'/install/install.sql';
		$content = file_get_contents($sql);
		$content = explode(";".chr(13),$content);
		//------��װ���ݿ�
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
 * д���ļ�
 * @ file   �ļ�������·��
 * @ conent Ҫд�������
 * @ w      Ȩ��
 */
function write($file,$conent,$w="w")
{
	//-----��ȡд���ļ�·������������·��
	$filedir = str_replace(basename($file),'',$file);
	if (!file_exists($filedir))
	{
		mkdir($filedir,777,true);
	}
	$handle = fopen($file,$w);
	fwrite($handle,$conent);
	fclose($handle);
}


//����������ļ����е�����
function handie($filepath,$filet="")
{
	$handle = opendir($filepath); //��ָ���ļ��� .DS_Store �����˵�е��ļ�
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
//-------�Զ�����ܺ���
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
	//----��תURL
	header("Location: /index.php?m=showmsg&a=".$a."&title=".$title."&url=".base64_encode($url).'&time='.$time);
	exit;
}

function set_cookie($var,$val)
{

	return setcookie(T.$var,$val,0,'/',$_SERVER['HTTP_HOST']);
}

?>