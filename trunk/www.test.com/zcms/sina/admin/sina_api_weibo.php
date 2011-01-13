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

/* 初始微博 */
$body = $query->one_array("select body from ".T."sina_content order by rand() limit 0, 1");

$return = $t->t_info($body['body'],$body['pic'],$info['uid']);
if ($return == '1')
{
	echo '发布微博成功';
}
else
{
	echo $return['error'];
}
exit;

?>