<?php
/**
 * admin_edit.php     ZCMS 
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */
$id = inject_check(intval($_REQUEST['id']));
$info = $query->one_array("select * from ".T."taobao_special where id =".$id);

if (empty($info)){	error_404();}
	
$seo = $query->one_array("select * from ".T."seo where tables ='taobao_special' and aid=".$id);
if (empty($seo['url']))$info['url'] = taobao_special_url($info['id']);else$info['url'] = $seo['url'];//----�����Ա���include_once ZCMS_ROOT.'/zcms/taobao/class/taobao.api.class.php';$taobao = new taobao();$taobao->cache = md5($info['customize']);
$info['customize'] = unserialize($info['customize']);
//---ת��ؼ���$info['customize']['keyword'] = iconv('gbk','utf-8',urldecode($info['customize']['keyword']));
if (empty($seo['seo_title'])){	$seo['seo_title'] = $info['title'];}$seo['seo_title'] .= ' - '.parent_classname($info['cid']);
//---�����ĿID��������ע����Ŀif (empty($info['customize']['cid']))unset($info['customize']['cid']);$taobao->method = 'taobao.taobaoke.items.get';$taobao->fields = 'num_iid,title,pic_url,price,commission_rate,commission,commission_volume,volume,commission_num,item_location,click_url';$taobao->_array = $info['customize'];$list = $taobao->_return();$list = $list['taobaoke_items_get_response']['taobaoke_items']['taobaoke_item'];
//------��ȡ��Ŀ����
$info['class'] = $query->one_array("select * from ".T."article_class where id =".$info['cid']);
if (!empty($_REQUEST['cid']))
{
	$cid = intval(inject_check($_REQUEST['cid']));
	//-----��ѯ��Ŀ��Ϣ
	$info_class = $query->one_array("select * from ".T."article_class as a where id ='".$cid."' limit 0,1");
	
	if (empty($info_class))
	{
		error_404();
	}
	
	//-----��ѯSEO��Ϣ
	$seo = $query->one_array("select * from ".T."seo where tables ='article_class' and aid='".$cid."' limit 0,1");
	
	if (empty($seo['seo_title']))
	{
		$seo['seo_title'] = $info_class['classname'];
	}

	$seo['seo_title'] .= ' - '.parent_classname($cid);

	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/taobao/template/taobao_article_list.html';
}
elseif (!empty($_REQUEST['aid']))
{
	//-----������������
	include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/taobao/template/taobao_article.html';
	$aid = intval(inject_check($_REQUEST['aid']));
	//-----��ѯ������Ϣ
	$info_article = $query->one_array("select a.*,b.classname,catdir from ".T."article as a left join ".T."article_class as b on a.cid = b.id where a.id ='".$aid."' and a.cid = ".$info['cid']." limit 0,1");
	if (empty($info_article))
	{
		error_404();
	}
	//-----��ѯSEO��Ϣ
	$seo = $query->one_array("select * from ".T."seo where tables ='article' and aid='".$aid."'");

	$maxnum = strlen($info_article['body']);
	
	$infourl = $info['url'];
	//----��һƪ   ��һƪ
	$info_article['pre'] = taobao_article_prenext($aid,$info['cid'],'<');
	$info_article['next'] = taobao_article_prenext($aid,$info['cid'],'>');

	if (empty($seo['seo_title']))
	{
		$seo['seo_title'] = $info_article['title'];
	}
	$seo['seo_title'] .= ' - '.parent_classname($info_article['cid']);
	
	if (empty($_REQUEST['page']))
	{
		$start = 0;
		$html = '.html';
	}
	else
	{
		$start = ($_REQUEST['page']-1)*$article_page_len;
		$info_article['title'] .= ' ����'.$_REQUEST['page'].'ҳ��'; 
		$html = '_'.$_REQUEST['page'].'.html';
	}
	
	$webname .= ' - Powered by Zcms!';
	
	//-------���µ����
	$query->query("update ".T."article set click = click+1 where id =".$aid);
	
	$info_article['body'] = closetags(strlens($info_article['body'],$start,$article_page_len,1));

	//----����Ƿ����ؼ��������滻
	//-----����ʿ�
	include_once ZCMS_CACHE.'zkeylink.php';
	//----���л�����
	$keylink = unserialize($zkeylink);

	$highlight_array = array();
	$info_article['body'] = highlight($info_article['body'],$keylink['title'],$keylink['url']);	
	
	
}
?>