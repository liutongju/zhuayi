<?php
/**
 * admin_index.php     ZCMS 淘宝客商品列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------验证登录
verify_admin('admin_username');
//-------设置返回URL
set_cookie("backurl",GetCurUrl(),0);

if (empty($_REQUEST['cid']))
{
	$_REQUEST['cid'] = 0;
}

//-----卖家信誉
$start_credit = array(
						array('value'=>'1heart','title'=>'一心'),
						array('value'=>'2heart','title'=>'两心'),
						array('value'=>'3heart','title'=>'三心'),
						array('value'=>'4heart','title'=>'四心'),
						array('value'=>'5heart','title'=>'五心'),
						array('value'=>'1diamond','title'=>'一钻'),
						array('value'=>'2diamond','title'=>'两钻'),
						array('value'=>'3diamond','title'=>'三钻'),
						array('value'=>'4diamond','title'=>'四钻'),
						array('value'=>'5diamond','title'=>'五钻'),
						array('value'=>'1crown','title'=>'一冠'),
						array('value'=>'2crown','title'=>'两冠'),
						array('value'=>'3crown','title'=>'三冠'),
						array('value'=>'4crown','title'=>'四冠'),
						array('value'=>'5crown','title'=>'五冠'),
						array('value'=>'1goldencrown','title'=>'一黄冠'),
						array('value'=>'2goldencrown','title'=>'二黄冠'),
						array('value'=>'3goldencrown','title'=>'三黄冠'),
						array('value'=>'4goldencrown','title'=>'四黄冠'),
						array('value'=>'5goldencrown','title'=>'五黄冠'),
					 );//-----默认排序
$sort = array(
						array('value'=>'price_desc','title'=>'价格从高到低'),
						array('value'=>'price_asc','title'=>'价格从低到高'),
						array('value'=>'credit_desc','title'=>'信用等级从高到低'),
						array('value'=>'commissionRate_desc','title'=>'佣金比率从高到底'),
						array('value'=>'commissionRate_asc','title'=>'佣金比率从低到高'),
						array('value'=>'commissionNum_desc','title'=>'成交量成高到低'),
						array('value'=>'commissionNum_asc','title'=>'成交量从低到高'),
						array('value'=>'commissionVolume_desc','title'=>'总支出佣金从高到底'),
						array('value'=>'commissionVolume_asc','title'=>'总支出佣金从低到高'),
						array('value'=>'delistTime_desc','title'=>'商品下架时间从高到底'),
						array('value'=>'delistTime_asc','title'=>'商品下架时间从低到高')
					 );//----载入淘宝类
include_once ZCMS_ROOT.'/zcms/taobao/class/taobao.api.class.php';
//------载入栏目缓存
include_once ZCMS_CACHE.'taobao_class_cache.php';
$classlist = unserialize($taobao_class_cache);
if (!empty($_GET['taobao']))
{
	//----转码关键词
	$_GET['taobao']['keyword'] = iconv('gbk','utf-8',urldecode($_GET['taobao']['keyword']));
	//----转换分类到API
	$_GET['taobao']['page_no'] = $_GET['page'];
	if (empty($_GET['taobao']['cid']))
	unset($_GET['taobao']['cid']);
	//----转换淘宝客商家星级
	$_GET['taobao']['end_credit'] = $_GET['taobao']['start_credit'];
	$taobao = new taobao();
	$taobao->cache = md5(implode($_GET['taobao']));

	$taobao->method = 'taobao.taobaoke.items.get';

	$taobao->fields = 'num_iid,title,pic_url,price,commission_rate,commission,commission_volume,volume,commission_num,item_location,click_url';
	$taobao->_array = $_GET['taobao'];
	$list = $taobao->_return();
	$list = $list['taobaoke_items_get_response']['taobaoke_items']['taobaoke_item'];
}
?>