<?php
/**
 * admin_info.php     ZCMS ��̨�˵�������
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */
//echo $_POST['record'];
$_POST['icon_md5'] = md5($_POST['record'].$_POST['title']);
/* ��ѯ��MD5ֵ�Ƿ���� */
if ($query->maxnum("select count(*) from ".T."record where  icon_md5 ='".$_POST['icon_md5']."'")==0 || $_REQUEST['radiobutton']=='xitong')
{
	/* �ж�ǰ7���Ƿ�HTTP */
	$hread = substr($_POST['record'],0,7);
	/* Զ������ */

	if ($hread == 'http://')
	{
		$obj = parse_url($_POST['record']);
		$h =  strtolower(trim(substr(strrchr($obj['path'],'.'),1,100)));
		if ($h =='jpg' || $h =='gif' || $h =='png')
		{
			record_img($_POST['record']);
		}
		elseif ($h == 'mp3')
		{
			record_music($_POST['record']);
		}
		elseif (strpos($obj['host'],'youku')>0)
		{
			youku($obj['path']);
		}
		else
		{
			$_POST['type'] = 'web';
		}
	}
	else
	{
		$_POST['type'] = 'text';
	}
}

if (empty($_POST['id']))
{
	$pagename = '�����վ';
	$_POST['id'] = $query->save("record",$_POST);
}
else
{
	$pagename = '�༭��վ';
	///* �鿴
	$query->save("record",$_POST,' id = '.$_POST['id']);

}
/* д����־ */
admin_log("record",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));

/* �ſ��ͼ */
function youku($path)
{

	/* ��ȡhttp://player.youku.com/player.php/sid/XMjMwMzkzMTUy/v.swf���� */
	$id = str_substr('sid/','/v',$path);
	if (empty($id))
	{
		$id = str_substr('id_','.html',$path);
	}
	/* ץȡ��ַ */
	$bodys = file_get_contents('http://v.youku.com/v_show/id_'.$id.'.html');
	$body = str_substr('id="download" href="','">',$bodys);
	if (!empty($body))
	{
		$body = explode('|',$body);
	}
	preg_match("/<title>(.*?) - (.*)<\/title>/",$bodys, $title);
	$_POST['icon'] = $body[count($body)-2];
	$_POST['resolve'] = str_substr('id="link2" value="','"',$bodys);
	$_POST['type'] = 'swf';
}
/* ��ȡ */
function str_substr($start, $end, $str)
{
	$temp = explode($start, $str, 2);
	$content = explode($end, $temp[1], 2);
	return $content[0];
}

function record_img($obj)
{
	$_POST['icon'] = $obj;
	$_POST['resolve'] = $obj;
	$_POST['type'] = 'img';
}

/* ��ȡMP3���� */
function record_music($obj)
{
	$title = iconv('gbk','utf-8',urldecode($_POST['title']));
	/* ȥ�ٶ�ץȡר���� */
	$retu = file_get_contents('http://mp3.baidu.com/m?f=ms&rf=idx&tn=baidump3&ct=134217728&lf=&rn=&word='.urlencode($_POST['title']).'&lm=-1');
	/* ��ȡ�б� */
	$retu = str_substr('<!-- item 1-->','<!-- item 2-->',$retu);
	/* ��ȡר���� */
	$retu = strip_tags(str_substr('<td class="fourth">','</td>',$retu));
	$retu = trim(str_replace('	','',preg_replace('/\r|\n|��|&nbsp;/', '',$retu)));
	/* ȥ�����ȡ���ַ���,ǰ�����Ҫ����ȷ���ļ��� */
	//echo $title;
//	exit;
	if (!empty($retu))
	$title = iconv('gbk','utf-8',urldecode($retu));

	$retu = file_get_contents('http://music.douban.com/subject_search?search_text='.urlencode($title).'&cat=1003');

	/* ��ȡ�б� */
	$retu = str_substr('<p class="ul first"></p><table width="100%"><tr><td width="100" valign="top">','</table>',$retu);
	/* ��ȡͼƬ */
	preg_match_all("/src=[\"\']?([%+\*\w\/:\._-]+(?:jpg|gif|bmp|jpeg|png))/ism",$retu,$litpic);
	$retu = $litpic[1][0];
	$_POST['icon'] = str_replace('spic','lpic',$retu);
	$_POST['resolve'] = $obj;
	$_POST['type'] = 'mp3';

}
?>