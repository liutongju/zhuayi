<?php/** * admin_index.php     ZCMS 文章配置 *  * @copyright    (C) 2005 - 2010  ZCMS * @licenes      http://www.zcms.cc * @lastmodify   2010-10-28 * @author       zhuayi   * @QQ			 2179942 *///-------设置返回URLset_cookie("backurl",GetCurUrl(),0);//-------验证登录verify_admin('admin_username');$pagename = '文章配置';//------获取模版目录$tpllist = handie(ZCMS_ROOT.'/zcms/article/template/down',1);$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid=0");if (empty($article_index_url)){	$article_index_url = $weburl.'/article/';}if (empty($article_index_path)){	$article_index_path = '/article/';}if (empty($flag[0])){	$flag = array("推荐|tuijian","热门|remen","幻灯片|huandengpian");}if (empty($article_tpl)){	$article_tpl = ZCMS_ROOT.'/zcms/article/template/down/chinaz';}if (empty($article_class_url)){	$article_class_url = $weburl.'/article/class{id}.html';}if (empty($article_class_path)){	$article_class_path = '/{catdir}/index.html';}if (empty($article_class_time)){	$article_class_time = '3600';}if (empty($article_width)){	$article_width = '135';}if (empty($article_height)){	$article_height = '111';}if (empty($article_page_len)){	$article_page_len = '9999';}if (empty($article_news_url)){	$article_news_url = $weburl."/article/{id}.html";}if (empty($article_generate_path)){	$article_generate_path = "/{catdir}/{Y}-{M}/{D}/{id}.html";}if (empty($article_generate_time)){	$article_generate_time = "3600";}?>