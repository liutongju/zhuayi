<?php
/**
 * index.php     ZCMS ����ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

include 'api_global.php';

/* �ж��Ա� û������� */
if (empty($info['gender']))
{
	$info['gender'] = rand(1,2);
}
/* ���ʡ��Ϊ�� ���һ��ʡ�� */
if (empty($info['province']))
{
	$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
	$info['province'] = $province['id'];
	$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() ");
	$info['city'] .= $province['orders'];
}
else
{
	$info['province'] = explode(',',$info['province']);
	$info['province'] = $info['province'][0];
	$info['city'] = $info['province'][1];
}

/* �������ǩ�� */
$sign = $query->one_array("select * from ".T."sina_sign order by rand() limit 0,1");
$info['sign'] = $sign['sign'];

/* ����һ��QQ�� */
$info['qq'] = rand(589681,384919184);

/* ����һ������ */
$info['birthday'] = date("Y-m-d",rand(316713600,695404800));

$return = $t->myinfo($info);

if ($return == '1')
{
	$info['province'] .= ','.$info['city'];
	$query->save("sina_account",$info,' id='.$_REQUEST['id']);
	echo '�������ϳɹ�';
}
else
{
	echo $return['error'];
}
exit;

?>