<?php
/**
 * api_tags.php     ZCMS �������ļ�-�Զ��ִ�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ����ִ��� */
include_once ZCMS_ROOT.'/class/tags.class.php';


/* ʵ������ */
$tags = new tags($_REQUEST['title']);
$tags->baidu();
$reset['tags'] = iconv('gbk','utf-8',$tags->return_tags());
$reset['keywords'] = iconv('gbk','utf-8',$tags->return_keywords());
echo json_encode($reset);
exit;
?>