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

$path = $_SERVER["DOCUMENT_ROOT"];
if(file_exists($path.'/data/zcms.lock') ){exit('���Ѿ���װ����<br>���°�װ��ɾ��dataĿ¼�µ�zcms.lock�ļ�');}
include_once $path.'/data/include/zcms_config.php';
include_once $path.'/data/include/web_config.php';
//-----�������ݿ������ļ�

//-----�������ݿ���
include_once($path.'/class/mysql.class.php');


if ($_REQUEST['c'] != 'info' && $_REQUEST['c'] != 'setup')
{
	require $path.'/install/template/zcms.html';
}
if ($_REQUEST['c'] == 'info')
{

	//---д���ļ�
	

	foreach ($_POST['filename'] as $key=>$val)
	{
		$conent = '<?php'."\r\n";

		foreach ($_POST[$val] as $keys => $vals)
		{
			$conent .= '$'.$keys.' = "'.$vals.'";'."\r\n"; 
		}
		
		$conent .= '?>';
		write($path.'/data/include/'.$val.'.php',$conent);
	}

	$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
	//----��װ���ݿ�
	$sql = handie($path.'/install/sql/');
	//----�������ݿ�
	$query->query('CREATE DATABASE IF NOT EXISTS `'.$dbname.'` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci');
	echo '�������ݿ�....<br>';
	$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
	foreach ($sql as $val)
	{
		//-------�������ݱ�
		echo '����<font color=red>'.str_replace('.sql','',basename($val)).'</font>���ݱ�...<br>';
		//-------��
		$content = file_get_contents($val);
		//------ת��Ϊ����
		$content = explode(";".chr(13),$content);
		//------��װ���ݿ�
		foreach ($content as $vals)
		{
			if (!empty($vals))
			$query->query(str_replace('{%z%}',$cookievarpre,$vals));
			
		}
		
	}
	$_POST['admin']['pass'] = mymd5($_POST['admin']['pass']);
	$_POST['admin']['gid'] = 2;
	$query->save('admin',$_POST['admin']);
	echo '��ɰ�װ';
	write($path.'/data/zcms.lock');
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
?>