<?php/** * article_show.php     ZCMS 文章列表 *  * @copyright    (C) 2005 - 2010  ZCMS * @licenes      http://www.zcms.cc * @lastmodify   2010-11-17 * @author       zhuayi   * @QQ			 2179942 */$id = inject_check($_REQUEST['cid']);//-----查询栏目信息$info = $query->one_array("select * from ".T."article_class as a where id ='".$id."' limit 0,1");//-----查询SEO信息$seo = $query->one_array("select * from ".T."seo where tables ='article_class' and aid='".$id."' limit 0,1");if (empty($_REQUEST['page'])){	$html = '.html';}else{	$html = '_'.$_REQUEST['page'].'.html';}if (empty($seo['seo_title'])){	$seo['seo_title'] = $info['classname'];}$seo['seo_title'] .= ' - '.parent_classname($id);//----获取类别下子类ID$cid = $id;if ($article_tpl!='default'){	//-----查询是否有子类	if ($query->maxnum("select count(*) from ".T."article_class where parent_id =".$id)>0)	$_REQUEST['c_file'] = $article_tpl.'/文章频道.html';	else	$_REQUEST['c_file'] = $article_tpl.'/文章列表.html';	$path = str_replace(ZCMS_ROOT,'',$article_tpl).'/';}$webname .= ' - Powered by Zcms!';$info['maxnum'] = $query->maxnum("select count(*) from ".T."article where cid in (".$cid.")");//----当前位置$info['position'] = position($info['id']);//----待续排列数组$info['position'] = array_reverse ($info['position']);//------如果是生成则取路径if ($_REQUEST['generate'] == 'zcms'){	$tplfile = article_generate_path($info);	$htmlfile =str_replace(ZCMS_ROOT,'',$tplfile);		//--------生成文件	$tpl->LoadTemplate($_REQUEST['c_file']);	$tpl->SaveTo(str_replace('.html',$html,$tplfile));	echo ceil($info['maxnum']/$perpagenum);	exit;}?>