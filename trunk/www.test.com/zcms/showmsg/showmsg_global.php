<?php
/* �������ʾ��Ϣ
 * @ title ��ʾ������
 * @ url   ��ת��ַ
 */
/* ����URL����ֹ����/m/c/a���ָ�ʽ��URL */
$_GET['url'] = base64_decode($_GET['url']);
preg_match_all("/window.location.href='(.*)'/",$_GET['url'],$url);
if (empty($url[1][0]))
$url[1][0] = $_GET['url'];


?>