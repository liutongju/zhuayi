<?php/** * article_show.php     ZCMS 文章前台展示 *  * @copyright    (C) 2005 - 2010  ZCMS * @licenes      http://www.zcms.cc * @lastmodify   2010-11-17 * @author       zhuayi   * @QQ			 2179942 */ $id = inject_check($_REQUEST['id']);//-----查询文章信息$info = $query->one_array("select a.*,b.classname,catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id where a.id ='".$id."' limit 0,1");//-----查询SEO信息$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid='".$id."'");if (empty($seo['seo_title'])){	$seo['seo_title'] = $info['title'];}$seo['seo_title'] .= ' - '.parent_classname($info['cid']);if ($article_tpl!='default'){	$_REQUEST['c_file'] = $article_tpl.'/文章正文.html';	$path = str_replace(ZCMS_ROOT,'',$article_tpl).'/';}$webname .= ' - Powered by Zcms!';//----下一篇   上一篇$info['pre'] = prenext($id,'>');$info['next'] = prenext($id,'<');//----当前位置$info['position'] = position($info['cid']);//----待续排列数组$info['position'] = array_reverse($info['position']);//-------更新点击数$query->query("update ".T."article set click = click+1 where id =".$id);//------如果是生成则取路径if ($_REQUEST['generate'] == 'zcms'){	//--------生成文件	$tpl->LoadTemplate($_REQUEST['c_file']);	$tpl->SaveTo(article_generate_path($info));	$query->query("update ".T."article set generate = 1 where id =".$info['id']);	exit('1');	}?>