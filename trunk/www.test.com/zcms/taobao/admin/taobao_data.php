<?php
/**
 * admin_index.php     ZCMS �Ա�����Ʒ�б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------��֤��¼
verify_admin('admin_username');
//-------���÷���URL
set_cookie("backurl",GetCurUrl(),0);

if (empty($_REQUEST['cid']))
{
	$_REQUEST['cid'] = 0;
}
//----�����Ա���
include_once ZCMS_ROOT.'/zcms/taobao/class/taobao.api.class.php';
//------������Ŀ����
include_once ZCMS_CACHE.'taobao_class_cache.php';
$classlist = unserialize($taobao_class_cache);
if (!empty($_GET['taobao']))
{
	//----ת��ؼ���
	$_GET['taobao']['keyword'] = iconv('gbk','utf-8',urldecode($_GET['taobao']['keyword']));
	//----ת�����ൽAPI
	$_GET['taobao']['page_no'] = $_GET['page'];
	if (empty($_GET['taobao']['cid']))
	unset($_GET['taobao']['cid']);
	//----ת���Ա����̼��Ǽ�
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