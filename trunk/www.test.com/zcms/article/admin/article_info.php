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


/* 开启随机推送 */
if (empty($_POST['flag']) && $rand_push == 1)
{
	$_POST['flag'] = explode('|',$flag[array_rand($flag)]);
	$_POST['flag'] = $_POST['flag'][1];
}
else
{
	$_POST['flag'] = implode('|',$_POST['flag']);
}
/* ----处理上传文件  */
include_once ZCMS_ROOT.'/class/upload.class.php';
$upload = new upload($_FILES['file1']);
$upload->request = $_POST['litpic'];
$_POST['litpic'] = $upload->copy('article/litpic',time());

$_POST['dtime'] = strtotime($_POST['dtime']);

/* -----判断是否自动提取文章摘要  */
if ($abstract ==1 && $_POST['abstract']=='')
{
	$_POST['abstract'] = trim(str_replace('	','',preg_replace('/\r|\n|　/', '',strlens($_POST['body'],0,250))));
}

/* ----判断是否SEO描述为空，如果为空，则引用正文摘要  */
if (empty($_POST['seo_description']))
{
	$_POST['seo_description'] = $_POST['abstract'];
}

$_POST['title'] = trim($_POST['title']);

/* ----如果开启自动提取Tags则提取TAGS和SEO关键词  */
if ($article_tags == 1 && $_POST['tags']=='' && $_POST['seo_keywords']=='')
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

/* ----下载第一个图为缩略图  */
if (empty($_POST['litpic']) && !empty($pic[0]))
{
	$_POST['litpic'] = downfile($pic[0],'article/litpic/'.date("Y-m-d"));
}
/*----判断是否要下载文章内容里的图片  */
if ($downfile == 1)
{
	/* 循环下载图片 */
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
	if (empty($_POST['dtime']))
	{
		$_POST['dtime'] = time();
	}

	$pagename = '添加文章';

	$_POST['id'] = $query->save("article",$_POST);
}
else
{
	$pagename = '修改栏目';
	
	$query->save("article",$_POST,' id = '.$_POST['id']);	
}


if (!empty($_POST['request_url']))
{
	$_POST['url'] = article_generate_path($_POST['id'],$_POST['request_url']);
}
else
{
	$_POST['url']= article_generate_path($_POST['id'],$article_generate_path);
}



/* 强制信息可以模糊匹配 */
$_POST['parameter'] == 1;
/* 写入SEO表 */
$_POST['request_url'] = article_url($_POST['id']);
/* 项目原始url，自定义url时使用 */

seo('article',$_POST['id']);

/* 写入日志 */
admin_log("article",$_POST['id'],'title',$pagename);

showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>