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

/* -------��֤��¼ */
verify_admin('admin_username');


/* ----�����ϴ��ļ�  */
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('blog/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);

/* -----�ж��Ƿ��Զ���ȡ����ժҪ  */
if ($abstract ==1 && $_POST['abstract']=='')
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n|��/', '',strlens($_POST['body'],0,250))));
}

$_POST['title'] = trim($_POST['title']);

/* ----��������Զ���ȡTags����ȡTAGS��SEO�ؼ���  */
if ($blog_tags == 1 && $_POST['tags']=='' && $_POST['seo_keywords']=='')
{
	$tags = file_get_contents($weburl.'/index.php?m=api&c=tags&title='.$_POST['title']);

	$tags = json_decode($tags,true);

	if (empty($_POST['tags']))
	$_POST['tags'] = siconv($tags['tags']);
	if (empty($_POST['seo_keywords']))
	$_POST['seo_keywords'] = siconv($tags['keywords']);
}

/* ----��ȡ��һ��ͼΪ����ͼ  */
$_POST['body'] = stripslashes($_POST['body']);

preg_match_all("/src=[\"\']?([%+\*\w\/:\._-]+(?:jpg|gif|bmp|jpeg|png))/ism",$_POST['body'],$array);

/* ------ȥ���ظ���ַ  */

$pic = array_flip(array_flip($array[1]));

/*----�ж��Ƿ�Ҫ���������������ͼƬ  */
if ($downfile == 1)
{
	/* ѭ������ͼƬ */
	foreach ($pic as $key=>$val)
	{
		$picbody = downfile($val,'blog/edit/'.date("Y-m-d"));
		if (!empty($picbody))
		$_POST['body'] = str_replace($val,$picbody,$_POST['body']);
		if ($key == 0)
		$pic[0] = $picbody;

	}

}

/* ----��ȡ��һ��ͼΪ����ͼ  */
if (empty($_POST['litpic']) && !empty($pic[0]))
{
	$_POST['litpic'] = $pic[0];
}

$_POST['body'] = addslashes($_POST['body']);



if (empty($_REQUEST['id']))
{
	$pagename = '��Ӳ���';

	$_POST['id'] = $query->save("blog",$_POST);
}
else
{
	$pagename = '�޸Ĳ���';

	$query->save("blog",$_POST,' id = '.$_POST['id']);
}

blog_url($_POST['id']);
/* ��Ŀԭʼurl���Զ���urlʱʹ�� */

seo('blog',$_POST['id']);

/* д����־ */
admin_log("blog",$_POST['id'],'title',$pagename);

showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>