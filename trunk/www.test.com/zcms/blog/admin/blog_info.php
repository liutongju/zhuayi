<?php
/**
 * admin_info.php     ZCMS 后台文章入库操作
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* -------验证登录 */
verify_admin('admin_username');


/* ----处理上传文件  */
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('blog/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);

/* -----判断是否自动提取文章摘要  */
if ($abstract ==1 && $_POST['abstract']=='')
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n|　/', '',strlens($_POST['body'],0,250))));
}

$_POST['title'] = trim($_POST['title']);

/* ----如果开启自动提取Tags则提取TAGS和SEO关键词  */
if ($blog_tags == 1 && $_POST['tags']=='' && $_POST['seo_keywords']=='')
{
	$tags = file_get_contents($weburl.'/index.php?m=api&c=tags&title='.$_POST['title']);

	$tags = json_decode($tags,true);

	if (empty($_POST['tags']))
	$_POST['tags'] = siconv($tags['tags']);
	if (empty($_POST['seo_keywords']))
	$_POST['seo_keywords'] = siconv($tags['keywords']);
}

/* ----提取第一张图为缩略图  */
$_POST['body'] = stripslashes($_POST['body']);

preg_match_all("/src=[\"\']?([%+\*\w\/:\._-]+(?:jpg|gif|bmp|jpeg|png))/ism",$_POST['body'],$array);

/* ------去除重复地址  */

$pic = array_flip(array_flip($array[1]));

/*----判断是否要下载文章内容里的图片  */
if ($downfile == 1)
{
	/* 循环下载图片 */
	foreach ($pic as $key=>$val)
	{
		$picbody = downfile($val,'blog/edit/'.date("Y-m-d"));
		if (!empty($picbody))
		$_POST['body'] = str_replace($val,$picbody,$_POST['body']);
		if ($key == 0)
		$pic[0] = $picbody;

	}

}

/* ----提取第一个图为缩略图  */
if (empty($_POST['litpic']) && !empty($pic[0]))
{
	$_POST['litpic'] = $pic[0];
}

$_POST['body'] = addslashes($_POST['body']);



if (empty($_REQUEST['id']))
{
	$pagename = '添加博文';

	$_POST['id'] = $query->save("blog",$_POST);
}
else
{
	$pagename = '修改博文';

	$query->save("blog",$_POST,' id = '.$_POST['id']);
}

blog_url($_POST['id']);
/* 项目原始url，自定义url时使用 */

seo('blog',$_POST['id']);

/* 写入日志 */
admin_log("blog",$_POST['id'],'title',$pagename);

showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>