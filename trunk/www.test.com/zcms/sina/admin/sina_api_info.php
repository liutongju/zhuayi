<?php
/**
 * index.php     ZCMS 入口文件
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

include 'api_global.php';

/* 判断性别 没有则随机 */
if (empty($info['gender']))
{
	$info['gender'] = rand(1,2);
}
/* 如果省份为空 随机一个省份 */
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

/* 随机个人签名 */
$sign = $query->one_array("select * from ".T."sina_sign order by rand() limit 0,1");
$info['sign'] = $sign['sign'];

/* 虚拟一个QQ号 */
$info['qq'] = rand(589681,384919184);

/* 虚拟一个生日 */
$info['birthday'] = date("Y-m-d",rand(316713600,695404800));

$return = $t->myinfo($info);

if ($return == '1')
{
	$info['province'] .= ','.$info['city'];
	$query->save("sina_account",$info,' id='.$_REQUEST['id']);
	echo '虚拟资料成功';
}
else
{
	echo $return['error'];
}
exit;

?>