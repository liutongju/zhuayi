<?php
/**
 * admin_info.php     ZCMS ��̨����������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');

//-------���л�����λ
$_POST['flag'] = implode('|',$_POST['flag']);

//----�����ϴ��ļ�
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('article/litpic',time());
//$_POST['litpic'] = $upload->breviary($article_width);

$_POST['dtime'] = strtotime($_POST['dtime']);

//-----�ж��Ƿ��Զ���ȡ����ժҪ
if ($abstract ==1)
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n/', '',strlens($_POST['body'],0,250))));
}

//----�ж��Ƿ�SEO����Ϊ�գ����Ϊ�գ�����������ժҪ
if (empty($_POST['seo_description']))
{
	$_POST['seo_description'] = $_POST['abstract'];
}

//----��������Զ���ȡTags����ȡTAGS��SEO�ؼ���
if ($article_tags == 1)
{
	$tags = file_get_contents($weburl.'/index.php?m=api&c=tags&title='.$_POST['title']);
	$tags = json_decode($tags,true);
	if (empty($_POST['tags']))
	$_POST['tags'] = siconv($tags['tags']);
	if (empty($_POST['seo_keywords']))
	$_POST['seo_keywords'] = siconv($tags['keywords']);
}

//----��ȡ��һ��ͼΪ����ͼ
$_POST['body'] = stripslashes($_POST['body']);
preg_match_all("/<img(.*)src=\"([^\"]+)\"[^>]+>/isU",$_POST['body'],$array);

//------ȥ���ظ���ַ$pic = array_flip(array_flip($array[2]));

//----���ص�һ��ͼΪ����ͼ

if (empty($_POST['litpic']) && !empty($pic[0]))
$_POST['litpic'] = downfile($pic[0],'article/litpic/'.date("Y-m-d"),$article_width);

//----�ж��Ƿ�Ҫ���������������ͼƬ
if ($downfile == 1)
{	//------ѭ������ͼƬ
	foreach ($pic as $key=>$val)
	{
		$picbody = downfile($val,'article/edit/'.date("Y-m-d"));
		if (!empty($picbody))
		$_POST['body'] = str_replace($val,$picbody,$_POST['body']);
	}
	}
$_POST['body'] = addslashes($_POST['body']);
if (!empty($_REQUEST['jump']))
{
	$_POST['url'] = $_REQUEST['jump'];
}
if (empty($_REQUEST['id']))
{
	$_POST['dtime'] = time();
	$pagename = '�������';
	$_POST['id'] = $query->save("article",$_POST);
}
else
{
	$pagename = '�޸���Ŀ';
	
	$query->save("article",$_POST,' id = '.$_POST['id']);	
}

if (!empty($_POST['url'])){	$_POST['request_url'] = article_url($_POST['id']);  //��Ŀԭʼurl���Զ���urlʱʹ��}
//---------д��SEO��seo('article',$_POST['id']);

//---------д����־
admin_log("article",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>