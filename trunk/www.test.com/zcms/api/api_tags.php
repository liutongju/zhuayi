<?php
/**
 * api_tags.php     ZCMS 主体框架文件-自动分词
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* 载入分词类 */
include_once ZCMS_ROOT.'/class/tags.class.php';


/* 实例化类 */
$tags = new tags($_REQUEST['title']);
$tags->baidu();
$reset['tags'] = iconv('gbk','utf-8',$tags->return_tags());
$reset['keywords'] = iconv('gbk','utf-8',$tags->return_keywords());
echo json_encode($reset);
exit;
?>