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
//-----�������ݿ������ļ�

//-----�������ݿ���
include_once(ZCMS_ROOT.'/class/mysql.class.php');


if ($_REQUEST['c'] != 'info' && $_REQUEST['c'] != 'setup')
{
	require ZCMS_ROOT.'/install/template/zcms.html';
}
if ($_REQUEST['c'] == 'info')
{
	$_POST['zcms_config']['perpagenum'] = 20;
	
	//---�ж���վ���������û��"/"����������滻��
	if (substr($_POST['web_config']['weburl'],-1,1) == '/')
	{
		$_POST['web_config']['weburl'] = substr($_POST['web_config']['weburl'],0,strlen($_POST['web_config']['weburl'])-1);
	}
	//---д���ļ�
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
	//----��װ���ݿ�
	$sql = handie(ZCMS_ROOT.'/install/sql/');
	//----�������ݿ�
	$query->query('CREATE DATABASE IF NOT EXISTS `'.$dbname.'` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci');
	//echo '�������ݿ�....<br>';
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
	//echo '��ɰ�װ';
	write(ZCMS_ROOT.'/data/zcms.lock');
	showmsg('��װ�ɹ�','/index.php?m=admin&c=login&a=init');
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
?>