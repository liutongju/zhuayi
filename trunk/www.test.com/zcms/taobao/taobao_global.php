<?php
/**
 * admin_menu.php     ZCMS �Ա���
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

$menu = array(
			'0'=>array('�Ա�������','config'),
			'4'=>array('����ר��','special'),
			'5'=>array('����ר��','special_edit'),
			'6'=>array('ɸѡ��Ʒ','data'),
			);
$tips = '��������д���в���,���ò���ȷ���ܻ�ʹ������վ����.';

if (!file_exists(ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("����û�����ø�ģ��,���ڴ���ȥ����",'/index.php?m=taobao&c=config&a=init');
}

/* �����Ա��������ļ� */
include_once ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php';

/* �������� */
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
					 );
/* Ĭ������ */
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
					 );
?>