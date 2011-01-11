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

$_REQUEST['fields'] = unserialize(siconv(urldecode($_REQUEST['fields'])));
//$_REQUEST['fields']['cid'] = implode(',',$_REQUEST['fields']['cid']);

//echo $_REQUEST['fields']['cid'];
//exit;

//echo '<pre>';
//print_r($_REQUEST['fields']);

?>