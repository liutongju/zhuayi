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

//-----��������
$start_credit = array(
						array('value'=>'1heart','title'=>'һ��'),
						array('value'=>'2heart','title'=>'����'),
						array('value'=>'3heart','title'=>'����'),
						array('value'=>'4heart','title'=>'����'),
						array('value'=>'5heart','title'=>'����'),
						array('value'=>'1diamond','title'=>'һ��'),
						array('value'=>'2diamond','title'=>'����'),
						array('value'=>'3diamond','title'=>'����'),
						array('value'=>'4diamond','title'=>'����'),
						array('value'=>'5diamond','title'=>'����'),
						array('value'=>'1crown','title'=>'һ��'),
						array('value'=>'2crown','title'=>'����'),
						array('value'=>'3crown','title'=>'����'),
						array('value'=>'4crown','title'=>'�Ĺ�'),
						array('value'=>'5crown','title'=>'���'),
						array('value'=>'1goldencrown','title'=>'һ�ƹ�'),
						array('value'=>'2goldencrown','title'=>'���ƹ�'),
						array('value'=>'3goldencrown','title'=>'���ƹ�'),
						array('value'=>'4goldencrown','title'=>'�Ļƹ�'),
						array('value'=>'5goldencrown','title'=>'��ƹ�'),
					 );//-----Ĭ������
$sort = array(
						array('value'=>'price_desc','title'=>'�۸�Ӹߵ���'),
						array('value'=>'price_asc','title'=>'�۸�ӵ͵���'),
						array('value'=>'credit_desc','title'=>'���õȼ��Ӹߵ���'),
						array('value'=>'commissionRate_desc','title'=>'Ӷ����ʴӸߵ���'),
						array('value'=>'commissionRate_asc','title'=>'Ӷ����ʴӵ͵���'),
						array('value'=>'commissionNum_desc','title'=>'�ɽ����ɸߵ���'),
						array('value'=>'commissionNum_asc','title'=>'�ɽ����ӵ͵���'),
						array('value'=>'commissionVolume_desc','title'=>'��֧��Ӷ��Ӹߵ���'),
						array('value'=>'commissionVolume_asc','title'=>'��֧��Ӷ��ӵ͵���'),
						array('value'=>'delistTime_desc','title'=>'��Ʒ�¼�ʱ��Ӹߵ���'),
						array('value'=>'delistTime_asc','title'=>'��Ʒ�¼�ʱ��ӵ͵���')
					 );//----�����Ա���
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