<?php
/* 主框架提示信息
 * @ title 提示性文字
 * @ url   跳转地址
 */
/* 编码URL，防止出现/m/c/a这种格式的URL */
$_GET['url'] = base64_decode($_GET['url']);
preg_match_all("/window.location.href='(.*)'/",$_GET['url'],$url);
if (empty($url[1][0]))
$url[1][0] = $_GET['url'];


?>