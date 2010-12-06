<?php
/**
 * admin_menu.php     ZCMS 淘宝客
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

$menu = array(
			'0'=>array('淘宝客配置','config'),
			'4'=>array('管理专题','special'),
			'5'=>array('发布专题','special_edit'),
			'6'=>array('筛选商品','data'),
			);
$tips = '请慎重填写下列参数,配置不正确可能会使您的网站崩溃.';

if (!file_exists(ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("您还没有配置该模型,现在带你去配置",'/index.php?m=taobao&c=config&a=init');
}

/* 载入淘宝客配置文件 */
include_once ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php';

/* 卖家信誉 */
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
					 );
/* 默认排序 */
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
					 );
?>