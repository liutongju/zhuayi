<?php/** * article_show.php     ZCMS 文章前台展示 *  * @copyright    (C) 2005 - 2010  ZCMS * @licenes      http://www.zcms.cc * @lastmodify   2010-11-17 * @author       zhuayi   * @QQ			 2179942 */ $id = inject_check($_REQUEST['id']);/* 查询文章信息 */$info = $query->one_array("select a.*,b.classname,catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id where a.id ='".$id."' limit 0,1");if (empty($info)){	error_404();}/* 查询SEO信息 */$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid='".$id."'");$info['url'] = $seo['url'];$maxnum = strlen($info['body']);if (empty($_REQUEST['page'])){	$start = 0;	$html = '.html';}else{	$start = ($_REQUEST['page']-1)*$article_page_len;	$info['title'] .= ' 【第'.$_REQUEST['page'].'页】'; 	$html = '_'.$_REQUEST['page'].'.html';}if (empty($seo['seo_title'])){	$seo['seo_title'] = $info['title'];}$seo['seo_title'] .= ' - '.parent_classname($info['cid']);if ($article_tpl!='default'){	$_REQUEST['c_file'] = $article_tpl.'/文章正文.html';}$webname .= ' - Powered by Zcms!';/* 下一篇   上一篇 */$info['pre'] = prenext($id,'<','desc');$info['next'] = prenext($id,'>','asc');/* 当前位置 */$info['position'] = position($info['cid']);/* 待续排列数组 */$info['position'] = array_reverse($info['position']);/* 更新点击数 */$query->query("update ".T."article set click = click+1 where id =".$id);/* 转换TAGS */$info['tags'] = explode(',',$info['tags']);foreach ($info['tags'] as $val){	$tags .= '<a href="/article/search/tags/'.$val.'" target="_blank">'.$val.'</a> ';}$info['tags'] = $tags;/* 关闭未结束的HTML */$info['body'] = closetags(strlens($info['body'],$start,$article_page_len,1));/* 检查是否开启关键词链接替换 */if ($key_highlight == 1){	/* 载入词库 */	include_once ZCMS_CACHE.'zkeylink.php';	/* 序列化数组 */	$keylink = unserialize($zkeylink);	$highlight_array = array();	$info['body'] = highlight($info['body'],$keylink['title'],$keylink['url']);	}/* 如果是生成则取路径 */if ($_REQUEST['generate'] == 'zcms'){	$tplfile = ZCMS_ROOT.$info['url'];	$htmlfile =str_replace(ZCMS_ROOT,'',$tplfile);	/* 生成文件 */	$tpl->LoadTemplate($_REQUEST['c_file']);	$tpl->SaveTo(str_replace('.html',$html,$tplfile));	$query->query("update ".T."article set generate = 1 where id =".$info['id']);	$query->query("update ".T."seo set url = '".$htmlfile."' where tables='article' and aid =".$info['id']);	echo ceil($maxnum/$article_page_len);	exit;}?>